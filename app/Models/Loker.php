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
        'batas_lamaran'
    ];

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class);
    }

    public function lamaran()
    {
        return $this->hasMany(Lamaran::class);
    }
}
