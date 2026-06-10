<?php

namespace App\Http\Controllers\Perusahaan;

use App\Http\Controllers\Controller;
use App\Models\Lamaran;
use App\Models\Inbox;
use App\Models\ProfilePerusahaan;
use Illuminate\Support\Facades\Auth;

class LamaranController extends Controller
{
    public function index()
    {
        $profile = ProfilePerusahaan::where('user_id', Auth::id())->first();

        if (!$profile) {
            $lamarans = collect();
        } else {
            $lamarans = Lamaran::with(['loker', 'pelamar'])
                ->whereHas('loker', function ($query) use ($profile) {
                    $query->where('perusahaan_id', $profile->id);
                })
                ->latest()
                ->get();
        }

        return view('perusahaan.lamaran.index', compact('lamarans'));
    }

    public function show($id)
    {
        $profile = ProfilePerusahaan::where('user_id', Auth::id())->firstOrFail();

        $lamaran = Lamaran::with(['loker', 'pelamar'])
            ->findOrFail($id);

        if (!$lamaran->loker || $lamaran->loker->perusahaan_id != $profile->id) {
            abort(403);
        }

        return view('perusahaan.lamaran.show', compact('lamaran'));
    }

    public function approve($id)
    {
        $profile = ProfilePerusahaan::where('user_id', Auth::id())->firstOrFail();

        $lamaran = Lamaran::with('loker')->findOrFail($id);

        if (!$lamaran->loker || $lamaran->loker->perusahaan_id != $profile->id) {
            abort(403);
        }

        $lamaran->update([
            'status_lamaran' => 'diterima',
        ]);

        Inbox::create([
            'pelamar_id' => $lamaran->pelamar_id,
            'title' => 'Lamaran Diterima',
            'message' => 'Lamaran kamu untuk lowongan "' . ($lamaran->loker->judul_loker ?? '-') . '" telah diterima. Silahkan hubungi email yang tertera dalam detail perusahaan.',
            'type' => 'lamaran_diterima',
            'is_read' => false,
        ]);

        return redirect()
            ->route('perusahaan.lamaran.index')
            ->with('success', 'Lamaran berhasil diterima.');
    }

    public function reject($id)
    {
        $profile = ProfilePerusahaan::where('user_id', Auth::id())->firstOrFail();

        $lamaran = Lamaran::with('loker')->findOrFail($id);

        if (!$lamaran->loker || $lamaran->loker->perusahaan_id != $profile->id) {
            abort(403);
        }

        $lamaran->update([
            'status_lamaran' => 'ditolak',
        ]);

        Inbox::create([
            'pelamar_id' => $lamaran->pelamar_id,
            'title' => 'Lamaran Ditolak',
            'message' => 'Lamaran kamu untuk lowongan "' . ($lamaran->loker->judul_loker ?? '-') . '" telah ditolak.',
            'type' => 'lamaran_ditolak',
            'is_read' => false,
        ]);

        return redirect()
            ->route('perusahaan.lamaran.index')
            ->with('success', 'Lamaran berhasil ditolak.');
    }
}