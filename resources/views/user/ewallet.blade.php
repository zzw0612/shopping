@extends('user.public.base')
@section('style')

<link href="/user/css/blstyle.css" rel="stylesheet" type="text/css">
<style>
.tb-btn a{
    margin-right: 0px;
    float: left;
    overflow: hidden;
    position: relative;
    width: 10%;
    height: 30px;
    line-height: 30px;
    background-color: #FFEDED;
    color: #F03726;
    font-size: 14px;
    text-align: center;
	border:1px solid red;
	position:absolute;
	top:46%;
	left:45%;
}
.text{
	display:block;
	width:100%;
}
.am-modal{
	 width: 540px;height:165px;left: 30%;top:30%;position: fixed;
}
 

</style>
@endsection	
@section('main')
	@if($is_count)
		@foreach($res as $ewallet)
				<div class="user-bill">
							<!--标题 -->
							<div class="am-cf am-padding">
								<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">钱包</strong> / <small>Electronic&nbsp;bill</small>/
								<strong class="am-text-danger am-text-lg">
								<button class="am-btn am-btn-primary" id="doc-confirm-toggle">充值</button>
								</strong>
								</div>
							</div>
							<hr/>

							<div class="ebill-section">
								<div class="ebill-title-section">
									<h2 class="trade-title section-title">
										交易
								<span class="desc">（金额单位：元）</span>
							</h2>

									<div class=" ng-scope">
										<div class="trade-circle-select  slidedown-">
											<a href="javascript:void(0);" class="current-circle ng-binding"></a>

										</div>
										<span class="title-tag"><i class="num ng-binding">近</i>月</span>
									</div>
								</div>

								<div class="module-income ng-scope">
									<div class="income-slider ">
										<div class="block-income block  fn-left">
											<h3 class="income-title block-title">
																											余额
										<span class="num ng-binding">
											{{$ewallet['amount']}}
										</span>
										<span class="desc ng-binding">
											<a href="billlist.html">查看支出明细</a>
											</span>
												</h3>

											<div ng-class="shoppingChart" class="catatory-details  fn-hide shopping">
												<div class="catatory-chart fn-left fn-hide">
													<div class="title">充值</div>
													<ul>
														@foreach($data as $pay)
															@if($pay['amount']>0)
																<li class="ng-scope  delete-false">
																	<div class="  ng-scope">
																		<a href="#" class="text fn-left " title="">
																		<span class="emoji-span ng-binding">{{$pay['updtime']}}</span>
																			<span class="emoji-span ng-binding">{{$pay['source']}}</span>
																			
																			<span class="amount fn-right ng-binding">{{$pay['amount']}}</span>
																		</a>
																	</div>
																</li>
																@endif
														@endforeach
													</ul>
												</div>
												<div class="catatory-detail fn-left">
													<div class="title ng-binding">
														消费
													</div>
													<ul>
														@foreach($data as $pay)
															@if($pay['amount']<0)
															<li class="ng-scope  delete-false">

																<div class="  ng-scope">
																	<a href="#" class="text fn-left " title="">
																		<span class="emoji-span ng-binding">{{$pay['source']}}</span>
																		<span class="amount fn-right ng-binding">{{$pay['amount']}}</span>
																	</a>
																</div>
															</li>
															@endif
														@endforeach
													</ul>
												</div>
											</div>
										</div>
										<!-- <div class="block-expense block  fn-left">
											<div class="slide-button right"></div>
										</div>
										<div class="clear"></div> -->

										<!--收入-->
										<!-- <h3 class="expense income-title block-title">
																														收入                                                              
										<span class="num ng-binding">
												0.00
										</span>
										<span class="desc ng-binding">
											<a href="billlist.html">查看收入明细</a>
										</span>
									</h3> -->
									</div>

									<!--消费走势-->
									<div class="module-consumeTrend inner-module">
										<h3 class="module-title">消费走势</h3>
										<div id="consumeTrend-chart" class="consumeTrend-chart">

										</div>
									</div>

									<!--银行卡使用情况-->

									<div class="module-card inner-module">
										<h3 class="module-title">银行卡使用情况</h3>
										<div class="card-chart valid">
											<div class="cards-carousel">
												<div class="mask">

													<div class="bac fn-left"></div>
													<div class="bank ng-binding" style="background-image: url(/user/images/combo.png);">中国农业银行</div>
													<div class="details">
														<a>查看详情</a>
													</div>
												</div>
											</div>
											<div class="cards-details">
												<div class="bank-name">
													<div class="name fn-left" style="background-image: url(../images/combo.png);"></div>
													<span class="close fn-right"><a>X</a></span>
												</div>
												<div class="bank-detail">
													<div class="totalin fn-left">
														<span class="fn-left">流入</span>
														<span class="amount fn-right">0.00</span>
													</div>
													<div class="totalout fn-left">
														<span class="fn-left">流出</span>
														<span class="amount fn-right">0.00</span>
													</div>
													<div class="expand fn-left">
														<span class="fn-left">支出</span>
														<span class="amount fn-right">0.00</span>
													</div>
													<div class="withdraw fn-left">
														<span class="fn-left">提现</span>
														<span class="amount fn-right">
																0.00
														</span>
													</div>
													<div class="recharge fn-left">
														<span class="fn-left">充值</span>
														<span class="amount fn-right">
																0.00
														</span>
													</div>

													<div class="refund fn-left">
														<span class="fn-left">银行卡退款</span>
														<span class="amount fn-right ">0.00</span>
													</div>
												</div>
											</div>
										</div>
									</div>

									

								</div>

							</div>

						</div>
				@endforeach
	@else
		<div class="user-bill">
							<!--标题 -->
							<div class="am-cf am-padding">
								<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">钱包</strong> / <small>Electronic&nbsp;bill</small></div>
							</div>
							<hr/>

							<div class="ebill-section">
								<div class="ebill-title-section">
									<h2 class="trade-title section-title">
										交易
								<span class="desc">（金额单位：元）</span>
							</h2>

									<div class=" ng-scope">
										<div class="trade-circle-select  slidedown-">
											<a href="javascript:void(0);" class="current-circle ng-binding"></a>

										</div>
										<span class="title-tag"><i class="num ng-binding">近</i>月</span>
									</div>
								</div>

								<div class="module-income ng-scope">
									<div class="income-slider tb-btn tb-btn-buy" style="height:400px;position:relative;">
											<a id="LikBuy" onclick="" href="/user/ewallet/ewallet_add/">开通钱包</a>
										
									</div>

									<!--消费走势-->
									
								</div>

							</div>

						</div>
	@endif


<div class="am-modal am-modal-confirm" tabindex="-1" id="doc-modal-1">
  <div class="am-modal-dialog">
    <div class="am-modal-hd">会员钱包充值</div>
	
    <div class="am-modal-bd">
      <input type="text" placeholder="请输入充值金额" id="wnum" class="am-modal-prompt-input">
    </div>
    <div class="am-modal-footer">
      <span class="am-modal-btn" data-am-modal-cancel>取消</span>
	  <span class="am-modal-btn" data-am-modal-confirm>确定</span>
    </div>

  </div>
</div>
@endsection
@section('js')
<script>
	$(document).ready(function (ev) {
								
		$('.cards-carousel .details').on('click', function (ev) {
			 $('.cards-details').css("display","block");
			 $('.cards-carousel').css("display","none");								 
		});					
		$('.cards-details .close').on('click', function (ev) {
			$('.cards-details').css("display","none");
			$('.cards-carousel').css("display","block");								 
		});									    
	//	/user/ewallet/ewallet_add/

		 $('#doc-confirm-toggle').on('click', function() {
			$('#doc-modal-1').modal({
			relatedElement: this,
			onConfirm: function() {
				var num=$('#wnum').val();
				$(location).attr('href', '/user/ewallet/ewallet_add/'+num);
			},
			onCancel: function() {
				
			}
			});
		});		    
	});
</script>
@endsection