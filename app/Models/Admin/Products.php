<?php
namespace App\Models\Admin;
use Illuminate\Database\Eloquent\Model;


class Products extends Model{
    protected $table='product';
    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'update_time';
    protected $fillable=['id','name','category_id','explain','general_explain','discount',
    'shop_price','price','external_id','quantity','hot','product_status','inventory_flag',
    'default_img','update_user_id','create_user_id'];
    public function categoryinfo()
    {
      return $this->belongsTo('App\Models\Admin\Category','category_id','id');
       
    }
    //规格 多对多
    public function option()
    {
      return $this->belongsToMany('App\Models\Admin\Option_info', 'Product_option_info', 'product_id', 'option_id');
    }
    public function images()
    {
        return $this->hasMany('App\Models\Admin\Product_image', 'product_id');
    } 
    public function comments()
    {
        return $this->hasMany('App\Models\Admin\Comments', 'product_id');
    } 
}