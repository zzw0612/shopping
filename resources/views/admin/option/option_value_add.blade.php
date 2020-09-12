@extends('admin.public.base1')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            商品规格值添加
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">商品规格值信息</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form role="form" method="post" action="/admin/option_value_save" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <!-- text input -->
                            <div class="form-group">
                                <label>规格值</label>
                                <input type="text" class="form-control" name="name" placeholder="输入商品规格对应的值">
                            </div>
                            <div class="form-group">
                                <label>商品规格</label>
                                <select class="form-control" name="option_id">
                                    @foreach($data as $key=>$value)
                                    <option value="{{$value['id']}}">{{$value['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="box-footer">
                                <a href="/admin/option_value"><button type="button" class="btn btn-default">取消</button></a>
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