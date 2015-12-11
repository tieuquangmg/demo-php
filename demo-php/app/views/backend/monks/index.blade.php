@extends('backend.main')
@section('content')
        <nav class="navbar navbar-default">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('monks') }}">Tăng Ni</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('monks') }}">Tất cả Tăng NI</a></li>
                <li><a href="{{ URL::to('monks/create') }}">Thêm Tăng NI </a>
            </ul>
        </nav>
        <div class="panel panel-default">
             <div class="panel-heading">
                 Tất cả Tăng NI
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
                        <th>Thế danh</th>
                        <th>Pháp danh</th>
                        <th>Position</th>
                        <th>Hành động</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th></th>
                        <th>Tìm Kiếm</th>
                        <th>Tìm Kiếm</th>
                        <th>Tìm Kiếm</th>
                        <th></th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($monk as $value)
                        <tr>
                            <td>{{ $value->id }}</td>
                            <td>{{ $value->the_danh }}</td>
                            <td>{{ $value->phap_danh }}</td>
                            @if( $value->check_position == 'on')
                                <td>{{Position::find($value->position)->first()->name}}</td>
                            @else
                            <td>{{ $value->position_other }}</td>
                            @endif
                            <!-- we will also add show, edit, and delete buttons -->
                            <td>
                                <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                                <!-- we will add this later since its a little more complicated than the other two buttons -->
                                {{ Form::open(array('url' => 'monks/' . $value->id, 'class' => 'pull-right')) }}
                                {{ Form::hidden('_method', 'DELETE') }}
                                {{ Form::submit('Xóa', array('class' => 'btn btn-warning',"onclick"=>"return confirm('Bạn có muốn xóa không')")) }}
                                {{ Form::close() }}
                                <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                                <a class="btn btn-small btn-success" href="{{ URL::to('monks/' . $value->id) }}">Xem</a>
                                <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                                <a class="btn btn-small btn-info" href="{{ URL::to('monks/' . $value->id . '/edit') }}">Chỉnh sủa</a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="panel panel-footer">

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
                        { type: "text" },
                        { type: "select", values: [<?php foreach(Position::all() as $val){echo "'".$val->name."',"; } ?>]  }
                    ]
                });
            });
        </script>
    @stop