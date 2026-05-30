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

    public function perusahaan()
    {
        return $this->belongsTo(User::class, 'perusahaan_id', 'id');
    }

    public function pelamar()
    {
        return $this->belongsTo(User::class, 'pelamar_id', 'id');
    }
}