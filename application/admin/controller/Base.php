<?php 
namespace app\admin\controller;
use think\Controller;
use think\Session;
/**
 * 后台通用类
 */
class Base extends Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->is_login();
	}

	/**
	 * 检测用户是否登录，防止翻墙
	 */
	protected static function is_login()
	{
		$action = request()->controller().'/'.request()->action();
		// echo $action;die;
		if(Session::has('userInfo')){
			return ;
		}else{
			$no_login = array('Index/index','Index/captcha');
			// echo $action;die;
			/**
			 * 后期如果多动作，可以for循环代替第二个参数
			 */
			if(in_array($action, $no_login)){
				return ;
			}else{
				$controller = new Controller();
				$controller->error('请登录后，再操作！','Index/index','',3);die;
			}
		}
	}
}