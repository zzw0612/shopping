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
                <h1>更新商品信息</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">首页</a></li>
                    <li class="breadcrumb-item active">更新商品</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    @foreach($data as $key=>$value)
    <form method="post" action="/admin/product_update/{{$value['id']}}">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">更新商品信息</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="name">商品名</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{$value['name']}}">
                        </div>
                        <div class="form-group">
                            <label for="explain">商品说明</label>
                            <textarea id="explain" name="explain" class="form-control" rows="4" >{{$value['explain']}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="discount">折扣率</label>
                            <input type="text" id="discount" name="discount" class="form-control" value="{{$value['discount']}}">
                        </div>
                        <div class="form-group">
                            <label for="shop_price">折后价</label>
                            <input type="text" id="shop_price" name="shop_price" class="form-control" value="{{$value['shop_price']}}">
                        </div>
                        <div class="form-group">
                            <label for="price">原价</label>
                            <input type="text" id="price" name="price" class="form-control" value="{{$value['price']}}">
                        </div>
                        <div class="form-group">
                            <label for="quantity">数量</label>
                            <input type="text" id="quantity" name="quantity" class="form-control" value="{{$value['quantity']}}">
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
                <input type="submit" value="更新" class="btn btn-success float-right">
            </div>
            <div class="col-md-1"></div>
        </div>
    </form>
    @endforeach
</section>
</div>
@endsection

@section('js')

@endsection