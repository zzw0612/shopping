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
            商城用户
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="#">商城</a></li>
            <li class="active">用户</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">用户信息</h3>
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
                                <th>编号</th>
                                <th>用户名</th>
                                <th>昵称</th>
                              <th>角色</th>
                                <th>邮箱</th>
                                <th style="text-align: right">操作</th>
                            </tr>
                            @foreach($data as $key=>$value)
                            <tr>
                                <td>{{$value['id']}}</td>
                                <td>{{$value['user_name']}}</td>
                                <td>{{$value['nickname']}}</td>
                               <td>{{$value['roleinfo']['role']}}</td>
                                <td>{{$value['email']}}</td>
                                <td style="text-align: right">
                                    @if ( $value->enabled==1)
                                    <button type="button" class="btn btn-primary change" status="{{$value['enabled']}}" uid="{{$value['id']}}">已启用</button>
                                    @else
                                    <button type="button" class="btn btn-danger change" status="{{$value['enabled']}}" uid="{{$value['id']}}">已禁用</button>
                                    @endif
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

@section('js')
<script>
    $(".change").on('click', function() {
        var id = $(this).attr('uid');
        var enabled = $(this).attr('status');
        var _this=$(this);
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "/admin/enabled/" + id + "/" + enabled,
            data: {},
            //请求成功
            success: function(data) {
                console.log(data);
                if (data == 200) {
                    _this.removeClass('btn-danger').addClass('btn-primary').html('已启用');
                    _this.attr('id', id);
                    _this.attr('enabled', enabled);
                    window.location.href='/admin/user';
                } else {
                    _this.removeClass('btn-primary').addClass('btn-danger').html('已禁用');
                    _this.attr('id', id);
                    _this.attr('enabled', enabled);
                    window.location.href='/admin/user';
                }
            }
        });
    });
</script>
@endsection