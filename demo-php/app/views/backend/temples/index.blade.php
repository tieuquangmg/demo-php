@extends('backend.main')
@section('content')
        <nav class="navbar navbar-default">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('temples') }}">Tự viện</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('temples') }}">Hiển Thị Tất cả Tự viện</a></li>
                <li><a href="{{ URL::to('temples/create') }}">Thêm Tự việni</a>
            </ul>
        </nav>
        <!-- will be used to show any messages -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Tất cả Tự viện
            </div>
            <div class="panel-body">
            @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif
            <table class="table table-striped table-bordered" id="example">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên Tự viện</th>
                    <th>Trụ trì</th>
                    <th>Hành động</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th></th>
                    <th>Tìm kiếm</th>
                    <th>Tìm kiếm</th>
                    <th></th>
                </tr>
                </tfoot>
                <tbody>
                @foreach($temple as $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->abbot }}</td>
                        <!-- we will also add show, edit, and delete buttons -->
                        <td>
                            <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                            <!-- we will add this later since its a little more complicated than the other two buttons -->
                            {{ Form::open(array('url' => 'temples/' . $value->id, 'class' => 'pull-right')) }}
                            {{ Form::hidden('_method', 'DELETE') }}
                            {{ Form::submit('Xóa', array('class' => 'btn btn-warning',"onclick"=>"return confirm('Bạn có muốn xóa không')")) }}
                            {{ Form::close() }}
                            <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                            <a class="btn btn-small btn-success" href="{{ URL::to('temples/' . $value->id) }}">Xem</a>
                            <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                            <a class="btn btn-small btn-info" href="{{ URL::to('temples/' . $value->id . '/edit') }}"> sủa</a>
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
                        { type: "text"},
                        null
                    ]
                });
            });
        </script>
    @stop