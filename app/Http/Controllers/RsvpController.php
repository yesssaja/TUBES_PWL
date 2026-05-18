<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Rsvp;
use Illuminate\Http\Request;

class RsvpController extends Controller
{
    public function create(Event $event)
    {
        return view('pages.rsvp', compact('event'));
    }

    public function store(Request $request, Event $event)
    {
        if (!auth()->check()) {
            return redirect()
                ->route('login')
                ->with('error', 'Silakan login terlebih dahulu untuk RSVP.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'hp' => 'required|string|max:20',
        ]);

        $user = auth()->user();

        $cek = Rsvp::where('user_id', $user->id)
            ->where('event_id', $event->id)
            ->first();

        if ($cek) {
            return back()->with('error', 'Kamu sudah daftar event ini.');
        }

        Rsvp::create([
            'user_id' => $user->id,
            'event_id' => $event->id,
            'name' => $request->name,
            'email' => $request->email,
            'hp' => $request->hp,
            'status_kehadiran' => 'pending',
        ]);

        return redirect()
            ->route('rsvp.success')
            ->with('success', 'RSVP berhasil dibuat.');
    }

    public function destroy($id)
    {
        $rsvp = Rsvp::findOrFail($id);

        $rsvp->delete();

        return back()->with('success', 'RSVP berhasil dihapus.');
    }
}