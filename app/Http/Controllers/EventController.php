<?php

namespace App\Http\Controllers;

use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::with('perusahaan')
            ->withCount([
                'rsvps as jumlah_hadir' => function ($query) {
                    $query->where('status_kehadiran', 'hadir');
                }
            ])
            ->latest()
            ->get()
            ->filter(function ($event) {
                $kuota = (int) $event->kuota;
                $jumlahHadir = (int) $event->jumlah_hadir;

                return $kuota <= 0 || $jumlahHadir < $kuota;
            })
            ->values();

        return view('users.event.index', compact('events'));
    }

    public function show($id)
    {
        $event = Event::with('perusahaan')
            ->withCount([
                'rsvps as jumlah_hadir' => function ($query) {
                    $query->where('status_kehadiran', 'hadir');
                }
            ])
            ->findOrFail($id);

        $kuota = (int) $event->kuota;
        $jumlahHadir = (int) $event->jumlah_hadir;

        if ($kuota > 0 && $jumlahHadir >= $kuota) {
            return redirect()
                ->route('event.index')
                ->with('error', 'Event sudah penuh.');
        }

        return view('users.event.show', compact('event'));
    }
}