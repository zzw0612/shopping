<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\Admin\User;
use App\Models\Admin\Role;
use Illuminate\Http\Request;


class RegisterController extends Controller {

    public function __construct() {
        //$this->middleware('guest');
    }

    public function showRegistrationForm(Request $request) {
        return view('auth.register');
    }

    public function register(Request $request) {
        
        try {
            // 规则
            // unique:user表示在使用默认看守器对应的库的user表中的user_name字段不能重复
            $rules = [
                'user_name' => 'required|string|max:10|unique:user',
                'email' => 'required|string|email|max:255',
                'pwd' => 'required|string|confirmed',
            ];
            // 自定义消息
            
            $messages = [
                'user_name.required' => '请输入用户名',
                'user_name.max' => '用户名的长度不能超过10个字符',
                'user_name.unique' => '用户名已存在',
                'email.required' => '请输入邮箱',
                'email.email' => '请输入正确的邮箱格式',
                'email.max' => '邮箱的长度不能超过255个字符',
                'pwd.required' => '请输入密码',
                
            ];
            
            $this->validate($request, $rules, $messages); //字段校验
            $data = $request->all();
            //保存数据
            $user = User::create([
                'user_name' => $data['user_name'],
                'email' => $data['email'],
                'pwd' => md5($data['pwd']),
            ]);  
            //注册时 添加角色信息
            if(!is_null($user)){
                 Role::create([
                    'username' => $user->user_name,
                    'role' =>'ROLE_USER',
                ]);
            }
           
          
            
            // 注册的用户让其进行登陆状态
            //Auth::login($user);
            //登录成功跳转
            return view('auth.login');
        } catch (Exception $validationException) {
            $message = $validationException->validator->getMessageBag()->first();
            return $message;
        }
    }
}