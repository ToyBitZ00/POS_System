<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['product_id', 'product_name', 'price', 'size'])]
class Product extends Model
{
    public function orderDetails(){
        return $this->hasMany(OrderDetail::class);
    }
}
