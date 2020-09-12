<?php

namespace App\Models\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Article extends Model
{
    //

    protected $table = "article";
    protected $guarded=[''];
    protected $fillable = ['content','title','update_user_id','category','id'];
    const CREATED_AT = null;
    const UPDATED_AT = 'update_time';

    public function categoryinfo()
    {
      return $this->belongsTo('App\Models\Admin\Article_category','category','category_id');
       
    }
    public function userinfo()
    {
      return $this->belongsTo('App\Models\Admin\User','update_user_id','id');
       
    }
   

}
