@extends('admin.public.base')
@section('style')
<style>
</style>
@endsection
@section('content')
<div class="content-wrapper">
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>增加商品</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">首页</a></li>
                    <li class="breadcrumb-item active">增加商品</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <form method="post" action="/admin/product_save" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">填写商品信息</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">

                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="name">商品名</label>
                            <input type="text" id="name" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="explain">商品描述</label>
                            <textarea id="explain" name="explain" class="form-control" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="inputStatus">商品分类</label>
                            <select class="form-control custom-select" name="category_id">
                                @foreach($list as $key=>$value)
                                <option selected value="{{$value['id']}}">{{$value['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="discount">折扣率</label>
                            <input type="text" id="discount" name="discount" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="shop_price">折扣价</label>
                            <input type="text" id="shop_price" name="shop_price" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="price">原价</label>
                            <input type="text" id="price" name="price" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="quantity">数量</label>
                            <input type="text" id="quantity" name="quantity" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="default_img">默认图片</label>
                            <input type="file" id="default_img" name="default_img" class="form-control">
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-1"></div>
        </div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-10">
                <a href="/admin/product" class="btn btn-secondary">取消</a>
                <input type="submit" value="增加" class="btn btn-success float-right">
            </div>
            <div class="col-md-1"></div>
        </div>
    </form>
</section>
</div>
@endsection

@section('js')

@endsection