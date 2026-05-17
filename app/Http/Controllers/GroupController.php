<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupMember;
use App\Models\GroupPost;
use App\Models\GroupPostComment;
use App\Models\GroupPostLike;
use App\Models\GroupPostReport;
use Illuminate\Http\Request;

class GroupController extends Controller
{
   public function index(Request $request)
{
    $groups = Group::withCount('members')
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
    $likedPostIds = [];
    $reportedPostIds = [];

    if (auth()->check()) {
        $joined = GroupMember::where('group_id', $group->id)
            ->where('user_id', auth()->id())
            ->exists();
    }

    $posts = GroupPost::with([
            'user',
            'comments.user',
        ])
        ->withCount(['comments', 'likes'])
        ->where('group_id', $group->id)
        ->whereNull('hidden_at')
        ->latest()
        ->get();

    if (auth()->check()) {
        $postIds = $posts->pluck('id');

        $likedPostIds = GroupPostLike::where('user_id', auth()->id())
            ->whereIn('post_id', $postIds)
            ->pluck('post_id')
            ->toArray();

        $reportedPostIds = GroupPostReport::where('user_id', auth()->id())
            ->whereIn('post_id', $postIds)
            ->pluck('post_id')
            ->toArray();
    }

    return view('pages.join_group', compact(
        'group',
        'joined',
        'posts',
        'likedPostIds',
        'reportedPostIds'
    ));
}

    public function join(Group $group)
    {
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

        return back()->with('success', 'Berhasil join group.');
    }

    public function leave(Group $group)
    {
        GroupMember::where('group_id', $group->id)
            ->where('user_id', auth()->id())
            ->delete();

        return back()->with('success', 'Berhasil keluar dari group.');
    }

    public function storePost(Request $request, Group $group)
    {
        $request->validate([
            'content' => 'required|string|max:5000',
        ]);

        abort_unless($this->canInteract($group), 403);

        GroupPost::create([
            'group_id' => $group->id,
            'user_id' => auth()->id(),
            'content' => $request->content,
        ]);

        return back()->with('success', 'Postingan berhasil dibuat.');
    }

    public function storeComment(Request $request, GroupPost $post)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        abort_unless($this->canInteract($post->group), 403);

        GroupPostComment::create([
            'post_id' => $post->id,
            'user_id' => auth()->id(),
            'content' => $request->content,
        ]);

        return back()->with('success', 'Komentar berhasil dikirim.');
    }

    public function toggleLike(GroupPost $post)
    {
        abort_unless($this->canInteract($post->group), 403);

        $like = GroupPostLike::where('post_id', $post->id)
            ->where('user_id', auth()->id())
            ->first();

        if ($like) {
            $like->delete();
            return back()->with('success', 'Like dibatalkan.');
        }

        GroupPostLike::create([
            'post_id' => $post->id,
            'user_id' => auth()->id(),
        ]);

        return back()->with('success', 'Postingan disukai.');
    }

    public function report(Request $request, GroupPost $post)
    {
        $request->validate([
            'reason' => 'nullable|string|max:255',
        ]);

        abort_unless($this->canInteract($post->group), 403);

        $report = GroupPostReport::firstOrCreate(
            [
                'post_id' => $post->id,
                'user_id' => auth()->id(),
            ],
            [
                'reason' => $request->reason ?? 'Tidak ada alasan.',
                'status' => 'pending',
            ]
        );

        if ($report->wasRecentlyCreated) {
            $post->increment('report_count');
            $post->update([
                'is_reported' => true,
            ]);
        } else {
            $report->update([
                'reason' => $request->reason ?? $report->reason,
                'status' => 'pending',
            ]);
        }

        return back()->with('success', 'Postingan berhasil dilaporkan.');
    }

    private function canInteract(Group $group): bool
    {
        if (!auth()->check()) {
            return false;
        }

        if (auth()->user()->role === 'admin') {
            return true;
        }

        return GroupMember::where('group_id', $group->id)
            ->where('user_id', auth()->id())
            ->exists();
    }
}