<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function pelamar(): BelongsTo
    {
        return $this->belongsTo( User::class, 'pelamar_id');
    }

    public function user(): BelongsTo
    {
    return $this->belongsTo(User::class, 'pelamar_id');
    }



    public function perusahaan(): BelongsTo
    {
        return $this->belongsTo( ProfilePerusahaan::class, 'perusahaan_id');
        
    }
}