<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Products;
use App\Models\Admin\Option_info;
use App\Models\Admin\Option_value;
use App\Models\Admin\Product_option_info;
use App\Models\Admin\Sku;
use App\Models\Admin\User;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OptionController extends Controller
{

    //商品规格分类
    public function index()
    {
        $active = 1;
        $data = Option_info::select('id', 'name', 'type')->orderBy('id', 'desc')->paginate(4);
        return view('admin.option.index', compact('data', 'active'));
    }
    public function option_del($id)
    {
        $data = Option_info::where('id', $id)->delete();
        return redirect('/admin/option');
    }
    public function option_save(Request $request)
    {
        $data = $request->except(['_token']);
        Option_info::insert($data);
        return redirect('/admin/option');
    }
    public function option_edit($id)
    {
        $active = 1;
        $data = Option_info::where('id', $id)->get();
        return view('admin/option/option_edit', compact('data', 'active'));
    }
    public function option_update(Request $request, $id)
    {
        $list = $request->except(['_token']);
        $data = Option_info::where('id', $id)->update($list);
        return redirect('/admin/option');
    }

    //商品规格分类value
    public function option_value($cateid = 0)
    {
        $active = 1;
        if ($cateid == 0) {
            $data = Option_value::select('id', 'name', 'option_id')->orderBy('id', 'desc')->paginate(5);
        } else {
            $where = [
                ['option_id', '=', $cateid],
            ];
            $data = Option_value::select('id', 'name', 'option_id')
                ->where($where)
                ->orderBy('id', 'desc')
                ->paginate(5);
        }
        return view('admin.option.option_value', compact('data', 'active'));
    }
    public function option_value_add($id = 0)
    {
        $active = 1;
        $where = [];
        if ($id != 0) {
            $where = [['id', $id]];
        }
        $data = Option_info::where($where)->get();
        return view('admin.option.option_value_add', compact('data', 'active'));
    }

    public function option_value_save(Request $request)
    {
        $data = $request->except(['_token']);
        Option_value::insert($data);
        return redirect('/admin/option_value');
    }

    public function option_value_del($id)
    {
        $data = Option_value::where('id', $id)->delete();
        return redirect('/admin/option_value');
    }

    //商品规格描述表
    public function product_option_info($id = 0)
    {
        $active = 1;
        $where = [];
        if ($id != 0) {
            $where = [['product_id', $id]];
        }
        $data = Product_option_info::select('id', 'product_id', 'option_id')->where($where)->orderBy('product_id', 'desc')->paginate(5);
        return view('admin.option.product_option_info', compact('data', 'active'));
    }

    public function product_option_info_add($id = 0)
    {
        $active = 1;
        if ($id == 0) {
            $list = Products::all(['id', 'name']);
        } else {
            $list = Products::select(['id', 'name'])->where('id', $id)->get();
        }

        $data = Option_info::all();
        return view('admin.option.product_option_info_add', compact('data', 'list', 'active'));
    }
    public function product_option_info_save(Request $request)
    {
        $data = $request->except(['_token']);

        //批量增加
        $datas = [];
        foreach ($data['option_id'] as $k => $v) {
            $d['product_id'] = $data['product_id'];
            $d['option_id'] = $v;
            array_push($datas, $d);
        }

        Product_option_info::insert($datas);
        return redirect('/admin/product_option_info/' . $data['product_id']);
    }
    public function product_option_info_del($id)
    {
        $data = Product_option_info::where('id', $id)->delete();
        return redirect('/admin/product_option_info');
    }

    //商品库存描述表
    public function sku($id = 0)
    {
        $active = 3;
        $where = [];
        if ($id != 0) {
            $where = [['product_id', $id]];
        }
        $data = sku::select('id', 'product_id', 'sku_json', 'quantity', 'price', 'option_value_key_group')->where($where)->orderBy('id', 'desc')->paginate(5);
        return view('admin.sku.index', compact('data', 'active'));
    }
    public function sku_add($id = 0)
    {
        if ($id == 0) {
            return back();
        }

        $data = Products::select('id', 'name')->where('id', $id)->first();
        $active = 3;

        // $list = Option_value::select('id', 'name', 'option_id')->get();
        return view('admin.sku.sku_add', compact('data', 'active')); //, 'list'
    }

    public function sku_save(Request $request)
    {
        $data = $request->except(['_token']);
        //过滤option开头的。--视图里约定的
        $options = array_filter($data, function ($k) {
            return substr($k, 0, strlen('option')) == 'option';
        }, ARRAY_FILTER_USE_KEY);

        $option_value_key_group = implode('_', $options); //获得7_11

        $sku_json = ''; //获得颜色:红 材料:皮
        //先获取所有的 规格值 例如 红 皮
        $opvs = Option_value::select(['name'])->whereIn('id', array_values($options))->get()->toArray(); //此处为二维数组
        $opvs1 = array_column($opvs, 'name'); //获取某一列的值 得一维数组
        // $opvs1=array_values($opvs); 获取箭头数组的值
        $i = 0;
        foreach ($options as $key => $value) {
            //获取value对应的 规格值的名字
            $sku_json .= ltrim($key, 'option') . ":" . $opvs1[$i] . " ";
            $i++;
        }
        $sku_json = trim($sku_json);
        $newdata = array_diff($data, $options); //去掉规格相关值
        $newdata['option_value_key_group'] = $option_value_key_group;
        $newdata['sku_json'] = $sku_json;


        Sku::insert($newdata);
        return redirect('/admin/sku');
    }


    //用户列表管理
    public function user()
    {
        // $data = User::select('id', 'user_name', 'nickname', 'email','enabled')->orderBy('id', 'desc')->paginate(5);
        $active = 4;
        $data = User::whereHas(
            'roleinfo',
            function ($query) {
                $query->where('user_roles.role', 'ROLE_USER');
            }
        )->select('id', 'user_name', 'nickname', 'email', 'enabled')->orderBy('id', 'desc')->paginate(5);

        return view('admin.user.index', compact('data', 'active'));
    }
    //管理员列表管理
    public function admin()
    {
        $active = 4;
        $data = User::whereHas(
            'roleinfo',
            function ($query) {
                $query->where('user_roles.role', 'ROLE_ADMIN');
            }
        )->select('id', 'user_name', 'nickname', 'email', 'enabled')->orderBy('id', 'desc')->paginate(5);

        return view('admin.user.admin', compact('data', 'active'));
    }
    //用户状态管理
    public function enabled($id, $enabled)
    {
        $status = $enabled == 1 ? 0 : 1;
        user::where('id', $id)->update(['enabled' => $status]);
        if ($status == 1) {
            return json_encode('200');
        } else {
            return json_encode('400');
        }
    }
}
