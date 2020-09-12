<?php
namespace App\Http\Controllers\User;


use App\Models\Admin\Order_item;
use App\Models\Admin\Order_info;
use App\Models\Admin\Products;
use App\Models\Admin\Option_info;
use App\Models\Admin\Option_value;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
 
    public function order_item(Request $request)
    {   
        $ses= session('user');
        $order_item = Order_item::where('user_id',$ses['id'])->get();
        //处理规则值字符串
        foreach($order_item as $key=>$value){
          if(!empty($value['option_value_key_group'])){
            $arr=explode("_",$value['option_value_key_group']);
            $ops=Option_value::wherein('id',$arr)->get();
            $order_item[$key]['option']=$ops;
          }
          else{
            $order_item[$key]['option']=[];
          }
        //   return $order_item[$key]['option'];
        }
        return view('user.order', compact('order_item'));
    }
    //未付款
    public function order(){
      $state=0;
      $ses= session('user');
      $data = Order_info::select('order_num','create_time', 'price','payment_flag', 'user_id', 'contact_name',
      'contact_mobile', 'contact_address','status','type')->where([
        ['user_id',$ses['id']],
        ['payment_flag',0],
        ['status',0]
        ])->orderBy('order_num', 'desc')->paginate(5);
      return view('user.order.order', compact('data','state'));
    }
    //已付款-- 待发货1 已发货2 已收货3
    public function order1($state=1){
    
      $ses= session('user');
      $data = Order_info::select('order_num','create_time', 'price','payment_flag', 'user_id', 'contact_name',
      'contact_mobile', 'contact_address','status','type')->where([
        ['user_id',$ses['id']],
        ['payment_flag',1],
        ['status',$state]
        ])->orderBy('order_num', 'desc')->paginate(5);
      return view('user.order.order', compact('data','state'));
    }
    //取消的
    public function order4(){
      $state=4;
      $ses= session('user');
      $data = Order_info::select('order_num','create_time', 'price','payment_flag', 'user_id', 'contact_name',
      'contact_mobile', 'contact_address','status','type')->where([
        ['user_id',$ses['id']],
        ['status',4]
        ])->orderBy('order_num', 'desc')->paginate(5);
      return view('user.order.order', compact('data','state'));
    }
    public function orderdel($ordernum)
    {   
        $del =Order_info::where('order_num',$ordernum)->update(['status' => 4]);
        //return '订单删除成功';
        return redirect()->route('order');
    }
    
}
