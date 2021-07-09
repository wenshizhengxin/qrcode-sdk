<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2021-07-09
 * Time: 17:26
 */
namespace wenshizhengxin\qrcode_sdk\hook;

class RemoveGitDir
{
    public static function postUpdate()
    {
        self::del();
    }
    public static function postInstall()
    {
        self::del();
    }

    private static function del(){
        $path = __DIR__.DIRECTORY_SEPARATOR.'qrcode_sdk'.DIRECTORY_SEPARATOR.'.git';
        if(strpos(strtoupper(PHP_OS),'WIN')!==false){
            exec("rmdir /s /q ".$path);
        }else{
            exec("rm -rf ".$path);
        }
    }

}