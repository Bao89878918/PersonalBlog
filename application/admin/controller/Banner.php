<?php 
namespace app\admin\controller;
use app\admin\controller\Base;
/**
 * 轮播管理 框架页
 */
class Banner extends Base
{
	
	public function index()
	{
		return $this->fetch();
	}

	/**
	 * 轮播图增加
	 */
	public function bannerAdd()
	{
		return $this->fetch();
	}

	/**
	 * 轮播信息 修改
	 */
	public function bannerEdit()
	{
		return $this->fetch();
	}
}