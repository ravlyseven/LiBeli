<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['status'];

    public function order_detail()
    {
        return $this->hasMany('App\Order_Detail', 'order_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    public function seller()
    {
        return $this->belongsTo('App\User', 'seller_id');
    }
}
