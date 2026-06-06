<?php

namespace App\Http\Controllers\Perusahaan;

use App\Http\Controllers\Controller;
use App\Models\Lamaran;
use Illuminate\Support\Facades\Auth;

class LamaranController extends Controller
{
    public function index()
    {
        $lamarans = Lamaran::with(['loker', 'pelamar'])
            ->whereHas('loker', function ($query) {
                $query->where('perusahaan_id', Auth::id());
            })
            ->latest()
            ->get();

        return view('perusahaan.lamaran.index', compact('lamarans'));
    }

    public function show($id)
    {
        $lamaran = Lamaran::with(['loker', 'pelamar'])
            ->findOrFail($id);

        if (!$lamaran->loker || $lamaran->loker->perusahaan_id != Auth::id()) {
            abort(403);
        }

        return view('perusahaan.lamaran.show', compact('lamaran'));
    }

    public function approve($id)
    {
        $lamaran = Lamaran::with('loker')->findOrFail($id);

        if (!$lamaran->loker || $lamaran->loker->perusahaan_id != Auth::id()) {
            abort(403);
        }

        $lamaran->update([
            'status_lamaran' => 'diterima',
        ]);

        return redirect()
            ->route('perusahaan.lamaran.index')
            ->with('success', 'Lamaran berhasil diterima.');
    }

    public function reject($id)
    {
        $lamaran = Lamaran::with('loker')->findOrFail($id);

        if (!$lamaran->loker || $lamaran->loker->perusahaan_id != Auth::id()) {
            abort(403);
        }

        $lamaran->update([
            'status_lamaran' => 'ditolak',
        ]);

        return redirect()
            ->route('perusahaan.lamaran.index')
            ->with('success', 'Lamaran berhasil ditolak.');
    }
}