<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'foto',
        'hp',
        'tempat_lahir',
        'tanggal_lahir',
        'gender',
        'role', // Tambahkan ini agar role bisa diisi (Mass Assignment)
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Helper untuk mengecek apakah user adalah admin
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function lamarans()
{
    return $this->hasMany(\App\Models\Lamaran::class);
}

public function services()
{
    return $this->hasMany(\App\Models\Service::class);
}

public function inboxes()
{
    return $this->hasMany(\App\Models\Inbox::class);
}

public function courseRegistrations()
{
    return $this->hasMany(\App\Models\CourseRegistration::class);
}

public function events()
{
    return $this->hasMany(\App\Models\Event::class, 'perusahaan_id', 'id');
}

public function lokers()
{
    return $this->hasMany(\App\Models\Loker::class, 'perusahaan_id', 'id');
}

public function reviews()
{
    return $this->hasMany(\App\Models\Review::class, 'perusahaan_id', 'id');
}

public function profilePerusahaan()
{
    return $this->hasOne(\App\Models\ProfilePerusahaan::class, 'user_id', 'id');
}

public function courses()
{
    return $this->hasMany(\App\Models\Course::class, 'perusahaan_id', 'id');
}

public function profileAdmin()
{
    return $this->hasOne(\App\Models\ProfileAdmin::class, 'user_id', 'id');
}
}