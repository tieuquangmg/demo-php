@extends('backend.main')

@section('content')
        <nav class="navbar navbar-default">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('members') }}">Thành viên</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('members') }}">Tất cả Thành viên</a></li>
                <li><a href="{{ URL::to('members/create') }}">Thành viên mới</a>
            </ul>
        </nav>

        <div class="panel panel-default">
            <div class="panel-heading">
                Đang hiển thị {{ $member->name }}
            </div>
            <div class="panel-body">
                <div class="col-sm-11">

                </div>
                <div class="col-sm-1">

                </div>
                <div class="jumbotron text-center">
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <td>Tên hiển thị</td>
                            <td>{{$member->name}}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{$member->email}}</td>
                        </tr>
                        <tr>
                            <td>Tên đăng nhập</td>
                            <td>{{$member->username}}</td>
                        </tr>
                        <tr>
                            <td>Trạng thái</td>
                            <td>{{$member->status}}</td>
                        </tr>
                        <tr>
                            <td>Loại thành viên</td>
                            <td>chua cap nhật</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @stop