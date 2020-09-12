<?php

namespace App\Models\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Article_category extends Model
{
    //

    protected $table = "article_category";
    protected $guarded=[''];
    protected $fillable = ['update_user_id','category_name','cateogry_id'];
    const CREATED_AT = null;
    const UPDATED_AT = 'update_time';
    public $primaryKey = 'category_id';
    public function userinfo()
    {
      return $this->belongsTo('App\Models\Admin\User','update_user_id','id');
       
    }
}
