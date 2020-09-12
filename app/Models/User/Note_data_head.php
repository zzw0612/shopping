<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use App\Models\User\Note_data_file;
use App\Models\User\System_data;
use DB;
class Note_data_head extends Model
{   
   
    //把$rememberTokenName清空，
    protected $rememberTokenName = '';
    protected $table = 'note_data_head';
    protected $fillable = ['id','note_content', 'data_dict_id','flag_delete','make_emp','modify_emp'];
    
    const CREATED_AT='make_date';
    const UPDATED_AT='modify_date';

    public function titleinfo(){
        return $this->belongsTo('App\Models\User\System_data','data_dict_id','id');
    }
    /** 例子  当order表中外键为user_id user表主键为uid  订单模型

        public function user()
        {
            return $this->belongsTo('Models\User', 'user_id', 'uid');
        }
     
     */
//改了
    public function fileinfo(){
        return $this->hasMany('App\Models\User\Note_data_file','note_data_id','id');
    }
/*
例子 在文章的模型 Article 中，则可以有如下的方法来关联评论。
public function comments(){
return $this->hasManay('Comment(这里是要关联的模型，这个例子是评论模型Comment)', 'article_id'(这里是关联外键的字段名--评论表里的，这个例子就是 article_id 字段), 'id'(对应关联模型的主键，这里的 id 是关联 article 表的id));
}

*/
    public function userinfo(){
        return $this->belongsTo('App\Models\Admin\User','make_emp','id');
    }
    public function clickinfo()
    {  
        return $this->hasMany('App\Models\User\Clicks','interaction_detail_id','id');
    }

}
