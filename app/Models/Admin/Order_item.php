<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class Order_item extends Model
{   
   
    //把$rememberTokenName清空，
    //protected $rememberTokenName = '';
    protected $table = 'order_item';
    protected $fillable = ['id','order_num','product_id','price','quantity','user_id','json_data','sku_id','option_value_key_group'];
    const CREATED_AT=null;
    const UPDATED_AT=null;
    public function orderinfo()
    {
        return $this->belongsTo('App\Models\Admin\Order_info', 'order_num','order_num');
    } 
    public function product()
    {
        return $this->belongsTo('App\Models\Admin\Products','product_id','id'); 
    }
    public function optioninfo()
    {
      return $this->belongsTo('App\Models\Admin\Option_info','option_value_key_group','id'); 
    }
    public function json_data(){
        return $this->BelongsTo('App\Models\Admin\Sku','sku_id','id');
    }
    
}
