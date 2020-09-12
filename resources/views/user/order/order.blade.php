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

        <ul class="am-avg-sm-6  am-nav am-nav-tabs">
            <li @if(($state??-1) ==-1) class="am-active"  @endif><a href="#tab1">所有订单</a></li>
            <li @if(($state??-1) ==0) class="am-active"  @endif><a href="/user/order">待付款</a></li>
            <li @if(($state??-1) ==1) class="am-active"  @endif><a href="/user/order1/1">待发货</a></li>
            <li @if(($state??-1) ==2) class="am-active"  @endif><a href="/user/order1/2">待收货</a></li>
            <li @if(($state??-1) ==3) class="am-active"  @endif><a href="/user/order1/3">待评价</a></li>
            <li @if(($state??-1) ==4) class="am-active"  @endif><a href="/user/order4">已取消</a></li>
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
                        @foreach($data as $value)
                        <div class="order-status5">
                            <div class="order-title">
                                <div class="dd-num"><strong> 订单编号：<a href="javascript:;">{{$value['order_num']}}</a></strong></div>
                                <span >成交时间：{{$value['create_time']}}</span> 
                            </div>
                            <div class="order-content">
                                <div class="order-left">

                                    <ul class="item-list">
                                        <li class="td td-item">
                                           
                                            <div class="item-info">
                                                <div class="item-basic-info">
                                                    <a href="#">
                                                      
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="td td-price">
                                            <div class="item-price">
                                           
                                            </div>
                                        </li>
                                        <li class="td td-number">
                                            <div class="item-number">
                                                <span>  {{count($value['orderitems']) }}</span> 
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
                                        {{$value['price']}}元
                                            <!-- <p>含运费：<span>10.00</span></p> -->
                                        </div>
                                    </li>
                                    <div class="move-right">
                                    @if($value['status'] ===0)
                                            @if($value['payment_flag']===0)
                                            <li class="td td-status">
												<div class="item-status">
                                                    <p class="Mystatus">等待买家付款</p>
                                                    <p class="order-info"><a href="/user/orderdel/{{$value['order_num']}}">取消订单</a></p>

                                                </div>
                                            </li>
                                            <li class="td td-change">
                                                <a href="pay.html">
                                                <div class="am-btn am-btn-danger anniu">
                                                    一键支付</div></a>
                                            </li>
                                           
                                            @endif
                                        @elseif($value['status'] === 1)
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
                                       
                                        
                                        @elseif($value['status'] === 2)
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
                                        
                                        @elseif($value['status'] === 3)
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
                                        @elseif($value['status'] === 4)
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
<!-- 订单详情-->
@foreach($value['orderitems'] as $va)
<div class="order-content">
    <div class="order-left">

        <ul class="item-list">
            <li class="td td-item">
                <div class="item-pic">
                    <a href="#" class="J_MakePoint">
                        <img src="/uploads/{{$va['product']['default_img']}}" class="itempic J_ItemImg">
                    </a>
                </div>
                <div class="item-info">
                    <div class="item-basic-info">
                        <a href="/index/introduction/{{$va['product']['id']}}">
                            <p>{{$va['product']['name']}}</p>
                            <p class="info-little">
                          
                            </p>
                        </a>
                    </div>
                </div>
            </li>
            <li class="td td-price">
                <div class="item-price">
                {{$va['product']['price']}}
                </div>
            </li>
            <li class="td td-number">
                <div class="item-number">
                    <span>×</span>{{$va['quantity']}}
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
               
            </div>
        </li>
        <div class="move-right">
            
            
            <li class="td td-status">
                <div class="item-status">
                  
                  

                </div>
            </li>
            <li class="td td-change">
                <a href="pay.html">
                <div class="">
                
                </div>
                    </a>
            </li>
            
            
        </div>
    </div>
</div>
@endforeach
<!--订单详情-->
                        </div>
                        <br>
                        @endforeach
                    </div>
{{$data->links()}}
                </div>

            </div>
          
        </div>

    </div>
</div>
				

@endsection
@section('js')

@endsection