@extends('admin.public.base1')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            商品库存添加
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">常规表单元素</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form role="form" method="post" action="/admin/sku_save" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <!-- text input -->
                            <div class="form-group">
                                <label>商品名称</label>
                                <select class="form-control" name="product_id">
                                   
                                    <option value="{{$data['id']}}">{{$data['name']}}</option>
                                 
                                </select>
                            </div>
                            <div class="form-group">
                                <label>数量</label>
                                <input type="text" class="form-control" name="quantity" placeholder="数量 ...">
                            </div>
                            <div class="form-group">
                                <label>价格</label>
                                <input type="text" class="form-control" name="price" placeholder="价格 ...">
                            </div>  
                            @foreach($data->option as $key=>$value)
                            @if(!($value->optionvalue->isEmpty()))
                            <div class="form-group">
                                <label>{{$value['name']}}</label>

                                <!-- <select multiple class="form-control" name="option_value_key_group[]"> -->
                                <select  class="form-control" name="option{{$value['name']}}">
                                @foreach($value->optionvalue as $k =>$va)
                                    <option  value="{{$va['id']}}">{{$va['name']}}</option>
                                @endforeach    
                                </select>
                           
                            </div>
                            @endif
                            @endforeach
                            <div class="box-footer">
                                <a href="/admin/option"><button type="button" class="btn btn-default">取消</button></a>
                                <button type="submit" class="btn btn-info pull-right">添加</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </section>
</div>
@endsection