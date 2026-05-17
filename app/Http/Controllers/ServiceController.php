<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceImage;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::with('images')
            ->latest()
            ->take(3)
            ->get();

        // HITUNG JUMLAH JASA BERDASARKAN KATEGORI
        $categoryCounts = Service::select('category')
            ->selectRaw('COUNT(*) as total')
            ->whereNotNull('category')
            ->groupBy('category')
            ->pluck('total', 'category');

            return view('pages.service', compact('services' , 'categoryCounts'));
        }

    public function all(Request $request)
    {
        $query = Service::with('images');

        // FILTER SEARCH
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('freelancer_name', 'like', '%' . $search . '%')
                    ->orWhere('service_name', 'like', '%' . $search . '%')
                    ->orWhere('location', 'like', '%' . $search . '%')
                    ->orWhere('skills', 'like', '%' . $search . '%');
            });
        }

        // FILTER KATEGORI
        if ($request->filled('category') && $request->category !== 'all') {
            $query->where('category', $request->category);
        }

        // AMBIL DATA SERVICE SESUAI FILTER
        $services = $query->latest()->paginate(9)->withQueryString();

        // AMBIL KATEGORI YANG BENAR-BENAR ADA DI DATABASE
        $categories = Service::select('category')
            ->whereNotNull('category')
            ->distinct()
            ->orderBy('category', 'asc')
            ->pluck('category');

        return view('pages.all-service', compact('services', 'categories'));
    }

    public function create()
    {
        return view('pages.tawarkan-service');
    }

    public function store(Request $request)
    {
        // VALIDASI FORM
        $request->validate([
            'freelancer_name' => 'required|string|max:255',
            'service_name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'work_experience' => 'required|string|max:255',
            'languages' => 'nullable',
            'skills' => 'required|string|max:255',
            'whatsapp' => 'required|string|max:30',
            'email' => 'required|email|max:255',
            'portfolio_images' => 'required|array|size:5',
            'portfolio_images.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // SIMPAN DATA JASA
        $service = Service::create([
            'freelancer_name' => $request->freelancer_name,
            'service_name' => $request->service_name,
            'category' => $request->category,
            'price' => $request->price,
            'location' => $request->location,
            'description' => $request->description,
            'work_experience' => $request->work_experience,
            'languages' => $request->languages,
            'skills' => $request->skills,
            'whatsapp' => $request->whatsapp,
            'email' => $request->email,
        ]);

        // SIMPAN 5 GAMBAR PORTFOLIO
        foreach ($request->file('portfolio_images') as $image) {
            $imagePath = $image->store('service/portfolio', 'public');

            ServiceImage::create([
                'service_id' => $service->id,
                'image' => $imagePath,
            ]);
        }

        return redirect('/service')->with('success', 'Jasa berhasil dipublikasikan.');
    }

    public function show(Service $service)
    {
        $service->load('images');

        return view('pages.detail-service', compact('service'));
    }

}