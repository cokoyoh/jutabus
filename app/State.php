<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = ['state']; //the state can take only two properties, available or booked

    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}
