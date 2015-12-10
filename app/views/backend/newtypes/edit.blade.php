@extends('backend.main')

@section('content')
    <div class="container">

        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('newtypes') }}">Loại tin tức</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('newtypes') }}">Tất cả Loại tin tức</a></li>
                <li><a href="{{ URL::to('newtypes/create') }}">Thêm Loại tin tức</a>
            </ul>
        </nav>

        <h1>Sủa Loại tin tức {{ $newtypes->name }}</h1>
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
        {{ Form::model($newtypes, array('route' => array('newtypes.update', $newtypes->id), 'method' => 'PUT','files' => true)) }}
            <div class="form-group">
                {{ Form::label('name', 'Tên') }}
                {{ Form::text('name',Input::old('name'), array('class' => 'form-control')) }}
            </div>
            {{ Form::submit('Xác nhận', array('class' => 'btn btn-primary')) }}
        {{ Form::close() }}

    </div>
    @stop