<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rsvp;

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
        $rsvp = Rsvp::findOrFail($id);

        $rsvp->status_kehadiran = 'hadir';

        $rsvp->save();

        return redirect()
            ->route('admin.rsvp.index')
            ->with('success', 'RSVP berhasil disetujui.');
    }

    /*
    |--------------------------------------------------------------------------
    | REJECT RSVP
    |--------------------------------------------------------------------------
    */

    public function reject($id)
    {
        $rsvp = Rsvp::findOrFail($id);

        // Pakai tidak_hadir, bukan ditolak
        // karena database kamu kemungkinan enum-nya menerima: pending, hadir, tidak_hadir
        $rsvp->status_kehadiran = 'tidak_hadir';

        $rsvp->save();

        return redirect()
            ->route('admin.rsvp.index')
            ->with('success', 'RSVP berhasil ditolak.');
    }
}