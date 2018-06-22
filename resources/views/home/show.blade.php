@extends('public.base')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1 style="text-align: center">作者：{{$user['username']}}</h1>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th>博客编号</th>
                    <th>作者编号</th>
                    <th>内容</th>
                    <th width="80">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($blogs as $v)
                    <tr>
                        <td scope="row">{{$v['id']}}</td>
                        <td>{{$v['user_id']}}</td>
                        <td>{{$v['content']}}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <form action="{{route('blog.destroy',$v)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">删除</button>
                                </form>
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
@endsection










