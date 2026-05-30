<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoursePayment extends Model
{
    protected $fillable = [
        'course_registration_id',
        'pelamar_id',
        'course_id',
        'amount',
        'payment_method',
        'proof_image',
        'status',
        'note',
        'verified_at',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'verified_at' => 'datetime',
    ];

    public function registration()
    {
        return $this->belongsTo(CourseRegistration::class, 'course_registration_id');
    }

    public function pelamar()
    {
        return $this->belongsTo(User::class, 'pelamar_id', 'id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}