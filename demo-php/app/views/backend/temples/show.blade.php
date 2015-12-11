@extends('backend.main')

@section('content')
        <nav class="navbar navbar-default">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('temples') }}">Tự viện</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('temples') }}">Tất cả Tự viện</a></li>
                <li><a href="{{ URL::to('temples/create') }}">Thêm Tự viện</a>
            </ul>
        </nav>
        <ul class="breadcrumb">
            <li></li>
        </ul>
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">Đang hiển thị {{ $temple->name }}</div>
            <div class="panel-body">
                <div class="col-md-8">
                    <table class="table">
                        <thead>

                        </thead>
                        <tbody>
                        <tr>
                            <td>Ten chùa</td>
                            <td>{{$temple->name}}</td>
                        </tr>
                        <tr>
                            <td>Địa chỉ</td>
                            <td>{{$temple->adress}}</td>
                        </tr>
                        <tr>
                            <td>Xây dựng năm</td>
                            <td>{{$temple->year_built}}</td>
                        </tr>
                        <tr>
                            <td>Kiến trúc</td>
                            <td>{{$temple->architecture}}</td>
                        </tr>
                        <tr>
                            <td>Trụ trì</td>
                            <td>{{$temple->abbot}}</td>
                        </tr>
                        <tr>
                            <td>Lịch sử chùa</td>
                            <td><p>{{$temple->history}}</p></td>
                        </tr>
                        <tr>
                            <td>Các đời tổ</td>
                            <td>{{$temple->bots}}</td>
                        </tr>
                        <tr>
                            <td>Website</td>
                            <td>{{$temple->website}}</td>
                        </tr>                    <tr>
                            <td>Điện thoại</td>
                            <td>{{$temple->phone}}</td>
                        </tr>                    <tr>
                            <td>Email</td>
                            <td>{{$temple->email}}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><p></p></td>
                        </tr>
                        </tbody>
                    </table>
                    <h4>Thông tin khác</h4>
                    <div>
                        {{$temple->other}}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="image">
                        <img src="{{asset('uploads/thumbs/'.$temple->image)}}">
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <a class="btn btn-danger" href="{{asset('temples/'.$temple->id.'/edit')}}">Sửa</a>
            </div>
        </div>
    @stop