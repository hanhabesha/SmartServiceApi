<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class favGroupItems extends Model
{
    protected $primaryKey = "favId";
    public $incrementing = false;
    //
    protected $keyType = 'string';
    protected $fillable = [
        'favId', 'userId', 'itemsGroupId',
    ];
    public function MenuItemGroup()
    {
        return $this->belongsTo('App\MenuItemGroup', 'itemsGroupId', 'itemsGroupId');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'userId', 'userId');
    }
}
