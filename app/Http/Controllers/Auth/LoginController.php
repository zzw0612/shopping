<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Admin\User;

class LoginController extends Controller {
    /**
     * 自动调用guest中间件，guest中间件文件在app/Http/Middleware/RedirectIfAuthenticated.php,
     * 用于如果已经在登录状态时处理，默认的guest中间件处理方式是如果用户是登录状态的话跳转到/home页面
     *
     * @return void
     */
    public function __construct() {
       // $this->middleware('guest')->except('logout');
    }
    /**
     * [showLoginForm 登录展示页面]
     * @AuthorHTL wangjian
     * @DateTime  2018-12-19T15:17:55+0800
     * @param     Request                  $request [description]
     * @return    [type]                            [description]
     */
    public function showLoginForm(Request $request) {
        if(is_null(session('user')))  {
            //前台用户登录页面
            return view('auth.login');
        }                  
        else{
            return redirect('/user/index');
        }
        
    }
    /**
     * [login 登录逻辑]
     * @AuthorHTL wangjian
     * @DateTime  2018-12-19T15:18:10+0800
     * @param     Request                  $request [description]
     * @return    [type]                            [description]
     */
    public function login(Request $request) {
        try {
            //使用laravel的php artisan make:auth命令生成的登录视图默认传的是email，这里我将email改成了user_name
            // 规则
            $rules = [
                'user_name' => 'required|string',
                'pwd' => 'required|string',
            ];
            // 自定义消息
            $messages = [
                'user_name.required' => '请输入用户名',
                'pwd.required' => '请输入密码',
            ];
            //字段校验
            $this->validate($request, $rules, $messages);
            
            $data = $request->all();
            $user=User::where([
                ['user_name',$data['user_name']] ,
                ['pwd', md5($data['pwd'])]
            ])->first();
            
                if(!is_null($user)){
            //判断是否是会员角色
               $role=$user->roleinfo->role; 
               if($role!='ROLE_USER'){
                   return back()->with('error','登录失败-角色不符');
               }
                // 登录成功
                //return '登录成功';
                unset($user['password']);
                session(['user'=>$user]);
                // return $data0 = $request->session()->all();
                return redirect('user/index');
            } else {
                //登录失败(用户名或密码错误)
                //return redirect('/login');
                return back()->with('error','登录失败-用户名或密码错误');
               
            }
        } catch (ValidateException $validationException) {
            $message = $validationException->validator->getMessageBag()->first();
            return message;
        }
    }
    //登录

    /**
     * [logout 退出登录]
     * @AuthorHTL wangjian
     * @DateTime  2018-12-19T15:21:34+0800
     * @param     Request                  $request [description]
     * @return    [type]                            [description]
     */
    public function logout() {
        if(session::has('user')){         
            session::forget('user');         
            return redirect("/");         
        }else{
            return back()->with('注销失败，请登录!');
        }  
    }
}