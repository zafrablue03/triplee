<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = ['name', 'description', 'slug'];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function settings()
    {
        return $this->belongsToMany(Setting::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
