<?php 
namespace app\admin\controller;
use app\admin\controller\Base;
/**
 * 系统信息管理
 */
class System extends Base
{
	
	public function sysSet()
	{
		return $this->fetch();
	}

	/**
	 * 友情链接 操作
	 */
	public function sysLink()
	{
		$db = \think\Db::name('link');
		$link = $db->select();
		$this->assign('links',$link);
		return $this->fetch();
	}
	public function linkadd()
	{
		if(request()->isAjax()){
			$data = [
				'name' => input("post.name"),
				'link' => input("post.link"),
			];
			$result = \think\Db::name('link')->insert($data);
			if($result){
				echo json_encode(['resultCode'=>200,'msg'=>'添加成功']);die;
			}else{
				echo json_encode(['resultCode'=>400,'msg'=>'添加失败']);die;
			}
		}
	}
	public function linkdel()
	{
		if(request()->isAjax()){
			$result = \think\Db::name('link')->delete(input("linkid"));
			if($result){
				echo json_encode(['resultCode'=>200,'msg'=>'删除成功！']);die;
				echo json_encode(['resultCode'=>400,'msg'=>'删除失败！']);die;
			}
		}
	}
	public function linkedit()
	{
		$db = \think\Db::name('link');
		if (request()->isAjax()) {
			$data = [
				'id' => input("post.id"),
				'name' => input("post.name"),
				'link' => input("post.link")
			];
			$result = $db->where('id',$data['id'])->update($data);
			if($result){
				echo json_encode(['resultCode'=>200,'msg'=>'修改成功！']);die;
			}else{
				echo json_encode(['resultCode'=>400,'msg'=>'修改失败！']);die;
			}
		}
		$linkInfo = $db->where('id',input('id'))->select();
		$this->assign('linkInfo',$linkInfo[0]);
		return $this->fetch();
	}


	public function sysLog()
	{
		return $this->fetch();
	}

	public function sysShield()
	{
		return $this->fetch();
	}

}