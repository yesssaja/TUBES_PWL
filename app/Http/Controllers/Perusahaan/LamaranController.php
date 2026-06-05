<?php

namespace App\Http\Controllers\Perusahaan;

use App\Http\Controllers\Controller;
use App\Models\Lamaran;
use App\Models\Perusahaan;
use Illuminate\Support\Facades\Auth;

class LamaranController extends Controller
{
    public function index()
    {
        $perusahaan = Perusahaan::where('user_id', Auth::id())->first();

        if (!$perusahaan) {
            $lamarans = collect();
        } else {
            $lamarans = Lamaran::with(['loker', 'user'])
                ->whereHas('loker', function ($query) use ($perusahaan) {
                    $query->where('perusahaan_id', $perusahaan->id);
                })
                ->latest()
                ->get();
        }

        return view('perusahaan.lamaran.index', compact('lamarans'));
    }
}