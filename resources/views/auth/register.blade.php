@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">用户注册</div>

                <div class="card-body">
                    <form method="POST" action="/toregister">
                        {{ csrf_field() }}
                        

                        <div class="form-group row">
                            <label for="user_name" class="col-md-4 col-form-label text-md-right">用户名</label>

                            <div class="col-md-6">
                                <input id="user_name" type="text" class="form-control{{ $errors->has('user_name') ? ' is-invalid' : '' }}" name="user_name" value="{{ old('user_name') }}" required autofocus>

                                @if ($errors->has('user_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('user_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">邮箱</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pwd" class="col-md-4 col-form-label text-md-right">密码</label>

                            <div class="col-md-6">
                                <input id="pwd" type="password" class="form-control{{ $errors->has('pwd') ? ' is-invalid' : '' }}" name="pwd" required>

                                @if ($errors->has('pwd'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('pwd') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pwd-confirm" class="col-md-4 col-form-label text-md-right">确认密码</label>

                            <div class="col-md-6">
                                <input id="pwd-confirm" type="password" class="form-control" name="pwd_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                   注册
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
