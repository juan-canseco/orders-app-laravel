<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Provider;

class Product extends Model
{

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function provider() {
        return $this->belongsTo(Provider::class);
    }

}
