<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_Detail extends Model
{
    protected $table = 'order_details';

    public function order()
    {
        return $this->belongsTo('App\Order', 'order_id');
    }
    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id');
    }
}
