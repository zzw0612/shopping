@extends('admin.public.base')
@section('style')
<style>
  button a {
    color: #fff;
  }

  button a:hover {
    color: #fff;
  }
</style>
@endsection
@section('content')<div class="content-wrapper">
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>商品</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">首页</a></li>
          <li class="breadcrumb-item active">商品列表</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"> 
              <a class="btn btn-primary btn-sm" href="/admin/product_add/{{request()->cateid}}">
                <i class="fas fa-folder">
                </i>
                增加
              </a>
            </h3>

            <div class="card-tools">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                <div class="input-group-append">
                  <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0" style="height: 500px;">
            <table class="table table-head-fixed">
              <thead>
                <tr>
                  <th>ID</th>
                  <th style="width:25%">商品名</th>
                  <th style="width:15%">商品类别</th>
                  <th style="width:10%">市场价格</th>
                  <th style="width:10%">店内价格</th>
                  <th>商品库存</th>
                  <th>商品图片</th>
                  <th style="width:15%">操作</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $key=>$value)
                <tr>
                  <td>{{$value['id']}}</td>
                  <td>{{$value['name']}}</td>
                  <td>{{$value['categoryinfo']['name']}}</td>
                  <td>{{$value['price']}}</td>
                  <td>{{$value['shop_price']}}</td>
                  <td>{{$value['quantity']}}</td>
                  <td> <a href="/admin/product_image/{{$value['id']}}">查看图片</a>&nbsp;<a href="/admin/product_option_info/{{$value['id']}}">规格描述</a> &nbsp;<a href="/admin/sku/{{$value['id']}}">查库存</a> </td>
                  <td class="project-actions text-right">
                    <a class="btn btn-info btn-sm" href="/admin/product_edit/{{$value['id']}}">
                     编辑
                    </a>
                    <a class="btn btn-danger btn-sm" href="/admin/product_del/{{$value['id']}}">
                     删除
                    </a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          {{ $data->links() }}
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>


  </div>
</section>
</div>
@endsection