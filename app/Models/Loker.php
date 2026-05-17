<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loker extends Model
{
    use HasFactory;

    protected $fillable = [
        'perusahaan_id',
        'judul_loker',
        'deskripsi',
        'lokasi',
        'tipe_pekerjaan',
        'gaji',
        'batas_lamaran',
    ];

    protected $casts = [
        'batas_lamaran' => 'date',
    ];

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class);
    }

    public function lamarans()
    {
        return $this->hasMany(Lamaran::class);
    }
}
