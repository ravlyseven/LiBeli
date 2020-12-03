<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'description', 'photo'];

    public function order_detail()
    {
        return $this->hasMany('App\Order_Detail', 'product_id', 'id');
    }
}
