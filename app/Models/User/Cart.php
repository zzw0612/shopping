<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Cart extends Model
{   
   
    //把$rememberTokenName清空，
    //protected $rememberTokenName = '';
    protected $table = 'cart';
    protected $fillable = ['id','product_id','option_value_ids','user_id','num','mark_time'];
    const CREATED_AT='mark_time';
    const UPDATED_AT=null;
    public function product()
    {
        return $this->belongsTo('App\Models\Admin\Products','product_id','id'); 
    }
    
}
