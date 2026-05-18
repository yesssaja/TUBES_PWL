<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Perusahaan;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::with('perusahaan')
            ->latest()
            ->get();

        return view('admin.event.index', compact('events'));
    }

    public function create()
    {
        $perusahaan = Perusahaan::all();

        return view('admin.event.create', compact('perusahaan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'perusahaan_id' => 'required|exists:perusahaans,id',
            'nama_event' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal_event' => 'required|date',
            'jam' => 'required|date_format:H:i',
            'lokasi' => 'required|string|max:255',
            'kuota' => 'required|integer|min:1',
        ]);

        Event::create([
            'perusahaan_id' => $request->perusahaan_id,
            'nama_event' => $request->nama_event,
            'deskripsi' => $request->deskripsi,
            'tanggal_event' => $request->tanggal_event,
            'jam' => $request->jam,
            'lokasi' => $request->lokasi,
            'kuota' => $request->kuota,
        ]);

        return redirect()
            ->route('admin.event.index')
            ->with('success', 'Event berhasil ditambahkan.');
    }

    public function edit(string $id)
    {
        $event = Event::findOrFail($id);
        $perusahaan = Perusahaan::all();

        return view('admin.event.edit', compact('event', 'perusahaan'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'perusahaan_id' => 'required|exists:perusahaans,id',
            'nama_event' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal_event' => 'required|date',
            'jam' => 'required|date_format:H:i',
            'lokasi' => 'required|string|max:255',
            'kuota' => 'required|integer|min:1',
        ]);

        $event = Event::findOrFail($id);

        $event->update([
            'perusahaan_id' => $request->perusahaan_id,
            'nama_event' => $request->nama_event,
            'deskripsi' => $request->deskripsi,
            'tanggal_event' => $request->tanggal_event,
            'jam' => $request->jam,
            'lokasi' => $request->lokasi,
            'kuota' => $request->kuota,
        ]);

        return redirect()
            ->route('admin.event.index')
            ->with('success', 'Event berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $event = Event::findOrFail($id);

        $event->delete();

        return redirect()
            ->route('admin.event.index')
            ->with('success', 'Event berhasil dihapus.');
    }
}