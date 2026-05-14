<?php

namespace App\Http\Controllers;

use App\Models\Loker;
use App\Models\Perusahaan;
use Illuminate\Http\Request;

class LokerController extends Controller
{
    public function index()
    {
        $loker = Loker::with('perusahaan')->get();
        return view('loker.index', compact('loker'));
    }

    public function create()
    {
        $perusahaan = Perusahaan::all();
        return view('loker.create', compact('perusahaan'));
    }

    public function store(Request $request)
    {
        Loker::create($request->all());
        return redirect()->route('loker.index');
    }

    public function edit($id)
    {
        $loker = Loker::findOrFail($id);
        $perusahaan = Perusahaan::all();

        return view('loker.edit', compact('loker', 'perusahaan'));
    }

    public function update(Request $request, $id)
    {
        $loker = Loker::findOrFail($id);
        $loker->update($request->all());

        return redirect()->route('loker.index');
    }

    public function destroy($id)
    {
        $loker = Loker::findOrFail($id);
        $loker->delete();

        return redirect()->route('loker.index');
    }
}