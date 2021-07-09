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
        file_put_contents(__DIR__.'/aa.txt',"rmdir /s /q ".__DIR__.'/qrcode-sdk/.git');
        return ;
        if(strpos(strtoupper(PHP_OS),'WIN')!==false){
            exec("rmdir /s /q ".__DIR__.'/qrcode-sdk/.git');
        }else{
            exec("rm -rf ".__DIR__.'/qrcode-sdk/.git');
        }
    }

}