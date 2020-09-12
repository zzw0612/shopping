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
                    <h1>增加商品类别</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">首页</a></li>
                        <li class="breadcrumb-item active">增加商品类别</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <form method="post" action="/admin/product_category_save" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">填写商品类别信息</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="name">类别名</label>
                                <input type="text" id="name" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="sort_order">排序号</label>
                                <input type="text" id="sort_order" name="sort_order" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="description">类别描述</label>
                                <textarea id="description" name="description" class="form-control" rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="image">图片</label>
                                <input type="file" id="image" name="image" class="form-control">
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
                    <a href="/admin/category" class="btn btn-secondary">取消</a>
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