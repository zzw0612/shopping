<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Option_info extends Model
{
    protected $table = "Option_info";
    const UPDATED_AT = null;
    const CREATED_AT = null;
    protected $fillable = ['id','name','type'];
    //ok
    public function optionvalue()
    {
        return $this->hasMany('App\Models\Admin\Option_value', 'option_id');
    } 
    
}