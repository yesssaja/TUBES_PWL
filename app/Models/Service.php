<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
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
    ];

    public function images()
    {
        return $this->hasMany(ServiceImage::class, 'service_id');
    }
}