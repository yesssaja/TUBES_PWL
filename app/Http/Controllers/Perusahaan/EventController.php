<?php

namespace App\Http\Controllers\Perusahaan;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        $perusahaan = Perusahaan::where('user_id', Auth::id())->first();

        $events = $perusahaan
            ? Event::where('perusahaan_id', $perusahaan->id)->latest()->get()
            : collect();

        return view('perusahaan.event.index', compact('events'));
    }

    public function create()
    {
        return view('perusahaan.event.create');
    }

    public function store(Request $request)
    {
        $perusahaan = Perusahaan::where('user_id', Auth::id())->firstOrFail();

        $request->validate([
            'judul_event' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'jam' => 'nullable',
            'lokasi' => 'required|string|max:255',
            'kuota' => 'nullable|integer',
            'deskripsi' => 'nullable|string',
            'poster' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'link_wa_group' => 'nullable|url|max:255',
        ]);

        $posterPath = null;

        if ($request->hasFile('poster')) {
            $posterPath = $request->file('poster')->store('poster_event', 'public');
        }

       Event::create([
    'perusahaan_id' => $perusahaan->id,
    'nama_event' => $request->judul_event,
    'tanggal_event' => $request->tanggal,
    'jam' => $request->jam,
    'lokasi' => $request->lokasi,
    'kuota' => $request->kuota,
    'deskripsi' => $request->deskripsi,
    'poster' => $posterPath,
    'link_wa_group' => $request->link_wa_group,
]);

        return redirect()
            ->route('perusahaan.event.index')
            ->with('success', 'Event berhasil ditambahkan.');
    }

    public function show($id)
    {
        $perusahaan = Perusahaan::where('user_id', Auth::id())->firstOrFail();

        $event = Event::where('perusahaan_id', $perusahaan->id)
            ->findOrFail($id);

        return view('perusahaan.event.show', compact('event'));
    }

    public function edit($id)
    {
        $perusahaan = Perusahaan::where('user_id', Auth::id())->firstOrFail();

        $event = Event::where('perusahaan_id', $perusahaan->id)
            ->findOrFail($id);

        return view('perusahaan.event.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $perusahaan = Perusahaan::where('user_id', Auth::id())->firstOrFail();

        $event = Event::where('perusahaan_id', $perusahaan->id)
            ->findOrFail($id);

        $request->validate([
            'judul_event' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'jam' => 'nullable',
            'lokasi' => 'required|string|max:255',
            'kuota' => 'nullable|integer',
            'deskripsi' => 'nullable|string',
            'poster' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'nullable|string|max:50',
            'link_wa_group' => 'nullable|url|max:255',
        ]);

        if ($request->hasFile('poster')) {
            $event->poster = $request->file('poster')->store('poster_event', 'public');
        }

        $event->update([
            'judul_event' => $request->judul_event,
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'lokasi' => $request->lokasi,
            'kuota' => $request->kuota,
            'deskripsi' => $request->deskripsi,
            'poster' => $event->poster,
            'status' => $request->status ?? 'aktif',
            'link_wa_group' => $request->link_wa_group,
        ]);

        return redirect()
            ->route('perusahaan.event.index')
            ->with('success', 'Event berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $perusahaan = Perusahaan::where('user_id', Auth::id())->firstOrFail();

        $event = Event::where('perusahaan_id', $perusahaan->id)
            ->findOrFail($id);

        $event->delete();

        return redirect()
            ->route('perusahaan.event.index')
            ->with('success', 'Event berhasil dihapus.');
    }
}