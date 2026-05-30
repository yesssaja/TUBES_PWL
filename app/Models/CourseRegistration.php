<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseRegistration extends Model
{
    protected $fillable = [
        'pelamar_id',
        'course_id',
        'nama',
        'email',
        'no_hp',
        'alasan',
        'status',
        'catatan_admin',
        'approved_at',
    ];

    protected $casts = [
        'approved_at' => 'datetime',
    ];

    public function pelamar()
    {
        return $this->belongsTo(User::class, 'pelamar_id', 'id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function payment()
    {
        return $this->hasOne(CoursePayment::class);
    }
}