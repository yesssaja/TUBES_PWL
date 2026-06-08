<?php

namespace App\Http\Controllers\Perusahaan;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseLink;
use App\Models\ProfilePerusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    private function getProfilePerusahaan()
    {
        return ProfilePerusahaan::where('user_id', Auth::id())->first();
    }

    public function index()
    {
        $profile = $this->getProfilePerusahaan();

        if (!$profile) {
            return view('perusahaan.course.index', [
                'courses' => collect(),
            ])->with('error', 'Profil perusahaan belum ditemukan.');
        }

        $courses = Course::with('links')
            ->where('perusahaan_id', $profile->id)
            ->latest()
            ->get();

        return view('perusahaan.course.index', compact('courses'));
    }

    public function create()
    {
        $profile = $this->getProfilePerusahaan();

        if (!$profile) {
            return redirect()
                ->route('perusahaan.profil.index')
                ->with('error', 'Lengkapi profil perusahaan terlebih dahulu.');
        }

        return view('perusahaan.course.create');
    }

    public function store(Request $request)
    {
        $profile = $this->getProfilePerusahaan();

        if (!$profile) {
            return redirect()
                ->route('perusahaan.profil.index')
                ->with('error', 'Lengkapi profil perusahaan terlebih dahulu.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'benefit' => 'nullable',
            'price' => 'required|numeric|min:0',
            'payment_required' => 'required|boolean',
            'payment_note' => 'nullable',
            'is_active' => 'required|boolean',
            'link_title' => 'nullable|string|max:255',
            'link_url' => 'nullable|url',
        ]);

        $course = Course::create([
            'perusahaan_id' => $profile->id,
            'title' => $request->title,
            'description' => $request->description,
            'benefit' => $request->benefit,
            'price' => $request->price,
            'payment_required' => $request->payment_required,
            'payment_note' => $request->payment_note,
            'is_active' => $request->is_active,
        ]);

        if ($request->filled('link_title') && $request->filled('link_url')) {
            CourseLink::create([
                'course_id' => $course->id,
                'title' => $request->link_title,
                'url' => $request->link_url,
            ]);
        }

        return redirect()
            ->route('perusahaan.course.index')
            ->with('success', 'Course berhasil dibuat.');
    }

    public function show(Course $course)
    {
        $profile = $this->getProfilePerusahaan();

        if (!$profile || $course->perusahaan_id != $profile->id) {
            abort(403, 'Anda tidak memiliki akses ke course ini.');
        }

        $course->load('links');

        return view('perusahaan.course.show', compact('course'));
    }

    public function edit(Course $course)
    {
        $profile = $this->getProfilePerusahaan();

        if (!$profile || $course->perusahaan_id != $profile->id) {
            abort(403, 'Anda tidak memiliki akses ke course ini.');
        }

        $course->load('links');

        return view('perusahaan.course.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $profile = $this->getProfilePerusahaan();

        if (!$profile || $course->perusahaan_id != $profile->id) {
            abort(403, 'Anda tidak memiliki akses ke course ini.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'benefit' => 'nullable',
            'price' => 'required|numeric|min:0',
            'payment_required' => 'required|boolean',
            'payment_note' => 'nullable',
            'is_active' => 'required|boolean',
            'link_title' => 'nullable|string|max:255',
            'link_url' => 'nullable|url',
        ]);

        $course->update([
            'title' => $request->title,
            'description' => $request->description,
            'benefit' => $request->benefit,
            'price' => $request->price,
            'payment_required' => $request->payment_required,
            'payment_note' => $request->payment_note,
            'is_active' => $request->is_active,
        ]);

        CourseLink::where('course_id', $course->id)->delete();

        if ($request->filled('link_title') && $request->filled('link_url')) {
            CourseLink::create([
                'course_id' => $course->id,
                'title' => $request->link_title,
                'url' => $request->link_url,
            ]);
        }

        return redirect()
            ->route('perusahaan.course.index')
            ->with('success', 'Course berhasil diperbarui.');
    }

    public function destroy(Course $course)
    {
        $profile = $this->getProfilePerusahaan();

        if (!$profile || $course->perusahaan_id != $profile->id) {
            abort(403, 'Anda tidak memiliki akses ke course ini.');
        }

        CourseLink::where('course_id', $course->id)->delete();

        $course->delete();

        return redirect()
            ->route('perusahaan.course.index')
            ->with('success', 'Course berhasil dihapus.');
    }
}