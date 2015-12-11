@extends('backend.main')

@section('content')
    <div class="container">

        <nav class="navbar navbar-default">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('positions') }}">nghiệp sư</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('positions') }}">Tất cả nghiệp sư</a></li>
                <li><a href="{{ URL::to('positions/create') }}">Tạo nghiệp sư</a>
            </ul>
        </nav>
        <div class="panel panel-default">
            <div class="panel-heading">
Sửa nghiệp sư  {{ $position->name }}
            </div>
            <div class="panel-body">
                <div class="col-sm-11">

                </div>
                <div class="col-sm-1">

                </div>
                @if(Session::has('error'))
                    <div class='alert alert-danger'>
                        <ul>
                            <li>{{Session::get('error')}}</li>
                        </ul>
                    </div>
                    {{Session::forget('error')}}
                    @endif
                            <!-- if there are creation errors, they will show here -->
                    {{ HTML::ul($errors->all()) }}
                    {{ Form::model($position, array('route' => array('positions.update', $position->id), 'method' => 'PUT','files' => true)) }}
                    <div class="form-group">
                        {{ Form::label('name', 'Tên') }}
                        {{ Form::text('name',Input::old('name'), array('class' => 'form-control')) }}
                    </div>
                    {{ Form::submit('Xác nhận', array('class' => 'btn btn-primary')) }}
                    {{ Form::close() }}
            </div>
        </div>


    </div>
    @stop