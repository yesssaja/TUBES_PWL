<?php

namespace App\Http\Controllers\Perusahaan;

use App\Http\Controllers\Controller;
use App\Models\Loker;
use App\Models\Lamaran;
use App\Models\Event;

class DashboardController extends Controller
{
    public function index()
    {
        $lowongans = Loker::withCount('lamarans')
            ->latest()
            ->get();

        $lowonganIds = $lowongans->pluck('id');

        $lamarans = Lamaran::with(['loker', 'pelamar'])
            ->whereIn('loker_id', $lowonganIds)
            ->latest()
            ->get();

        $events = Event::latest()
            ->get();

        $totalLowongan = $lowongans->count();
        $totalLamaran = $lamarans->count();
        $totalDiterima = $lamarans->where('status_lamaran', 'diterima')->count();
        $totalEvent = $events->count();

        $kelengkapanProfil = 80;

        return view('perusahaan.dashboard.index', compact(
            'totalLowongan',
            'totalLamaran',
            'totalDiterima',
            'totalEvent',
            'lowongans',
            'lamarans',
            'events',
            'kelengkapanProfil'
        ));
    }
}