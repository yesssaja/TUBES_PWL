<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_event',
        'deskripsi',
        'tanggal_event',
        'lokasi',
        'poster',
        'kuota'
    ];

    public function rsvp()
    {
        return $this->hasMany(Rsvp::class);
    }

    public function perusahaan()
{
    return $this->belongsTo(Perusahaan::class);
}
}