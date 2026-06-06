<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilePerusahaan extends Model
{
    use HasFactory;

    protected $table = 'profile_perusahaan';

    protected $fillable = [
    'pelamar_id',
    'loker_id',
    'nama',
    'email',
    'cv',
    'foto',
    'portfolio',
    'motivasi',
    'status_lamaran',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}