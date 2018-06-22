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

    <form action="{{route('user.update',$user)}}" method="post">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-header">
                修改资料
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>用户名</label>
                    <input type="text" name="username" class="form-control" value="{{$user['username']}}">
                </div>
                <div class="form-group">
                    <label>密码</label>
                    <input type="password" name="password" class="form-control" placeholder="请输入密码">
                </div>
                <div class="form-group">
                    <label>确认密码</label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="请确认密码">
                </div>
            </div>
            <div class="card-footer text-muted">
                <button type="submit" class="btn btn-primary">修改资料</button>
            </div>
        </div>
    </form>
@endsection