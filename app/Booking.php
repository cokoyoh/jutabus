<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'car_id','user_id','days','cost'
    ];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
