<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use DB;
class System_data extends Model
{ 
   
    //把$rememberTokenName清空，
    protected $rememberTokenName = '';
    protected $table = 'system_data_dict_sys';
    protected $fillable = ['dict_type', 'dict_code','dict_name','remark','flag_status','make_emp','make_date'];
    const CREATED_AT=NULL;
    const UPDATED_AT=NULL;
//
    public function dictinfo(){
        return $this->hasMany('App\Models\User\Note_data_head','data_dict_id','id');
       
    }

    public function userinfo(){
        return $this->belongsTo('App\Models\Admin\User','make_emp','id');
    }
}
