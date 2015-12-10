<?php
/**
 * Created by PhpStorm.
 * User: quang
 * Date: 7/14/2015
 * Time: 12:52 PM
 */

class Logfile extends Eloquent
{

    protected $table = 'logs';
    public static function addData($hd,$tenbang,$id,$ten_thanhphan,$input=null){
        date_default_timezone_set("Asia/Bangkok");
        $date=new DateTime();
        if($input==null) {

            $f=new Logfile();

            $f->action=$hd;
            $f->bang=$tenbang;
            $f->id_ingredient=$id;
            $f->name_ingredient=$ten_thanhphan;
            $f->datetime=$date->format("Y-m-d H:i:s");
            $f->save();
        }else{

            $thongtincu="";
            $datas=$input[0];
            foreach($datas as $key=>$value){
                if($key!="created_at" and $key!="updated_at") $thongtincu.="{$key}:{$value} \n";
            }

            $f=new Logfile();
            $f->action=$hd;
            $f->bang=$tenbang;
            $f->id_ingredient=$id;
            $f->ten_thanhphan=$ten_thanhphan;
            $f->thongtin_cu=$thongtincu;
            $f->datetime=$date->format("Y-m-d H:i:s");
            $f->save();
        }
    }
}