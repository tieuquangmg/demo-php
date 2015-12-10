@extends('backend.main')
@section('content')
        <nav class="navbar navbar-default">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('posts') }}">Tin Tứct</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('posts') }}">Hiển Thị Tất cả tin</a></li>
                <li><a href="{{ URL::to('posts/create') }}">Viết Tin Mới</a>
            </ul>
        </nav>
        <div class="panel panel-default">
            <div class="panel-heading">
                Tất cả tin
            </div>
            <div class="panel-body">
                <div class="col-sm-11">

                </div>
                <div class="col-sm-1">

                </div>
                <!-- will be used to show any messages -->
                @if (Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                @endif
                <table class="table table-striped table-bordered" id="example">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tiêu Đề</th>
                        <th>Loại Tin</th>
                        <th>Hành động</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th></th>
                        <th>Tiêu Đề</th>
                        <th>Loại Tin</th>
                        <th></th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($post as $value)
                        <tr>
                            <td>{{ $value->id }}</td>
                            <td>{{ $value->title }}</td>
                            <td>{{Newtypes::find($value->category)->name}}</td>
                            <!-- we will also add show, edit, and delete buttons -->
                            <td>
                                <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                                <!-- we will add this later since its a little more complicated than the other two buttons -->
                                {{ Form::open(array('url' => 'posts/' . $value->id, 'class' => 'pull-right')) }}
                                {{ Form::hidden('_method', 'DELETE') }}
                                {{ Form::submit('Xóa tin này', array('class' => 'btn btn-warning',"onclick"=>"return confirm('Bạn có muốn xóa không')")) }}
                                {{ Form::close() }}
                                <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                                <a class="btn btn-small btn-success" href="{{ URL::to('posts/' . $value->id) }}">Xem</a>
                                <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                                <a class="btn btn-small btn-info" href="{{ URL::to('posts/' . $value->id . '/edit') }}">Sủa</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <script>
            $(document).ready(function(){
                $('#example').dataTable({
                    responsive: true
                }).columnFilter({
                    aoColumns: [
                        null,
                        { type: "text" },
                        { type: "select", values: [<?php foreach(Newtypes::all() as $val){echo "'".$val->name."',"; } ?>]  }
                    ]
                });
            });
        </script>
    @stop