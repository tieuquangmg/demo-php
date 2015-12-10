@extends('backend.main')
@section('content')
        <nav class="navbar navbar-default">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('pages') }}">Page</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('pages') }}">Hiển Thị Tất cả Page</a></li>
            </ul>
        </nav>
<div class="panel panel-default">
    <div class="panel-heading">
        <h4>Quản lý Page</h4>
    </div>
    <div class="panel-body">
        <!-- will be used to show any messages -->
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <table class="table table-striped table-bordered" id="example">
            <thead>
            <tr>
                <th>ID</th>
                <th>Tên Page</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pages as $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->name }}</td>
                    <!-- we will also add show, edit, and delete buttons -->
                    <td>
                        <a class="btn btn-small btn-success" href="{{ URL::to('pages/' . $value->id) }}">Xem</a>
                        <a class="btn btn-small btn-info" href="{{ URL::to('pages/' . $value->id . '/edit') }}">Sủa</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
    @stop