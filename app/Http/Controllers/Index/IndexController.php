<?php

namespace App\Http\Controllers\Index;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Models\Admin\Products;
use App\Models\Admin\Product_image;
use App\Models\Admin\Product_option_info;
use App\Models\Admin\Option_info;
use App\Models\Admin\Option_value;
use App\Models\Admin\Comments;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {   
        //获取商品栏目
        $product_category = Category::select('id','name','sort_order','image')->orderBy('id', 'asc')->take(9)->get();
        return view('index.index',['product_category'=>$product_category]);
    }
    //根据分类去找商品列表
    public function category($cateid)
    {
        //看了又看
       $browse=Products::select('name','shop_price','default_img')->orderBy('id', 'DESC')->take(3)->get();
        $product=Products::select('id','name','shop_price','default_img')->where('category_id',$cateid)->orderBy('id', 'desc')->paginate(8);
        return view('index.category',compact('product','browse'));
    }
    public function introduction($id)
    {   
       //$id='933';
        //获取商品详情
        $product=Products::where('id',$id)->first();//一条
        //获取商品图片
        $where=[
            ['product_id','=',$id],
        ];
        $product_image=Product_image::where($where)->get();
       //看了又看
       $browse=Products::select('name','shop_price','default_img')->orderBy('id', 'DESC')->take(3)->get();
        //获取评论
        $comments=Comments::where($where)->paginate(8);
        //return $option;
        return view('index.introduction',compact('product','product_image','comments','browse'));//,'option'
    }
    public function productsByCateid(Request $request){
        $cateid=$request->input('cateid');
        $product=Products::select('id','name')->where('category_id',$cateid)->take(10)->get();//取前10条
        return response()->json($product);
    }



    
}
