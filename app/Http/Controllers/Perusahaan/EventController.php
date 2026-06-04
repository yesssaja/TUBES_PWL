<?php

namespace App\Http\Controllers\Perusahaan;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\ProfilePerusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
{
    $perusahaan = ProfilePerusahaan::where('user_id', Auth::id())->first();

    $events = $perusahaan
        ? Event::where('perusahaan_id', $perusahaan->id)->latest()->get()
        : collect();

    return view('perusahaan.event.index', compact('events', 'perusahaan'));
}

    public function create()
    {
        $perusahaan = ProfilePerusahaan::where('user_id', Auth::id())->first();

        if (!$perusahaan) {
            return redirect()
                ->route('perusahaan.event.index')
                ->with('error', 'Profil perusahaan belum tersedia.');
        }

        return view('perusahaan.event.create', compact('perusahaan'));
    }

    public function store(Request $request)
    {
        $perusahaan = ProfilePerusahaan::where('user_id', Auth::id())->firstOrFail();

        $request->validate([
            'judul_event' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'jam' => 'nullable',
            'lokasi' => 'required|string|max:255',
            'kuota' => 'nullable|integer',
            'deskripsi' => 'nullable|string',
            'poster' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $posterPath = null;

        if ($request->hasFile('poster')) {
            $posterPath = $request->file('poster')->store('poster_event', 'public');
        }

        Event::create([
            'perusahaan_id' => $perusahaan->id,
            'judul' => $request->judul_event,
            'nama_event' => $request->judul_event,
            'tanggal' => $request->tanggal,
            'tanggal_event' => $request->tanggal,
            'waktu' => $request->jam,
            'waktu_mulai' => $request->jam,
            'jam' => $request->jam,
            'lokasi' => $request->lokasi,
            'kuota' => $request->kuota,
            'deskripsi' => $request->deskripsi,
            'status' => 'aktif',
            'poster' => $posterPath,
        ]);

        return redirect()
            ->route('perusahaan.event.index')
            ->with('success', 'Event berhasil ditambahkan.');
    }

    public function show($id)
    {
        $perusahaan = ProfilePerusahaan::where('user_id', Auth::id())->firstOrFail();

        $event = Event::where('perusahaan_id', $perusahaan->id)
            ->where('id', $id)
            ->firstOrFail();

        return view('perusahaan.event.show', compact('event', 'perusahaan'));
    }

    public function edit($id)
    {
        $perusahaan = ProfilePerusahaan::where('user_id', Auth::id())->firstOrFail();

        $event = Event::where('perusahaan_id', $perusahaan->id)
            ->where('id', $id)
            ->firstOrFail();

        return view('perusahaan.event.edit', compact('event', 'perusahaan'));
    }

    public function update(Request $request, $id)
    {
        $perusahaan = ProfilePerusahaan::where('user_id', Auth::id())->firstOrFail();

        $event = Event::where('perusahaan_id', $perusahaan->id)
            ->where('id', $id)
            ->firstOrFail();

        $request->validate([
            'judul_event' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'jam' => 'nullable',
            'lokasi' => 'required|string|max:255',
            'kuota' => 'nullable|integer',
            'deskripsi' => 'nullable|string',
            'poster' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'nullable|string|max:50',
        ]);

        $posterPath = $event->poster;

        if ($request->hasFile('poster')) {
            $posterPath = $request->file('poster')->store('poster_event', 'public');
        }

        $event->update([
            'judul' => $request->judul_event,
            'nama_event' => $request->judul_event,
            'tanggal' => $request->tanggal,
            'tanggal_event' => $request->tanggal,
            'waktu' => $request->jam,
            'waktu_mulai' => $request->jam,
            'jam' => $request->jam,
            'lokasi' => $request->lokasi,
            'kuota' => $request->kuota,
            'deskripsi' => $request->deskripsi,
            'poster' => $posterPath,
            'status' => $request->status ?? 'aktif',
        ]);

        return redirect()
            ->route('perusahaan.event.index')
            ->with('success', 'Event berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $perusahaan = ProfilePerusahaan::where('user_id', Auth::id())->firstOrFail();

        $event = Event::where('perusahaan_id', $perusahaan->id)
            ->where('id', $id)
            ->firstOrFail();

        $event->delete();

        return redirect()
            ->route('perusahaan.event.index')
            ->with('success', 'Event berhasil dihapus.');
    }
}