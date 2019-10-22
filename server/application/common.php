<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

/**
 * 返回json数据给前端
 * @param  Int       $statusCode    返回状态码，成功：200  失败：500
 * @param  String    $msg           提示信息
 * @param  Array     $data          数据
 * @return json      $json
 */
function return_json( int $status, String $msg, Array $data = [] ){
    
    $json = [
        'status_code' => $status,
        'data'        => $data,
        'msg'         => $msg
    ];
    cookie('error','');
    return json_encode($json,true);
}