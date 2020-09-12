<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Option extends Model
{
    protected $table = "option_info";
    const UPDATED_AT = null;
    protected $fillable=['name','type'];
}
//本文件不要了 option——info 一致