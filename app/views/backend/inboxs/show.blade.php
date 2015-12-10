@extends('backend.main')
@section('content')
        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('posts') }}">Tin Nhắn</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('posts') }}">Tất cả Tin Nhắn</a></li>
            </ul>
        </nav>
        <ul class="breadcrumb">
            <li>Đang hiển thị {{ $inbox->name }}</li>
        </ul>
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ $inbox->name }}
                </div>
                <div class="panel-body">
                    <div class="col-md-6">
                    <table class="table">
                        <tbody>
                        <tr>
                            <td>Tên: {{ $inbox->name }}</td>
                            <td>Số Điện Thoại: {{ $inbox->phone }}</td>
                        </tr>
                        </tbody>
                    </table>
                    </div>
                    <div style="clear: both">
                    </div>
                    <div class="" style="max-width: 830px">
                    <h4>Chi tiết:</h4>
                    <div>
                    {{ $inbox->content }}
                    </div>
                    </div>
                </div>
            </div>
    @stop