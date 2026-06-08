<?php

namespace App\Http\Controllers\Perusahaan;

use App\Http\Controllers\Controller;
use App\Models\Loker;
use App\Models\Lamaran;
use App\Models\Event;
use App\Models\Review;
use App\Models\ProfilePerusahaan;
use Illuminate\Support\Facades\Auth;

class ManajemenController extends Controller
{
    public function index()
    {
        $profile = ProfilePerusahaan::where('user_id', Auth::id())->first();

        if (!$profile) {
            $totalLowongan = 0;
            $totalLamaran = 0;
            $totalEvent = 0;
            $ratingReview = 0;
            $aktivitas = collect();
        } else {
            $totalLowongan = Loker::where('perusahaan_id', $profile->id)->count();

            $totalLamaran = Lamaran::whereHas('loker', function ($query) use ($profile) {
                $query->where('perusahaan_id', $profile->id);
            })->count();

            $totalEvent = Event::where('perusahaan_id', $profile->id)->count();

            $ratingReview = Review::where('perusahaan_id', $profile->id)->avg('rating') ?? 0;

            $aktivitas = collect();

            $lowonganTerbaru = Loker::where('perusahaan_id', $profile->id)
                ->latest()
                ->take(2)
                ->get();

            foreach ($lowonganTerbaru as $loker) {
                $aktivitas->push([
                    'judul' => 'Lowongan ' . $loker->judul_loker . ' berhasil dipublish',
                    'waktu' => $loker->created_at->diffForHumans(),
                ]);
            }

            $lamaranTerbaru = Lamaran::with('loker')
                ->whereHas('loker', function ($query) use ($profile) {
                    $query->where('perusahaan_id', $profile->id);
                })
                ->latest()
                ->take(2)
                ->get();

            foreach ($lamaranTerbaru as $lamaran) {
                $aktivitas->push([
                    'judul' => 'Lamaran baru masuk untuk ' . ($lamaran->loker->judul_loker ?? 'lowongan'),
                    'waktu' => $lamaran->created_at->diffForHumans(),
                ]);
            }
        }

        $kelengkapan = 0;

        if ($profile) {
            $fields = [
                $profile->nama_perusahaan,
                $profile->logo,
                $profile->alamat,
                $profile->no_hp,
                $profile->website,
                $profile->deskripsi,
            ];

            $filled = collect($fields)->filter()->count();
            $kelengkapan = round(($filled / count($fields)) * 100);
        }

        return view('perusahaan.manajemen.index', compact(
            'profile',
            'totalLowongan',
            'totalLamaran',
            'totalEvent',
            'ratingReview',
            'kelengkapan',
            'aktivitas'
        ));
    }
}