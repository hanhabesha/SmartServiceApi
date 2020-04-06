<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerOrders extends Model
{
    protected $primaryKey = "orderId";
    public $incrementing = false;
    //
    protected $keyType = 'string';
    protected $fillable = [
        'orderId', 'quantity', 'itemId', 'userId', 'description', 'tableId', 'serviceProviderId',
    ];
}
