<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ['date', 'name', 'email', 'contact', 'message', 'service_id', 'inclusion_id'];

    public function service()
    {
        return $this->belongsTo(Service::class);
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
        return $this->belongsTo(Setting::class);
    }
}
