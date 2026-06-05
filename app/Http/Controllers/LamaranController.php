<?php

namespace App\Http\Controllers;

use App\Models\Lamaran;
use App\Models\Loker;
use App\Models\Inbox;
use Illuminate\Http\Request;

class LamaranController extends Controller
{
    public function create(Loker $loker)
    {
        $loker->load('perusahaan');

        return view('users.lamaran.form.lamaran', compact('loker'));
    }

    public function store(Request $request, Loker $loker)
    {
        $user = $request->user();

        $sudahMelamar = Lamaran::where('pelamar_id', $user->id)
            ->where('loker_id', $loker->id)
            ->exists();

        if ($sudahMelamar) {
            return back()->with('error', 'Kamu sudah mengirim lamaran untuk loker ini.');
        }

        $validated = $request->validate([
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
            'pelamar_id' => $user->id,
            'loker_id' => $loker->id,
            'nama' => $user->name,
            'email' => $user->email,
            'cv' => $cvPath,
            'foto' => $fotoPath,
            'portfolio' => $validated['portfolio'] ?? null,
            'motivasi' => $validated['motivasi'] ?? null,
            'status_lamaran' => 'pending',
        ]);

        Inbox::create([
            'pelamar_id' => $loker->perusahaan_id,
            'title' => 'Lamaran Baru',
            'message' => $user->name . ' melamar lowongan ' . $loker->judul_loker,
            'type' => 'lamaran',
            'is_read' => false,
        ]);

        return redirect()->route('lamaran.success', $loker->id);
    }

    public function success(Loker $loker)
    {
        return view('users.lamaran.success.success', compact('loker'));
    }
}