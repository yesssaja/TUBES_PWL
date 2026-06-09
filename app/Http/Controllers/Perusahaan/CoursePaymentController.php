<?php

namespace App\Http\Controllers\Perusahaan;

use App\Models\Inbox;
use App\Http\Controllers\Controller;
use App\Models\CoursePayment;
use App\Models\CourseRegistration;
use Illuminate\Http\Request;

class CoursePaymentController extends Controller
{
    public function verify(CoursePayment $payment)
    {
        $payment->update([
            'status' => 'verified',
            'verified_at' => now(),
        ]);

        $registration = CourseRegistration::find(
            $payment->course_registration_id
        );

        if ($registration) {
            $registration->update([
                'status' => 'approved',
                'approved_at' => now(),
            ]);

            Inbox::create([
            'pelamar_id' => $registration->pelamar_id,
            'title' => 'Pembayaran Course Diverifikasi',
            'message' => 'Pembayaran untuk course ' . ($registration->course->title ?? '-') . ' telah diverifikasi. Kamu sudah bisa mengakses course.',
            'type' => 'course',
            'is_read' => false,
            'action_text' => 'Akses Course',
            'action_url' => route('course.access', $registration->course_id),
        ]);
        }

        return back()->with(
            'success',
            'Pembayaran berhasil diverifikasi dan peserta otomatis disetujui.'
        );
    }

    public function reject(Request $request, CoursePayment $payment)
    {
        $payment->update([
            'status' => 'rejected',
            'note' => $request->note ?? 'Bukti pembayaran tidak valid.',
        ]);
    
        $registration = CourseRegistration::find(
            $payment->course_registration_id
        );
    
        if ($registration) {
    
            Inbox::create([
                'pelamar_id' => $registration->pelamar_id,
                'title' => 'Pembayaran Course Ditolak',
                'message' => 'Bukti pembayaran untuk course "' .
                            ($registration->course->title ?? 'Course') .
                            '" ditolak. Silakan upload ulang bukti pembayaran yang valid.',
                'type' => 'course',
                'is_read' => false,
                'action_text' => 'Lihat Course',
                'action_url' => route('course.index'),
            ]);
    
        }
    
        return back()->with(
            'success',
            'Pembayaran berhasil ditolak dan notifikasi telah dikirim.'
        );
    }
}