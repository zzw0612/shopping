<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Sku extends Model
{
    protected $table = "sku";
    const UPDATED_AT = null;
    protected $fillable=['sku_json','product_id','quantity','price','option_value_key_group'];
    public function productinfo(){
        return $this->belongsTo('App\Models\Admin\Products','product_id','id'); 
    }
}