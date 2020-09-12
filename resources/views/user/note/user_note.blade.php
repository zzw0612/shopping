
@extends('user.public.base')

@section('main')
<div class="s-content">

	<!--标题 -->
	<div class="am-cf am-padding">
			<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">我的动态</strong> / <small><a href="/user/note_add">发表动态</a></small></div>
	</div>
	<hr/>

@if(is_null($notes)==true)

	<h1>还没发表动态，请先发表动态！</h1>
@else

	@foreach($notes as $k=>$note)
		
		<div class="s-item-wrap">
			<div class="s-item">

				<div class="s-pic">
				
					<div class="banner">
                      <!--轮播 -->
						<div class="am-slider am-slider-default scoll" data-am-flexslider id="demo-slider-{{$k}}">
							<ul class="am-slides">
							@foreach ($note['fileinfo'] as $file)
								<li class="banner4"><a><img src="/uploads/{{$file['attachment_path']}}" /></a></li>
							@endforeach
							</ul>
						</div>
						<div class="clear"></div>	
					</div>


				</div>
				<div class="s-info">
					<div class="s-title"><a href="#" title="{{$note['titleinfo']['dict_name']}}">{{$note['titleinfo']['dict_name']}}</a></div>
					<div class="s-price-box">
						<span class="s-price"><em class="s-price-sign"></em><em class="s-value">{{$note['note_content']}}</em></span>
					</div>
					<div class="s-title">
						<span class="s-comment">用户:{{$note['userinfo']['user_name']}}</span>
						<a href="/user/note_del/{{$note['id']}}"><span class="s-comment">删除</span></a>
					</div>
				</div>
				<div class="s-tp">
					{{-- <span class="ui-btn-loading-before">找相似</span>
					<i class="am-icon-shopping-cart"></i>
					<span class="ui-btn-loading-before buy">加入购物车</span>
					<p>
						<a href="javascript:;" class="c-nodo J_delFav_btn">取消收藏</a>
					</p> --}}
				</div>
			</div>
		</div>
		
	@endforeach

	
@endif
<div class="clear "></div>
{{$notes->links()}}
</div>

@endsection
