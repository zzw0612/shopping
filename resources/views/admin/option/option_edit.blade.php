@extends('admin.public.base1')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            商品规格分类更改
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
                        @foreach($data as $key=>$value)
                        <form role="form" method="post" action="/admin/option_update/{{$value['id']}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <!-- text input -->
                            <div class="form-group">
                                <label>名称</label>
                                <input type="text" class="form-control" name="name" value="{{$value['name']}}">
                            </div>
                            <div class="form-group">
                                <label>类型</label>
                                <input type="text" class="form-control" name="type" value="{{$value['type']}}">
                            </div>
                            <div class="box-footer">
                                <a href="/admin/option"><button type="button" class="btn btn-default">取消</button></a>
                                <button type="submit" class="btn btn-info pull-right">更改</button>
                            </div>
                        </form>
                        @endforeach
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </section>
</div>
@endsection