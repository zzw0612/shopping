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


class UserController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function person(Request $request)

    {   
        return view('user.person');
    }
    public function safety(Request $request)

    {   
        return view('user.safety');
    }
    
    public function password(Request $request)

    {   
        return view('user.password');
    }
    //订单
    public function order(Request $request)

    {   
        return view('user.order');
    }
    
    public function updatepassword(Request $request)
    {   

        $rules = [
            'old_pwd' => 'required',
            'new_pwd'=>['required','same:pwd_confirmatio'],//不为空,两次密码是否相同
            'pwd_confirmatio' => 'required',
        ];
        // 自定义消息
        
        $messages = [
            'old_pwd' => '请输入旧密码',
            'new_pwd.required' => '请输入新密码',
            'new_pwd.same' => '确认密码与新密码不符',
            'pwd_confirmatio' => '请输入确认密码',
        ];
        $this->validate($request, $rules, $messages); //字段校验
        
        $pwd_confirmatio = DB::table('user')->where('id',session('user')['id'])->value('pwd');
        $data = $request->all();
        if(md5($data['old_pwd'])==$pwd_confirmatio){
            //数据库修改密码
            
            $password=DB::update("update user set pwd= ? where id= ? ",[md5($data['new_pwd']),session('user')['id']]);
            if($password){
                return view('auth.login');
                
            }else{
                return back()->with('error','发生错误');
            }
           
        }else{
            return back()->with('error','旧密码错误');
        }
    }
    
    
}
