@extends('user.public.base')
@section('style')
<link href="/user/css/orstyle.css" rel="stylesheet" type="text/css">
<style>
.item-info{
	padding-right: 25px;
}
</style>
@endsection
@section('main')
<div class="user-order">

						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">购物车管理</strong> / <small>Cart</small></div>
						</div>
						<hr/>

						<div class="am-tabs am-tabs-d2 am-margin" data-am-tabs>
							<div class="am-tabs-bd">
								<div class="am-tab-panel am-fade am-in am-active" id="tab1">
									<div class="order-top">
										<div class="th th-item">
											<td class="td-inner">商品</td>
										</div>
										<div class="th th-price">
											<td class="td-inner">单价</td>
										</div>
										<div class="th th-number">
											<td class="td-inner">数量</td>
										</div>
										<div class="th th-operation">
											<td class="td-inner">商品操作</td>
										</div>
										<div class="th th-amount">
											<td class="td-inner">合计</td>
										</div>
										
										<div class="th th-change">
											<td class="td-inner">交易操作</td>
										</div>
									</div>

									<div class="order-main">
										<div class="order-list">
											
											<!--交易成功-->
											<div class="order-status5">
                                                @foreach($userscart as $us)
                                                
												<div class="order-title">
													
													<span>加入时间：{{$us->mark_time}}</span>
													
												</div>
												<div class="order-content">
													<div class="order-left">
														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="/index/introduction/{{$us['product_id']}}" class="J_MakePoint">
																		<img src="/uploads/{{$us['product']['default_img']}}" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="/index/introduction/{{$us['product_id']}}">
																			<p>{{$us['product']['name']}}</p>
																			<p class="info-little">

																			@foreach($us['option'] as $op)
																			{{$op['optioninfo']['name']}}：{{$op['name']}}<br/> 
																			@endforeach
																			</p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																{{$us['product']['shop_price']}}
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span>{{$us->num}}
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">
																	
																</div>
															</li>
														</ul>
													</div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计：{{$us['product']['shop_price']*$us->num}}
																
															</div>
														</li>
														<div class="move-right">
															
															<li class="td td-change">
																<div class="am-btn am-btn-danger anniu">
																	购买</div>
																	<div class="am-btn am-btn-danger anniu">
																	<a href="/user/delcart/{{$us['id']}}">删除</a> </div>
															</li>
														</div>
													</div>
                                                </div>
                                                @endforeach
											</div>
											
											
											
										
											


										</div>

									</div>

								</div>
							</div>
						</div>
					</div>
				
@endsection
