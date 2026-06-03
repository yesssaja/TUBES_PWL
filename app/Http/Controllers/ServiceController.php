<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::with(['images', 'pelamar'])
            ->latest()
            ->take(3)
            ->get();

        $categories = Service::select('category')
            ->whereNotNull('category')
            ->distinct()
            ->orderBy('category', 'asc')
            ->pluck('category');

        $categoryCounts = Service::select('category')
            ->selectRaw('COUNT(*) as total')
            ->whereNotNull('category')
            ->groupBy('category')
            ->pluck('total', 'category');

        return view('users.service.dashboard.service', compact(
            'services',
            'categories',
            'categoryCounts'
        ));
    }

    public function all(Request $request)
    {
        $query = Service::with(['images', 'pelamar']);

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('freelancer_name', 'like', '%' . $search . '%')
                    ->orWhere('service_name', 'like', '%' . $search . '%')
                    ->orWhere('location', 'like', '%' . $search . '%')
                    ->orWhere('skills', 'like', '%' . $search . '%');
            });
        }

        if ($request->filled('category') && $request->category !== 'all') {
            $query->where('category', $request->category);
        }

        $services = $query->latest()->paginate(9)->withQueryString();

        $categories = Service::select('category')
            ->whereNotNull('category')
            ->distinct()
            ->orderBy('category', 'asc')
            ->pluck('category');

        $locations = Service::select('location')
            ->whereNotNull('location')
            ->distinct()
            ->orderBy('location', 'asc')
            ->pluck('location');

        return view('users.service.all.all-service', compact(
            'services',
            'categories',
            'locations'
        ));
    }

    public function create()
    {
        $categories = [
            'Fotografi',
            'Desain Grafis',
            'Video Editing',
            'Musik & Audio',
            'MC & Event',
            'Penulisan',
            'Website & Programming',
            'Penerjemah',
            'Makeup Artist',
            'Les Privat',
            'Admin & Data Entry',
            'Social Media',
        ];

        return view('users.service.register.tawarkan-service', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'freelancer_name' => 'required|string|max:255',
            'service_name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'work_experience' => 'required|string|max:255',
            'languages' => 'nullable|array',
            'languages.*' => 'nullable|string|max:100',
            'skills' => 'required|string|max:255',
            'whatsapp' => 'required|string|max:30',
            'email' => 'required|email|max:255',
            'portfolio_images' => 'required|array|size:5',
            'portfolio_images.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $service = Service::create([
            'pelamar_id' => Auth::id(),
            'freelancer_name' => $request->freelancer_name,
            'service_name' => $request->service_name,
            'category' => $request->category,
            'price' => $request->price,
            'location' => $request->location,
            'description' => $request->description,
            'work_experience' => $request->work_experience,
            'languages' => $request->languages ?? [],
            'skills' => $request->skills,
            'whatsapp' => $request->whatsapp,
            'email' => $request->email,
        ]);

        foreach ($request->file('portfolio_images') as $image) {
            $imagePath = $image->store('service/portfolio', 'public');

            ServiceImage::create([
                'service_id' => $service->id,
                'image' => $imagePath,
            ]);
        }

        return redirect()
            ->route('service.index')
            ->with('success', 'Jasa berhasil dipublikasikan.');
    }

    public function show(Service $service)
    {
        $service->load(['images', 'pelamar']);

        return view('users.service.detail.detail-service', compact('service'));
    }

    public function searchAjax(Request $request)
    {
        $query = Service::with(['images', 'pelamar']);

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('freelancer_name', 'like', '%' . $search . '%')
                    ->orWhere('service_name', 'like', '%' . $search . '%')
                    ->orWhere('location', 'like', '%' . $search . '%')
                    ->orWhere('skills', 'like', '%' . $search . '%')
                    ->orWhere('category', 'like', '%' . $search . '%');
            });
        }

        if ($request->filled('category') && $request->category !== 'all') {
            $query->where('category', $request->category);
        }

        if ($request->filled('location') && $request->location !== 'all') {
            $query->where('location', $request->location);
        }

        $services = $query->latest()->take(30)->get();

        return response()->json([
            'services' => $services->map(function ($service) {
                return [
                    'id' => $service->id,
                    'freelancer_name' => $service->freelancer_name,
                    'service_name' => $service->service_name,
                    'category' => $service->category,
                    'location' => $service->location,
                    'price' => number_format($service->price, 0, ',', '.'),
                    'image_url' => optional($service->images->first())->image_url,
                    'detail_url' => route('service.show', $service->id),
                ];
            })
        ]);
    }
}