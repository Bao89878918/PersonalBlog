<?php 
namespace app\index\controller;
use think\Controller;
/**
 * 
 */
class Base extends Controller
{
	
	/**
	 * 获取导航条
	 */
	public function header()
	{
		$cates = \think\Db::name('cate')->select();
		// print_r($cates);die;
		//执行成功赋值，不成功报错
		if($cates){
			\think\View::share('cates',$cates);
		}else{
			$error = '导航条获取出错！';
			\think\View::share('web',$error);
		}

	}
}