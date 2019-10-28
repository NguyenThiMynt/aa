<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Custormer extends Model
{
    protected $table = 'custormers';

    public function bill()
    {
        return $this->hasMany('App\Bill', 'id_custormer', 'id');
    }
}
