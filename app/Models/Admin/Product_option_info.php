<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Product_option_info extends Model
{
    protected $table = "product_option_info";
    const UPDATED_AT = null;
     public function productinfo()
    {
      return $this->belongsTo('App\Models\Admin\Products','product_id','id'); 
    } 
/*     public function categoryinfo1()
    {
      return $this->belongsTo('App\Models\Admin\Option','option_id','id'); 
    } */
    public function optioninfo()
    {
      return $this->belongsTo('App\Models\Admin\Option_info','option_id','id'); 
    } 
}