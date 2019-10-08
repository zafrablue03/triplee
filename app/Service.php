<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'image', 'thumbnail'];

    public function reservations()
    {
        return $this->belongsToMany(Reservation::class);
    }

    public function images()
    {
        return $this->morphMany(ImageUpload::class, 'imageable');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
