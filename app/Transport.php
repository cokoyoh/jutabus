<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    protected $fillable = [
        'name_of_good','description','origin','destination','user_id','cost'
    ];
}
