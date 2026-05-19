<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseRegistration;
use App\Models\CoursePayment;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('links')
            ->where('is_active', true)
            ->orderBy('id', 'asc')
            ->get();

        $registrations = collect();

        if (auth()->check()) {
            $registrations = CourseRegistration::where('user_id', auth()->id())
                ->get()
                ->keyBy('course_id');
        }

        return view('course.index', compact('courses', 'registrations'));
    }

    public function registerForm(Course $course)
    {
        $registration = CourseRegistration::where('user_id', auth()->id())
            ->where('course_id', $course->id)
            ->first();

        if ($registration && $registration->status === 'approved') {
            return redirect()->route('course.access', $course->id);
        }

        return view('course.register', compact('course', 'registration'));
    }

   public function register(Request $request, Course $course)
{
    $rules = [
        'no_hp' => 'required|string|max:30',
        'alasan' => 'required|string|min:10',
    ];

    if ($course->payment_required || $course->price > 0) {
        $rules['payment_method'] = 'required|string|max:100';
        $rules['proof_image'] = 'required|image|mimes:jpg,jpeg,png,webp|max:2048';
    }

    $request->validate($rules);

    $existing = CourseRegistration::where('user_id', auth()->id())
        ->where('course_id', $course->id)
        ->first();

    if ($existing && $existing->status === 'pending') {
        return redirect()
            ->route('course.index')
            ->with('error', 'Kamu sudah mendaftar course ini. Permintaan Anda sedang diproses.');
    }

    if ($existing && $existing->status === 'approved') {
        return redirect()->route('course.access', $course->id);
    }

    $registration = CourseRegistration::updateOrCreate(
        [
            'user_id' => auth()->id(),
            'course_id' => $course->id,
        ],
        [
            'nama' => auth()->user()->name,
            'email' => auth()->user()->email,
            'no_hp' => $request->no_hp,
            'alasan' => $request->alasan,
            'status' => 'pending',
            'catatan_admin' => null,
            'approved_at' => null,
        ]
    );

    if ($course->payment_required || $course->price > 0) {
        $proofPath = null;

        if ($request->hasFile('proof_image')) {
            $oldPayment = CoursePayment::where('course_registration_id', $registration->id)->first();

            if ($oldPayment && $oldPayment->proof_image && Storage::disk('public')->exists($oldPayment->proof_image)) {
                Storage::disk('public')->delete($oldPayment->proof_image);
            }

            $proofPath = $request->file('proof_image')
                ->store('course/payments', 'public');
        }

        CoursePayment::updateOrCreate(
            [
                'course_registration_id' => $registration->id,
            ],
            [
                'user_id' => auth()->id(),
                'course_id' => $course->id,
                'amount' => $course->price,
                'payment_method' => $request->payment_method,
                'proof_image' => $proofPath,
                'status' => 'pending',
                'note' => null,
                'verified_at' => null,
            ]
        );
    }

    return redirect()
        ->route('course.index')
        ->with('success', 'Pendaftaran course berhasil dikirim. Permintaan Anda sedang diproses.');
}

   public function access(Course $course)
{
    $registration = \App\Models\CourseRegistration::where('user_id', auth()->id())
        ->where('course_id', $course->id)
        ->where('status', 'approved')
        ->first();

    if (!$registration) {
        return redirect()
            ->route('course.index')
            ->with('error', 'Kamu harus mendaftar terlebih dahulu untuk mengakses course ini.');
    }

    // Ambil hanya 1 link sesuai course yang didaftarkan
    $courseLink = $course->links()
        ->orderBy('id', 'asc')
        ->first();

    return view('course.access', compact('course', 'registration', 'courseLink'));
}
}