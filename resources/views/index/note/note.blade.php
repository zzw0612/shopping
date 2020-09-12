@extends('index.public.base1')
@section('style')
 <link href="/user/css/hmstyle.css" rel="stylesheet" type="text/css"> 
 <!-- <link type="text/css" href="/user/css/colstyle.css" rel="stylesheet" />  -->
 <link rel="stylesheet" href = "/user/font-awesome-4.7.0/css/font-awesome.min.css" >  
 <meta name="_token" content="{{ csrf_token() }}">
<style>
.imgheight{height:200px;overflow:hidden}

.icon:before {
    content: '\f004';
    font-family: FontAwesome;
}
.tb-btn a {
    margin-right: 0px;
    float: left;
    overflow: hidden;
    position: relative;
    width: 100%;
    height: 25px;
    line-height: 25px;
    background-color: #FFEDED;
    color: black;
    font-size: 14px;
    text-align: center;
}
.tb-btn a:hover {
	background-color:#5eb95e;
	transition:0.5s;
}

.tb-btn a {
    width: 98px;
    border: 1px solid #3bb4f2;
}
.font20{
	font-size:20px;
}
</style>
@endsection
@section('main')

<div class="am-container  ">
	<div class="shopTitle ">
		<h4>动态 /<a href="/index/dict_topic"  class="font20"> 话题 </a>
		 <!--/ <a href="/index/dict_laber" class="font20"> 标签 </a> --> </h4>
		<span class="more ">
			@if($note==0)
			<div class="clearfix tb-btn tb-btn-buy theme-login position">
				<a href="/user/note_add" id="study" >发表动态</a>
			</div>
			
			@elseif($note==1)
				<div class="clearfix tb-btn tb-btn-buy theme-login position">
						<a id="LikBuy" href="/user/note_add/{{$data_dict_id}}">发表动态</a>							
				</div>
			@endif

		</span>
		
	</div><p></p>
<br>
	<ul class="am-avg-sm-2 am-avg-md-3 am-avg-lg-4 boxes">
	@foreach($data as $k=>$note)
	<li>
	<div class="s-item">
		<div class="s-pic limit">
				<!--轮播 -->
			<div class="am-slider am-slider-default  scoll imgheight" data-am-flexslider id="demo-slider-{{$k}}">
				<ul class="am-slides">
				@foreach ($note['fileinfo'] as $file)
					<li class="banner4"><a><img src="/uploads/{{$file['attachment_path']}}" /></a></li>
				@endforeach
				</ul>
			</div>
	
			<p class="title fl" id="note_title"><a href="/index/note_detail/{{$note['id']}}">{{$note['userinfo']['user_name']}}:{{$note['note_content']}}</a></p>
			<p class="number fl" >
				<span><a href="/index/note/{{$note['data_dict_id']}}" title="{{$note['titleinfo']['dict_name']}}">{{$note['titleinfo']['dict_name']}}</a></span>
			</p>
			<p class="price fl">
			@foreach($clicks as $k=>$c)
				@if(session('user')==null)
					<strong onclick="nologin()"><a href="">点赞</a></strong>
					@break
				@elseif($c['make_emp']==session('user')['id']&&$c['interaction_detail_id']==$note['id'])
					<strong><a href="">已点赞</a></strong>
					@break
				@elseif($loop->last)
					<strong onclick="click_add({{$note['id']}})"><a href="">点赞</a></strong>
				@endif
			@endforeach
				<strong>
			
				<!-- {{$count=0}} -->
			@foreach($clicks as $k=>$c)
						@if($c['interaction_detail_id']==$note['id'])
							<!-- {{$count++}} -->
						@endif
						@if($loop->last)
							{{$count}}
						@endif
				@endforeach
				</strong>
				<strong><a href="">评论</a></strong><strong>
				<!-- {{$num=0}} -->
				@foreach($comment as $k=>$c)
					@if($c['note_data_id']==$note['id'])
						<!-- {{$num++}} -->
					@endif
					@if($loop->last)
						{{$num}}
					@endif
				@endforeach
				</strong>
			</p>
		</div>
		</div>
	</li>
	@endforeach
</ul>
</div>
{{$data->links()}}
	<div class="clear "></div>
@endsection

@section('js')
<script src="/user/layer-v3.1.1/layer/layer.js"></script>
<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function click_add(note_data_id){
	var note_id=note_data_id;
	$.ajax({
			type:"POST",
            dataType: "json",
            url:"/index/click_add/"+note_id,
            data: {
				id:note_id,
			},
            success:function(data) {
                layer.msg(data,{icon:1,time:1000});
            },
			// error:function (jqXHR, textStatus, errorThrown) {
			// 	/*弹出jqXHR对象的信息*/
			// 	alert(jqXHR.responseText);
			// 	alert(jqXHR.status);
			// 	alert(jqXHR.readyState);
			// 	alert(jqXHR.statusText);
			// 	/*弹出其他两个参数的信息*/
			// }
        });
}
function nologin(){
	layer.msg('请先登录');
}
function study(){
	layer.tips('请先选择话题或标签', '#note_title',{tips: [4, '#0FA6D8'],tipsMore: true});
	layer.tips('再点击发表评论', '#study',{tips: [4, '#0FA6D8'],tipsMore: true});
}
</script>
@endsection