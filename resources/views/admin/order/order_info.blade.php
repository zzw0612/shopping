@extends('admin.public.base1')
@section('style')
<style>
    table td {
        height: 40px;
        line-height: 40px !important;
    }
</style>
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (页眉) -->
    <section class="content-header">
        <h1>
            订单表格
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="#">表格</a></li>
            <li class="active">简单表格</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">订单表格</h3>
                        <div class="box-tools">
                            <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control pull-right" placeholder="搜索">

                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>订单编号</th>
                                <th>总价</th>
                                <th>订单标志</th>
                                <th>时间</th>
                                <th>用户</th>
                                <th>用户姓名</th>
                                <th>用户手机</th>
                                <th>用户地址</th>
                                <th>订单状态</th>
                            </tr>
                            @foreach($data as $key=>$value)
                            <tr>
                                <td><a href="/admin/order_item/{{$value['order_num']}}">{{$value['order_num']}}</a></td>
                                <td>{{$value['price']}}</td>
                                @if($value->payment_flag==0)
                                <td><span style="color: red">未付</span></td>
                                @elseif($value->payment_flag==1)
                                <td><span style="color: #3c8dbc">已付</span></td>
                                @endif
                                <td>{{$value['create_time']}}</td>
                                <td>{{$value['userinfo']['user_name']}}</td>
                                <td>{{$value['contact_name']}}</td>
                                <td>{{$value['contact_mobile']}}</td>
                                <td>{{$value['contact_address']}}</td>
                                @if($value->status==0)
                                <td><span>等待付款中</span></td>
                                @elseif($value->status==1)
                                <td><a href="/admin/logistics_add/{{$value['order_num']}}/{{$value['contact_name']}}/{{$value['contact_mobile']}}/{{$value['contact_address']}}"><button type="button" class="btn btn-warning">已下单</button></a></td>
                                @elseif($value->status==2)
                                <td><span style="color: #3c8dbc">配送中</span><span>
                                <a href="/admin/logistics/{{$value['order_num']}}">&nbsp;查看物流</a>
                                </span></td>
                                @elseif($value->status==3)
                                <td><span style="color: green">配送完成</span><span>
                                <a href="/admin/logistics/{{$value['order_num']}}">&nbsp;查看物流</a>
                                </span></td>
                                @elseif($value->status==4)
                                <td><span style="color: red">订单取消</span></td>
                                @endif
                            </tr>
                            @endforeach
                        </table>
                        {{$data->links()}}
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>

    </section>
</div>
@endsection