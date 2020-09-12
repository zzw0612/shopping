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
            库存规格表格
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
                        <h3 class="box-title">商品规格表格</h3>
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
                                <th>用户id</th>
                                <th>用户姓名</th>
                                <th>用户手机</th>
                                <th>用户地址</th>
                                <th style="text-align: right">操作</th>
                            </tr>
                            @foreach($data as $key=>$value)
                            <tr>
                                <td>{{$value['order_num']}}</td>
                                <td>{{$value['price']}}</td>
                                <td>{{$value['user_id']}}</td>
                                <td>{{$value['contact_name']}}</td>
                                <td>{{$value['contact_mobile']}}</td>
                                <td>{{$value['contact_address']}}</td>
                                <td style="text-align: right">
                                    zhuangtai 
                                </td>
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