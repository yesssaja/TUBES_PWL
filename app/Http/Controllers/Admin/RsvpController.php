<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rsvp;
use App\Models\Inbox;

class RsvpController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LIHAT SEMUA RSVP
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $rsvps = Rsvp::with(['user', 'event'])
            ->latest()
            ->get();

        return view('admin.rsvp.index', compact('rsvps'));
    }

    /*
    |--------------------------------------------------------------------------
    | APPROVE RSVP
    |--------------------------------------------------------------------------
    */

  public function approve($id)
{
    $rsvp = \App\Models\Rsvp::with(['user', 'event'])->findOrFail($id);

    $rsvp->update([
        'status_kehadiran' => 'hadir',
    ]);

    $event = $rsvp->event;
    $namaEvent = $event->nama_event ?? 'Event';

    if ($rsvp->user_id) {
        \App\Models\Inbox::create([
            'user_id' => $rsvp->user_id,
            'title' => 'RSVP Event Diterima',
            'message' => 'RSVP kamu untuk event "' . $namaEvent . '" telah berhasil disetujui. Silakan hadir sesuai jadwal event yang tersedia.',
            'type' => 'rsvp_approved',
            'is_read' => false,
            'action_text' => $event && $event->link_wa_group ? 'Gabung Grup Event' : null,
            'action_url' => $event && $event->link_wa_group ? $event->link_wa_group : null,
        ]);
    }

    return back()->with('success', 'RSVP berhasil disetujui dan notifikasi dikirim ke user.');
}

public function reject($id)
{
    $rsvp = \App\Models\Rsvp::with(['user', 'event'])->findOrFail($id);

    $rsvp->update([
        'status_kehadiran' => 'tidak_hadir',
    ]);

    $namaEvent = $rsvp->event->nama_event ?? 'Event';

    if ($rsvp->user_id) {
        \App\Models\Inbox::create([
            'user_id' => $rsvp->user_id,
            'title' => 'RSVP Event Ditolak',
            'message' => 'Mohon maaf, RSVP kamu untuk event "' . $namaEvent . '" belum dapat diterima karena kuota event sudah penuh.',
            'type' => 'rsvp_rejected',
            'is_read' => false,
            'action_text' => null,
            'action_url' => null,
        ]);
    }

    return back()->with('success', 'RSVP berhasil ditolak dan notifikasi dikirim ke user.');
}
}