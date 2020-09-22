<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Customer;
use App\OrderDetails;

class Order extends Model
{
    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function orderDetails() {
        return $this->hasMany(OrderDetails::class);
    }
}
