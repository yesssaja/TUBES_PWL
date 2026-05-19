<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lamaran;
use App\Models\Inbox;

class LamaranController extends Controller
{
    public function index()
    {
        $lamarans = Lamaran::with(['user', 'loker.perusahaan'])
            ->latest()
            ->get();

        return view('admin.lamaran.index', compact('lamarans'));
    }

   public function approve($id)
{
    $lamaran = \App\Models\Lamaran::with(['user', 'loker.perusahaan'])->findOrFail($id);

    $lamaran->update([
        'status_lamaran' => 'diterima',
    ]);

    $namaLoker = $lamaran->loker->judul_loker ?? 'Lowongan Kerja';

    $namaPerusahaan = $lamaran->loker->perusahaan->nama_perusahaan
        ?? $lamaran->loker->perusahaan->nama
        ?? $lamaran->loker->perusahaan->name
        ?? 'perusahaan';

    $emailPerusahaan = $lamaran->loker->perusahaan->email ?? null;

    if ($lamaran->user_id) {
        \App\Models\Inbox::create([
            'user_id' => $lamaran->user_id,
            'title' => 'Lamaran Kerja Diterima',
            'message' => 'Selamat! Lamaran kamu untuk posisi "' . $namaLoker . '" di ' . $namaPerusahaan . ' telah diterima. Silakan hubungi perusahaan melalui email untuk informasi tahap selanjutnya.',
            'type' => 'lamaran_diterima',
            'is_read' => false,
            'action_text' => $emailPerusahaan ? 'Hubungi Perusahaan' : null,
            'action_url' => $emailPerusahaan ? 'mailto:' . $emailPerusahaan : null,
        ]);
    }

    return back()->with('success', 'Lamaran berhasil diterima dan notifikasi dikirim ke user.');
}

public function reject($id)
{
    $lamaran = \App\Models\Lamaran::with(['user', 'loker.perusahaan'])->findOrFail($id);

    $lamaran->update([
        'status_lamaran' => 'ditolak',
    ]);

    $namaLoker = $lamaran->loker->judul_loker ?? 'Lowongan Kerja';

    $namaPerusahaan = $lamaran->loker->perusahaan->nama_perusahaan
        ?? $lamaran->loker->perusahaan->nama
        ?? $lamaran->loker->perusahaan->name
        ?? 'perusahaan';

    $emailPerusahaan = $lamaran->loker->perusahaan->email ?? null;

    if ($lamaran->user_id) {
        \App\Models\Inbox::create([
            'user_id' => $lamaran->user_id,
            'title' => 'Lamaran Kerja Ditolak',
            'message' => 'Mohon maaf, lamaran kamu untuk posisi "' . $namaLoker . '" di ' . $namaPerusahaan . ' belum dapat diterima. CV dan portofolio kamu telah dipertimbangkan, namun masih dinilai kurang sesuai dengan kebutuhan perusahaan saat ini. Kamu tetap dapat mencoba peluang lain yang tersedia.',
            'type' => 'lamaran_ditolak',
            'is_read' => false,
            'action_text' => $emailPerusahaan ? 'Hubungi Perusahaan' : null,
            'action_url' => $emailPerusahaan ? 'mailto:' . $emailPerusahaan : null,
        ]);
    }

    return back()->with('success', 'Lamaran berhasil ditolak dan notifikasi dikirim ke user.');
}
}
