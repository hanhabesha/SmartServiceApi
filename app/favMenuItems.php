<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class favMenuItems extends Model
{
    protected $primaryKey = "favId";
    public $incrementing = false;
    //
    protected $keyType = 'string';
    protected $fillable = [
        'favId', 'userId', 'itemId',
    ];
    public function menuItem()
    {
        return $this->belongsTo('App\MenuItems', 'itemId', 'itemId');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'userId', 'userId');
    }
}
