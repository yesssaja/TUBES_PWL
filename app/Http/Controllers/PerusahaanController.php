<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use App\Models\Loker;
use App\Models\Event;
use Illuminate\Http\Request;

class PerusahaanController extends Controller
{
    public function index()
    {
        $perusahaan = Perusahaan::all();

        return view('pages.perusahaan', compact('perusahaan'));
    }

    public function create()
    {
        return view('pages.perusahaan');
    }

    public function store(Request $request)
    {
        Perusahaan::create($request->all());

        return redirect()->route('perusahaan.index');
    }

    public function edit($id)
    {
        $perusahaan = Perusahaan::findOrFail($id);

        return view('pages.perusahaan', compact('perusahaan'));
    }

    public function update(Request $request, $id)
    {
        $perusahaan = Perusahaan::findOrFail($id);

        $perusahaan->update($request->all());

        return redirect()->route('perusahaan.index');
    }

    public function destroy($id)
    {
        $perusahaan = Perusahaan::findOrFail($id);

        $perusahaan->delete();

        return redirect()->route('perusahaan.index');
    }

    public function detail($perusahaan = null)
{
    if ($perusahaan) {
        $perusahaan = Perusahaan::findOrFail($perusahaan);
    } else {
        $perusahaan = Perusahaan::first();
    }

    if (!$perusahaan) {
        abort(404, 'Data perusahaan belum tersedia.');
    }

    $lokers = Loker::where('perusahaan_id', $perusahaan->id)
        ->latest()
        ->get();

    $events = Event::where('perusahaan_id', $perusahaan->id)
        ->latest()
        ->get();

    return view('pages.perusahaan', compact('perusahaan', 'lokers', 'events'));
}
}