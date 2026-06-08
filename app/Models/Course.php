<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'title',
        'description',
        'benefit',
        'price',
        'payment_required',
        'payment_note',
        'is_active',
        'perusahaan_id', 
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'payment_required' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function perusahaan()
    {
        return $this->belongsTo(ProfilePerusahaan::class, 'perusahaan_id');
    }

    public function links()
    {
        return $this->hasMany(CourseLink::class);
    }

    public function registrations()
    {
        return $this->hasMany(CourseRegistration::class, 'course_id');
    }

    public function payments()
    {
        return $this->hasMany(CoursePayment::class);
    }
}
