@extends('backend.main')
@section('content')
        <nav class="navbar navbar-default">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('members') }}">Thành viên</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('members') }}">Tất cả thành viên</a></li>
                <li><a href="{{ URL::to('members/create') }}">Thêm thành viên mới</a>
            </ul>
        </nav>
        <!-- will be used to show any messages -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Tất cả Thành viên
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-info">{{ Session::get('message') }}</div>
                        @endif
                        <div class="dataTable_wrapper">
                            <div class="col-sm-9">

                            </div>
                            <div class="col-sm-3">
                                @if(count(Member::Where('status','=',1)->get())>0)
                                    <a href="{{asset('members/active/true/0')}}" class="btn btn-primary">Kích hoạt tất cả</a>
                                    <a href="{{asset('members/active/false/0')}}" class="btn btn-danger" onclick="return confirm('Xác nhận hủy tất cả')">Hủy tất cả</a>
                                 @endif
                            </div>
                            <table class="table table-striped table-bordered table-hover" id="example">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Loại thanh vien</th>
                                    <th>Trạng thái</th>
                                    <th>Hành động</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th></th>
                                    <th>Tìm kiếm</th>
                                    <th>Tìm kiếm</th>
                                    <th>Tìm kiếm</th>
                                    <th>Tìm kiếm</th>
                                    <th>Tìm kiếm</th>
                                    <th></th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($members as $key => $value)
                                    <tr>
                                        <td>{{ $value->id }}</td>
                                        <td><a href="{{ URL::to('members/' . $value->id) }}">{{ $value->name }}</a></td>
                                        <td>{{ $value->username }}</td>
                                        <td>{{ $value->email }}</td>
                                        <td>{{User::find($value->id)->roles()->first()->name}}</td>
                                        <td>
                                                {{Status::where("id","=",$value->status)->first()->name}}
                                        </td>
                                        <!-- we will also add show, edit, and delete buttons -->
                                        <td>
                                            @if($value->status == 1)<a class="btn btn-primary" href="{{asset('members/active/one/'.$value->id)}}">Kích hoạt</a>@endif
                                            <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                                            <!-- we will add this later since its a little more complicated than the other two buttons -->
                                            {{ Form::open(array('url' => 'members/' . $value->id, 'class' => 'pull-right')) }}
                                            {{ Form::hidden('_method', 'DELETE') }}
                                            {{ Form::submit('Xóa', array('class' => 'btn bg-warning',"onclick"=>"return confirm('Bạn có muốn xóa không')")) }}

                                            {{ Form::close() }}
                                            <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                                            <a class="btn bg-danger" href="{{ URL::to('members/' . $value->id . '/edit') }}">Sủa</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <script>
            $(document).ready(function(){
                $('#example').dataTable({
                    responsive: true
                }).columnFilter({
                    aoColumns: [
                        { type: "text" },
                        { type: "text" },
                        { type: "text" },
                        { type: "text" },
                        { type: "select", values: [<?php echo "'Admin','Thành Viên'"; ?>]  },
                        { type: "select", values: [<?php echo "'Đã kích hoạt','Chưa kích hoạt'"; ?>]  },
                            null
                    ]
                });
            });
        </script>
    @stop