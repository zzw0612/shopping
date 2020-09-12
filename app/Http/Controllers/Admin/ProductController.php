<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Category;
use App\Models\Admin\Products;
use App\Models\Admin\Product_image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    //商品
    public function product($cateid=0)
    {   
        if($cateid==0)
        {
            $data = Products::select('id','name','price','shop_price','quantity','category_id')->orderBy('id', 'desc')->paginate(5);
        }
        else{
            $where=[
                ['category_id','=',$cateid],
            ];
            $data = Products::select('id','name','price','shop_price','quantity','category_id')
            ->where($where)
            ->orderBy('id', 'desc')
            ->paginate(5);
        }
        $active=5;
        return view('admin/Product/product/product', compact('data','active'));
    }
    public function product_add($cateid=0)
    { $active=5;
        $where=[];
        if($cateid!=0){$where=[['id',$cateid]];}
        $list = Category::where($where)->get();
        return view('admin/Product/product/add', compact('list','active'));
    }
    public function product_save(Request $request)
    {
        $path='';
        if($request->hasFile('default_img')){
            $tmp = $request->file('default_img');
            $path=$tmp->store('products');
        };

        $data = $request->except(['_token']);
        $data['default_img']=$path;
        $data['update_user_id']=session('admin')->id;
        $data['create_user_id']=session('admin')->id;
        Products::create($data);
        return redirect('/admin/product');

    }
    public function product_edit($id)
    { $active=5;
        $data = Products::where('id', $id)->get();
        return view('admin/Product/product/edit', compact('data','active'));
    }
    public function product_update(Request $request, $id)
    {
        $list = $request->except(['_token']);
        $list['update_user_id']=session('admin')->id;
        $data = Products::where('id', $id)->update($list);
        return redirect('/admin/product');
    }

    public function product_del($id)
    {
        $data = Products::where('id', $id)->delete();
        return redirect('/admin/product');
    }

    //商品分类
    public function product_category()
    { $active=5;
        $data = Category::select('id','name','sort_order','image')->orderBy('id', 'desc')->paginate(5);
        return view('admin/Product/category/category', compact('data','active'));
    }
    public function product_category_save(Request $request)
    {
        $path='';
        if($request->hasFile('image')){
            $tmp = $request->file('image');
            $path=$tmp->store('product_categorys');
        };

        $data = $request->except(['_token']);
        $data['image']=$path;
        $data['update_user_id']=session('admin')->id;
        Category::create($data);

        return redirect('/admin/category');
    }
    public function product_category_edit($id)
    { $active=5;
        $data = Category::where('id', $id)->get();
        return view('admin/Product/category/edit', compact('data','active'));
    }
    public function product_category_update(Request $request, $id)
    {
        $list = $request->except(['_token']);
        $list['update_user_id']=session('admin')->id;
        $data = Category::where('id', $id)->update($list);
        return redirect('/admin/category');
    }
    public function product_category_del($id)
    {
        $data = Category::where('id', $id)->delete();
        return redirect('/admin/category');
    }

    public function product_image($prid=0)
    { $active=5;
        if($prid==0){
            $data = Product_image::orderBy('id', 'desc')->paginate(5);
        }else{
            $where=[
                ['product_id','=',$prid],
            ];
            $data =Product_image::where($where)
            ->orderBy('id', 'desc')
            ->paginate(5);
        }
        
        return view('admin/Product/product_image/product_image', compact('data','active'));
    }
    public function product_image_add($prid=0)
    { $active=5;
        $where=[];
        if($prid!=0){$where=[['id',$prid]];}
        $data = Products::where($where)->get();
        return view('admin/Product/product_image/add', compact('data','active'));
    }
    public function product_image_save(Request $request)
    {
    
        //多图上传
        $paths=[];
        $files=$request->file('url');
        foreach($files as $k=>$v){
            $path=$v->store('product_images');
            array_push($paths,$path);
        }
        //批量增加图片product_id','url','explain','update_user_id'
        $files=[];
        $product_id=$request->input('product_id');
        
        foreach($paths as $k=>$v){
            $file['url']=$v;
            $file['update_user_id']=session('admin')->id;
            $file['product_id']= $product_id;
            $file['explain']=$request->input('explain');
            $file['update_time']=date('Y-m-d H:i:s'); //日期
            array_push($files,$file);
        }

        Product_image::insert($files);//手动日期

        //Note_data_file::create($file);
        
        return redirect('/admin/product_image/'.$product_id);
    }
    public function product_image_edit($id)
    { $active=5;
        $data = Product_image::where('id', $id)->first();
        $list =[];
        if(!is_null($data)){
            $list = Products::where('id',$data['product_id'])->get();
        }
        return view('admin/Product/product_image/edit', compact('data', 'list','active'));
    }
    public function product_image_update(Request $request, $id)
    {
        $list = $request->except(['_token']);
        $data = Product_image::where('id', $id)->update($list);
        return redirect('/admin/product_image');
    }
    public function product_image_del($id)
    {
        //先删图
        $data = Product_image::where('id', $id)->delete();

        return redirect('/admin/product_image');
    }
}
