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
            <h1>添加文章分类</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">文章管理</a></li>
              <li class="breadcrumb-item active">添加分类</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">添加</h3>
              @include('admin.public.errors')
              <div class="card-tools">
                <!-- <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"> -->
                  <!-- <i class="fas fa-minus"></i></button> -->
              </div>
            </div>
            <form action="{{route('admin.index.category_save')}}" method="post">
              {{ csrf_field() }}
              <div class="card-body">
                <div class="form-group">
                  <label for="inputName">分类名称</label>
                  <input type="text" name="category_name" id="inputName" class="form-control" placeholder="请填写分类名称">
                </div>

              </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>

        <div class="row">
          <div class="col-12">
            <a href="#" class="btn btn-secondary">取消</a>
            <input type="submit" value="添加分类" class="btn btn-success float-right">
          </div>
          </form>

    </section>
    <!-- /.content -->

</div>


@endsection

@section('js')
<script src="/admin/plugins/datatables/jquery.dataTables.js"></script>
<script src="/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="/admin/dist/js/adminlte.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
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

