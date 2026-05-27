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

    // Relasi ke perusahaan (user dengan role perusahaan)
    public function perusahaan()
    {
        return $this->belongsTo(User::class, 'perusahaan_id', 'id');
    }

    public function links()
    {
        return $this->hasMany(CourseLink::class);
    }

    public function registrations()
    {
        return $this->hasMany(CourseRegistration::class);
    }

    public function payments()
    {
        return $this->hasMany(CoursePayment::class);
    }
}
