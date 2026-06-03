<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Service extends Model
{
    protected $fillable = [
        'pelamar_id',
        'freelancer_name',
        'service_name',
        'category',
        'price',
        'location',
        'description',
        'work_experience',
        'languages',
        'skills',
        'whatsapp',
        'email',
    ];

    protected $casts = [
        'languages' => 'array',
        'price' => 'integer',
    ];

   public function pelamar()
    {
        return $this->belongsTo(User::class, 'pelamar_id');
    }

    public function images()
    {
        return $this->hasMany(ServiceImage::class, 'service_id');
    }
}