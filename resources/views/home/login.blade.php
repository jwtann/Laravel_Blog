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
    <form method="post" action="{{route('login')}}">
        @csrf
        <div class="form-group">
            <label>邮箱:</label>
            <input type="text" name="email" class="form-control" placeholder="请输入邮箱地址" value="{{old('email')}}">
        </div>
        <div class="form-group">
            <label>密码:</label>
            <input type="password" name="password" class="form-control" placeholder="请输入密码">
        </div>
        <button type="submit" class="btn btn-primary mr-2">立即登录</button>
        <a href="{{route('findpassword')}}">忘记密码？</a>
    </form>
@endsection