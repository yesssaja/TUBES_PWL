<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inbox extends Model
{
    protected $fillable = [
        'pelamar_id',
        'perusahaan_id',
        'title',
        'message',
        'type',
        'is_read',
        'action_text',
        'action_url',
    ];

    protected $casts = [
        'is_read' => 'boolean',
    ];

    public function pelamar()
    {
        return $this->belongsTo(User::class, 'pelamar_id');
    }

    public function perusahaan()
    {
        return $this->belongsTo(ProfilePerusahaan::class, 'perusahaan_id');
    }
}