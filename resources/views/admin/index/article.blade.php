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
            <h1>文章列表</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">主页</a></li>
              <li class="breadcrumb-item active">文章列表</li>
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
                        <h3 class="card-title">文章列表&nbsp;<a href="/admin/article_add"  class="btn btn-success ">添加</a></h3>
                    </div>
                        <!-- /.card-header -->
                    <div class="card-body">
                    
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>文章标题</th>
                                <th>文章类型</th>
                                <th>更新时间</th>
                                <th>更改人</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            @foreach ($data as $articl)
                            <tbody>
                            <tr>
                                <td>{{ $articl->title }}</td>
                               
                                <td>{{ $articl->categoryinfo->category_name }}</td>
                                <td>{{ $articl->update_time }}</td>
                                <td>{{ $articl['userinfo']['user_name'] }}</td>
                                <td>
                                  <a href="{{route('admin.index.article_edit',array('id'=>$articl->id))}}"><button type="button" class="btn   bg-gradient-primary btn-sm"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">编辑</font></font></button></a>
                                  <a href="/admin/article_del/{{$articl->id}}"><button type="button" class="btn   bg-gradient-danger btn-sm"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">删除</font></font></button></a>
                                </td>
                            </tr>
                            </tbody>
                            @endforeach
                        </table>

                        {{ $data->links() }}
                    </div>
                        <!-- /.card-body -->


</div>

@endsection

@section('js')
<script src="/admin/plugins/datatables/jquery.dataTables.js"></script>
<script src="/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="/admin/dist/js/adminlte.min.js"></script>
<script>
  $(function () {
   /*  $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    }); */
  });
</script>
@endsection

