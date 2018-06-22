@extends('public.base')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            @foreach ($errors->all() as $error)
                <strong>{{$error}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            @endforeach
        </div>
    @endif
    <form method="post" action="{{route('user.store')}}">
        @csrf
        <div class="form-group mt-2">
            <label>用户名:</label>
            <input type="text" name="username" class="form-control" placeholder="请输入用户名" value="{{old('username')}}">
        </div>
        <div class="form-group">
            <label>邮箱:</label>
            <input type="text" name="email" class="form-control" placeholder="请输入邮箱地址" value="{{old('email')}}">
        </div>
        <div class="form-group">
            <label>密码:</label>
            <input type="password" name="password" class="form-control" placeholder="请输入密码">
        </div>
        <div class="form-group">
            <label>确认密码:</label>
            <input type="password" name="password_confirmed" class="form-control" placeholder="请确认密码">
        </div>
        <button type="submit" class="btn btn-primary">立即注册</button>
    </form>
@endsection