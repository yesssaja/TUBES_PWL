<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rsvp extends Model
{
    protected $fillable = [
        'pelamar_id',
        'event_id',
        'name',
        'email',
        'hp',
        'status_kehadiran',
    ];

    public function pelamar()
    {
        return $this->belongsTo(User::class, 'pelamar_id');
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}