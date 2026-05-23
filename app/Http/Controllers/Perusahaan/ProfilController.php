<?php

namespace App\Http\Controllers\Perusahaan;

use App\Http\Controllers\Controller;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function index()
    {
        $perusahaan = Perusahaan::where('user_id', Auth::id())->first();

        return view('perusahaan.profil.index', compact('perusahaan'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'nama_perusahaan' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'website' => 'nullable|string|max:255',
            'no_hp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
            'deskripsi' => 'nullable|string',
        ]);

        $perusahaan = Perusahaan::firstOrNew([
            'user_id' => Auth::id(),
        ]);

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo')->store('logo_perusahaan', 'public');
            $perusahaan->logo = $logo;
        }

        $perusahaan->nama_perusahaan = $request->nama_perusahaan;
        $perusahaan->email = $request->email;
        $perusahaan->no_hp = $request->no_hp;
        $perusahaan->website = $request->website;
        $perusahaan->alamat = $request->alamat;
        $perusahaan->deskripsi = $request->deskripsi;

        $perusahaan->save();

        return back()->with('success', 'Profil perusahaan berhasil diperbarui.');
    }
}