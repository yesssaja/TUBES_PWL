<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::withCount('members')
            ->latest()
            ->get();

        return view('admin.groups.index', compact('groups'));
    }

    public function create()
    {
        return view('admin.groups.create');
    }

    public function store(Request $request)
    {
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
        return view('admin.groups.edit', compact('group'));
    }

    public function update(Request $request, Group $group)
    {
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
        $group->delete();

        return redirect()
            ->route('admin.groups.index')
            ->with('success', 'Group berhasil dihapus.');
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