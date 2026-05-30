<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupMember extends Model
{
    protected $fillable = [
        'group_id',
        'pelamar_id',
        'role',
        'joined_at',
    ];

    protected $casts = [
        'joined_at' => 'datetime',
    ];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function pelamar()
    {
        return $this->belongsTo(User::class, 'pelamar_id', 'id');
    }

    public function comments()
{
    return $this->hasMany(GroupComment::class);
}
}