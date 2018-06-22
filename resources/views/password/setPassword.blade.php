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
    <div class="alert alert-dark" role="alert">
        <h4>重置密码</h4>
    </div>
    <form method="post" action="{{route('update')}}">
        @csrf
        <div class="form-group">
            <label>邮箱:</label>
            <input type="text" name="email" class="form-control" value="{{$user['email']}}" readonly>
        </div>
        <div class="form-group">
            <label>新密码:</label>
            <input type="password" name="password" class="form-control" placeholder="请输入新密码">
        </div>
        <div class="form-group">
            <label>确认密码:</label>
            <input type="password" name="password_confirmation" class="form-control" placeholder="请确认新密码">
        </div>
        <button type="submit" class="btn btn-primary mr-2">提交</button>
    </form>
@endsection