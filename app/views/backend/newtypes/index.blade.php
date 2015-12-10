@extends('backend.main')
@section('content')
        <nav class="navbar navbar-default">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('newtypes') }}">Loại tin tức</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('newtypes') }}">Tất cả Loại tin tức</a></li>
                <li><a href="{{ URL::to('newtypes/create') }}">Thêm Loại tin tức</a>
            </ul>
        </nav>

        <h2>Tất cả Loại tin tức</h2>

        <!-- will be used to show any messages -->
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Tất cả Loại tin tức
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên</th>
                                    <th>Hành động</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($newtypes as $key => $value)
                                    <tr>
                                        <td>{{ $value->id }}</td>
                                        <td>{{ $value->name }}</td>
                                        <!-- we will also add show, edit, and delete buttons -->
                                        <td>
                                            <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                                            <!-- we will add this later since its a little more complicated than the other two buttons -->
                                            {{ Form::open(array('url' => 'newtypes/' . $value->id, 'class' => 'pull-right')) }}
                                            {{ Form::hidden('_method', 'DELETE') }}
                                            {{ Form::submit('Xóa', array('class' => 'btn bg-warning',"onclick"=>"return confirm('Bạn có muốn xóa không')")) }}
                                            {{ Form::close() }}
                                            <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                                            <a class="btn bg-danger" href="{{ URL::to('newtypes/' . $value->id . '/edit') }}">Sủa</a>
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

    @stop