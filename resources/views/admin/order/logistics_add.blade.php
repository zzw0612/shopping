@extends('admin.public.base1')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            订单配送添加
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">常规表单元素</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form role="form" method="post" action="/admin/logistics_save" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <!-- text input -->
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="order_num" value="{{$order_num}}">
                            </div>
                            <div class="form-group">
                                <label>物流公司名</label>
                                <input type="text" class="form-control" name="company_name" placeholder="输入物流公司名">
                            </div>
                            <div class="form-group">
                                <label>物流单号</label>
                                <input type="text" class="form-control" name="logistics_num" placeholder="输入物流单号">
                            </div>
                            <div class="form-group">
                                <label>收货人姓名</label>
                                <input type="text" class="form-control" name="contact_name" value="{{$contact_name}}">
                            </div>
                            <div class="form-group">
                                <label>收货人电话</label>
                                <input type="text" class="form-control" name="contact_mobile" value="{{$contact_mobile}}">
                            </div>
                            <div class="form-group">
                                <label>收货人地址</label>
                                <input type="text" class="form-control" name="contact_address" value="{{$contact_address}}">
                            </div>
                            <div class="box-footer">
                                <a href="/admin/order"><button type="button" class="btn btn-default">取消</button></a>
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