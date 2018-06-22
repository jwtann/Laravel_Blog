@extends('public.base')

@section('content')
    <div class="card">
        <div class="card-header">
            用户列表
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th>编号</th>
                    <th>用户名</th>
                    <th>邮箱</th>
                    <th width="100">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $v)
                    <tr>
                        <td scope="row">{{$v['id']}}</td>
                        <td>{{$v['username']}}</td>
                        <td>{{$v['email']}}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{route('user.show',$v)}}" type="button" class="btn btn-primary mr-1">查看</a>
                                @can('update',$v)
                                <a href="{{route('user.edit',$v)}}" type="button" class="btn btn-info mr-1">编辑</a>
                                @endcan
                                @can('delete',$v)
                                <form action="{{route('user.destroy',$v)}}" method="post">
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
            {{$users->links()}}
        </div>
    </div>
@endsection










