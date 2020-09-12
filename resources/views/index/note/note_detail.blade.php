@extends('index.public.base1')
@section('style')
		<link type="text/css" href="/user/css/optstyle.css" rel="stylesheet" />
		<link type="text/css" href="/user/css/style.css" rel="stylesheet" />

		<script type="text/javascript" src="/user/basic/js/quick_links.js"></script>

		<script type="text/javascript" src="/user/js/jquery.imagezoom.min.js"></script>
		<script type="text/javascript" src="/user/js/jquery.flexslider.js"></script>
		<script type="text/javascript" src="/user/js/list.js"></script>
		<style>
			.clearfixRight{
				position:relative;
			}
			.position{
				position:absolute;
				bottom:-30px;
				right:30px;
			}
			.listMain{
				padding-top:0px;
				margin-right:0px;
			}
		</style>
 		<meta name="_token" content="{{ csrf_token() }}">

@endsection

		
@section('main')
	@foreach($data as $note)
				<div class="item-inform">
					<div class="clearfixLeft" id="clearcontent">
						<div class="box">
						<script>
						$(document).ready(function() {
							$(".jqzoom").imagezoom();
							$("#thumblist li a").click(function() {
								$(this).parents("li").addClass("tb-selected").siblings().removeClass("tb-selected");
								$(".jqzoom").attr('src', $(this).find("img").attr("src"));
								$(".jqzoom").attr('rel', $(this).find("img").attr("big"));
							});
						});
						</script>

							<div class="tb-booth tb-pic tb-s310">
								<a href=""><img src="/uploads/{{$imgs[0]['attachment_path']}}" alt="细节展示放大镜特效" rel="/uploads/{{$imgs[0]['attachment_path']}}" class="jqzoom" /></a>
							</div>
							<ul class="tb-thumb" id="thumblist">
								@foreach($imgs as $k=>$i)
								<li class="tb-selected">
									<div class="tb-pic tb-s40">
										<a href="#"><img class="img" src="/uploads/{{$i['attachment_path']}}" big="/uploads/{{$i['attachment_path']}}" rel="/uploads/{{$i['attachment_path']}}"    ></a><!-- -->
									</div>
								</li>
								@endforeach
								
							</ul>
						</div>

						<div class="clear"></div>
					</div>

					<div class="clearfixRight">

						<!--规格属性-->
						<!--名称-->
						<div class="tb-detail-hd note_title">
							<h1>	
								{{$note['titleinfo']['dict_name']}}
							</h1>
						</div>
						<div class="note_content">				
							<h2>{{$note['note_content']}}</h2>
						</div>
						<li>
							<div class="clearfix tb-btn tb-btn-buy theme-login position">
								@if(session('user')!=null)<a id="LikBuy" onclick="common({{$note['id']}})" href="#">发表评论</a>@else<a id="LikBuy" onclick="nologin()" href="#">发表评论</a>@endif
							</div>
						</li>
					</div>

					<div class="clear"></div>

				</div>


				<div class="introduce">
					<div class="browse">
					    
					</div>
					<div class="introduceMain">
						<div class="am-tabs" data-am-tabs>
							<ul class="am-avg-sm-3 am-tabs-nav am-nav am-nav-tabs">
								

								<li class="am-active">
									<a href="#">
										<span class="index-needs-dt-txt">全部评价</span></a>

								</li>

								
							</ul>

								<div class="am-tab-panel">

									<ul class="am-comments-list am-comments-list-flip">
										@foreach($comment as $c)
										<li class="am-comment">
											<!-- 评论容器 -->
											<a href="">
												<img class="am-comment-avatar" src="../images/hwbn40x40.jpg" />
												<!-- 评论者头像 -->
											</a>

											<div class="am-comment-main">
												<!-- 评论内容容器 -->
												<header class="am-comment-hd">
													<!--<h3 class="am-comment-title">评论标题</h3>-->
													<div class="am-comment-meta">
														<!-- 评论元数据 -->
														<a href="#link-to-user" class="am-comment-author">{{$c['userinfo']['user_name']}}</a>
														<!-- 评论者 -->
														评论于
														<time datetime="">{{$c['make_date']}}</time>
													</div>
												</header>

												<div class="am-comment-bd">
													<div class="tb-rev-item " data-id="255776406962">
														<div class="J_TbcRate_ReviewContent tb-tbcr-content ">
														{{$c['commentary_description']}}
														</div>
														<div class="tb-r-act-bar">
														</div>
													</div>

												</div>
												<!-- 评论内容 -->
											</div>
										</li>
										@endforeach
										
										

									</ul>

									<div class="clear"></div>

									<!--分页 -->
									

								</div>

							</div>

						</div>

					</div>

				</div>
				


	@endforeach
@endsection
@section('js')

<script src="/user/layer-v3.1.1/layer/layer.js"></script>
<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
// $(function(){
// 	var img=$('.img').eq(0).attr("src");
// 	$('.jqzoom').attr('src',img);
// 	$('.tb-thumb li').eq(0).addClass("tb-selected").siblings().removeClass("tb-selected");
// 	$(".jqzoom").attr('rel', img);
	
// });

function common(id){
	layer.prompt({title: '发表评论', formType: 2}, function(text, index){
		var content=text;
		layer.msg(content);
		$.ajax({
			type:"POST",
            dataType: "json",
            url:"/index/common_add/"+id,
            data: {
				id:id,
				content:content,
			},
            success:function(data) {
                layer.msg(data,{icon:1,time:1000});
            },
			error:function (jqXHR, textStatus, errorThrown) {
				/*弹出jqXHR对象的信息*/
				alert(jqXHR.responseText);
				alert(jqXHR.status);
				alert(jqXHR.readyState);
				alert(jqXHR.statusText);
				/*弹出其他两个参数的信息*/
			}
        });
		layer.close(index);
		// $.ajax()
		
	});
}
function nologin(){
	layer.msg('请先登录');
}
</script>


</script>

@endsection