@extends('backend.main')
@section('content')
        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('pages') }}">Page</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('pages') }}">Tất cả Page</a></li>
            </ul>
        </nav>
        <ul class="breadcrumb">
            <li>Admin</li>
            <li>{{ $page->name }}</li>
        </ul>
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ $page->name }}
                </div>
                <div class="panel-body">
                    <div class="col-md-11"></div>
                    <div class="col-md-1">
                        <a href="{{asset('pages/'.$page->id.'/edit')}}" class="btn btn-danger">Sửa</a>
                    </div>
                    <div class="col-md-9">
                    <h4>Tên</h4>
                    <p>{{$page->name}}</p>
                    <h4>Chi tiết:</h4>
                    <div>
                    {{ $page->content }}
                    </div>
                    </div>
                </div>
            </div>
    @stop