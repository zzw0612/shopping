@extends('user.public.base')


@section('style')
<link href="/user/css/orstyle.css" rel="stylesheet" type="text/css">
@endsection
@section('main')
<div class="user-order">

						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">订单管理</strong> / <small>Order</small></div>
						</div>
						<hr/>

						<div class="am-tabs am-tabs-d2 am-margin" data-am-tabs>

							<ul class="am-avg-sm-5 am-tabs-nav am-nav am-nav-tabs">
								<li class="am-active"><a href="#tab1">所有订单</a></li>
								<li><a href="#tab2">待付款</a></li>
								<li><a href="#tab3">待发货</a></li>
								<li><a href="#tab4">待收货</a></li>
								<li><a href="#tab5">待评价</a></li>
							</ul>

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
										<div class="th th-status">
											<td class="td-inner">交易状态</td>
										</div>
										<div class="th th-change">
											<td class="td-inner">交易操作</td>
										</div>
									</div>

									<div class="order-main">
										<div class="order-list">
											
											<!--交易成功-->
											@foreach($order_item as $value)
											
											<div class="order-status5">
												<div class="order-title">
													<div class="dd-num">订单编号：<a href="javascript:;">{{$value['order_num']}}</a></div>
													<span>成交时间：{{$value['orderinfo']['create_time']}}</span>
												</div>
												<div class="order-content">
													<div class="order-left">

														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="#" class="J_MakePoint">
																		<img src="/uploads/{{$value['product']['default_img']}}" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="#">
																			<p>{{$value['product']['name']}}</p>
																			<p class="info-little">
																			@foreach($value['option'] as $op)
																			{{$op['optioninfo']['name']}}：{{$op['name']}}<br/> 
																			@endforeach
																			</p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																{{$value['product']['price']}}
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span>{{$value['quantity']}}
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">
																@if($value['orderinfo']['status'] === 4)
																订单取消
																@elseif($value['orderinfo']['payment_flag']===0)
																待付款
																@endif
																</div>
															</li>
														</ul>
													</div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
															{{$value['price']}}
																<p>含运费：<span>10.00</span></p>
															</div>
														</li>
														<div class="move-right">
															@if($value['orderinfo']['status'] === 1)
															@if($value['orderinfo']['payment_flag']===0)
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">等待买家付款</p>
																	<p class="order-info"><a href="/user/orderdel/{{$value['orderinfo']['order_num']}}">取消订单</a></p>

																</div>
															</li>
															<li class="td td-change">
																<a href="pay.html">
																<div class="am-btn am-btn-danger anniu">
																	一键支付</div></a>
															</li>
															@else
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">买家已付款</p>
																	<p class="order-info"><a href="orderinfo.html">订单详情</a></p>
																</div>
															</li>
															<li class="td td-change">
																<div class="am-btn am-btn-danger anniu">
																	提醒发货</div>
															</li>
															@endif
															
															@elseif($value['orderinfo']['status'] === 2)
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">卖家已发货</p>
																	<p class="order-info"><a href="orderinfo.html">订单详情</a></p>
																	<p class="order-info"><a href="logistics.html">查看物流</a></p>
																	<p class="order-info"><a href="#">延长收货</a></p>
																</div>
															</li>
															<li class="td td-change">
																<div class="am-btn am-btn-danger anniu">
																	确认收货</div>
															</li>
															
															@elseif($value['orderinfo']['status'] === 3)
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">已收货</p>
																	<p class="order-info"><a href="orderinfo.html">订单详情</a></p>
																	<p class="order-info"><a href="logistics.html">查看物流</a></p>
																</div>
															</li>
															<li class="td td-change">
																<div class="am-btn am-btn-danger anniu">
																	发表评论</div>
															</li>
															@elseif($value['orderinfo']['status'] === 4)
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">交易关闭</p>
																</div>
															</li>
															<li class="td td-change">
																<div class="am-btn am-btn-danger anniu">
																	删除订单</div>
															</li>
															@endif
														</div>
													</div>
												</div>
											</div>
											@endforeach
										</div>

									</div>

								</div>
								<!-- 待付款 -->
								<div class="am-tab-panel am-fade" id="tab2">

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
										<div class="th th-status">
											<td class="td-inner">交易状态</td>
										</div>
										<div class="th th-change">
											<td class="td-inner">交易操作</td>
										</div>
									</div>

									<div class="order-main">
										<div class="order-list">
											<div class="order-status1">
											
											@foreach($order_item as $value)
											@if($value['orderinfo']['status'] === 1&&$value['orderinfo']['payment_flag']===0)
											<div class="order-status5">
												<div class="order-title">
													<div class="dd-num">订单编号：<a href="javascript:;">{{$value['order_num']}}</a></div>
													<span>成交时间：{{$value['orderinfo']['create_time']}}</span>
												</div>
												<div class="order-content">
													<div class="order-left">

														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="#" class="J_MakePoint">
																		<img src="/uploads/{{$value['product']['default_img']}}" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="#">
																			<p>{{$value['product']['name']}}</p>
																			<p class="info-little">
																			@foreach($value['option'] as $op)
																			{{$op['optioninfo']['name']}}：{{$op['name']}}<br/> 
																			@endforeach
																			</p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																{{$value['product']['price']}}
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span>{{$value['quantity']}}
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">
																@if($value['orderinfo']['payment_flag']===0)
																待付款
																@endif
																</div>
															</li>
														</ul>
													</div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
															{{$value['price']}}
																<p>含运费：<span>10.00</span></p>
															</div>
														</li>
														<div class="move-right">
															
															
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">等待买家付款</p>
																	<p class="order-info"><a href="/user/orderdel/{{$value['orderinfo']['order_num']}}">取消订单</a></p>

																</div>
															</li>
															<li class="td td-change">
																<a href="pay.html">
																<div class="am-btn am-btn-danger anniu">
																	一键支付</div></a>
															</li>
															
															
														</div>
													</div>
												</div>
											</div>
											@endif
											@endforeach
											
											</div>
										</div>

									</div>
								</div>
								<!-- 已经付款，待发货 -->
								<div class="am-tab-panel am-fade" id="tab3">
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
										<div class="th th-status">
											<td class="td-inner">交易状态</td>
										</div>
										<div class="th th-change">
											<td class="td-inner">交易操作</td>
										</div>
									</div>

									<div class="order-main">
										<div class="order-list">
											<div class="order-status2">
											@foreach($order_item as $value)
											@if($value['orderinfo']['status'] === 1&&$value['orderinfo']['payment_flag']===1)
											<div class="order-status5">
												<div class="order-title">
													<div class="dd-num">订单编号：<a href="javascript:;">{{$value['order_num']}}</a></div>
													<span>成交时间：{{$value['orderinfo']['create_time']}}</span>
												</div>
												<div class="order-content">
													<div class="order-left">

														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="#" class="J_MakePoint">
																		<img src="/uploads/{{$value['product']['default_img']}}" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="#">
																			<p>{{$value['product']['name']}}</p>
																			<p class="info-little">
																			@foreach($value['option'] as $op)
																			{{$op['optioninfo']['name']}}：{{$op['name']}}<br/> 
																			@endforeach
																			</p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																{{$value['product']['price']}}
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span>{{$value['quantity']}}
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
															{{$value['price']}}
																<p>含运费：<span>10.00</span></p>
															</div>
														</li>
														<div class="move-right">
														<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">买家已付款</p>
																	<p class="order-info"><a href="orderinfo.html">订单详情</a></p>
																</div>
															</li>
															<li class="td td-change">
																<div class="am-btn am-btn-danger anniu">
																	提醒发货</div>
															</li>
														</div>
													</div>
												</div>
											</div>
											@endif
											@endforeach
											</div>
										</div>
									</div>
								</div>
								<!-- 已经发货,待收货 -->
								<div class="am-tab-panel am-fade" id="tab4">
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
										<div class="th th-status">
											<td class="td-inner">交易状态</td>
										</div>
										<div class="th th-change">
											<td class="td-inner">交易操作</td>
										</div>
									</div>

									<div class="order-main">
										<div class="order-list">
											<div class="order-status3">
											@foreach($order_item as $value)
											@if($value['orderinfo']['status'] === 2)
											<div class="order-status5">
												<div class="order-title">
													<div class="dd-num">订单编号：<a href="javascript:;">{{$value['order_num']}}</a></div>
													<span>成交时间：{{$value['orderinfo']['create_time']}}</span>
												</div>
												<div class="order-content">
													<div class="order-left">

														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="#" class="J_MakePoint">
																		<img src="/uploads/{{$value['product']['default_img']}}" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="#">
																			<p>{{$value['product']['name']}}</p>
																			<p class="info-little">
																			@foreach($value['option'] as $op)
																			{{$op['optioninfo']['name']}}：{{$op['name']}}<br/> 
																			@endforeach
																			</p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																{{$value['product']['price']}}
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span>{{$value['quantity']}}
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
															{{$value['price']}}
																<p>含运费：<span>10.00</span></p>
															</div>
														</li>
														<div class="move-right">
														<li class="td td-status">
															<div class="item-status">
																<p class="Mystatus">卖家已发货</p>
																<p class="order-info"><a href="orderinfo.html">订单详情</a></p>
																<p class="order-info"><a href="logistics.html">查看物流</a></p>
																<p class="order-info"><a href="#">延长收货</a></p>
															</div>
														</li>
														<li class="td td-change">
															<div class="am-btn am-btn-danger anniu">
																确认收货</div>
														</li>
														</div>
													</div>
												</div>
											</div>
											@endif
											@endforeach
											</div>
										</div>
									</div>
								</div>
								<!-- 已经收货,待评论 -->
								<div class="am-tab-panel am-fade" id="tab5">
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
										<div class="th th-status">
											<td class="td-inner">交易状态</td>
										</div>
										<div class="th th-change">
											<td class="td-inner">交易操作</td>
										</div>
									</div>

									<div class="order-main">
										<div class="order-list">
											<div class="order-status4">
											@foreach($order_item as $value)
											@if($value['orderinfo']['status'] === 3)
											<div class="order-status5">
												<div class="order-title">
													<div class="dd-num">订单编号：<a href="javascript:;">{{$value['order_num']}}</a></div>
													<span>成交时间：{{$value['orderinfo']['create_time']}}</span>
												</div>
												<div class="order-content">
													<div class="order-left">

														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="#" class="J_MakePoint">
																		<img src="/uploads/{{$value['product']['default_img']}}" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="#">
																			<p>{{$value['product']['name']}}</p>
																			<p class="info-little">
																			@foreach($value['option'] as $op)
																			{{$op['optioninfo']['name']}}：{{$op['name']}}<br/> 
																			@endforeach
																			</p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																{{$value['product']['price']}}
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span>{{$value['quantity']}}
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
															{{$value['price']}}
																<p>含运费：<span>10.00</span></p>
															</div>
														</li>
														<div class="move-right">
														<li class="td td-status">
															<div class="item-status">
																<p class="Mystatus">已收货</p>
																<p class="order-info"><a href="orderinfo.html">订单详情</a></p>
																<p class="order-info"><a href="logistics.html">查看物流</a></p>
															</div>
														</li>
														<li class="td td-change">
															<div class="am-btn am-btn-danger anniu">
																发表评论</div>
														</li>
														</div>
													</div>
												</div>
											</div>
											@endif
											@endforeach
											
											</div>


										</div>

									</div>

								</div>
							</div>

						</div>
					</div>
				

@endsection
@section('js')

@endsection