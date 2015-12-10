@extends('backend.main')
@section('content')
        <nav class="navbar navbar-default">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('posts') }}">Tin Tức</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('posts') }}">Tất cả tin</a></li>
                <li><a href="{{ URL::to('posts/create') }}">Viết tin mới</a>
            </ul>
        </nav>
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ $post->title }}
                </div>
                <div class="panel-body">
                    <div class="col-md-6">
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <td><h4>loại tin:</h4><br> {{Newtypes::find($post->category)->first()->name}}</td>
                            <td><h4>Ảnh đại diện:</h4><br> <img style="" src="{{asset('uploads/thumbs/'.$post->thumb)}}"></td>
                        </tr>
                        </tbody>
                    </table>
                    </div>
                    <div style="clear: both">
                    </div>
                    <div class="" style="max-width: 830px">
                    <h4>Decription</h4>
                    <p>{{$post->decription}}</p>
                    <h4>Chi tiết:</h4>
                    <div class="col-md-9">
                    {{ $post->content }}
                    </div>
                    </div>
                </div>
            </div>
    @stop