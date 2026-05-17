<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'perusahaan_id',
        'nama_event',
        'deskripsi',
        'tanggal_event',
        'jam',
        'lokasi',
        'kuota',
        'status',
    ];

    public function rsvps()
    {
        return $this->hasMany(Rsvp::class);
    }

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class);
    }
}