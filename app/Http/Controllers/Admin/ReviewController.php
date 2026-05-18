<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\Perusahaan;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with(['perusahaan', 'user'])
            ->latest()
            ->get();

        return view('admin.review.index', compact('reviews'));
    }

    public function edit(Review $review)
    {
        $perusahaans = Perusahaan::latest()->get();

        return view('admin.review.edit', compact('review', 'perusahaans'));
    }

    public function update(Request $request, Review $review)
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
            'balasan_perusahaan' => 'nullable|string',
        ]);

        $review->update([
            'perusahaan_id' => $request->perusahaan_id,
            'nama' => $request->nama,
            'posisi' => $request->posisi,
            'rating' => $request->rating,
            'rating_gaji' => $request->rating_gaji,
            'rating_kultur' => $request->rating_kultur,
            'rating_fasilitas' => $request->rating_fasilitas,
            'ulasan' => $request->ulasan,
            'balasan_perusahaan' => $request->balasan_perusahaan,
        ]);

        return redirect()
            ->route('admin.review.index')
            ->with('success', 'Review berhasil diperbarui.');
    }

    public function destroy(Review $review)
    {
        $review->delete();

        return redirect()
            ->route('admin.review.index')
            ->with('success', 'Review berhasil dihapus.');
    }

    public function reply(Request $request, Review $review)
{
    $request->validate([
        'balasan_perusahaan' => 'required|string',
    ]);

    $review->update([
        'balasan_perusahaan' => $request->balasan_perusahaan,
    ]);

    return redirect()
        ->route('admin.review.index')
        ->with('success', 'Balasan review berhasil dikirim.');
}
}