@extends('admin.public.base1')
@section('style')
<style>
table td{height: 40px;line-height: 40px !important;}
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
            <h3 class="box-title">商品规格表格&nbsp;&nbsp;
              <a href="/admin/sku_add/{{request()->id}}"><button type="button" class="btn btn-primary">添加</button></a>
            </h3>

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
                <th>sku_json</th>
                <th>商品</th>
                <th>数量</th>
                <th>价格</th>
                <th style="text-align: right">操作</th>
              </tr>
              @foreach($data as $key=>$value)
              <tr>
                <td>{{$value['id']}}</td>
                <td>{{$value['sku_json']}}</td>
                <td>{{$value['productinfo']['name']}}</td>
                <td>{{$value['quantity']}}</td>
                <td>{{$value['price']}}</td>
                <td style="text-align: right">
               <!--    <a href="/admin/sku_edit/{{$value['id']}}"><button type="button" class="btn btn-primary">编辑</button></a> -->
                  <a href="/admin/sku_del/{{$value['id']}}"><button type="button" class="btn btn-danger">删除</button></a>
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