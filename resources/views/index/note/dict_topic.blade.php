
@extends('index.public.base')


@section('style')


<link href="/user/css/cmstyle.css" rel="stylesheet" type="text/css">
@endsection

@section('main')
<div class="s-content">

<div class="user-comment">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">话题</strong>  <small>&nbsp;</small> /<a href="/index/note"  class="font20"> 动态 </a></div>
						</div>
						<hr/>

						<div class="am-tabs am-tabs-d2 am-margin" data-am-tabs>

							

							<div class="am-tabs-bd">
								<div class="am-tab-panel am-fade am-in am-active" id="tab1">
								@foreach($data as $note)

									<div class="comment-main">
										<div class="comment-list">
											<ul class="item-list">
												<div class="comment-top">
													<div class="th th-price">
													</div>
													<div class="th th-item">
													</div>													
												</div>
												<li class="td td-comment">
													<div class="item-title">
														<div class="item-opinion"></div>
														<div class="item-name">
															简介:{{$note['remark'] ?? '暂无'}}
														</div>
													</div>
													<div class="item-comment">
														<a href="/index/note/{{$note['id']}}">
																<p class="item-basic-info">{{$note['dict_name']}}</p>
															</a>
													</div>

													<div class="item-info">
														<div>
															<p class="info-little"><span>发起人：</span> <span>{{$note['userinfo']['user_name'] ?? '匿名'}}</span> </p>
															<p class="info-time">{{$note['make_date']}}</p>

														</div>
													</div>
												</li>
											
											</ul>

										</div>
									</div>
								@endforeach

								</div>
								{{$data->links()}}
							</div>
						</div>

					</div>

							</div>
@endsection





	</body>

</html>