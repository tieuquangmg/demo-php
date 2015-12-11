@extends('backend.main')
    @section('content')
        <div class="container">

            <nav class="navbar navbar-inverse">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ URL::to('posts') }}">Tin Tức</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="{{ URL::to('posts') }}">Tất cả tin Tức</a></li>
                    <li><a href="{{ URL::to('posts/create') }}">Thêm tin Tức mới</a>
                </ul>
            </nav>
            <div class="panel panel-default">
                <div class="panel-heading">
                    Viết tin Tức
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

                        {{ Form::open(array('url' => 'posts', 'files' => true)) }}

                        <div class="form-group">
                            {{ Form::label('title', 'Tiêu đề') }}
                            {{ Form::text('title', Input::old('title'), array('class' => 'form-control')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('thumb', 'ảnh') }}
                            {{ Form::file('thumb', Input::old('thumb'), array('class' => 'form-control')) }}
                        </div>

                        <div class="form-group">
                            @foreach(Newtypes::all() as $key =>$val)
                                <?php $newtype[$val->id]=$val->name ?>
                            @endforeach
                            {{ Form::label('category', 'Loại tin') }}
                            {{ Form::select('category',$newtype, Input::old('category'), array('class' => 'form-control')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('decription', 'Decription') }}
                            {{ Form::textarea('decription', Input::old('decription'), array('class' => 'form-control decription')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('content', 'Nội dung') }}
                            {{ Form::textarea('content', Input::old('content'), array('class' => 'form-control')) }}
                        </div>

                        {{ Form::submit('Xác nhận', array('class' => 'btn btn-primary')) }}

                        {{ Form::close() }}
                </div>
                </div>
            </div>

        <script>
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace( 'content' );
        </script>
    @stop
