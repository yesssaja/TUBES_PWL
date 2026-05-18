<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupMember;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index(Request $request)
    {
        $groups = Group::withCount('members')
            ->where('is_public', true)
            ->when($request->search, function ($query) use ($request) {
                $query->where(function ($q) use ($request) {
                    $q->where('name', 'like', '%' . $request->search . '%')
                      ->orWhere('category', 'like', '%' . $request->search . '%')
                      ->orWhere('description', 'like', '%' . $request->search . '%');
                });
            })
            ->latest()
            ->get();

        return view('pages.group', compact('groups'));
    }

    public function show(Group $group)
    {
        $group->loadCount('members');

        $joined = false;

        if (auth()->check()) {
            $joined = GroupMember::where('group_id', $group->id)
                ->where('user_id', auth()->id())
                ->exists();
        }

        return view('pages.join_group', compact('group', 'joined'));
    }

    public function join(Group $group)
    {
        if (!auth()->check()) {
            return redirect()
                ->route('login')
                ->with('error', 'Silakan login terlebih dahulu untuk join group.');
        }

        GroupMember::updateOrCreate(
            [
                'group_id' => $group->id,
                'user_id' => auth()->id(),
            ],
            [
                'role' => 'member',
                'joined_at' => now(),
            ]
        );

        return redirect()
            ->route('join_group', $group->slug)
            ->with('success', 'Berhasil join group.');
    }

    public function leave(Group $group)
    {
        if (!auth()->check()) {
            return redirect()
                ->route('login')
                ->with('error', 'Silakan login terlebih dahulu.');
        }

        GroupMember::where('group_id', $group->id)
            ->where('user_id', auth()->id())
            ->delete();

        return redirect()
            ->route('join_group', $group->slug)
            ->with('success', 'Berhasil keluar dari group.');
    }
}