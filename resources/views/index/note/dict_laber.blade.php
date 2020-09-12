
@extends('index.public.base')


@section('style')


<link href="/user/css/cmstyle.css" rel="stylesheet" type="text/css">
<script src="https://www.jq22.com/jquery/jquery-1.10.2.js"></script>
<script src="https://cdn.bootcss.com/amazeui/2.5.1/js/amazeui.min.js"></script>

@endsection

@section('main')
<div class="s-content">

<div class="user-comment">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">标签</strong>  <small>&nbsp;</small></div>
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
															{{$note['remark']}}
														</div>
													</div>
													<div class="item-comment">
														<a href="/note/{{$note['id']}}">
																<p class="item-basic-info">{{$note['dict_name']}}</p>
															</a>
													</div>

													<div class="item-info">
														<div>
															<p class="info-little"><span>发起人：</span> <span>{{$note['userinfo']['user_name']}}</span> </p>
															<p class="info-time">{{$note['make_date']}}</p>

														</div>
													</div>
												</li>
											
											</ul>

										</div>
									</div>
								@endforeach

								</div>
								
							</div>
						</div>

					</div>

							</div>
@endsection





	</body>

</html>