@if(Session::get('logined') == true)
    <?php $data = Monk::find($_GET['id']) ?>
    <div>
        <div style="float: left">
            <img src="{{asset('uploads/thumbs/'.$data->image)}}">
        </div>
        <div style="float: left;margin-left: 20px;width: 400px">
            <table class="table">
                <tbody>
                <tr>
                    <td>Pháp Danh: </td>
                    <td>{{$data->phap_danh}}</td>
                </tr>            <tr>
                    <td>Thế Danh: </td>
                    <td>{{$data->the_danh}}</td>
                </tr>            <tr>
                    <td>Sinh Năm: </td>
                    <td>{{$data->birthday}}</td>
                </tr>
                <tr>
                    <td colspan="2">Thường trú: {{$data->adress}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@else
<?php Redirect::to('/') ?>
@endif

