<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'perusahaan_id',
        'pelamar_id',
        'nama',
        'posisi',
        'rating',
        'ulasan',
        'balasan_perusahaan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'pelamar_id');
    }

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class, 'perusahaan_id');
    }
}