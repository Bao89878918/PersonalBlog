<?php 
namespace app\admin\controller;
use app\admin\controller\Base;
/**
 * 回复控制器
 */
class Comment extends Base
{
	public function index()
	{
		return $this->fetch();
	}
}