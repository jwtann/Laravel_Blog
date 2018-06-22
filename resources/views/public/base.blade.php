<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>jwtan_blog</title>
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js"></script>
</head>
<body>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <a class="navbar-brand" href="/">BLOG</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">主页</a>
                </li>
            </ul>
            @if(Auth::check())
                <a href="{{route('user.edit',Auth::user())}}" class="btn btn-danger my-2 my-sm-0 mr-2">{{Auth::user()->username}}</a>
                <a class="btn btn-info mr-2" href="{{route('user.index')}}" role="button">人员信息</a>
                <a href="{{route('logout')}}" class="btn btn-success my-2 my-sm-0">退出</a>
            @else
                <a href="{{route('user.create')}}" class="btn btn-info my-2 my-sm-0 mr-2">注册</a>
                <a href="{{route('login')}}" class="btn btn-success my-2 my-sm-0">登录</a>
            @endif
        </div>
    </nav>
    @include('public.message')
    @yield('content')
</div>
</body>
</html>