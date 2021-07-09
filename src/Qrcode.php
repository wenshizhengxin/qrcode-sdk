<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2021-07-09
 * Time: 13:34
 */

namespace wenshizhengxin\qrcode_sdk;


use epii\http\http;

class Qrcode
{
    private static $domain = "http://qrcode.wszx.cc/?app=create@index";
    private static $appid = 0;
    private static $key = '';
    private $content='';// 要生成二维码的内容
    private $attr = [];
    private static $instance = null;
    public function getInstance(){
        if(!self::$instance){
            self::$instance = new self();
        }
        return self::$instance;
    }
    public function setContent($content){
        $this->content = $content;
        return $this;
    }
    public function setLogo($logoUrl){
        $this->attr['logo'] = $logoUrl;
        return $this;
    }

    public function setWidth($width){
        $this->attr['width'] = $width;
        return $this;
    }
    public function setHeight($height){
        $this->attr['height'] = $height;
        return $this;
    }
    // style是一些预设好的效果包括前景背景颜色液态圆点等的组合效果
    // 如果设置了style,有单独设置了其它属性，则会覆盖style的设置
    public function setStyle($style){
        // 暂未实现 后期实现了 约定一些常量供选择
        $this->attr['style'] = $style;
        return $this;
    }

    // 前景色
    public function setFroegroundColor($color){
         // $color是数组则是渐变
         $this->attr['foreground_color'] = $color;
         return $this;
    }
    // 背景色
    public function setBackgroundColor($color){
        // $color是数组则是渐变
        $this->attr['background_color'] = $color;
        return $this;
    }

    public function setForegroundImg($foreground){
        $this->attr['foreground_img'] = $foreground;
        return $this;
    }
    public function setBackgroundImg($background){
        $this->attr['background_img'] = $background;
        return $this;
    }
    // 添加文案
    public function setCopywriting($content){
        $this->attr['copywriting'] = $content;
        return $this;
    }
    // 文案字体颜色
    public function setCopywritingColor($color){
        $this->attr['copywriting_color'] = $color;
        return $this;
    }
    // 文案的字体
    public function setCopywritingFont($font){
        $this->attr['copywriting_font'] = $font;
        return $this;
    }
    // 暂未实现 后期实现了会约定一些常量供选择
    public function setCodeEyeStyle($code_eye){
        $this->attr['code_eye_style'] = $code_eye;
        return $this;
    }
    // 不要用前景（图或颜色）填充码眼，此项为true的时候
    // setCodeEyeOuterBorderColor与setCodeEyeInnerBorderColor才会生效
    public function setDoNotFillCodeEyeWithForeground($bool){
        $this->attr['do_not_fill_code_eye_with_foreground']=$bool;
        return $this;
    }
    // 码眼外框颜色
    public function setCodeEyeOuterBorderColor($color){
        $this->attr['code_eye_outer_border_color'] = $color;
        return $this;
    }
    // 码眼内框颜色
    public function setCodeEyeInnerBorderColor($color){
        $this->attr['code_eye_inner_border_color'] = $color;
        return $this;
    }

    public function getQrcode(){
        if(!self::$appid || !self::$key || $this->content){
            return false;
        }
        $para = [
            'app_id'=>self::$appid,
            'req_time'=>time(),
            'req_sign'=>self::getSign(self::$appid,self::$key,time()),
            'content'=>$this->content,
            'attr'=>json_encode($this->attr)
        ];
        $res = http::post(self::$domain,$para);
        return $res;
    }
    public static function init($id,$key){
        self::$appid = $id;
        self::$key = $key;
    }
    public static function getSign($app_id,$key,$req_time){
        return md5(md5($app_id).md5($key).$req_time);
    }
}