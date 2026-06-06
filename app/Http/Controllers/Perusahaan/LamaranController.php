<?php

namespace App\Http\Controllers\Perusahaan;

use App\Http\Controllers\Controller;
use App\Models\Lamaran;

class LamaranController extends Controller
{
    public function index()
    {
        $lamarans = Lamaran::with(['loker', 'pelamar'])
            ->latest()
            ->get();

        return view('perusahaan.lamaran.index', compact('lamarans'));
    }

    public function show($id)
    {
        $lamaran = Lamaran::with(['loker', 'pelamar'])
            ->findOrFail($id);

        return view('perusahaan.lamaran.show', compact('lamaran'));
    }

    public function approve($id)
    {
        $lamaran = Lamaran::findOrFail($id);

        $lamaran->update([
            'status_lamaran' => 'diterima',
        ]);

        return back()->with('success', 'Lamaran berhasil diterima.');
    }

    public function reject($id)
    {
        $lamaran = Lamaran::findOrFail($id);

        $lamaran->update([
            'status_lamaran' => 'ditolak',
        ]);

        return back()->with('success', 'Lamaran berhasil ditolak.');
    }
}