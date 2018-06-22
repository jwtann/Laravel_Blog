@extends('public.base')

@section('content')
    @auth()
        <form action="{{route('blog.store')}}" method="post">
            @csrf
            <div class="card">
                <div class="card-header">
                    发布博客
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>博客内容</label>
                        <textarea class="form-control" rows="10" style="resize: none;" placeholder="在此处输入您的博客内容"
                                  name="content"></textarea>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <button class="btn btn-success">发布</button>
                </div>
            </div>
        </form>
    @endauth
    @if($blogs->toArray()['data'])
        {{--{{dd($blogs->toArray())}}--}}
        <div class="card mt-4">
            <div class="card-block">
                <table class="table">
                    <thead>
                    <tr>
                        <th>编号</th>
                        <th>作者</th>
                        <th>内容</th>
                        <th width="80">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($blogs as $v)
                        <tr>
                            <td scope="row">{{$v['id']}}</td>
                            <td>{{$v->user->username}}</td>
                            <td>{{$v['content']}}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    @can('delete',$v)
                                        <form action="{{route('blog.destroy',$v)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">删除</button>
                                        </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
            <div class="card-footer text-muted">
                {{$blogs->links()}}
            </div>
        </div>
    @else
        <div class="jumbotron">
            <h1 class="display-3">Jwtan_blog</h1>
            <p class="lead">Build with laravel 5.6</p>
            <hr class="my-2">
            <p>Keep trying</p>
            <p class="lead">
                <a class="btn btn-info btn-lg disabled" href="javascript:;" role="button">version 1.0.1 beta</a>
            </p>
        </div>
    @endif
@endsection










