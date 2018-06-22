<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">邮箱激活</h1>
            <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
            <hr class="my-4">
            <p>注册账号必须激活之后才能使用，请点击下面的激活按钮进行激活。</p>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="{{route('activeEmail',$token)}}" role="button" style="text-decoration: none">激活</a>
            </p>
        </div>
    </div>
</body>
</html>