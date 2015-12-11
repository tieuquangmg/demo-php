@extends('backend.main')

@section('content')
        <nav class="navbar navbar-default">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('posts') }}">Tin tức</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('posts') }}">Tất cả Tin tức</a></li>
                <li><a href="{{ URL::to('posts/create') }}">Tạo Tin tức</a>
            </ul>
        </nav>
        <div class="panel panel-default">
            <div class="panel-heading">
                Sửa {{ $post->title }}
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
                {{ Form::model($post, array('route' => array('posts.update', $post->id), 'method' => 'PUT','files' => true)) }}
                {{$post->thumb == null}}
                <div class="form-group">
                    {{ Form::label('title', 'Tiêu đề') }}
                    {{ Form::text('title',null, array('class' => 'form-control','placeholder'=>'Nhập tiêu đề của bài viết')) }}
                </div>

                <div class="form-group">
                    {{ Form::label('thumb', 'Ảnh đại diện') }}
                    <div><img src="<?php echo asset("uploads/thumbs/{$post->thumb}") ?>" width='120' /></div>
                    {{ Form::file('thumb', array('class' => 'form-control')) }}
                </div>
                @foreach(Newtypes::all() as $val)
                    {{@$arr[$val->id] = $val->name}}
                @endforeach
                <div class="form-group">
                    {{ Form::label('category', 'Loại tin') }}
                    {{ Form::select('category',$arr, Input::old('category'), array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('decription', 'Decription') }}
                    {{ Form::textarea('decription',null, array('class' => 'form-control','placeholder'=>'Mô tả ngắn gọn về bài viết (không quá 400 ký tự)')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('content', 'Nội dung bài viết') }}
                    {{ Form::textarea('content',null, array('class' => 'form-control')) }}
                </div>

                {{ Form::submit('Xác nhận', array('class' => 'btn btn-primary')) }}

                {{ Form::close() }}
            </div>
        </div>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'content' );
            </script>

    @stop