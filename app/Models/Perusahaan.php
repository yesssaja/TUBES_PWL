<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    use HasFactory;

    protected $table = 'profile_perusahaan';
    protected $fillable = [
        'nama_perusahaan',
        'logo',
        'deskripsi',
        'alamat',
        'email',
        'no_hp',
        'website',
        'user_id'
];

    public function loker()
    {
        return $this->hasMany(Loker::class);
    }

    public function event()
{
    return $this->hasMany(Event::class);
}

public function lokers()
{
    return $this->hasMany(\App\Models\Loker::class);
}
}
