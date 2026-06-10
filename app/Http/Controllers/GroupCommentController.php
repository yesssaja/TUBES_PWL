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
    public function destroy($id)
{
    $comment = GroupComment::findOrFail($id);

    if (Auth::id() !== $comment->pelamar_id) {
        return redirect()->back()->with('error', 'Kamu tidak punya akses untuk menghapus postingan ini.');
    }

    $comment->delete();

    
    return redirect()->back()->with('success', 'Postingan berhasil dihapus!');
}
}