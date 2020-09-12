@extends('admin.public.base')

@section('style')
<style>
  .myimg {
    height: 50px;
  }
</style>
@endsection

@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>商品类别</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">首页</a></li>
            <li class="breadcrumb-item active">商品类别</li>
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
                <a class="btn btn-primary btn-sm" href="/admin/product_category_add">
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
            <div class="card-body table-responsive p-0">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th style="width:10%">商品类别名</th>
                    <th>排序</th>
                    <th style="width:30%">描述</th>
                    <th>图片</th>
                    <th style="width:15%">操作</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($data as $key=>$value)
                  <tr>
                    <td>{{$value['id']}}</td>
                    <td>{{$value['name']}}</td>
                    <td>{{$value['sort_order']}}</td>
                    <td><a href="/admin/product/{{$value['id']}}">查看商品</a></td>
                    <td><img class="myimg" src="/uploads/{{$value['image']}}" alt=""></td>
                    <td class="project-actions text-right">
                      <a class="btn  btn-info btn-sm" href="/admin/product_category_edit/{{$value['id']}}">
                       
                        编辑
                      </a>
                      <a class=" btn btn-danger btn-sm" href="/admin/product_category_del/{{$value['id']}}">
                        
                        删除
                      </a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>

              </table>
            </div>
            <!-- /.card-body -->
            {{ $data->links() }}
          </div>
          <!-- /.card -->
        </div>
      </div>

    </div>
</div>
</section>
</div>
@endsection