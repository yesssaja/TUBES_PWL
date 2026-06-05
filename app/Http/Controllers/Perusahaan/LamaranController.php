<?php

namespace App\Http\Controllers\Perusahaan;

use App\Http\Controllers\Controller;
use App\Models\Lamaran;
use Illuminate\Support\Facades\Auth;

class LamaranController extends Controller
{
    public function index()
    {
        $lamarans = Lamaran::with(['loker', 'user'])
            ->whereHas('loker', function ($query) {
                $query->where('perusahaan_id', Auth::id());
            })
            ->latest()
            ->get();

        return view('perusahaan.lamaran.index', compact('lamarans'));
    }

    public function show(Lamaran $lamaran)
    {
        $lamaran->load(['loker', 'user']);

        if (!$lamaran->loker || $lamaran->loker->perusahaan_id != Auth::id()) {
            abort(403);
        }

        return view('perusahaan.lamaran.show', compact('lamaran'));
    }
}