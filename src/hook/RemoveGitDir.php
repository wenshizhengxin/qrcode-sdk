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

        if(strpos(strtoupper(PHP_OS),'WIN')!==false){
            exec("rmdir /s /q ".__DIR__.'/qrcode-sdk/.git');
        }else{
            $path = __DIR__.'/qrcode-sdk/.git';
            $path = str_replace('\\','/',$path);
            exec("rm -rf ".$path);
        }
    }

}