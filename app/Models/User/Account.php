<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use DB;
class Account extends Model                 //获取评论点赞模型表
{ 
   
    //把$rememberTokenName清空，
    protected $rememberTokenName = '';
    protected $table = 'account';
    protected $fillable = ['id','username', 'amount','updtime','user_id','source'];
    const CREATED_AT=Null;
    const UPDATED_AT='updtime';

    public function userinfo(){
        return $this->belongsTo('App\Models\Admin\User','user_id','id');
    }
}
