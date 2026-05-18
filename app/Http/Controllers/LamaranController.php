<?php

namespace App\Http\Controllers;

use App\Models\Lamaran;
use App\Models\Loker;
use Illuminate\Http\Request;

class LamaranController extends Controller
{
    public function create(Loker $loker)
    {
        $loker->load('perusahaan');

        return view('pages.lamaran', compact('loker'));
    }

    public function store(Request $request, Loker $loker)
    {
        $user = $request->user();

        $sudahMelamar = Lamaran::where('user_id', $user->id)
            ->where('loker_id', $loker->id)
            ->exists();

        if ($sudahMelamar) {
            return back()->with('error', 'Kamu sudah mengirim lamaran untuk loker ini.');
        }

        $validated = $request->validate([
            'hp' => ['required', 'string', 'max:20'],
            'tempat_lahir' => ['required', 'string', 'max:255'],
            'tanggal_lahir' => ['required', 'date'],
            'gender' => ['required', 'in:Laki-laki,Perempuan'],
            'cv' => ['required', 'file', 'mimes:pdf', 'max:2048'],
            'foto' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'portfolio' => ['nullable', 'string', 'max:255'],
            'motivasi' => ['nullable', 'string'],
        ]);

        $cvPath = $request->file('cv')->store('lamaran/cv', 'public');

        $fotoPath = null;

        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('lamaran/foto', 'public');
        }

        Lamaran::create([
            'user_id' => $user->id,
            'loker_id' => $loker->id,
            'nama' => $user->name,
            'email' => $user->email,
            'hp' => $validated['hp'],
            'tempat_lahir' => $validated['tempat_lahir'],
            'tanggal_lahir' => $validated['tanggal_lahir'],
            'gender' => $validated['gender'],
            'cv' => $cvPath,
            'foto' => $fotoPath,
            'portfolio' => $validated['portfolio'] ?? null,
            'motivasi' => $validated['motivasi'] ?? null,
            'status_lamaran' => 'pending',
        ]);

        return redirect()
            ->route('loker.show', $loker->id)
            ->with('success', 'Lamaran berhasil dikirim. Tunggu konfirmasi dari admin.');
    }
}