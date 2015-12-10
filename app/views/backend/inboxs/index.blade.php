@extends('backend.main')
@section('content')
        <nav class="navbar navbar-default">
            <div class="navbar-header">
                        <a class="navbar-brand" href="{{ URL::to('posts') }}">Tin nhắn</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('posts') }}">Hiển Thị Tất cả tin</a></li>
            </ul>
        </nav>

        <h1>Tất cả tin nhắn</h1>

        <!-- will be used to show any messages -->
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <table class="table table-striped table-bordered" id="example">
            <thead>
            <tr>
                <th>ID</th>
                <th>Người Gửi</th>
                <th>Email</th>
                <th>Tình Trạng</th>
                <th>Thời gian</th>
                <th>Hành Động</th>

            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>ID</th>
                <th>Người Gửi</th>
                <th>Email</th>
                <th>Tình Trạng</th>
                <th>Thời gian</th>
                <th>Hành Động</th>
            </tr>
            </tfoot>
            <tbody>
            @foreach($inboxs as $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->phone }}</td>
                    <td>@if($value->view == 0){{'Chưa xem'}}@else{{'Đã xem'}}@endif</td>
                    <td>{{$value->created_at->format('H:i:s d/m/Y')}}</td>
                    <!-- we will also add show, edit, and delete buttons -->
                    <td>
                        <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                        <!-- we will add this later since its a little more complicated than the other two buttons -->
                        {{ Form::open(array('url' => 'inboxs/' . $value->id, 'class' => 'pull-right')) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::submit('Xóa tin này', array('class' => 'btn btn-warning',"onclick"=>"return confirm('Bạn có muốn xóa không')")) }}
                        {{ Form::close() }}
                        <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                        <a class="btn btn-small btn-success" href="{{ URL::to('inboxs/' . $value->id) }}">Xem</a>
                        <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <script>
            $(document).ready(function(){
                $('#example').dataTable({
                    responsive: true
                }).columnFilter({
                    aoColumns: [
                        { type: "text"},
                        { type: "text" },
                        { type: "text"},
                        { type: "select", values: [<?php echo "'Chưa xem','Đã xem'"; ?>]  },
                        { type: "text"},
                        null
                    ]
                });
            });
        </script>
    @stop