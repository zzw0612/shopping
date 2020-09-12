@extends('admin.public.base1')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
        添加商品-规格关联
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">关联信息</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form role="form" method="post" action="/admin/product_option_info_save" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <!-- text input -->
                            <div class="form-group">
                                <label>商品名称</label>
                                <select class="form-control" name="product_id">
                                    @foreach($list as $key=>$ss)
                                    <option value="{{$ss['id']}}">{{$ss['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>商品规格类型（可多选）</label>
                                <select class="form-control"  multiple size="5" name="option_id[]">
                                    @foreach($data as $key=>$value)
                                    <option value="{{$value['id']}}">{{$value['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="box-footer">
                                <a href="/admin/product_option_info"><button type="button" class="btn btn-default">取消</button></a>
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