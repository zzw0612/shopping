<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use DB;
class Note_data_file extends Model
{   
   
    //把$rememberTokenName清空，
    protected $rememberTokenName = '';
    protected $table = 'note_data_attachment_detail';
    protected $fillable = ['id', 'note_data_id','attachment_name','attachment_path','make_emp','make_date'];
    
    const CREATED_AT='make_date';
    const UPDATED_AT=NULL;


}
