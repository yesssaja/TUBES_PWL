<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lamaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'loker_id',
        'nama',
        'email',
        'hp',
        'tempat_lahir',
        'tanggal_lahir',
        'gender',
        'cv',
        'foto',
        'portfolio',
        'motivasi',
        'status_lamaran',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function loker()
    {
        return $this->belongsTo(Loker::class);
    }
}