<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\Provider;

class Category extends Model
{
    public function products() {
        return $this->hasMany(Product::class);
    }

    public function providers() {
        return $this->hasMany(Provider::class);
    }
}
