<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Contect extends Model
{   
   
    //把$rememberTokenName清空，
    protected $rememberTokenName = '';
    protected $table = 'contect';
    protected $fillable = ['name', 'user_id','mobile','contact_flag','address'];
    
    const CREATED_AT=NULL;
    const UPDATED_AT=NULL;

/* 

    public function getuserid(array $user_name){
        $user_id =  $this->where('user_name',$user_name)->first();
        $info=DB::table("contect")->where('user_id',$data['user_id'])->select()->first();
        return $info;
        
    }


    public function address(array $user_name){
        $user_id =  $this->where('user_name',$user_name)->first();
        $info=DB::table("contect")->where('user_id',$data['user_id'])->select()->first();
        if(!$info){
            return false;
        }else{
            return true;
        }
        
    } */
}
