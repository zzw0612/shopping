<?php
namespace App\Http\Controllers\User;

use App\Models\User\Cart;
use App\Models\Admin\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Option_info;
use App\Models\Admin\Option_value;

class CartController extends Controller
{
 
    public function cart(Request $request)

    {   
        $ses= session('user');
        $userscart = Cart::where('user_id',$ses['id'])->get();
        //处理规则值字符串
        foreach($userscart as $key=>$value){
          if(!empty($value['option_value_ids'])){
            $arr=explode("_",$value['option_value_ids']);
            $ops=Option_value::wherein('id',$arr)->get();
            $userscart[$key]['option']=$ops;
          }
          else{
            $userscart[$key]['option']=[];
          }
        }
      
        return view('user.cart', compact('userscart'));
    }
    public function addcart(Request $request){
      if(is_null(session('user')))
      {
        return response()->json(['data'=>'加入失败，请先登录']);
      }
        $data=[
            'product_id'=>$request->input('prid'),
            'option_value_ids'=>$request->input('ops'),
            'user_id'=>session('user')['id'],
            'num'=>$request->input('num')
        ];//return response()->json(['data'=>$data]);
        Cart::create($data);
        
      
        return response()->json(['data'=>'成功加入购物车']);
    }

    public function delcart($id){
      $res=Cart::where('id',$id)->delete();
      if($res){
        return redirect('/user/cart');
      }else{
          return back();
      }
    }
    
    
}
