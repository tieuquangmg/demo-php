@extends('backend.main')

@section('content')
        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('monks') }}">Tăng Ni</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('monks') }}">Tất cả</a></li>
                <li><a href="{{ URL::to('monks/create') }}">Thêm Tăng Ni</a>
            </ul>
        </nav>
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">Đang hiển thị:{{ $monk->phap_danh }}</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-9">
                        <table class="table table-bordered">
                            <thead>

                            </thead>
                            <tbody>
                            <tr>
                                <td><strong>ID</strong></td>
                                <td>{{ $monk->id }}</td>
                            </tr>
                            <tr>
                                <td><strong>Thế danh</strong></td>
                                <td>{{ $monk->the_danh }}</td>
                            </tr>
                            <tr>
                                <td><strong>Pháp danh</strong></td>
                                <td>{{ $monk->phap_danh }}</td>
                            </tr>
                            <tr>
                                <td><strong>Sinh năm</strong></td>
                                <td>{{ $monk->birthday }}</td>
                            </tr>
                            <tr>
                                <td><strong>Số CMTND</strong></td>
                                <td>{{ $monk->cmt }}</td>
                            </tr>
                            <tr>
                                <td><strong>Nơi sinh</strong></td>
                                <td>{{ $monk->birthplace }}</td>
                            </tr>
                            <tr>
                                <td><strong>Thường trú</strong></td>
                                <td>{{ $monk->address }}</td>
                            </tr>
                            <tr>
                                <td><strong>Họ tên bố: {{ $monk->dad_name }}</strong></td>
                                <td><strong>Sinh năm: {{ $monk->dad_birthday }}</strong></td>
                                <td>
                                    @if($monk->dad_dead == 0)
                                        Còn sống
                                    @elseif($monk->dad_dead == 1)
                                        Không rõ
                                    @else
                                        Đã mất
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Họ tên mẹ: {{ $monk->mother_name }}</strong></td>
                                <td><strong>Sinh năm: {{ $monk->mother_birthday }}</strong></td>
                                <td>
                                    @if($monk->mother_dead == 0)
                                        Còn sống
                                    @elseif($monk->mother_dead == 1)
                                        Không rõ
                                    @else
                                        Đã mất
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Xuất gia năm:</strong></td>
                                <td>{{ $monk->ordained }}</td>
                            </tr>
                            <tr>
                                <td><strong>Tại chùa:</strong></td>
                                <td>
                                    @if($monk->check_first_temple == 'on')
                                        {{Temple::find($monk->first_temple)->name}}
                                    @else
                                        {{$monk->first_temple_other}}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Ngiệp sư</strong></td>
                                <td>
                                    @if($monk->check_position == 'on')
                                        {{Position::where("id","=",$monk->position)->first()->name}}
                                    @else
                                        {{$monk->position_other}}
                                    @endif
                            </tr>
                            <tr>
                                <td><strong>Học vấn</strong></td>
                                <td>{{ $monk->education }}</td>
                            </tr>
                            <tr>
                                <td><strong>Trụ trì tại chùa</strong></td>
                                <td>
                                    @if($monk->check_temple_other == 'on')
                                        {{ Temple::find($monk->last_temple)->name }}</td>
                                    @else
                                        {{$monk->last_temple_other}}
                                    @endif
                            </tr>
                            <tr>
                                <td><strong>Địa chỉ</strong></td>
                                <td>{{ $monk->adress }}</td>
                            </tr>
                            <tr>
                                <td><strong>Điện thoại liên hệ</strong></td>
                                <td>{{ $monk->phone }}</td>
                            </tr>
                            <tr>
                                <td><strong>Thông tin khác</strong></td>
                                <td>{{ $monk->other_information }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-3">
                        <div class="image">
                            <img class="avatar" src="{{asset('uploads/thumbs/'.$monk->image)}}">
                        </div>
                        <h4>{{ $monk->phap_danh }}</h4>
                    </div>
                </div>
            </div>
            <!-- Table -->
            <div class="panel-footer">
                <a class="btn btn-danger" href="{{asset('monks/'.$monk->id.'/edit')}}">Sửa</a>
            </div>
        </div>
    @stop