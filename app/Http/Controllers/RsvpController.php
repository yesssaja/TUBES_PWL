<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Inbox;
use App\Models\ProfilePerusahaan;
use App\Models\Rsvp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RsvpController extends Controller
{
    public function create(Event $event)
    {
        return view('users.event.rsvp', compact('event'));
    }

    public function store(Request $request, Event $event)
    {
        if (!Auth::check()) {
            return redirect()
                ->route('login')
                ->with('error', 'Silakan login terlebih dahulu untuk RSVP.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'hp' => 'required|string|max:20',
        ]);

        $pelamarId = Auth::id();

        $cek = Rsvp::where('pelamar_id', $pelamarId)
            ->where('event_id', $event->id)
            ->first();

        if ($cek) {
            return back()->with('error', 'Kamu sudah daftar event ini.');
        }

        Rsvp::create([
            'pelamar_id' => $pelamarId,
            'event_id' => $event->id,
            'name' => $request->name,
            'email' => $request->email,
            'hp' => $request->hp,
            'status_kehadiran' => 'pending',
        ]);

        $profile = ProfilePerusahaan::find($event->perusahaan_id);

        if ($profile) {
            Inbox::create([
                'pelamar_id' => $profile->user_id,
                'title' => 'RSVP Baru Masuk',
                'message' => Auth::user()->name . ' mendaftar pada event "' . $event->nama_event . '".',
                'type' => 'rsvp',
                'is_read' => false,
            ]);
        }

        Inbox::create([
            'pelamar_id' => Auth::id(),
            'title' => 'RSVP Berhasil',
            'message' => 'Kamu berhasil mendaftar event "' . $event->nama_event . '".',
            'type' => 'rsvp_user',
            'is_read' => false,
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