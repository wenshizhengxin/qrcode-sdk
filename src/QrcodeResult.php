<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2021-07-12
 * Time: 18:10
 */

namespace wenshizhengxin\qrcode_sdk;


use epii\api\result\ApiResult;

class QrcodeResult extends ApiResult
{
    public function getQrcodeImg(){
        return $this->getData('results');
    }
}