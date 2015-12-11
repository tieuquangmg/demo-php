@extends('backend.main')
    @section('content')
            <nav class="navbar navbar-inverse">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ URL::to('monks') }}">Tăng Ni</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="{{ URL::to('monks') }}">Tất Tăng Ni</a></li>
                    <li><a href="{{ URL::to('monks/create') }}">Thêm Tăng Ni</a>
                </ul>
            </nav>
            <h4></h4>
            <ul class="breadcrumb">
                <li>Thêm Tăng Ni</li>
            </ul>
            <form method="post" id="monk-create" class="monk-create" enctype="multipart/form-data" action="{{route('monks.store')}}">
            <!-- if there are creation errors, they will show here -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Nhập thông tin Tăng Ni
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <div class="col-lg-12">
                                @if(Session::has('errorImage'))
                                    <div class='alert alert-danger'>
                                        <ul>
                                            <li>{{Session::get('errorImage')}}</li>
                                        </ul>
                                    </div>
                                    {{Session::forget('errorImage')}}
                                @endif
                                    {{ HTML::ul($errors->all()) }}

            <table class="table">
                <thead>

                </thead>
                <tbody>
                <tr>
                    <td>{{ Form::label('the_danh', 'Thế danh', array('class' => 'req'))}}</td>
                    <td>{{ Form::text('the_danh',Input::old('the_danh'), array('class' => 'form-control')) }}</td>
                    <td>{{ Form::label('phap_danh', 'Pháp danh', array('class' => 'req')) }}</td>
                    <td>{{ Form::text('phap_danh',Input::old('phap_danh'), array('class' => 'form-control')) }}</td>
                </tr>
                <tr>
                    <td><label class="req">Sinh năm</label></td>
                    <td><input type="date" name="birthday" id="birthday" placeholder="birthday" class="form-control"></td>
                    <td>{{ Form::label('cmt', 'Số CMTND', array('class' => 'req')) }}</td>
                    <td>{{ Form::number('cmt',Input::old('cmt'), array('class' => 'form-control')) }}</td>
                </tr>
                <tr>
                    <td>{{ Form::label('birthplace', 'Nơi sinh', array('class' => 'req')) }}</td>
                    <td>{{ Form::textarea('birthplace',Input::old('birthplace'), array('class' => 'form-control','style'=>'height:70px')) }}</td>
                    <td>{{ Form::label('address', 'Thường trú', array('class' => 'req')) }}</td>
                    <td>{{ Form::textarea('address',Input::old('address'), array('class' => 'form-control','style'=>'height:70px')) }}</td>
                </tr>
                <tr>
                    <td>{{ Form::label('dad_name', 'Họ tên bố', array('class' => 'req')) }}</td>
                    <td>{{ Form::text('dad_name',Input::old('dad_name'), array('class' => 'form-control')) }}</td>
                    <td>{{ Form::label('dad_birthday', 'Sinh năm', array('class' => 'req')) }}</td>
                    <td>{{ Form::number('dad_birthday',Input::old('dad_birthday'), array('class' => 'form-control')) }}</td>
                    <td><label>mất</label></td>
                    <td>
                        {{Form::select('dad_dead',array('0' => 'Còn sống', '1' => 'không rõ', '2' => 'Đã mất'))}}
                    </td>
                </tr>
                <tr>
                    <td>
                        {{ Form::label('mother_name', 'Họ tên mẹ', array('class' => 'req')) }}
                    </td>
                    <td>{{ Form::text('mother_name',Input::old('mother_name'), array('class' => 'form-control')) }}</td>
                    <td>{{ Form::label('mother_birthday', 'năm:', array('class' => 'req')) }}</td>
                    <td>{{ Form::number('mother_birthday',Input::old('mother_birthday'), array('class' => 'form-control')) }}</td>
                    <td><label>mất</label></td>
                    <td>
                        {{Form::select('mother_dead',array('0' => 'Còn sống', '1' => 'không rõ', '2' => 'Đã mất'))}}
                    </td>
                </tr>
                <tr>
                    <td>{{ Form::label('ordained', 'Xuất gia năm:', array('class' => 'req')) }}</td>
                    <td>{{ Form::number('ordained',Input::old('ordained'), array('class' => 'form-control')) }}</td>
                    <td><label class="req">Tại chùa:</label></td>
                    <td>
                        <input name="check_first_temple" id="check_3" type="checkbox" onchange="show('check_3','fi1','fi2')">Đã có
                        {{ Form::text('first_temple_other',Input::old('first_temple_other'), array('id' => 'fi1','class'=>'input_option')) }}
                        <?php $location = array();?>
                        @foreach(Temple::all() as $key =>$val)
                            <?php $location[$val->id]=$val->name ?>
                        @endforeach
                        {{Form::select('first_temple',$location,null, array('id' => 'fi2','style'=>'display: none'))}}
                    </td>
                </tr>
                <tr>
                    <td><label class="req">Ngiệp sư: </label></td>
                    <td>
                        <input name="check_position" id="check_1" type="checkbox" onchange="show('check_1','po1','po2')">Đã có
                   {{ Form::text('position_other',Input::old('position_other'), array('id' => 'po1','class'=>'input_option')) }}
                        <?php $Position = array();?>
                @foreach(Position::all() as $key =>$val)
                            <?php $Position[$val->id]=$val->name ?>
                        @endforeach
                        {{Form::select('position',$Position,null, array('id' => 'po2','style'=>'display: none'))}}
                    </td>
                    <td>{{ Form::label('education', 'Học vấn', array('class' => 'req')) }}</td>
                    <td>{{ Form::text('education',Input::old('education'), array('class' => 'form-control input_option')) }}</td>
                </tr>
                <tr>
                    <td><label class="req">Trụ trì tại</label></td>
                    <td>
                        <input name="check_temple_other" id="check_2" type="checkbox" onchange="show('check_2','la1','la2')">Đã có
                        {{ Form::text('last_temple_other',Input::old('last_temple_other'), array('id' => 'la1','class'=>'input_option')) }}
                        <?php $location = array();?>
                        @foreach(Temple::all() as $key =>$val)
                            <?php $location[$val->id]=$val->name ?>
                        @endforeach
                        {{Form::select('last_temple',$location,null, array('id' => 'la2','style'=>'display: none'))}}
                    </td>
                    <td>{{ Form::label('adress', 'Địa chỉ: ', array('class' => 'req')) }}</td>
                    <td>{{ Form::text('adress',Input::old('adress'), array('class' => 'form-control')) }}</td>
                </tr>
                <tr>
                    <td>{{ Form::label('phone', 'Điện thoại liên hệ: ', array('class' => 'req')) }}</td>
                    <td>{{ Form::number('phone',Input::old('phone'), array('class' => 'form-control')) }}</td>
                    <td>{{ Form::label('email', 'Email:', array('class' => 'req')) }}</td>
                    <td>{{ Form::email('email',Input::old('email'), array('class' => 'form-control')) }}</td>
                </tr>
                <tr>
                    <td>{{ Form::label('other_information', 'Thông tin khác: ') }}</td>
                    <td colspan="6">{{ Form::textarea('other_information',Input::old('other_information'), array('class' => 'form-control decription')) }}</td>
                </tr>
                <tr>
                    <td><label>Ảnh đại diện</label></td>
                    <td>
                        <div>
                        <img class="avatar" id="uploadPreview1" src="{{asset('themes/images/img/no_avatar.png')}}" />
                            <a class="btn btn-default avatar_remote" onclick="remote_avatar(1)">Xóa ảnh</a>

                        </div>
                        <div></div>
                        <input class="btn btn-primary" type="file" name="image" id="image1" onchange="PreviewImage(1);">
                    </td>
                </tr>
                </tbody>
                <tfoot>
                </tfoot>
            </table>
                            </div>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <div class="panel-footer">
                        <input type="submit" class="btn btn-danger" value="Xác nhận">
                    </div>
                </div>
            </form>
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
            function remote_avatar(no){
                var oFReader = new FileReader();
                oFReader.readAsDataURL(document.getElementById("image"+no).files[0]);
                document.getElementById('image1').value = null;
                oFReader.onload = function (oFREvent) {
                document.getElementById("uploadPreview"+no).src = '{{asset('themes/images/img/no_avatar.png')}}';
                };
            }
            function PreviewImage(no) {
                var oFReader = new FileReader();
                oFReader.readAsDataURL(document.getElementById("image"+no).files[0]);
                oFReader.onload = function (oFREvent) {
                    document.getElementById("uploadPreview"+no).src = oFREvent.target.result;
                };
            }
        </script>
        <script type="text/javascript">
//            jQuery.validator.setDefaults({
//                debug: true,
//                success: "valid"
//            });
//            alert('sdfsdf');
            $("#monk-create").validate({
                rules:{
                    the_danh:{
                        required:true,
                        maxlength:25
                    },
                    phap_danh:{
                        required:true,
                        maxlength:25
                    },
                    birthday:{
                        required:true
                    },
                    cmt:{
                        required:true,
                        minlength:9
                    },
                    birthplace:{
                        required:true,
                        maxlength:255
                    },
                    address:{
                        required:true,
                        maxlength:255
                    },
                    ordained:{
                        required:true,
                        number:true,
                        max:2050,
                        min:1800
                    },
                    phone:{
                        required:true
                    }
                },
                messages:{
                    the_danh:{
                        required:"Vui lòng nhập Thế danh",
                        maxlength:"Độ dài không quá 25 ký tự"
                    },
                    phap_danh:{
                        required:"Vui lòng nhập Pháp danh",
                        maxlength:"Độ dài không quá 25 ký tự"
                    },
                    birthday:{
                        required:"Vui lòng nhập Ngày sinh"
                    },
                    cmt:{
                        required:"Vui lòng nhập cmt",
                        length:"Không phải số cmtnd"
                    },
                    birthplace:{
                        required:"Vui lòng nhập nơi sinh",
                        maxlength:"Độ dài không vượt quá 255 ký tự"
                    },
                    address:{
                        required:"Vui lòng nhập địa chỉ",
                        minlength:"Phải nhập 3 kí tự trở lên"
                    },
                    ordained:{
                        required:"Vui lòng nhập năm xuất gia",
                        min:"Không phải năm",
                        max:"Không phải năm"
                    },
                    phone:{
                        required:"Vui lòng nhập số điện thoại"
                    }
                }
            })
        </script>
    @stop
