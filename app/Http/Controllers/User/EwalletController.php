<?php
namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\User\Ewallet;
use App\Models\User\Account;


class EwalletController extends Controller                  //电子钱包
{
    public function ewallet(){                  //电子钱包显示页面
        $user_id=session('user')->id;
        $is_count = Ewallet::where('user_id',$user_id)->count();//此账号下的账户数
        if($is_count==0){
            $res=Null;
            // dump($res);
            return view('user.ewallet',compact('res','is_count'));
        }
        $res=Ewallet::select('id', 'amount','updtime','user_id')->where('user_id','=',$user_id)->get();
        $data=Account::select('id', 'amount','updtime', 'amount','user_id','source')->where('user_id','=',$user_id)->orderBy('updtime', 'desc')->get();
        
        // dump($res);
        return view('user.ewallet',compact('res','data','is_count'));
    }

//开通钱包，或充值
    public function ewallet_add($num=1000){                   //充值方法
        $data=[];
        $data['user_id']= session('user')->id ;
        $id= $data['user_id'];
        $data['amount']=$num;
        $data['username']=session('user')['user_name'];
        $data['source']='注册赠送';
        $count = Ewallet::where('user_id',$id)->count();
        // dd($count);
        if($count==0){
            $res=Ewallet::create($data);//开户
        }else{
            //充值
            $res=Ewallet::increment('amount',$num, ['user_id' =>$id]);
            $data['source']='充值';
        }
       
       /*  Ewallet::updateOrCreate(
            ['user_id' =>$id],
            ['amount' =>$num]
        ); */
        //
        
        if($res){
            $result=Account::create($data);
            return redirect('/user/ewallet');
        }
        return false;
    }
   
}
