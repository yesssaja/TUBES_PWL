<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilePelamar extends Model
{
    protected $fillable = [
        'user_id',
        'foto_diri',
        'nik',
        'tempat_lahir',
        'tgl_lahir',
        'gender',
        'no_hp',
        'foto_ktp',
        'foto_ijazah'
    ];
}
