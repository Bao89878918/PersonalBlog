<?php 
namespace app\admin\controller;
use app\admin\controller\Base;
use \think\captcha\Captcha;
use \think\Session;

/**
 * 后台首页
 */
class Index extends Base
{
	public function index()
	{
		if(request()->isAjax()){
			$data = [
				'account' => input('post.username'),
				'password' => md5(input('post.password')),
			];

			//验证码验证
			if(!captcha_check(input('post.vcode'))){
				echo json_encode(['resultCode'=>400,'msg'=>'验证码错误']);die;
			}

			//用户名、密码验证
			$result = \think\Db::name('user')->where($data)->select();
			if($result){
				Session::set('userInfo',$result[0]);
				echo json_encode(['resultCode'=>200,'msg'=>'登录成功！']);die;
			}else{
				echo json_encode(['resultCode'=>400,'msg'=>'登录失败！']);die;
			}
		}
		return $this->fetch('login');
	}

	/**
	 * 管理首页
	 */
	public function adminIndex()
	{
		return $this->fetch('index');
	}

	/**
	 * 退出登录
	 */
	public function lgout()
	{
		Session::delete('userInfo');
		if(!Session::has('userInfo')){
			$this->success('登出成功，正在返回首页！','index/Index/index','',3);
		}
	}

	/**
	 * 后台欢迎 框架页
	 */
	public function welcome()
	{
		return $this->fetch();
	}

	public function Captcha()
	{
		$captcha = new Captcha();
		return $captcha->entry();
	}
}