@extends('backend.main')

@section('content')
        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('monks') }}">Tăng Ni</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('monks') }}">Tất cả Tăng Ni</a></li>
                <li><a href="{{ URL::to('monks/create') }}">Thêm Tăng Ni</a>
            </ul>
        </nav>
        @if(Session::has('errorImage'))
            <div class='alert alert-danger'>
                <ul>
                    <li>{{Session::get('errorImage')}}</li>
                </ul>
            </div>
            {{Session::forget('errorImage')}}
            @endif
        <div class="panel panel-default">
            <div class="panel-heading">
                Sửa thông tin Tăng Ni
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    {{ HTML::ul($errors->all()) }}
        <!-- if there are creation errors, they will show here -->
            {{ Form::model($monk, array('route' => array('monks.update', $monk->id), 'method' => 'PUT','files' => true)) }}
            {{--<form method="post" id="monk-update" class="monk-update" enctype="multipart/form-data" action="{{route('monks.update')}}">--}}
                <div class="row">
                    <div class="col-md-9">
                        <table class="table">
                            <thead>

                            </thead>
                            <tbody>
                            <tr>
                                <td><label>Thế danh</label></td>
                                <td colspan="6"><input style="" type="text" name="the_danh" id="the_danh" placeholder="" value="{{$monk->the_danh}}" class="form-control"></td>
                            </tr>
                            <tr>
                                <td><label>Pháp danh</label></td>
                                <td colspan="6"><input type="text" name="phap_danh" id="phap_danh" placeholder="" value="{{$monk->phap_danh}}" class="form-control"></td>
                            </tr>
                            <tr>
                                <td><label>Sinh năm</label></td>
                                <td><input type="date" name="birthday" id="birthday" placeholder="birthday" value="{{$monk->birthday}}" class="form-control"></td>
                                <td><label>Số CMTND</label></td>
                                <td colspan="3"><input type="text" name="cmt" id="" placeholder="cmt" value="{{$monk->cmt}}" class="form-control"></td>
                            </tr>
                            <tr>
                                <td><label>Nơi sinh</label></td>
                                <td colspan="6"><input type="text" name="birthplace" id="birthplace" placeholder="" value="{{$monk->birthplace}}" class="form-control"></td>
                            </tr>
                            <tr>
                                <td><label>Thường trú</label></td>
                                <td colspan="6"><input type="text" name="address" id="address" placeholder="" value="{{$monk->address}}" class="form-control"></td>
                            </tr>
                            <tr>
                                <td><label>Họ tên bố</label></td>
                                <td><input type="text" name="dad_name" id="dad_name" placeholder="" value="{{$monk->dad_name}}" class="form-control"></td>
                                <td><label>Sinh năm</label></td>
                                <td><input type="number" name="dad_birthday" id="dad_birthday" placeholder="" value="{{$monk->dad_birthday}}" class="form-control"></td>
                                <td><label>mat</label></td>
                                <td>
                                    <select name="dad_dead" id="dad_dead" class="form-control">
                                        <option value="0"@if($monk->dad_dead == 0){{'selected'}}@endif>Còn sống</option>
                                        <option value="1"@if($monk->dad_dead == 1){{'selected'}}@endif>không rõ</option>
                                        <option value="2"@if($monk->dad_dead == 2){{'selected'}}@endif>Đã mất</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Họ tên mẹ</label>
                                </td>
                                <td><input type="text" name="mother_name" id="mother_name" placeholder="" value="{{$monk->dad_name}}" class="form-control"></td>
                                <td><label>Sinh năm</label></td>
                                <td><input type="number" name="mother_birthday" id="mother_birthday" placeholder="" value="{{$monk->dad_birthday}}" class="form-control"></td>
                                <td><label>mat</label></td>
                                <td>
                                    <select name="mother_dead" id="mother_dead" class="form-control">
                                        <option value="0"@if($monk->mother_dead == 0){{'selected'}}@endif>Còn sống</option>
                                        <option value="1"@if($monk->mother_dead == 1){{'selected'}}@endif>không rõ</option>
                                        <option value="2"@if($monk->mother_dead == 2){{'selected'}}@endif>Đã mất</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Xuất gia năm:</label></td>
                                <td><input type="number" name="ordained" id="ordained" placeholder="" value="{{$monk->ordained}}" class="form-control"></td>
                                <td><label>Tại chùa:</label></td>
                                <td>
                                    <input name="check_first_temple" id="check_3" type="checkbox" @if($monk->check_first_temple == 'on'){{'checked'}}@endif onchange="show('check_3','fi1','fi2')">Đã có
                                    {{ Form::text('first_temple_other',Input::old('first_temple_other'), array('id' => 'fi1','class'=>'input_option')) }}
                                    <select name="first_temple" id="fi2" class="form-control">
                                        @foreach(Temple::all() as $val)
                                            <option value="{{$val->id}}"
                                            @if($val->id == $monk->first_temple)
                                                    {{'selected'}}@endif
                                                    >{{$val->name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Ngiệp sư: </label></td>
                                <td>
                                    <input name="check_position" id="check_1" type="checkbox" @if($monk->check_position == 'on'){{'checked'}}@endif onchange="show('check_1','po1','po2')">Đã có
                                    {{ Form::text('position_other',Input::old('position_other'), array('id' => 'po1','class'=>'input_option')) }}
                                    <select name="position" id="po2" class="form-control">
                                        @foreach(Position::all() as $val)
                                            <option value="{{$val->id}}"
                                            @if($val->id == $monk->position)
                                                {{'selected'}}@endif
                                                    >{{$val->name}}</option>
                                        @endforeach
                                    </select>
                                </td>                                   <td><label>Học vấn</label></td>
                                <td colspan="3"><input type="text" name="education" id="education" placeholder="" value="{{$monk->education}}" class="form-control"></td>
                            </tr>
                            <tr>
                                <td><label>Trụ trì tại chùa</label></td>
                                <td>
                                    <input name="check_temple_other" id="check_2" type="checkbox" @if($monk->check_temple_other == 'on'){{'checked'}}@endif onchange="show('check_2','la1','la2')">Đã có
                                    {{ Form::text('last_temple_other',Input::old('last_temple_other'), array('id' => 'la1','class'=>'input_option')) }}
                                    <select name="last_temple" id="la2" class="form-control">
                                        @foreach(Temple::all() as $val)
                                            <option value="{{$val->id}}"
                                            @if($val->id == $monk->last_temple)
                                                {{'selected'}}@endif
                                                    >{{$val->name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Địa chỉ: </label></td>
                                <td colspan="5"><input type="text" name="adress" id="adress" placeholder="" value="{{$monk->adress}}" class="form-control"></td>
                            </tr>
                            <tr>
                                <td><label>Điện thoại liên hệ: </label></td>
                                <td><input type="text" name="phone" id="phone" placeholder="" value="{{$monk->phone}}" class="form-control"></td>
                                <td><label>Email: </label></td>
                                <td colspan="3"><input type="text" name="email" id="email" placeholder="" value="{{$monk->email}}" class="form-control"></td>
                            </tr>
                            <tr>
                                <td><label>Thông tin khác: </label></td>
                                <td colspan="6"><textarea  name="other_information" id="other_information" placeholder="" class="form-control">{{$monk->other_information}}</textarea></td>
                            </tr>
                            </tbody>
                            <tfoot>
                            </tfoot>
                        </table>
                    </div>
                    <div class="col-md-3">
                        <label>Ảnh Đại diện</label>
                        {{--<input type="file" name="image" id="image" value="{{$monk->file}}" >--}}
                        <div class="image">
                            <img class="avatar" id="uploadPreview1" src="{{asset('uploads/thumbs/'.$monk->image)}}" />
                            <a class="btn btn-default avatar_remote" onclick="dischanger(1)">Khôi phục</a>
                            {{--<a class="btn btn-default avatar_remote" onclick="dischange_avatar(1)">Không thay dổi</a>--}}
                        </div>
                        <label></label>
                        {{ Form::file('image', array('class' => 'form-control btn btn-primary','id' => 'image1','onchange' => 'PreviewImage(1)')) }}
                        <label>{{$monk->phap_danh}}</label>
                    </div>
                </div>
            {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
                    <a class="btn btn-danger" href="{{asset("monks")}}" >Hủy bỏ</a>
                {{--<input type="submit" class="btn btn-primary">--}}
            {{--</form>--}}
            {{ Form::close() }}
                </div>
                <!-- /.table-responsive -->
            </div>
        </div>
        <script>
            function show(check,va1,va2) {
                var chk = document.getElementById(check).checked;
                if(chk){
                    document.getElementById(va2).style.display = "block";
                    document.getElementById(va1).style.display = "none";
                }else{
                    document.getElementById(va1).style.display = "block";
                    document.getElementById(va2).style.display = "none";
                }
//                var current_open = document.getElementById('current_open_info').value;
            }
            function dischanger(no){
                document.getElementById('image1').value = null;
                document.getElementById("uploadPreview1").src = '{{asset('uploads/thumbs/'.$monk->image)}}';
            }
            function PreviewImage(no) {
                var oFReader = new FileReader();
                oFReader.readAsDataURL(document.getElementById("image"+no).files[0]);
                oFReader.onload = function (oFREvent) {
                    document.getElementById("uploadPreview"+no).src = oFREvent.target.result;
                };
            }
            $( document ).ready(function() {
                show('check_3','fi1','fi2');
                show('check_1','po1','po2');
                show('check_2','la1','la2');
            });
        </script>
    @stop