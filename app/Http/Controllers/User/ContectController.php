<?php
namespace App\Http\Controllers\User;

use App\Models\User\Contect;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ContectController extends Controller
{
 
    public function contect(Request $request)

    {   
        $ses= session('user');
        $usersaddress = Contect::where('user_id',$ses['id'])->get();
        return view('user.contect', ['usersaddress' => $usersaddress]);
    }
    public function address(Request $request)
    {   
        //获取session数据
        $ses= session('user');
        $rules = [
            'name' => 'required|string',
            'mobile' => 'required|string',
            "address"=>'required|string'
        ];
        // 自定义消息
        $messages = [
            'name' => '请输收货人名字',
            'mobile' => '请输收货人电话号码',
            "address"=>'请输收货地址',
        ];
        //字段校验
        $this->validate($request, $rules, $messages);
        $data = $request->all();
        //return $data;
        //return $ses;
        $address = Contect::create([
            'user_id' => $ses['id'],
            'name' => $data['name'],
            'mobile' => $data['mobile'],
            'address' => $data['address'],
        ]);
        if(!empty($address)){
            //return '地址添加成功';
            return redirect()->route('contect');
        } else {
            //return '地址添加失败';
            return redirect()->route('contect');
        }
        

    }
    //删除地址
    public function del($id)
    {   
        $del =Contect::where('id',$id)->delete();
        //return '地址删除成功';
        return redirect()->route('contect');
    }
    
}
