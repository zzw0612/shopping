<?php

namespace App\Models\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class User extends Model
{
  
    protected $table = "user";
   // protected $guarded=[];
   // protected $fillable = [];
    const CREATED_AT = 'register_time';
    const UPDATED_AT = null;
    protected $fillable = ['user_name', 'email','pwd','register_time'];


    
    public function roleinfo()
    {
      return $this->hasOne('App\Models\Admin\Role','username','user_name');
       
    }

}
