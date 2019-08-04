<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['name','slug','description', 'price'];

    public function types()
    {
        return $this->belongsToMany(Type::class);
    }


    public function getRouteKeyName()
    {
        return 'slug';
    }
}

