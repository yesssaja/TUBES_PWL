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
        $rsvps = Rsvp::with(['user', 'event'])->get();

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

    return back();
}

    /*
    |--------------------------------------------------------------------------
    | REJECT RSVP
    |--------------------------------------------------------------------------
    */

   public function reject($id)
{
    $rsvp = Rsvp::findOrFail($id);

    $rsvp->status_kehadiran = 'ditolak';

    $rsvp->save();

    return back();
}
}