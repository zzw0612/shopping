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
                <h1>更新商品图片</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">首页</a></li>
                    <li class="breadcrumb-item active">上传商品图片</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    
    <form method="post" action="/admin/product_image_update/{{$data['id']}}">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">商品图片</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="explain">图片说明</label>
                            <textarea id="explain" name="explain" class="form-control" rows="4" >{{$data['explain']}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="inputStatus">商品</label>
                            <select class="form-control custom-select" name="product_id">
                                @foreach($list as $key=>$va)
                                <option selected value="{{$va['id']}}">{{$va['name']}}</option>
                                @endforeach
                            </select>
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
                <a href="/admin/product_image" class="btn btn-secondary">取消</a>
                <input type="submit" value="更新" class="btn btn-success float-right">
            </div>
            <div class="col-md-1"></div>
        </div>
    </form>
   
</section>
</div>
@endsection

@section('js')

@endsection