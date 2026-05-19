<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceImage extends Model
{
    protected $fillable = [
        'service_id',
        'image',
    ];

    protected $appends = [
        'image_url',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return asset('images/no-image.png');
        }

        if (str_starts_with($this->image, 'http://') || str_starts_with($this->image, 'https://')) {
            return $this->image;
        }

        if (file_exists(public_path($this->image))) {
            return asset($this->image);
        }

        return asset('storage/' . $this->image);
    }
}