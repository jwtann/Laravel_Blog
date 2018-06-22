@extends('public.base')

@section('content')
    <div class="alert alert-dark" role="alert">
        <h4>密码找回</h4>
    </div>
    <form method="post" action="{{route('sendEmail')}}">
        @csrf
        <div class="form-group">
            <label>邮箱:</label>
            <input type="text" name="email" class="form-control" placeholder="请输入注册邮箱地址">
        </div>
        <button type="submit" class="btn btn-primary mr-2">立即找回</button>
    </form>
@endsection