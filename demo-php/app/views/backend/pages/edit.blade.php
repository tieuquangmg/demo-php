@extends('backend.main')

@section('content')
        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('pages') }}">Pages</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('pages') }}">Tất cả Pages</a></li>
            </ul>
        </nav>

        <div class="panel panel-default">
            <div class="panel-heading">
                Sửa {{ $page->title }}
            </div>
            <div class="panel-body">
                <div class="col-sm-11">

                </div>
                <div class="col-sm-1">
                </div>
                @if(Session::has('errorImage'))
                    <div class='alert alert-danger'>
                        <ul>
                            <li>{{Session::get('errorImage')}}</li>
                        </ul>
                    </div>
                    {{Session::forget('errorImage')}}
                    @endif
                            <!-- if there are creation errors, they will show here -->
                    {{ HTML::ul($errors->all()) }}
                    {{ Form::model($page, array('route' => array('pages.update', $page->id), 'method' => 'PUT','files' => true)) }}

                        <div class="form-group">
                            {{ Form::label('name', 'Tên Page') }}
                            {{ Form::text('name',null, array('class' => 'form-control')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('content', 'Nội dung page') }}
                            {{ Form::textarea('content',null, array('class' => 'form-control')) }}
                        </div>
                        {{ Form::submit('Lưu lại', array('class' => 'btn btn-primary')) }}

                    {{ Form::close() }}
            </div>
        </div>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'content' );
            </script>
    @stop