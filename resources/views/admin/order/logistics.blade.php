@extends('admin.public.base1')
@section('style')
<style>
    table td {
        height: 40px;
        line-height: 40px !important;
    }
</style>
<script src="{{ asset('/note/js/jquery.min.js') }}"></script>
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (页眉) -->
    <section class="content-header">
        <h1>
            物流配送表格
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
                        <h3 class="box-title">物流配送表格</h3>
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
                                <th>id</th>
                                <th>物流公司名</th>
                                <th>物流单号</th>
                                <th>订单编号</th>
                                <th>配送状态</th>
                                <th>收货人姓名</th>
                                <th>收货人电话</th>
                                <th>收货人地址</th>
                            </tr>
                            @foreach($data as $key=>$value)
                            <tr>
                                <td>{{$value['id']}}</td>
                                <td>{{$value['company_name']}}</td>
                                <td>{{$value['logistics_num']}}</td>
                                <td>{{$value['order_num']}}</td>
                                <td>
                                    @if ($value->state==2)
                                    <button type="button" class="btn btn-primary change" state="{{$value->state}}" order_num="{{$value['order_num']}}">配送中</button>
                                    @else
                                    <button type="button" class="btn btn-success " state="{{$value->state}}" order_num="{{$value['order_num']}}">配送完成</button>
                                    @endif
                                </td>
                                <td>{{$value['contact_name']}}</td>
                                <td>{{$value['contact_mobile']}}</td>
                                <td>{{$value['contact_address']}}</td>
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

@section('js')
<script>
    $(".change").on('click', function() {
        var order_num = $(this).attr('order_num');
        var state = $(this).attr('state');
        var _this=$(this);
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "/admin/logistics_state/" + order_num + "/" + state,
            data: {},
            //请求成功
            success: function(data) {
                console.log(data);
                if (data == 200) {
                    _this.removeClass('btn-success').addClass('btn-primary').html('配送');
                    _this.attr('order_num', order_num);
                    _this.attr('state', state);
                    window.location.href='/admin/logistics/'+order_num;
                } else {
                    _this.removeClass('btn-primary').addClass('btn-success').html('配送完成');
                    _this.attr('order_num', order_num);
                    _this.attr('state', state);
                    window.location.href='/admin/logistics/'+order_num;
                }
            }
        });
    });
</script>
@endsection