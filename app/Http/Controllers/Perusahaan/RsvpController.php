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
        $profile = ProfilePerusahaan::where('user_id', Auth::id())->first();

        $rsvps = $profile
            ? Rsvp::with(['event', 'user'])
                ->whereHas('event', function ($query) use ($profile) {
                    $query->where('perusahaan_id', $profile->id);
                })
                ->latest()
                ->get()
            : collect();

        return view('perusahaan.rsvp.index', compact('rsvps'));
    }

    public function show($id)
    {
        $profile = ProfilePerusahaan::where('user_id', Auth::id())->firstOrFail();

        $rsvp = Rsvp::with(['event', 'user'])->findOrFail($id);

        if (!$rsvp->event || $rsvp->event->perusahaan_id != $profile->id) {
            abort(403);
        }

        return view('perusahaan.rsvp.show', compact('rsvp'));
    }

    public function approve($id)
{
    $profile = ProfilePerusahaan::where('user_id', Auth::id())->firstOrFail();

    $rsvp = Rsvp::with(['event', 'user'])->findOrFail($id);

    if (!$rsvp->event || $rsvp->event->perusahaan_id != $profile->id) {
        abort(403);
    }

    $rsvp->update([
    'status_kehadiran' => 'hadir',
]);

$rsvp->load('event');

$jumlahHadir = Rsvp::where('event_id', $rsvp->event_id)
    ->where('status_kehadiran', 'hadir')
    ->count();

if ($rsvp->event && (int) $rsvp->event->kuota > 0 && $jumlahHadir >= (int) $rsvp->event->kuota) {
    $rsvp->event->update([
        'status' => 'tidak_aktif',
    ]);
    }

    Inbox::create([
        'pelamar_id' => $rsvp->pelamar_id,
        'title' => 'RSVP Diterima',
        'message' => 'Selamat, RSVP kamu diterima. Silakan bergabung ke grup WhatsApp event.',
        'type' => 'rsvp_approved',
        'is_read' => false,
        'action_text' => 'Join Grup WhatsApp',
        'action_url' => $rsvp->event->link_wa_group,
    ]);

    return redirect()
        ->route('perusahaan.rsvp.index')
        ->with('success', 'RSVP berhasil diterima.');
}

    public function reject($id)
    {
        $profile = ProfilePerusahaan::where('user_id', Auth::id())->firstOrFail();

        $rsvp = Rsvp::with(['event', 'user'])->findOrFail($id);

        if (!$rsvp->event || $rsvp->event->perusahaan_id != $profile->id) {
            abort(403);
        }

        $rsvp->update([
            'status_kehadiran' => 'tidak_hadir',
        ]);

        Inbox::create([
            'pelamar_id' => $rsvp->pelamar_id,
            'title' => 'RSVP Ditolak',
            'message' => 'Mohon maaf, RSVP kamu untuk event ini belum dapat disetujui.',
            'type' => 'rsvp_rejected',
            'is_read' => false,
            'action_text' => null,
            'action_url' => null,
        ]);

        return redirect()
            ->route('perusahaan.rsvp.index')
            ->with('success', 'RSVP berhasil ditolak.');
    }
}