<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\Note_data_head;
use App\Models\User\Note_data_file;
use App\Models\User\System_data;
use App\Models\User\Comment;
use App\Models\User\Clicks;


class NoteController extends Controller
{

    public function note($data_dict_id=0){              //用户动态页面  1、有无话题ID分类
        if($data_dict_id==0){
            $data=Note_data_head::select('id','note_content','data_dict_id','make_emp','make_date')->orderBy('make_date', 'desc')->paginate(12);//保留关联外表的字段
            $clicks=Clicks::select('interaction_detail_id','make_emp')->get();
            $comment=Comment::select('note_data_id','make_emp')->where('data_type','=',3)->get();
            $note=0;
        }
        else{
            $where=[
                ['data_dict_id','=',$data_dict_id],
                // ['flag_delete','=',0],
            ];
            $data=Note_data_head::select('id','note_content','data_dict_id','make_emp','make_date')->where($where)->orderBy('make_date', 'desc')->paginate(12);//->paginate(12);//保留关联外表的字段
            // dd($data);
            $clicks=Clicks::select('interaction_detail_id','make_emp')->get();
            $comment=Comment::select('note_data_id','make_emp')->where('data_type','=',3)->get();
            $note=1;
        }
        // dump($data);
        // $count=0;
        return view('index.note.note',['data'=>$data,'clicks'=>$clicks,'comment'=>$comment,'note'=>$note,'data_dict_id'=>$data_dict_id]);
    }

    public function note_add($data_dict_id=0){            //用户动态添加页面
        return view('user.note.note_add',['data_dict_id'=>$data_dict_id]);
    }


    public function note_save(Request $request){            //用户动态添加保存
        $messages = [
            'content' => '动态内容不能为空！',
        ];
        $this->validate($request,[
            'content'=>'required',
        ]);

        $data = $request->except(['_token']);
        $data['note_content']=$request->content;
        $data['make_emp']=session('user')->id;
        //添加  存图
        $res=Note_data_head::create($data);

        if($res){
            //多图上传
            $paths=[];
            $files=$request->file('img');
            foreach($files as $k=>$v){
                $path=$v->store('note');
                array_push($paths,$path);
            }
            //批量增加图片
            $files=[];
            foreach($paths as $k=>$v){
                $file['note_data_id']=$res->id;
                $file['attachment_name']=$k;
                $file['make_emp']=session('user')->id;
                $file['attachment_path']=$v;
                $file['make_date']=date('Y-m-d H:i:s'); //日期
                array_push($files,$file);
            }

            Note_data_file::insert($files);//手动日期

            //Note_data_file::create($file);
            
            return redirect('/user/user_note');
          
        }else{
           return back();
        }         
        
        //dump('文件上传');
        //1. 检测是否有文件上传
            //2. 创建文件上传对象
            //3.执行上传
        
    }

    public function user_note(){                        //用户个人动态发表历史
        $user_id=session('user')['id'];
        $data=Note_data_head::select('id','note_content','data_dict_id','make_emp','make_date')->where('make_emp','=',$user_id)->orderBy('make_date', 'desc')->paginate(4);//保留关联外表的字段
        // dd($data);
        return view('user.note.user_note',['notes'=>$data]);
    }

    
    public function dict_laber(){                               //标签列表

        $data=System_data::select('id','dict_name','dict_type','dict_code','remark','make_emp','make_date')->where('dict_type','=',10)->orderBy('make_date', 'desc')->get();


        return view('index.note.dict_laber',['data'=>$data]);
    }



    public function dict_topic(){                                //话题列表
        $data=System_data::select('id','dict_name','dict_type','dict_code','remark','make_emp','make_date')->where('dict_type','=',11)->orderBy('make_date', 'desc')->paginate(4);


        return view('index.note.dict_topic',['data'=>$data]);
    }



    public function note_detail($note_data_id){                   //动态详情
        $where=[
            ['note_data_id','=',$note_data_id],
            ['data_type','=',3],
        ];
        $data=Note_data_head::select('id','note_content', 'data_dict_id','flag_delete','make_emp','make_date')->where('id','=',$note_data_id)->get();
        $imgs=Note_data_file::select('attachment_path')->where('note_data_id','=',$note_data_id)->get();
        // $imgs=$imgs->toArray();
        // dd($imgs);
        // $img=[];
        // dd($img);
        $comment=Comment::select('note_data_id', 'commentary_description','data_type','make_emp','make_date')->where($where)->orderBy('make_date', 'desc')->get();
        return view('index.note.note_detail',['data'=>$data,'imgs'=>$imgs,'comment'=>$comment]);
    
    }
       



    public function note_del($note_id){                         //动态删除
        $res=Note_data_head::where('id','=',$note_id)->delete();
        if($res){
            return redirect('/user/user_note');
        }else{
            return false;
        }
    }

    public function click_add(Request $request){                //动态点赞方法
        $note_data_id=$request->all();
        unset($note_data_id['_token']);
        // dd($note_data_id);
        $data=[];
        
        $data['interaction_detail_id']=$note_data_id['id'];
        // return json_encode($id);
        $data['make_emp']=session('user')->id;
        $res=Clicks::create($data);
        // dd($res);
        if($res){
            $click=[];
            $click['note_data_id']=$note_data_id['id'];
            $click['make_emp']=session('user')->id;
            $click['data_type']=1;
            $click['commentary_description']='点赞';
            $result=Comment::create($click);
            if($result){
                return json_encode('点赞成功');
            }
        }
        
    }


    public function common_add(Request $request){               //动态评论方法
        $common=$request->all();
        unset($common['_token']);
        // dd($note_data_id);
        $data=[];
        
        $data['note_data_id']=$common['id'];
        // return json_encode($id);
        $data['make_emp']=session('user')->id;
        $data['data_type']=3;
        $data['commentary_description']=$common['content'];
        $res=Comment::create($data);
        // dd($res);
        if($res){
            return json_encode('评论成功');
        }
    }


}
