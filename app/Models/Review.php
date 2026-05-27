<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'perusahaan_id',
        'user_id',
        'nama',
        'posisi',
        'rating',
        'ulasan',
        'balasan_perusahaan',
    ];

    public function perusahaan()
{
    return $this->belongsTo(\App\Models\User::class, 'perusahaan_id', 'id');
}

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}