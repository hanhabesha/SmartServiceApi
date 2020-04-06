<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class favServiceProviders extends Model
{
    protected $primaryKey = "favId";
    public $incrementing = false;
    //
    protected $keyType = 'string';
    protected $fillable = [
        'favId', 'userId', 'serviceProviderId',
    ];
    public function serviceProvider()
    {
        return $this->belongsTo('App\CHRLServiceProviders', 'serviceProviderId', 'serviceProviderId');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'userId', 'userId');
    }
}
