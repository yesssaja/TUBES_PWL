<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'user_id',
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->hasMany(ServiceImage::class, 'service_id');
    }
}