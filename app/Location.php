<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    
     protected $fillable = [
        'address', 'serviceProviderId', 'long', 'lat'
    ];
}
