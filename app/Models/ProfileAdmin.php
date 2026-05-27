<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileAdmin extends Model
{
    use HasFactory;

    protected $table = 'profile_admin';

    protected $fillable = [
        'user_id',
        'foto',
        'gender',
        'bio',
    ];

    // Relasi 1:1 ke User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}