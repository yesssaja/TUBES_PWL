<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupComment extends Model
{
    protected $fillable = [
        'group_id',
        'pelamar_id',
        'content',
    ];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function pelamar()
    {
        return $this->belongsTo(User::class, 'pelamar_id');
    }
}