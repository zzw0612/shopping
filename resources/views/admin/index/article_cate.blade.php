@extends('admin.public.base')
@section('style')

<link rel="stylesheet" href="/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css">

@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>文章分类</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">主页</a></li>
              <li class="breadcrumb-item active">分类列表</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
            <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">文章分类列表&nbsp;<a href="/admin/article_cate_add"  class="btn btn-success ">添加</a></h3>
                    </div>
                        <!-- /.card-header -->
                    <div class="card-body">
                    
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>文章分类</th>
                                <th>更改人</th>
                                <th>更新时间</th>
                                <th>更新时间</th>
                                <th>文章</th>
                            </tr>
                            </thead>
                            @foreach ($article_cate as $article)
                            <tbody>
                            <tr>
                                <td>{{ $article['category_id'] }}</td>
                                <td>{{ $article['category_name'] }}</td>
                                <td>{{ $article['userinfo']['user_name'] }}</td>
                                <td>{{ $article['update_time'] }}</td>
                                <th><a href="/admin/article/{{$article['category_id']}}">查看文章</a></th>
                                <td>
                                  <a href="/admin/article_cate_del/{{$article['category_id']}}"><button type="button" class="btn btn-block bg-gradient-danger btn-sm"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">删除</font></font></button></a>
                                </td>
                            </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                        <!-- /.card-body -->
                        {{ $article_cate->links() }}
</div>


@endsection

@section('js')
<script src="/admin/plugins/datatables/jquery.dataTables.js"></script>
<script src="/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="/admin/dist/js/adminlte.min.js"></script>
<script>
  $(function () {
   // $("#example1").DataTable();
    // $('#example1').DataTable({
    //   "paging": true,
    //   "lengthChange": false,
    //   "searching": false,
    //   "ordering": true,
    //   "info": true,
    //   "autoWidth": false,
    // });



  });
</script>
@endsection

