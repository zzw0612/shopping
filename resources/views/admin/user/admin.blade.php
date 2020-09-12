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
            商城管理员
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="#">商城</a></li>
            <li class="active">管理员</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">管理员信息</h3>
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
                                    <button type="button" class="btn btn-primary change" status="{{$value['enabled']}}" uid="{{$value['id']}}">已禁用</button>
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
@endsection