<?php

namespace App\Http\Controllers\Perusahaan;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseRegistration;
use App\Models\Inbox;
use App\Models\ProfilePerusahaan;
use Illuminate\Support\Facades\Auth;

class CourseParticipantController extends Controller
{
    private function getProfilePerusahaan()
    {
        return ProfilePerusahaan::where(
            'user_id',
            Auth::id()
        )->first();
    }

    public function index()
    {
        $profile = $this->getProfilePerusahaan();

        if (!$profile) {
            return redirect()
                ->back()
                ->with('error', 'Profil perusahaan tidak ditemukan.');
        }

        $courses = Course::withCount('registrations')
            ->where('perusahaan_id', $profile->id)
            ->latest()
            ->get();

        return view(
            'perusahaan.course.participant.index',
            compact('courses')
        );
    }

    public function show(Course $course)
    {
        $profile = $this->getProfilePerusahaan();

        if (!$profile || $course->perusahaan_id != $profile->id) {
            abort(403);
        }

        $registrations = CourseRegistration::with([
                'user',
                'payment'
            ])
            ->where('course_id', $course->id)
            ->latest()
            ->get();

        return view(
            'perusahaan.course.participant.show',
            compact(
                'course',
                'registrations'
            )
        );
    }

    public function approve(CourseRegistration $registration)
{
    $course = Course::findOrFail($registration->course_id);

    $profile = $this->getProfilePerusahaan();

    if (!$profile || $course->perusahaan_id != $profile->id) {
        abort(403);
    }

    $registration->update([
        'status' => 'approved',
        'approved_at' => now(),
    ]);

    Inbox::create([
        'pelamar_id' => $registration->pelamar_id,
        'title' => 'Pendaftaran Course Disetujui',
        'message' => 'Selamat! Pendaftaran kamu untuk course "' . $course->title . '" telah disetujui.',
        'type' => 'course',
        'is_read' => false,
        'action_text' => 'Akses Course',
        'action_url' => route('course.access', $course->id),
    ]);

    return back()->with(
        'success',
        'Peserta berhasil disetujui dan notifikasi telah dikirim.'
    );
}

    public function reject(CourseRegistration $registration)
{
    $course = Course::findOrFail($registration->course_id);

    $profile = $this->getProfilePerusahaan();

    if (!$profile || $course->perusahaan_id != $profile->id) {
        abort(403);
    }

    $registration->update([
    'status' => 'rejected',
    'approved_at' => null,
    'catatan_admin' => 'Pendaftaran course ditolak. Silakan daftar ulang.',
]);

    Inbox::create([
        'pelamar_id' => $registration->pelamar_id,
        'title' => 'Pendaftaran Course Ditolak',
        'message' => 'Maaf, pendaftaran kamu untuk course "' . $course->title . '" belum dapat disetujui. Silakan daftar ulang.',
        'type' => 'course',
        'is_read' => false,
        'action_text' => 'Daftar Ulang',
        'action_url' => route('course.register.form', $course->id),
    ]);

    return back()->with(
        'success',
        'Peserta berhasil ditolak dan notifikasi telah dikirim.'
    );
}
}