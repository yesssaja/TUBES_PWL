<?php

namespace App\Http\Controllers;

use App\Models\ProfilePelamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilePelamarController extends Controller
{
    public function index()
    {
        $profile = ProfilePelamar::where('user_id', Auth::id())
            ->first();

        return view('users.profile_pelamar.index', compact('profile'));
    }

    public function create()
    {
        return view('profile_lamaran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'foto_diri' => 'required|image|max:2048',
            'nik' => 'required|digits:16',
            'tempat_lahir' => 'required|string',
            'tgl_lahir' => [
                'required',
                'date',
                'before_or_equal:' . now()->subYears(17)->format('Y-m-d'),
            ],
            'gender' => 'required|in:Laki-laki,Perempuan',
            'no_hp' => 'required|max:15',
            'foto_ktp' => 'required|image|max:2048',
            'foto_ijazah' => 'required|image|max:2048',
        ]);

        $fotoDiri = $request->file('foto_diri')->store('foto_diri', 'public');
        $fotoKtp = $request->file('foto_ktp')->store('foto_ktp', 'public');
        $fotoIjazah = $request->file('foto_ijazah')->store('foto_ijazah', 'public');

        ProfilePelamar::updateOrCreate(
            [
                'user_id' => Auth::id(),
            ],
            [
                'foto_diri' => $fotoDiri,
                'nik' => $request->nik,
                'tempat_lahir' => $request->tempat_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'gender' => $request->gender,
                'no_hp' => $request->no_hp,
                'foto_ktp' => $fotoKtp,
                'foto_ijazah' => $fotoIjazah,
            ]
        );

        return redirect()
            ->route('verification.notice')
            ->with('success', 'Data diri berhasil dilengkapi!');
    }
}
