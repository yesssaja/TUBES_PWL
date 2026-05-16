<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Perusahaan;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $event = Event::with('perusahaan')->get();

        return view('pages.event', compact('event'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $perusahaan = Perusahaan::all();

        return view('admin.event.create', compact('perusahaan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Event::create([
            'perusahaan_id' => $request->perusahaan_id,
            'nama_event' => $request->nama_event,
            'deskripsi' => $request->deskripsi,
            'tanggal_event' => $request->tanggal_event,
            'lokasi' => $request->lokasi,
            'poster' => $request->poster,
            'kuota' => $request->kuota,
        ]);

        return redirect()->route('event.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::findOrFail($id);

        return view('pages.event', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event = Event::findOrFail($id);

        return view('admin.event.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $event = Event::findOrFail($id);

        $event->update([
            'perusahaan_id' => $request->perusahaan_id,
            'nama_event' => $request->nama_event,
            'deskripsi' => $request->deskripsi,
            'tanggal_event' => $request->tanggal_event,
            'lokasi' => $request->lokasi,
            'poster' => $request->poster,
            'kuota' => $request->kuota,
        ]);

        return redirect()->route('event.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::findOrFail($id);

        $event->delete();

        return redirect()->route('event.index');
    }
}