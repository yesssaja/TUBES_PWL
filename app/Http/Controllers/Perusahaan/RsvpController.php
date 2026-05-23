<?php

namespace App\Http\Controllers\Perusahaan;

use App\Http\Controllers\Controller;
use App\Models\Perusahaan;
use App\Models\Rsvp;
use Illuminate\Support\Facades\Auth;

class RsvpController extends Controller
{
    public function index()
    {
        $perusahaan = Perusahaan::where('user_id', Auth::id())->first();

        $rsvps = $perusahaan
            ? Rsvp::with(['event', 'user'])
                ->whereHas('event', function ($query) use ($perusahaan) {
                    $query->where('perusahaan_id', $perusahaan->id);
                })
                ->latest()
                ->get()
            : collect();

        return view('perusahaan.rsvp.index', compact('rsvps'));
    }

    public function show($id)
    {
        $rsvp = Rsvp::with(['event', 'user'])->findOrFail($id);

        return view('perusahaan.rsvp.show', compact('rsvp'));
    }

    public function approve($id)
{
    $rsvp = Rsvp::findOrFail($id);

    $rsvp->status_kehadiran = 'hadir';
    $rsvp->save();

    return redirect()
        ->route('perusahaan.rsvp.index')
        ->with('success', 'RSVP berhasil diterima.');
}

public function reject($id)
{
    $rsvp = Rsvp::findOrFail($id);

    $rsvp->status_kehadiran = 'tidak hadir';
    $rsvp->save();

    return redirect()
        ->route('perusahaan.rsvp.index')
        ->with('success', 'RSVP berhasil ditolak.');
}
}