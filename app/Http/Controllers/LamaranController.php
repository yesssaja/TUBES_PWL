<?php

namespace App\Http\Controllers;

use App\Models\Lamaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LamaranController extends Controller
{
    public function create()
    {
        return view('pages.lamaran');
    }

    public function store(Request $request)
    {
        // VALIDASI FORM
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'hp' => 'required|string|max:20',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'gender' => 'required|string',
            'cv' => 'required|mimes:pdf|max:2048',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'portfolio' => 'nullable|string|max:255',
            'motivasi' => 'nullable|string',
        ]);

        // UPLOAD CV
        $cvPath = $request->file('cv')->store('lamaran/cv', 'public');

        // UPLOAD FOTO
        $fotoPath = null;

        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('lamaran/foto', 'public');
        }

        // SIMPAN DATA LAMARAN
        Lamaran::create([
            'user_id' => Auth::id(),
            'nama' => $request->nama,
            'email' => $request->email,
            'hp' => $request->hp,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'gender' => $request->gender,
            'cv' => $cvPath,
            'foto' => $fotoPath,
            'portfolio' => $request->portfolio,
            'motivasi' => $request->motivasi,
        ]);

        return redirect('/success');
    }
}