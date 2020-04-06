<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class CHRLServiceProviders extends Model
{
    protected $primaryKey = "serviceProviderId";
    public $incrementing = false;
    protected $appends = ['isOpen'];
    //
    protected $keyType = 'string';
    protected $fillable = [
        'serviceProviderId', 'serviceCatagoryId', 'isOpen', 'name', 'email', 'phone', 'description', 'webLink', 'logo', 'openningHour', 'closingHour',
    ];
    public function location()
    {
        return $this->hasOne('App\Location', 'serviceProviderId', 'serviceProviderId');
    }
    public function user()
    {
        return $this->hasMany('App\User', 'serviceProviderId', 'serviceProviderId');
    }
    public function serviceCatagory()
    {
        return $this->belongsTo('App\ServiceCatagories', 'serviceCatagoryId', 'serviceCatagoryId');
    }
    public function menuItems()
    {
        return $this->hasMany('App\MenuItems', 'serviceProviderId', 'serviceProviderId');
    }
    public function happyHourItem()
    {
        return $this->hasMany('App\HappyHourItem', 'serviceProviderId', 'serviceProviderId');
    }
    public function happyHourGroup()
    {
        return $this->hasMany('App\HappyHourItemGroup', 'serviceProviderId', 'serviceProviderId');
    }
    public function happyHourMenu()
    {
        return $this->hasMany('App\HappyHourMenu', 'serviceProviderId', 'serviceProviderId');
    }
    public function tables()
    {
        return $this->hasMany('App\Tables', 'serviceProviderId', 'serviceProviderId');
    }
    public function rating()
    {
        return $this->hasMany('App\SPRating', 'serviceProviderId', 'serviceProviderId');
    }
    public function getIsOpenAttribute()
    {
        $openningHour = Carbon::parse($this->openningHour);
        $closingHour = Carbon::parse($this->closingHour);
        $now = Carbon::now();
        if ($now->gte($openningHour) && $now->lte($closingHour)) {
            return true;
        }return false;
    }
}
