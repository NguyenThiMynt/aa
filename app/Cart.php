<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';

    public function product()
    {
        return $this->belongsToMany('App\Product', 'id_product', 'id');
    }

    public function bill()
    {
        return $this->hasOne('App\bill', 'id_cart', 'id');
    }
}
