<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProfileAdmin;

class ProfileAdminController extends Controller
{
    public function index()
    {
        return ProfileAdmin::with('user')->get();
    }

    public function show($id)
    {
        return ProfileAdmin::with('user')->findOrFail($id);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id|unique:profile_admin,user_id',
            'foto' => 'nullable|string|max:255',
            'gender' => 'nullable|in:male,female',
            'bio' => 'nullable|string',
        ]);

        return ProfileAdmin::create($data);
    }

    public function update(Request $request, $id)
    {
        $profile = ProfileAdmin::findOrFail($id);
        $data = $request->validate([
            'foto' => 'nullable|string|max:255',
            'gender' => 'nullable|in:male,female',
            'bio' => 'nullable|string',
        ]);
        $profile->update($data);
        return $profile;
    }

    public function destroy($id)
    {
        ProfileAdmin::findOrFail($id)->delete();
        return response()->json(['message' => 'Profile deleted']);
    }
}