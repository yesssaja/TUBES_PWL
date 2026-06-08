<?php

namespace App\Http\Controllers;

use App\Models\Loker;
use Illuminate\Http\Request;

class LokerController extends Controller
{
    public function index()
    {
        $lokers = Loker::with(['perusahaan', 'profilePerusahaan'])
            ->latest()
            ->get();

        return view('users.loker.dashboard.loker', compact('lokers'));
    }

    public function show($id)
    {
       $loker = Loker::with('profilePerusahaan')->findOrFail($id);
       
        return view('users.loker.detail.detail_loker', compact('loker'));
    }
}