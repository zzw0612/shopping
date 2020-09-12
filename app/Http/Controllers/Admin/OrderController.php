<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Order_info;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Order_item;
use App\Models\Admin\Logistics;
use App\Models\Admin\Order_history;

class OrderController extends Controller
{
    //未付款订单页面
    public function index()
    {
        $active = 2;
        $data = Order_info::select('order_num','create_time', 'price','payment_flag', 'user_id', 'contact_name',
         'contact_mobile', 'contact_address','status','type')->where('payment_flag',0)->orderBy('order_num', 'desc')->paginate(5);
         //1已付款 0 未付款
        return view('admin.order.order_info', compact('data','active'));
    }
//已付款，未处理payment_flag=1，status=1
public function index1()
{
    $active = 2;
    $data = Order_info::select('order_num','create_time', 'price','payment_flag', 'user_id', 'contact_name',
     'contact_mobile', 'contact_address','status','type')->where('status',1)->orderBy('order_num', 'desc')->paginate(5);
    
    return view('admin.order.order_info', compact('data','active'));
}
//已付款，配送中status=2
public function index2()
{
    $active = 2;
    $data = Order_info::select('order_num','create_time', 'price','payment_flag', 'user_id', 'contact_name',
     'contact_mobile', 'contact_address','status','type')->where('status',2)->orderBy('order_num', 'desc')->paginate(5);
    
    return view('admin.order.order_info', compact('data','active'));
}
//已付款，配送完成status=3
public function index3()
{
    $active = 2;
    $data = Order_info::select('order_num','create_time', 'price','payment_flag', 'user_id', 'contact_name',
     'contact_mobile', 'contact_address','status','type')->where('status',3)->orderBy('order_num', 'desc')->paginate(5);
    
    return view('admin.order.order_info', compact('data','active'));
}
//已付款，取消的订单status=4
public function index4()
{
    $active = 2;
    $data = Order_info::select('order_num','create_time', 'price','payment_flag', 'user_id', 'contact_name',
     'contact_mobile', 'contact_address','status','type')->where('status',4)->orderBy('order_num', 'desc')->paginate(5);
    
    return view('admin.order.order_info', compact('data','active'));
}
    //订单明细页面 参数 订单号
    public function order_item($id='o')
    {
        $where=[];
        if($id!='o'){
            $where=[['order_num',$id]];
        }

        $active = 2;
        $data = Order_item::select('id','order_num','product_id', 'price','quantity',
        'user_id','sku_id','option_value_key_group')->where($where)->orderBy('id', 'desc')->paginate(5);
        return view('admin.order.order_item', compact('data','active'));
    }
    //配送管理页面 参数 订单号
    public function logistics($id='o')
    {  $active = 2;
        $where=[];
        if($id!='o'){
            $where=[['order_num',$id]];
        }
        $data = Logistics::select('id','company_name','logistics_num', 'order_num','state',
        'contact_name','contact_mobile','contact_address')->where($where)->orderBy('id', 'desc')->paginate(5);
        return view('admin.order.logistics', compact('data','active'));
    }
    //配送状态管理
    public function logistics_state($order_num, $state)
    {
        $state = $state == 2 ? 3 : 2;
        if($state==2){
            $note='配送中';
        }else{
            $note='配送完成';
        }
        $list=[
            'order_num'=>$order_num,
            'status'=>$state,
            'note'=>$note,
            'update_user_id'=>$data['update_user_id']=session('admin')->id,
        ];
        Order_history::create($list);
        Logistics::where('order_num', $order_num)->update(['state' => $state]);
        Order_info::where('order_num', $order_num)->update(['status' => $state]);
        if ($state == 3) {
            return json_encode('200');
        } else {
            return json_encode('400');
        }
    }
    //订单配送添加
    public function logistics_add($order_num,$contact_name,$contact_mobile,$contact_address){
      //  $active = 2;
        return view('admin.order.logistics_add', ['order_num'=>$order_num,'contact_name'=>$contact_name,
        'contact_mobile'=>$contact_mobile,'contact_address'=>$contact_address,'active'=>2]);
    }
    //订单配送添加保存
    public function logistics_save(Request $request)
    {
        $data = $request->except(['_token']);
        $data['state']=2;
        $list=[
            'order_num'=>$data['order_num'],
            'status'=>$data['state'],
            'note'=>'配送中',
            'update_user_id'=>$data['update_user_id']=session('admin')->id,
        ];
        Order_history::create($list);
        Logistics::create($data);
        Order_info::where('order_num', $data['order_num'])->update(['status' => $data['state']]);
        return redirect('/admin/logistics/'.$data['order_num']);
    }
}