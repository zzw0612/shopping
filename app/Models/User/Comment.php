<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use DB;
class Comment extends Model                 //获取评论点赞模型表
{ 
   
    //把$rememberTokenName清空，
    protected $rememberTokenName = '';
    protected $table = 'note_data_interaction_detail';
    protected $fillable = ['note_data_id', 'commentary_description','data_type','make_emp','make_date'];
    const CREATED_AT='make_date';
    const UPDATED_AT=NULL;

    public function userinfo(){
        return $this->belongsTo('App\Models\Admin\User','make_emp','id');
    }
}
