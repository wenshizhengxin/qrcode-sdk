<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2021-07-09
 * Time: 13:34
 */

namespace wenshizhengxin\qrcode_sdk;


use epii\api\result\ApiResult;
use epii\http\http;

class Qrcode
{
    private static $domain = "http://qrcode.wszx.cc/?app=create@index";
    private static $appid = 0;
    private static $key = '';

    public static function make($content,QrcodeOptions $options=null){
        if(!self::$appid || !self::$key || !$content){
            return false;
        }
        $content_type = '';
        if(is_string($content)){
            $content_type = 'str';
        }elseif(is_array($content)){
            $content = json_encode($content);
            $content_type = 'json';
        }
        if(!$content_type){
            return false;
        }

        $para = [
            'app_id'=>self::$appid,
            'req_time'=>time(),
            'req_sign'=>self::getSign(self::$appid,self::$key,time()),
            'content'=>$content,
            'content_type'=>$content_type,
            'attr'=>$options===null?json_encode([]):json_encode($options->getOptions())
        ];
        $res = http::post(self::$domain,$para);
        return new QrcodeResult($res);
    }
    public static function init($id,$key){
        self::$appid = $id;
        self::$key = $key;
    }
    public static function getSign($app_id,$key,$req_time){
        return md5(md5($app_id).md5($key).$req_time);
    }
}