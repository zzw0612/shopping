<?php
namespace App\Models\Admin;
use Illuminate\Database\Eloquent\Model;

class Product_image extends Model{
    protected $table='product_image';
    const CREATED_AT = null;
    const UPDATED_AT = 'update_time';
    protected $fillable=['product_id','url','explain','update_user_id'];
    public function productinfo()
    {
      return $this->belongsTo('App\Models\Admin\Products','product_id','id');
       
    }
}