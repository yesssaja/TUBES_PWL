<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'foto',
        'hp',
        'tempat_lahir',
        'tanggal_lahir',
        'gender',
        'role',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    // USER/PELAMAR
    public function lamarans()
    {
        return $this->hasMany(Lamaran::class, 'pelamar_id', 'id');
    }

    public function services()
    {
        return $this->hasMany(Service::class, 'pelamar_id', 'id');
    }

    public function inboxes()
    {
        return $this->hasMany(Inbox::class, 'pelamar_id', 'id');
    }

    public function courseRegistrations()
    {
        return $this->hasMany(CourseRegistration::class, 'pelamar_id', 'id');
    }

    public function coursePayments()
    {
        return $this->hasMany(CoursePayment::class, 'pelamar_id', 'id');
    }

    public function rsvps()
    {
        return $this->hasMany(Rsvp::class, 'pelamar_id', 'id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'pelamar_id', 'id');
    }

    // PERUSAHAAN
    public function events()
    {
        return $this->hasMany(Event::class, 'perusahaan_id', 'id');
    }

    public function lokers()
    {
        return $this->hasMany(Loker::class, 'perusahaan_id', 'id');
    }

    public function courses()
    {
        return $this->hasMany(Course::class, 'perusahaan_id', 'id');
    }

    public function profilePerusahaan()
    {
        return $this->hasOne(ProfilePerusahaan::class, 'user_id', 'id');
    }

    // ADMIN
    public function profileAdmin()
    {
        return $this->hasOne(ProfileAdmin::class, 'user_id', 'id');
    }

    public function groupComments()
{
    return $this->hasMany(GroupComment::class, 'pelamar_id');
}
}