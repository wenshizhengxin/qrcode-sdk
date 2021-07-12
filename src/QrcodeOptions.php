<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2021-07-12
 * Time: 14:54
 */

namespace wenshizhengxin\qrcode_sdk;


class QrcodeOptions
{
    private $options = [];
    public function setLogo($logoUrl){
        $this->options['logo'] = $logoUrl;
        return $this;
    }

    //matrixPointSize
    public function setSize($width){
        $this->options['size'] = $width;
        return $this;
    }
    // 请注意 下面的属性都未实现
    // style是一些预设好的效果包括前景背景颜色液态圆点等的组合效果
    // 如果设置了style,有单独设置了其它属性，则会覆盖style的设置
    public function setStyle($style){
        // 暂未实现 后期实现了 约定一些常量供选择
        $this->options['style'] = $style;
        return $this;
    }

    // 前景色
    public function setFroegroundColor($color){
        // $color是数组则是渐变
        $this->options['foreground_color'] = $color;
        return $this;
    }
    // 背景色
    public function setBackgroundColor($color){
        // $color是数组则是渐变
        $this->options['background_color'] = $color;
        return $this;
    }

    public function setForegroundImg($foreground){
        $this->options['foreground_img'] = $foreground;
        return $this;
    }
    public function setBackgroundImg($background){
        $this->options['background_img'] = $background;
        return $this;
    }
    // 添加文案
    public function setCopywriting($content){
        $this->options['copywriting'] = $content;
        return $this;
    }
    // 文案字体颜色
    public function setCopywritingColor($color){
        $this->options['copywriting_color'] = $color;
        return $this;
    }
    // 文案的字体
    public function setCopywritingFont($font){
        $this->options['copywriting_font'] = $font;
        return $this;
    }
    // 暂未实现 后期实现了会约定一些常量供选择
    public function setCodeEyeStyle($code_eye){
        $this->options['code_eye_style'] = $code_eye;
        return $this;
    }
    // 不要用前景（图或颜色）填充码眼，此项为true的时候
    // setCodeEyeOuterBorderColor与setCodeEyeInnerBorderColor才会生效
    public function setDoNotFillCodeEyeWithForeground($bool){
        $this->options['do_not_fill_code_eye_with_foreground']=$bool;
        return $this;
    }
    // 码眼外框颜色
    public function setCodeEyeOuterBorderColor($color){
        $this->options['code_eye_outer_border_color'] = $color;
        return $this;
    }
    // 码眼内框颜色
    public function setCodeEyeInnerBorderColor($color){
        $this->options['code_eye_inner_border_color'] = $color;
        return $this;
    }
    public function getOptions(){
        return $this->options;
    }
}