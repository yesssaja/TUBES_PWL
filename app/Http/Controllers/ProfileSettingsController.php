<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ProfilePelamar;
use App\Models\User;

class ProfileSettingsController extends Controller
{
    public function edit()
    {
        $user = Auth::user();

        $profile = ProfilePelamar::where('user_id', $user->id)->first();

        return view('users.profileSettings.edit', compact('user', 'profile'));
    }

    public function update(Request $request)
    {
        $user = User::findOrFail(Auth::id());

        $profile = ProfilePelamar::where('user_id', $user->id)->first();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:50|unique:users,email,' . $user->id,

            'nik' => $profile ? 'nullable|digits:16' : 'required|digits:16',
            'no_hp' => 'required|digits_between:10,15',
            'tempat_lahir' => 'required|string|max:255',
            'tgl_lahir' => 'required|date|before:' . date('Y-m-d', strtotime('-17 years')),
            'gender' => 'required|in:Laki-laki,Perempuan',

            'foto_diri' => $profile ? 'nullable|image|max:2048' : 'required|image|max:2048',
            'foto_ktp' => $profile ? 'nullable|image|max:2048' : 'required|image|max:2048',
            'foto_ijazah' => $profile ? 'nullable|image|max:2048' : 'required|image|max:2048',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        $data = [
            'user_id' => $user->id,
            'no_hp' => $request->no_hp,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'gender' => $request->gender,
        ];

        if (!$profile || !$profile->nik) {
            $data['nik'] = $request->nik;
        }

        if ($request->hasFile('foto_diri')) {
            $data['foto_diri'] = $request->file('foto_diri')->store('foto_diri', 'public');
        }

        if ($request->hasFile('foto_ktp')) {
            $data['foto_ktp'] = $request->file('foto_ktp')->store('foto_ktp', 'public');
        }

        if ($request->hasFile('foto_ijazah')) {
            $data['foto_ijazah'] = $request->file('foto_ijazah')->store('foto_ijazah', 'public');
        }

        ProfilePelamar::updateOrCreate(
            ['user_id' => $user->id],
            $data
        );

        return redirect()
            ->route('profile.settings.edit')
            ->with('success', 'Profil berhasil diperbarui');
    }
}