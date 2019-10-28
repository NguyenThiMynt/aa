<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable=['name','description','image','category'];

    public function product()
    {
        return $this->hasMany('App\Product', 'id_category', 'id');
    }
}
