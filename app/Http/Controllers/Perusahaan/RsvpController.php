<?php

namespace App\Http\Controllers\Perusahaan;

use App\Http\Controllers\Controller;
use App\Models\Inbox;
use App\Models\ProfilePerusahaan;
use App\Models\Rsvp;
use Illuminate\Support\Facades\Auth;

class RsvpController extends Controller
{
    public function index()
    {
        $perusahaan = ProfilePerusahaan::where('user_id', Auth::id())->first();

        $rsvps = $perusahaan
            ? Rsvp::with(['event', 'pelamar'])
                ->whereHas('event', function ($query) use ($perusahaan) {
                    $query->where('perusahaan_id', $perusahaan->id);
                })
                ->latest()
                ->get()
            : collect();

        return view('perusahaan.rsvp.index', compact('rsvps', 'perusahaan'));
    }

    public function show($id)
    {
        $perusahaan = ProfilePerusahaan::where('user_id', Auth::id())->firstOrFail();

        $rsvp = Rsvp::with(['event', 'pelamar'])
            ->whereHas('event', function ($query) use ($perusahaan) {
                $query->where('perusahaan_id', $perusahaan->id);
            })
            ->where('id', $id)
            ->firstOrFail();

        return view('perusahaan.rsvp.show', compact('rsvp', 'perusahaan'));
    }

    public function approve($id)
    {
        $perusahaan = ProfilePerusahaan::where('user_id', Auth::id())->firstOrFail();

        $rsvp = Rsvp::with(['event', 'pelamar'])
            ->whereHas('event', function ($query) use ($perusahaan) {
                $query->where('perusahaan_id', $perusahaan->id);
            })
            ->where('id', $id)
            ->firstOrFail();

        $rsvp->status_kehadiran = 'hadir';
        $rsvp->save();

        Inbox::create([
            'pelamar_id' => $rsvp->pelamar_id,
            'title' => 'RSVP Diterima',
            'message' => 'RSVP kamu untuk event ' . ($rsvp->event->nama_event ?? 'Event') . ' telah diterima oleh ' . ($perusahaan->nama_perusahaan ?? 'perusahaan') . '.',
            'type' => 'rsvp_diterima',
            'is_read' => false,
            'action_text' => 'Lihat Event',
            'action_url' => route('event.index'),
        ]);

        return redirect()
            ->route('perusahaan.rsvp.index')
            ->with('success', 'RSVP berhasil diterima.');
    }

    public function reject($id)
    {
        $perusahaan = ProfilePerusahaan::where('user_id', Auth::id())->firstOrFail();

        $rsvp = Rsvp::with(['event', 'pelamar'])
            ->whereHas('event', function ($query) use ($perusahaan) {
                $query->where('perusahaan_id', $perusahaan->id);
            })
            ->where('id', $id)
            ->firstOrFail();

        $rsvp->status_kehadiran = 'tidak hadir';
        $rsvp->save();

        Inbox::create([
            'pelamar_id' => $rsvp->pelamar_id,
            'title' => 'RSVP Ditolak',
            'message' => 'RSVP kamu untuk event ' . ($rsvp->event->nama_event ?? 'Event') . ' ditolak oleh ' . ($perusahaan->nama_perusahaan ?? 'perusahaan') . '.',
            'type' => 'rsvp_ditolak',
            'is_read' => false,
            'action_text' => 'Lihat Event',
            'action_url' => route('event.index'),
        ]);

        return redirect()
            ->route('perusahaan.rsvp.index')
            ->with('success', 'RSVP berhasil ditolak.');
    }
}