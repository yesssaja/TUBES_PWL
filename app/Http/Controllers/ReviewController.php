<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    public function index($perusahaan = null)
    {
        if ($perusahaan) {
            $perusahaan = Perusahaan::findOrFail($perusahaan);
        } else {
            $perusahaan = Perusahaan::first();
        }

        $reviewsQuery = Review::with(['pelamar', 'perusahaan'])->latest();

        if ($perusahaan) {
            $reviewsQuery->where('perusahaan_id', $perusahaan->id);
        }

        $reviews = $reviewsQuery->get();
        $totalReviews = $reviews->count();

        $averageRating = $totalReviews > 0
            ? round($reviews->avg('rating'), 1)
            : 0;

        return view('users.perusahaan.review.review', compact('perusahaan', 'reviews', 'averageRating', 'totalReviews'));
    }

    public function create($perusahaan = null)
    {
        $perusahaan = $perusahaan
            ? Perusahaan::findOrFail($perusahaan)
            : Perusahaan::first();

        return view('users.perusahaan.review.tulis_review', compact('perusahaan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'perusahaan_id' => 'required|exists:profile_perusahaan,id', 
            'nama' => 'required|string|max:255',
            'posisi' => 'nullable|string|max:255',
            'rating' => 'required|numeric|min:1|max:5',
            'ulasan' => 'required|string',
        ]);

        Review::create([
            'perusahaan_id' => $request->perusahaan_id,
            'pelamar_id' => Auth::id(),
            'nama' => $request->nama,
            'posisi' => $request->posisi,
            'rating' => $request->rating,
            'ulasan' => $request->ulasan,
        ]);

        return redirect()
            ->route('perusahaan.review', $request->perusahaan_id)
            ->with('success', 'Review berhasil dikirim.');
    }
}