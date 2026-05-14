<?php

namespace App\Http\Controllers;

use App\Models\Lamaran;
use App\Models\Loker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LamaranController extends Controller
{
    public function index()
    {
        $lamaran = Lamaran::with(['user', 'loker'])->get();
        return view('lamaran.index', compact('lamaran'));
    }

    public function create()
    {
        $loker = Loker::all();
        return view('lamaran.create', compact('loker'));
    }

    public function store(Request $request)
    {
        Lamaran::create([
            'user_id' => Auth::id(),
            'loker_id' => $request->loker_id,
            'cv' => $request->cv,
            'portfolio' => $request->portfolio,
        ]);

        return redirect()->route('lamaran.index');
    }
}