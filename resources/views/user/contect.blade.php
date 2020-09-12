@extends('user.public.base')


@section('main')
					<div class="user-address">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">地址管理</strong> / <small>Address&nbsp;list</small></div>
						</div>
						<hr/>
						<ul class="am-avg-sm-1 am-avg-md-3 am-thumbnails">
						@foreach ($usersaddress as $usersaddress)
							<li class="user-addresslist defaultAddr">
							@if ($usersaddress['contact_flag']===1)
								<span class="new-option-r"><i class="am-icon-check-circle"></i>默认地址</span>
    						@endif
								
								<p class="new-tit new-p-re">
								<span class="new-txt">{{ $usersaddress->name }}</span>
									<span class="new-txt-rd2">{{ $usersaddress->mobile }}</span>
								</p>
								
								<div class="new-mu_l2a new-p-re">
									<p class="new-mu_l2cw">
										<span class="title">地址：</span>
										<span class="province">{{ $usersaddress->address }}</span></p>
								</div>
								<div class="new-addr-btn">
									
									<span class="new-addr-bar">|</span>
									<a href="/user/del/{{ $usersaddress->id}}"><i class="am-icon-trash"></i>删除</a>
								</div>
							</li>
							@endforeach
							
						</ul>
						<div class="clear"></div>
						<a class="new-abtn-type" data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0}">添加新地址</a>
						<!--例子-->
						<div class="am-modal am-modal-no-btn" id="doc-modal-1">

							<div class="add-dress">

								<!--标题 -->
								<div class="am-cf am-padding">
									<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">新增地址</strong> / <small>Add&nbsp;address</small></div>
								</div>
								<hr/>

								<div class="am-u-md-12 am-u-lg-8" style="margin-top: 20px;">
									<form class="am-form am-form-horizontal"  method="post" action="/user/contect">

										<div class="am-form-group">
											<label for="user-name" class="am-form-label">收货人</label>
											<div class="am-form-content">
												<input type="text" name="name" id="user-name" placeholder="收货人">
											</div>
										</div>

										<div class="am-form-group">
											<label for="user-phone"  class="am-form-label">手机号码</label>
											<div class="am-form-content">
												<input id="user-phone"name='mobile' placeholder="手机号必填" type="text">
											</div>
										</div>
										<!-- <div class="am-form-group">
											<label for="user-address" class="am-form-label">所在地</label>
											<div class="am-form-content address" >
												<select data-am-selected>
													<option value="a">浙江省</option>
													<option value="b" selected>湖北省</option>
												</select>
												<select data-am-selected>
													<option value="a">温州市</option>
													<option value="b" selected>武汉市</option>
												</select>
												<select data-am-selected>
													<option value="a">瑞安区</option>
													<option value="b" selected>洪山区</option>
												</select>
												<input id="all_address"  placeholder="详细地址" type="text">
											</div>
										</div> -->

										<div class="am-form-group">
											<label for="user-intro" class="am-form-label">详细地址</label>
											<div class="am-form-content">
												<textarea class="" rows="3" name="address" id="user-intro" placeholder="输入详细地址"></textarea>
												
											</div>
										</div>

										<div class="am-form-group">
											<div class="am-u-sm-9 am-u-sm-push-3">
												<button type="submit" class="am-btn am-btn-dange">
												保存
                                				</button>
												<a href="javascript: void(0)" class="am-close am-btn am-btn-danger" data-am-modal-close>取消</a>
											</div>
										</div>
									</form>
								</div>

							</div>

						</div>

					</div>
@endsection



@section('js')
					<script type="text/javascript">
						$(document).ready(function() {							
							$(".new-option-r").click(function() {
								$(this).parent('.user-addresslist').addClass("defaultAddr").siblings().removeClass("defaultAddr");
							});
							
							var $ww = $(window).width();
							if($ww>640) {
								$("#doc-modal-1").removeClass("am-modal am-modal-no-btn")
							}
							
						})
					</script>
@endsection