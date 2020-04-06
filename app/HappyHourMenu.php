<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class HappyHourMenu extends Model
{
    protected $primaryKey = "happyHourId";
    public $incrementing = false;
    protected $appends = ['isValid'];
    protected $fillable = [
        'happyHourId', 'serviceProviderId', 'discountPercent', 'description', 'start', 'end', 'isValid','recent'
    ];
    public function serviceProvider()
    {
        return $this->belongsTo('App\CHRLServiceProviders', 'serviceProviderId', 'serviceProviderId');
    }
    public function getIsValidAttribute()
    {
        $start = Carbon::parse($this->start);
        $end = Carbon::parse($this->end);
        $now = Carbon::now();
        if($this->recent){
            if ($end->gte($now)) {
                return true;
            }
        }
        return false;
    }


}
