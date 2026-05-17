<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Loker;
use App\Models\Perusahaan;
use Illuminate\Http\Request;

class LokerController extends Controller
{
    public function index()
    {
        $lokers = Loker::with(['perusahaan', 'lamarans'])
            ->latest()
            ->get();

        $totalLoker = $lokers->count();

        $lokerAktif = Loker::whereDate('batas_lamaran', '>=', now()->toDateString())
            ->count();

        $totalPerusahaan = Perusahaan::count();

        return view('admin.loker.index', compact(
            'lokers',
            'totalLoker',
            'lokerAktif',
            'totalPerusahaan'
        ));
    }

    public function create()
    {
        $perusahaan = Perusahaan::orderBy('nama_perusahaan')->get();

        return view('admin.loker.create', compact('perusahaan'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'perusahaan_id' => ['required', 'exists:perusahaans,id'],
            'judul_loker' => ['required', 'string', 'max:255'],
            'deskripsi' => ['required', 'string'],
            'lokasi' => ['required', 'string', 'max:255'],
            'tipe_pekerjaan' => ['required', 'string', 'max:100'],
            'gaji' => ['nullable', 'string', 'max:100'],
            'batas_lamaran' => ['required', 'date'],
        ]);

        Loker::create($validated);

        return redirect()
            ->route('admin.loker.index')
            ->with('success', 'Loker berhasil ditambahkan.');
    }

    public function edit(Loker $loker)
    {
        $perusahaan = Perusahaan::orderBy('nama_perusahaan')->get();

        return view('admin.loker.edit', compact('loker', 'perusahaan'));
    }

    public function update(Request $request, Loker $loker)
    {
        $validated = $request->validate([
            'perusahaan_id' => ['required', 'exists:perusahaans,id'],
            'judul_loker' => ['required', 'string', 'max:255'],
            'deskripsi' => ['required', 'string'],
            'lokasi' => ['required', 'string', 'max:255'],
            'tipe_pekerjaan' => ['required', 'string', 'max:100'],
            'gaji' => ['nullable', 'string', 'max:100'],
            'batas_lamaran' => ['required', 'date'],
        ]);

        $loker->update($validated);

        return redirect()
            ->route('admin.loker.index')
            ->with('success', 'Loker berhasil diperbarui.');
    }

    public function destroy(Loker $loker)
    {
        $loker->delete();

        return redirect()
            ->route('admin.loker.index')
            ->with('success', 'Loker berhasil dihapus.');
    }
}
