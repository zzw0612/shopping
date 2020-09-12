<?php

namespace App\Http\Controllers\Admin;

// use App\Http\Requests\LoginRequest;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\Admin\User;

use Hash;

class LoginController extends Controller
{
    public function index(){                           //后台首页
        return view('admin/index/index');
    }
    public function login(){    
        if(is_null(session('admin')))  {
             //后台管理员登录页面
        return view('admin/index/login');
        }                  
       else{
        return redirect('/admin/index');
       }
    }

    public function logincheck(Request $request){           //验证登录方法
              
        $messages = [
            'username.required' => '用户名不能为空！',
            'password.required' => '密码不能为空！',          
        ]; 
        $this->validate($request,[
            'username' => 'required',
            'password' => 'required',
        ],$messages);   //错误提示errors

        $data=$request->all();
   
       $user= User::where([
                ['user_name','=',$data['username']],
                ['pwd','=',md5($data['password'])],
           ])->first();

        if(!is_null($user)){   
            $role=$user->roleinfo->role;
            if($role!='ROLE_ADMIN'){
                return back()->with('error','登录失败-角色不符');
            }     
             unset($user['password']);
             session(['admin'=>$user]);
             return redirect('/admin/index')->with('success','登录成功');
        }else{
            return back()->with('error','登录失败，请重新登录!'); //error
           // return back()->withErrors(['登录失败','第二个错误']); //errors 多错
        }
    }

    public function logout(){                               //后台退出登录方法
        if(session::has('admin')){         
           session::forget('admin');         
           return redirect("/admin/login");         
        }else{
            return redirect()->back()->with('error','注销失败，请登录!');
        }
    }


}
