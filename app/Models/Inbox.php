<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inbox extends Model
{
    protected $fillable = [
        'pelamar_id',
        'title',
        'message',
        'type',
        'is_read',
        'action_text',
        'action_url',
    ];

    public function pelamar()
    {
        return $this->belongsTo(User::class, 'pelamar_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'pelamar_id', 'id');
    }
}