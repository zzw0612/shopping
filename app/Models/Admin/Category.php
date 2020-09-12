<?php
namespace App\Models\Admin;
use Illuminate\Database\Eloquent\Model;

class Category extends Model{
    protected $table='product_category';
    const CREATED_AT = null;
    const UPDATED_AT = 'update_time';
    protected $fillable=['name','sort_order','description','image','update_user_id'];
}