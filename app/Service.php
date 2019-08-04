<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'image'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
