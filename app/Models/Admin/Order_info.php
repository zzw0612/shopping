<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Order_info extends Model
{
    protected $table = "order_info";
    protected $fillable = ['order_num','price','payment_flag','user_id','contact_name','contact_mobile','contact_address','status','type','create_time'];
    const CREATED_AT='create_time';
    const UPDATED_AT='create_time';
    public function userinfo()
    {
      return $this->belongsTo('App\Models\Admin\User','user_id','id');
       
    }
    public function orderitems()
    {
        return $this->hasMany('App\Models\Admin\Order_item', 'order_num','order_num');
    } 
}