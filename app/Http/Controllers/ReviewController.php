<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index($perusahaan = null)
    {
        if ($perusahaan) {
            $perusahaan = Perusahaan::findOrFail($perusahaan);
        } else {
            $perusahaan = Perusahaan::first();
        }

        $reviewsQuery = Review::with(['user', 'perusahaan'])
            ->latest();

        if ($perusahaan) {
            $reviewsQuery->where('perusahaan_id', $perusahaan->id);
        }

        $reviews = $reviewsQuery->get();

        $totalReviews = $reviews->count();

        $averageRating = $totalReviews > 0
            ? round($reviews->avg('rating'), 1)
            : 0;

        $avgGaji = $totalReviews > 0
            ? round($reviews->avg('rating_gaji') ?? $averageRating, 1)
            : 0;

        $avgKultur = $totalReviews > 0
            ? round($reviews->avg('rating_kultur') ?? $averageRating, 1)
            : 0;

        $avgFasilitas = $totalReviews > 0
            ? round($reviews->avg('rating_fasilitas') ?? $averageRating, 1)
            : 0;

        return view('pages.review', compact(
            'perusahaan',
            'reviews',
            'totalReviews',
            'averageRating',
            'avgGaji',
            'avgKultur',
            'avgFasilitas'
        ));
    }

    public function create($perusahaan = null)
    {
        $perusahaan = $perusahaan
            ? Perusahaan::findOrFail($perusahaan)
            : Perusahaan::first();

        return view('pages.tulis_review', compact('perusahaan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'perusahaan_id' => 'nullable|exists:perusahaans,id',
            'nama' => 'required|string|max:255',
            'posisi' => 'nullable|string|max:255',
            'rating' => 'required|numeric|min:1|max:5',
            'rating_gaji' => 'nullable|numeric|min:1|max:5',
            'rating_kultur' => 'nullable|numeric|min:1|max:5',
            'rating_fasilitas' => 'nullable|numeric|min:1|max:5',
            'ulasan' => 'required|string',
        ]);

        Review::create([
            'perusahaan_id' => $request->perusahaan_id,
            'user_id' => auth()->id(),
            'nama' => $request->nama,
            'posisi' => $request->posisi,
            'rating' => $request->rating,
            'rating_gaji' => $request->rating_gaji,
            'rating_kultur' => $request->rating_kultur,
            'rating_fasilitas' => $request->rating_fasilitas,
            'ulasan' => $request->ulasan,
        ]);

        return redirect()
            ->route('perusahaan.review', $request->perusahaan_id)
            ->with('success', 'Review berhasil dikirim.');
    }
}