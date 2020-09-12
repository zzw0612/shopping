<?php
namespace App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use DB;


class Comments extends Model{
    protected $table='comments';
    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'null';
    protected $fillable=['id','user_id','product_id','audi','stars'];
    public function commentsinfo()
    {
      return $this->belongsTo('App\Models\Admin\Comments','product_id','id');
       
    }
    public function userinfo()
    {
      return $this->belongsTo('App\Models\Admin\User','id');
       
    }
}