<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function order_detail()
    {
        return $this->hasMany('App\Order_Detail', 'order_id', 'id');
    }
}
