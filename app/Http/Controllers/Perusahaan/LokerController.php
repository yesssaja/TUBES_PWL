<?php

namespace App\Http\Controllers\Perusahaan;

use App\Http\Controllers\Controller;
use App\Models\Loker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LokerController extends Controller
{
    public function index()
    {
        $lowongans = Loker::where('perusahaan_id', Auth::id())
            ->withCount('lamarans')
            ->latest()
            ->get();

        return view('perusahaan.lowongan.index', compact('lowongans'));
    }

    public function create()
    {
        return view('perusahaan.lowongan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_loker' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'tipe_pekerjaan' => 'required|string|max:100',
            'gaji' => 'nullable|string|max:100',
            'batas_lamaran' => 'nullable|date',
            'deskripsi' => 'required|string',
        ]);

        Loker::create([
            'perusahaan_id' => Auth::id(),
            'judul_loker' => $request->judul_loker,
            'lokasi' => $request->lokasi,
            'tipe_pekerjaan' => $request->tipe_pekerjaan,
            'gaji' => $request->gaji,
            'batas_lamaran' => $request->batas_lamaran,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()
            ->route('perusahaan.lowongan.index')
            ->with('success', 'Lowongan berhasil disimpan ke database.');
    }

    public function show(Loker $lowongan)
    {
        $lowongan->loadCount('lamarans');

        return view('perusahaan.lowongan.show', compact('lowongan'));
    }

    public function edit(Loker $lowongan)
    {
        return view('perusahaan.lowongan.edit', compact('lowongan'));
    }

    public function update(Request $request, Loker $lowongan)
    {
        $request->validate([
            'judul_loker' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'tipe_pekerjaan' => 'required|string|max:100',
            'gaji' => 'nullable|string|max:100',
            'batas_lamaran' => 'nullable|date',
            'deskripsi' => 'required|string',
        ]);

        $lowongan->update([
            'judul_loker' => $request->judul_loker,
            'lokasi' => $request->lokasi,
            'tipe_pekerjaan' => $request->tipe_pekerjaan,
            'gaji' => $request->gaji,
            'batas_lamaran' => $request->batas_lamaran,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()
            ->route('perusahaan.lowongan.index')
            ->with('success', 'Lowongan berhasil diperbarui.');
    }

    public function destroy(Loker $lowongan)
    {
        $lowongan->delete();

        return redirect()
            ->route('perusahaan.lowongan.index')
            ->with('success', 'Lowongan berhasil dihapus.');
    }
}