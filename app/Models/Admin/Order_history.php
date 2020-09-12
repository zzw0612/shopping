<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Order_history extends Model
{
    protected $table = "order_history";
    const CREATED_AT = 'create_time';
    const UPDATED_AT = null;
    protected $fillable = ['order_num','status','note','update_user_id','create_time'];
}