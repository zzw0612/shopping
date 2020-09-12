@extends('admin.public.base1')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            商品规格分类添加
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">商品规格信息</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form role="form" method="post" action="/admin/option_save" enctype="multipart/form-data">
                        {{csrf_field()}}
                            <!-- text input -->
                            <div class="form-group">
                                <label>名称</label>
                                <input type="text" class="form-control" name="name" placeholder="输入商品规格名">
                            </div>
                            <div class="form-group">
                                <label>类型</label>
                                <input type="text" class="form-control" name="type" placeholder="输入商品规格类型">
                            </div>
                            <div class="box-footer">
                                <a href="/admin/option"><button type="button" class="btn btn-default">取消</button></a>
                                <button type="submit" class="btn btn-info pull-right">添加</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </section>
</div>
@endsection