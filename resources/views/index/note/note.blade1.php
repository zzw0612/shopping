@extends('index.public.base1')
@section('style')
 <link href="/user/css/hmstyle.css" rel="stylesheet" type="text/css"> 
 <!-- <link type="text/css" href="/user/css/colstyle.css" rel="stylesheet" />  -->
 <link rel="stylesheet" href = "/user/font-awesome-4.7.0/css/font-awesome.min.css" >  
 <meta name="_token" content="{{ csrf_token() }}">
<style>
.imgheight{height:200px;overflow:hidden}
</style>
@endsection
@section('main')

<div class="am-container  ">
	<div class="shopTitle ">
		<h4>动态</h4>
		<h3>每期活动 优惠享不停 </h3>
		<span class="more ">
			<a href="# ">全部活动<i class="am-icon-angle-right" style="padding-left:10px ;"></i></a>
		</span>
		
	</div><p></p>

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
	
			<p class="title fl">{{$note['userinfo']['user_name']}}:{{$note['note_content']}}</p>
			<p class="price fl">
				<b>¥</b>
				<strong>56.90</strong>
			</p>
			<p class="number fl">
				销量<span><a href="/note/{{$note['data_dict_id']}}" title="{{$note['titleinfo']['dict_name']}}">{{$note['titleinfo']['dict_name']}}</a></span>
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

