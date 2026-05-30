<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupCommentController extends Controller
{
    public function store(Request $request, Group $group)
    {
        $request->validate([
            'content' => 'required|string|max:1000'
        ]);

        GroupComment::create([
            'group_id' => $group->id,
            'pelamar_id' => Auth::id(),
            'content' => $request->content,
        ]);

        return back()->with(
            'success',
            'Komentar berhasil ditambahkan.'
        );
    }
}