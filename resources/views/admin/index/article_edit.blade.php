@extends('admin.public.base')
@section('style')

<link rel="stylesheet" href="/admin/plugins/summernote/summernote-bs4.css">

@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>文章编辑</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">主页</a></li>
              <li class="breadcrumb-item active">文章编辑</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <form action="{{route('admin.index.article_edit_save')}}" method="post">
              {{ csrf_field() }}
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">文章编辑</h3>

              <div class="card-tools">
                <!-- <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button> -->
              </div>
            </div>
            
              <div class="card-body">
                <div class="form-group">
                  <label for="inputName">文章标题</label>
                  <input type="text" name="title" id="inputName" class="form-control" value="{{$msg[0]['title']}}">
                </div>
                <div class="form-group">
                  <label for="inputStatus">文章分类</label>
                  <select class="form-control custom-select" name="category">
                    <option selected value="{{ $cate[0]['category_id'] }}">{{ $cate[0]['category_name'] }}</option>
                    @foreach($select as $category_id=>$category_name)
                      <option value="{{ $category_id }}">{{ $category_name }}</option>
                    @endforeach

                  </select>
                </div>
                <div class="form-group">
                  <label for="inputDescription">文章内容</label>
                  <div class="note-editor note-frame card">
                    <textarea id="compose-textarea" name="content" class="form-control" style="height: 300px">{{$msg[0]['content']}}</textarea>
                  </div>
                </div>
                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="row">
              <div class="col-12">
              <a href="#" class="btn btn-secondary">取消</a>
              <input type="submit" value="修改文章" class="btn btn-success float-right">
            

            </div>

          </div>
        <!-- /.content -->
        </form>
    </section>

</div>


@endsection

@section('js')

<script src="/admin/plugins/summernote/summernote-bs4.min.js"></script>

@endsection

