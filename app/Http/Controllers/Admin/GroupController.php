<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\GroupPost;
use App\Models\GroupPostReport;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GroupController extends Controller
{
    public function index()
    {
        $this->checkAdmin();

        $groups = Group::withCount(['members', 'posts'])
            ->latest()
            ->get();

        return view('admin.groups.index', compact('groups'));
    }

    public function create()
    {
        $this->checkAdmin();

        return view('admin.groups.create');
    }

    public function store(Request $request)
    {
        $this->checkAdmin();

        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'icon_letter' => 'nullable|string|max:5',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|string|max:255',
            'is_public' => 'nullable',
        ]);

        Group::create([
            'name' => $request->name,
            'slug' => $this->makeUniqueSlug($request->name),
            'category' => $request->category,
            'icon_letter' => $request->icon_letter ?: strtoupper(substr($request->name, 0, 1)),
            'description' => $request->description,
            'cover_image' => $request->cover_image,
            'is_public' => $request->has('is_public') ? 1 : 0,
            'created_by' => auth()->id(),
        ]);

        return redirect()
            ->route('admin.groups.index')
            ->with('success', 'Group berhasil dibuat.');
    }

    public function edit(Group $group)
    {
        $this->checkAdmin();

        return view('admin.groups.edit', compact('group'));
    }

    public function update(Request $request, Group $group)
    {
        $this->checkAdmin();

        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'icon_letter' => 'nullable|string|max:5',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|string|max:255',
            'is_public' => 'nullable',
        ]);

        $group->update([
            'name' => $request->name,
            'slug' => $this->makeUniqueSlug($request->name, $group->id),
            'category' => $request->category,
            'icon_letter' => $request->icon_letter ?: strtoupper(substr($request->name, 0, 1)),
            'description' => $request->description,
            'cover_image' => $request->cover_image,
            'is_public' => $request->has('is_public') ? 1 : 0,
        ]);

        return redirect()
            ->route('admin.groups.index')
            ->with('success', 'Group berhasil diperbarui.');
    }

    public function destroy(Group $group)
    {
        $this->checkAdmin();

        $group->delete();

        return redirect()
            ->route('admin.groups.index')
            ->with('success', 'Group berhasil dihapus.');
    }

    public function reports()
    {
        $this->checkAdmin();

        $reports = GroupPostReport::with([
            'user',
            'post.user',
            'post.group',
        ])
            ->latest()
            ->get();

        return view('admin.groups.reports', compact('reports'));
    }

    public function hidePost(GroupPost $post)
    {
        $this->checkAdmin();

        $post->update([
            'hidden_at' => now(),
        ]);

        return back()->with('success', 'Postingan berhasil disembunyikan.');
    }

    public function restorePost(GroupPost $post)
    {
        $this->checkAdmin();

        $post->update([
            'hidden_at' => null,
        ]);

        return back()->with('success', 'Postingan berhasil ditampilkan kembali.');
    }

    public function deletePost(GroupPost $post)
    {
        $this->checkAdmin();

        $post->delete();

        return back()->with('success', 'Postingan berhasil dihapus.');
    }

    public function reviewReport(GroupPostReport $report)
    {
        $this->checkAdmin();

        $report->update([
            'status' => 'reviewed',
        ]);

        return back()->with('success', 'Report berhasil ditandai sudah dicek.');
    }

    private function checkAdmin(): void
    {
        abort_unless(auth()->check() && auth()->user()->role === 'admin', 403);
    }

    private function makeUniqueSlug(string $name, ?int $ignoreId = null): string
    {
        $slug = Str::slug($name);
        $originalSlug = $slug;
        $counter = 1;

        while (
            Group::where('slug', $slug)
                ->when($ignoreId, function ($query) use ($ignoreId) {
                    return $query->where('id', '!=', $ignoreId);
                })
                ->exists()
        ) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}