<?php

namespace App\Http\Controllers\Perusahaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProfilePerusahaan;

class ProfilePerusahaanController extends Controller
{
    public function index()
    {
        return ProfilePerusahaan::with('user')->get();
    }

    public function show($id)
    {
        return ProfilePerusahaan::with('user')->findOrFail($id);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id|unique:profile_perusahaan,user_id',
            'nama_perusahaan' => 'required|string|max:255',
            'logo' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'alamat' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'no_hp' => 'nullable|string|max:255',
            'website' => 'nullable|string|max:255',
        ]);

        return ProfilePerusahaan::create($data);
    }

    public function update(Request $request, $id)
    {
        $profile = ProfilePerusahaan::findOrFail($id);
        $data = $request->validate([
            'nama_perusahaan' => 'sometimes|required|string|max:255',
            'logo' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'alamat' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'no_hp' => 'nullable|string|max:255',
            'website' => 'nullable|string|max:255',
        ]);

        $profile->update($data);
        return $profile;
    }

    public function destroy($id)
    {
        ProfilePerusahaan::findOrFail($id)->delete();
        return response()->json(['message' => 'Profile deleted']);
    }
}