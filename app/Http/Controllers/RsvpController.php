<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Rsvp;
use Illuminate\Http\Request;

class RsvpController extends Controller
{
    // FORM USER RSVP
    public function create()
    {
        $events = Event::all();

        return view('pages.rsvp', compact('events'));
    }

    // SIMPAN RSVP USER
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'event_id' => 'required'
        ]);

        Rsvp::create([
            'name' => $request->name,
            'email' => $request->email,
            'event_id' => $request->event_id
        ]);

        return redirect('/event')
            ->with('success', 'Berhasil RSVP Event!');
    }

    // ADMIN LIHAT RSVP
    public function adminIndex()
    {
        $rsvps = Rsvp::with('event')->latest()->get();

        return view('admin.rsvp.index', compact('rsvps'));
    }

    // HAPUS RSVP
    public function destroy($id)
    {
        $rsvp = Rsvp::findOrFail($id);

        $rsvp->delete();

        return back()->with('success', 'RSVP berhasil dihapus');
    }
}