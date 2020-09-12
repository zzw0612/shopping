<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Option_value extends Model
{
    protected $table = "Option_value";
    const UPDATED_AT = null;
    protected $fillable=['id','name','option_id'];
    //改
    public function optioninfo()
    {
     
      return $this->belongsTo('App\Models\Admin\Option_info','option_id','id'); 
    }
 
}