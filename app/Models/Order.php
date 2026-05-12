<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['order_id', 'user_id', 'nickname', 'total_price', 'order_date', 'status'])]
class Order extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function orderDetails(){
        return $this->hasMany(OrderDetail::class);
    }
}
