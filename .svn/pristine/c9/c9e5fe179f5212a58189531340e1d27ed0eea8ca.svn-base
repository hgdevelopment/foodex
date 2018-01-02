<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $table = 'products';

    public function unit() {
    	return $this->belongsTo('App\unit','unit_id','id');
    }
    public function brand() {
    	return $this->belongsTo('App\Brand','product_brand','id');
    }

}
