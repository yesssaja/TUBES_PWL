<?php

namespace App\Http\Controllers\Perusahaan;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\ProfilePerusahaan;
use App\Models\Inbox;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index()
    {
        $profile = ProfilePerusahaan::where('user_id', Auth::id())->first();

        $reviews = collect();

        if ($profile) {
            $reviews = Review::where('perusahaan_id', $profile->id)
                ->latest()
                ->get();
        }

        return view('perusahaan.review.index', compact('reviews'));
    }

    public function reply(Request $request, Review $review)
    {
        $request->validate([
            'balasan_perusahaan' => 'required|string|max:1000',
        ]);

        $profile = ProfilePerusahaan::where('user_id', Auth::id())->first();

        if (!$profile || $review->perusahaan_id != $profile->id) {
            abort(403, 'Anda tidak memiliki akses untuk membalas review ini.');
        }

        $review->update([
            'balasan_perusahaan' => $request->balasan_perusahaan,
        ]);
        
        Inbox::create([
            'pelamar_id' => $review->pelamar_id,
            'title' => 'Balasan Review',
            'message' => 'Perusahaan telah membalas review yang kamu berikan.',
            'type' => 'review',
            'is_read' => false,
            'action_text' => 'Lihat Review',
            'action_url' => route('perusahaan.review.index'),
        ]);

        return back()->with('success', 'Balasan review berhasil dikirim.');
    }
}