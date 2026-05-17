<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupPost extends Model
{
    protected $fillable = [
        'group_id',
        'user_id',
        'content',
        'is_reported',
        'report_count',
        'hidden_at',
    ];

    protected $casts = [
        'is_reported' => 'boolean',
        'hidden_at' => 'datetime',
    ];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(GroupPostComment::class, 'post_id');
    }

    public function likes()
    {
        return $this->hasMany(GroupPostLike::class, 'post_id');
    }

    public function reports()
    {
        return $this->hasMany(GroupPostReport::class, 'post_id');
    }
}