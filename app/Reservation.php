<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ['date', 'name', 'email', 'contact', 'message', 'venue', 'pax', 'service_id', 'set_id', 'inclusion_id', 'is_approved'];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    public function scopeApproved($query)
    {
        return $query->whereIsApproved(true);
    }

    public function scopePending($query)
    {
        return $query->whereIsApproved(false);
    }
    
    public function setting()
    {
        return $this->belongsTo(Setting::class, 'set_id');
    }

    public function getCourseArray($course)
    {
        $val_arr = [];
        foreach($course as $array)
        {
            foreach($array as $key => $val)
            {
                $value = $val;
                array_push($val_arr, $value);
            }
        }
        return $val_arr;
    }
}
