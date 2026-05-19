<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseRegistration;
use App\Models\Inbox;
use Illuminate\Http\Request;

class CourseRegistrationController extends Controller
{
    public function index()
    {
        $registrations = CourseRegistration::with([
                'user',
                'course',
                'payment'
            ])
            ->latest()
            ->get();

        return view('admin.course.index', compact('registrations'));
    }

    public function verifyPayment(CourseRegistration $registration)
    {
        $registration->load(['user', 'course', 'payment']);

        if (!$registration->payment) {
            return back()->with('error', 'Bukti pembayaran belum tersedia.');
        }

        $registration->payment->update([
            'status' => 'verified',
            'verified_at' => now(),
            'note' => null,
        ]);

        if ($registration->user_id) {
            Inbox::create([
                'user_id' => $registration->user_id,
                'title' => 'Pembayaran Course Berhasil Diverifikasi',
                'message' => 'Pembayaran kamu untuk course "' . ($registration->course->title ?? 'Course') . '" sudah berhasil diverifikasi. Permintaan pendaftaran kamu sedang diproses.',
                'type' => 'course_payment_verified',
                'is_read' => false,
                'action_text' => null,
                'action_url' => null,
            ]);
        }

        return back()->with('success', 'Pembayaran berhasil diverifikasi. Sekarang pendaftaran bisa disetujui.');
    }

    public function rejectPayment(Request $request, CourseRegistration $registration)
    {
        $registration->load(['user', 'course', 'payment']);

        if (!$registration->payment) {
            return back()->with('error', 'Bukti pembayaran belum tersedia.');
        }

        $note = $request->note ?? 'Bukti pembayaran belum valid.';

        $registration->payment->update([
            'status' => 'rejected',
            'note' => $note,
            'verified_at' => null,
        ]);

        if ($registration->user_id) {
            Inbox::create([
                'user_id' => $registration->user_id,
                'title' => 'Pembayaran Course Belum Valid',
                'message' => 'Bukti pembayaran kamu untuk course "' . ($registration->course->title ?? 'Course') . '" belum dapat diverifikasi. Catatan: ' . $note,
                'type' => 'course_payment_rejected',
                'is_read' => false,
                'action_text' => 'Upload Ulang Bukti',
                'action_url' => route('course.register.form', $registration->course_id),
            ]);
        }

        return back()->with('success', 'Pembayaran berhasil ditolak.');
    }

    public function approve(Request $request, CourseRegistration $registration)
    {
        $registration->load(['user', 'course', 'payment']);

        $course = $registration->course;

        if (($course->payment_required || $course->price > 0)) {
            if (!$registration->payment) {
                return back()->with('error', 'Pendaftaran ini belum memiliki bukti pembayaran.');
            }

            if ($registration->payment->status !== 'verified') {
                return back()->with('error', 'Pembayaran harus diverifikasi terlebih dahulu sebelum pendaftaran disetujui.');
            }
        }

        $registration->update([
            'status' => 'approved',
            'catatan_admin' => $request->catatan_admin,
            'approved_at' => now(),
        ]);

        if ($registration->user_id) {
            Inbox::create([
                'user_id' => $registration->user_id,
                'title' => 'Course Disetujui',
                'message' => 'Selamat! Pendaftaran kamu untuk course "' . ($registration->course->title ?? 'Course') . '" sudah disetujui. Kamu sekarang bisa mengakses link course.',
                'type' => 'course_approved',
                'is_read' => false,
                'action_text' => 'Akses Course',
                'action_url' => route('course.access', $registration->course_id),
            ]);
        }

        return back()->with('success', 'Pendaftaran course berhasil disetujui.');
    }

    public function reject(Request $request, CourseRegistration $registration)
    {
        $registration->load(['user', 'course']);

        $note = $request->catatan_admin ?? 'Pendaftaran belum dapat disetujui.';

        $registration->update([
            'status' => 'rejected',
            'catatan_admin' => $note,
            'approved_at' => null,
        ]);

        if ($registration->user_id) {
            Inbox::create([
                'user_id' => $registration->user_id,
                'title' => 'Course Belum Disetujui',
                'message' => 'Mohon maaf, pendaftaran kamu untuk course "' . ($registration->course->title ?? 'Course') . '" belum dapat disetujui. Catatan: ' . $note,
                'type' => 'course_rejected',
                'is_read' => false,
                'action_text' => 'Daftar Ulang',
                'action_url' => route('course.register.form', $registration->course_id),
            ]);
        }

        return back()->with('success', 'Pendaftaran course berhasil ditolak.');
    }

    public function destroy(CourseRegistration $registration)
    {
        $registration->delete();

        return back()->with('success', 'Data pendaftaran course berhasil dihapus.');
    }
}