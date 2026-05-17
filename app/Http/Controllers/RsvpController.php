<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Rsvp;
use Illuminate\Http\Request;

class RsvpController extends Controller
{
    // FORM USER RSVP
    public function create(Event $event)
    {
        return view('pages.rsvp', compact('event'));
    }

    // SIMPAN RSVP USER
    public function store(Request $request, Event $event)
    {
        if (!auth()->check()) {
            return redirect()
                ->route('login')
                ->with('error', 'Silakan login terlebih dahulu untuk RSVP.');
        }

        $user = auth()->user();

        // CEK DUPLIKAT RSVP
        $cek = Rsvp::where('user_id', $user->id)
            ->where('event_id', $event->id)
            ->first();

        if ($cek) {
            return back()->with('error', 'Kamu sudah daftar event ini.');
        }

        // SIMPAN RSVP
        Rsvp::create([
            'user_id' => $user->id,
            'event_id' => $event->id,
            'name' => $user->name,
            'email' => $user->email,
            'status_kehadiran' => 'pending',
        ]);

        return redirect()
            ->route('rsvp.success')
            ->with('success', 'RSVP berhasil dibuat.');
    }

    // ADMIN LIHAT RSVP
    public function adminIndex()
    {
        $rsvps = Rsvp::with(['event', 'user'])
            ->latest()
            ->get();

        return view('admin.rsvp.index', compact('rsvps'));
    }

    // HAPUS RSVP
    public function destroy($id)
    {
        $rsvp = Rsvp::findOrFail($id);

        $rsvp->delete();

        return back()->with('success', 'RSVP berhasil dihapus.');
    }
}