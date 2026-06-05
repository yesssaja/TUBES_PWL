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
            ->route('perusahaan.lowongan.create')
            ->with('success', 'Lowongan berhasil disimpan ke database.');
    }

    public function show(Loker $lowongan)
    {
        return view('perusahaan.lowongan.show', compact('lowongan'));
    }
}