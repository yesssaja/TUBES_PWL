<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lamaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'pelamar_id',
        'loker_id',
        'nama',
        'email',
        'cv',
        'portfolio',
        'motivasi',
        'status_lamaran',
    ];

    public function pelamar()
    {
        return $this->belongsTo(User::class, 'pelamar_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'pelamar_id', 'id');
    }

    public function loker()
    {
        return $this->belongsTo(Loker::class, 'loker_id', 'id');
    }
}