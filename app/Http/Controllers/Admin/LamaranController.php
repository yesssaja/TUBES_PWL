<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lamaran;

class LamaranController extends Controller
{
    public function index()
    {
        $lamarans = Lamaran::with(['user', 'loker.perusahaan'])
            ->latest()
            ->get();

        return view('admin.lamaran.index', compact('lamarans'));
    }

    public function approve(Lamaran $lamaran)
    {
        $lamaran->update([
            'status_lamaran' => 'diterima',
        ]);

        return back()->with('success', 'Lamaran berhasil diterima.');
    }

    public function reject(Lamaran $lamaran)
    {
        $lamaran->update([
            'status_lamaran' => 'ditolak',
        ]);

        return back()->with('success', 'Lamaran berhasil ditolak.');
    }
}
