<?php

namespace App\Http\Controllers\Admin;

// use App\Http\Requests\LoginRequest;
//use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use Illuminate\Support\Facades\Session;
use App\Models\Admin\User;
use App\Models\Admin\Article_category;
use App\Models\Admin\Article;
use Hash;

class ArticleController extends Controller
{

    public function index(){                            //后台首页
      
        return view('admin/index/index');
    }


    public function article($cateid=0){  
      //后台文章列表页面
     
      if($cateid==0){
        $article=Article::select('id','title','update_time','update_user_id','category')->orderBy('id', 'desc')->paginate(5);//保留关联外表的字段
      }
      else{
        $where=[
            ['category','=',$cateid],
        ];
        $article=Article::select('id','title','update_time','update_user_id','category')->where($where)->orderBy('id', 'desc')->paginate(5);//保留关联外表的字段
      }

        
        return view('admin/index/article',['data'=>$article,'active'=>6]);
    }

    public function article_cate(){                         //后台文章分类页面
      
        $article_cate=Article_category::select('category_id','category_name','update_user_id','update_time')->orderBy('category_id', 'desc')->paginate(5);
        return view('admin/index/article_cate',['article_cate'=>$article_cate,'active'=>6]);
    }


    public function article_add(){                          //后台文章添加页面
      
        $select=Article_category::select('category_name','category_id')->get();
        return view('admin/index/article_add',['select'=>$select,'active'=>6]);
    }




    public function article_cate_add(){     //后台文章分类添加页面
       
        return view('admin/index/article_cate_add')->with('active',6);
        
    }

    public function article_cate_save(Request $request){        //后台文章分类添加方法
        $this->validate($request,[
            'category_name'=>'required',
        ]);
     
        $data1=[
            'update_user_id'=>session('admin')->id,
            'category_name'=>$request->input('category_name'),
        ];
        $res=Article_category::create($data1);
        if($res){
            return redirect()->route('admin.index.article_cate');
        }else{
            return redirect()->back()->with('error','添加失败，请重新尝试!');
        }
    }




    public function article_save(Request $request){                 //后台文章添加方法
        $this->validate($request,[
            'content'=>'required',
            'category'=>'required',
            'title'=>'required',
        ]);
        $user=session('admin');
        $data=json_decode(json_encode($user,true),true);
        $data1=[
            'content'=>request('content'),
            'title'=>request('title'),
            'update_user_id'=>$data['id'],
            'category'=>request('category'),
        ];
        $res=Article::create($data1);

        if($res){
            return redirect()->route('admin.index.article');
        }else{
            return redirect()->back()-error();
        }
        // if(is_null($request)){
        //     return redirect()->back()->with('error','添加失败，请重新尝试!');
        // }

    }

 //文章修改方法
    public function article_edit(Request $id){
        $res=session('admin');
        $data=json_decode(json_encode($res,true),true);
        $id=(int)$id->input('id');                  //传过来的文章ID
        $msg=Article::where('id','=',$id)->get();   //查询文章的内容
        $msg=json_decode($msg,true);                //collection对象转换成数组
        // dd($msg[0]['category']);
        $select=Article_category::pluck('category_name','category_id');//查询的文章分类
        $cate=Article_category::where('category_id',$msg[0]['category'])->get();//根据文章的分类ID查询分类名称
        $cate=json_decode(json_encode($cate,true),true);
        Session(['article_id'=>$id]);
        $active=6;
        return view('admin/index/article_edit',compact('data','msg','cate','select','active'));
    }


    public function article_edit_save(Request $request){                //修改文章保存方法
        $this->validate($request,[
            'title'=>'required',
            'category'=>'required',
            'content'=>'required',
        ]);
        // dd($request);
        // dd(json_decode(json_encode(session('user'),true),true)['user_name']);

        $data=[
            'title'=>request('title'),
            'category'=>request('category'),
            'content'=>request('content'),
            'update_user_id'=>json_decode(json_encode(session('user'),true),true)['id'],
        ];
        // dd($data);
        $res=Article::where('id','=',session('article_id'))->update($data);
        // dd($res);
        if($res){
            session()->pull('article_id',session('article_id'));
            // dd(session('article_id'));
            return redirect()->route('admin.index.article');
        }else{
            return redirect()->back()->with('error','修改失败，请重新尝试!');
        }

    }



    

    public function article_del($id){                   //文章删除方法
        // dd($id);
        $res=Article::where('id','=',$id)->delete();
        if($res){
            return redirect()->route('admin.index.article');
        }else{
            return redirect()->error();
        }
    }



    public function article_cate_del($id){           //文章分类删除方法
        $res=Article_category::where('category_id','=',$id)->delete();
        if($res){
            return redirect()->route('admin.index.article_cate');
        }else{
            return redirect()->error();
        }
    }





}
