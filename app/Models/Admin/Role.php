<?php

namespace App\Models\Admin;


use Illuminate\Database\Eloquent\Model;


class Role extends Model
{
    protected $table = "user_roles";
    public $primaryKey = 'user_role_id';
    protected $fillable=['user_role_id','username','role'];
    const CREATED_AT =null;
    const UPDATED_AT = null;
}
