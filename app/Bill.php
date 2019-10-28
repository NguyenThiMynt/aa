<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bills';

    public function cart()
    {
        return $this->belongsTo('App\cart', 'id_cart', 'id');
    }

    public function custormer()
    {
        return $this->belongsTo('App\Custormer', 'id_custormer', 'id');
    }


}
