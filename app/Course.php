<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['name', 'description', 'image', 'type_id', 'slug'];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function reservations()
    {
        return $this->belongsToMany(Reservation::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
