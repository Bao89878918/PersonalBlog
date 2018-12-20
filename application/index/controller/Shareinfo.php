<?php
namespace app\index\controller;
use think\Controller;
class Shareinfo extends Controller
{
    public function index()
    {
    	$db = \think\Db::name('Article');
    	$articleInfo = $db->where('id',input("id"))->select();
    	if($articleInfo){
    		$this->assign('articleInfo',$articleInfo[0]);
    	}else{
    		throw new \think\exception\HttpException(404, '页面不存在');
    	}
    	
    	return $this->fetch('shareinfo');
    }
}
