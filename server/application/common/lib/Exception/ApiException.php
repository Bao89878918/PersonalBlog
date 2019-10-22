<?php
namespace app\common\lib\exception;

use Exception;
use think\exception\Handle;
use think\exception\HttpException;
use think\exception\ValidateException;

class ApiException extends Handle{

	public function render(\Exception $e){
		$json = [
			'status_code' => 500,
			'data'        => [],
			'msg'         => '数据请求失败，详见：'.$e->getMessage()
		];
        echo json_encode($json,true);die;
    }
}