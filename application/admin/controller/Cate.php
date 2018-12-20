<?php 
namespace app\admin\controller;
use app\admin\controller\Base;
/**
 * 文章分类
 */
class Cate extends Base
{
	
	public function index()
	{
		if (request()->isPost()) {
			$data = [
				'fid' => input('post.datas.fid'),
				'catename' => input('post.datas.cateName'),
			];
			// print_r($data);die;
			$validate = \think\Loader::validate('Cate');
			if($validate->check($data)){
				$db = \think\Db::name('cate')->insert($data);
				if ($db) {
					echo json_encode(['resultCode' => 200, 'msg'=>'添加成功!']);die;
				}else{
					echo json_encode(['resultCode' => 400, 'msg'=>'添加失败，请重试!']);die;
				}
			}else{
				echo json_encode(['resultCode' => 400, 'msg'=>$validate->geterror()]);die;
			}
		}

		//展示页面
		$cates = \think\Db::name('cate')->select();
		$this->assign('cates',$cates);
		return $this->fetch();
	}

	/**
	 * 分类信息 修改
	 */
	public function cateEdit()
	{
		$db = \think\Db::name('cate');
		if(request()->isPost()){
			$data = [
				'id' => input("post.id"),
				'fid' => input("post.fid"),
				'catename' => input("post.catename"),
			];

			$validate = \think\Loader::validate('Cate');
			if ($validate->check($data)) {
				$result = $db->where('id',$data['id'])->update($data);
				if($result){
					echo json_encode(['resultCode' => 200, 'msg'=>'修改成功！']);die;
				}else{
					// print_r($data);
					echo json_encode(['resultCode' => 400, 'msg'=>'修改失败！']);die;
				}
			}else{
				echo json_encode(['resultCode' => 400, 'msg'=>$validate->geterror()]);die;
			}
		}
		$cateInfo = $db->where('id',input('get.id'))->find();
		$cates = $db->select();
		$this->assign('cates',$cates);
		$this->assign('cateInfo',$cateInfo);
		return $this->fetch();
	}

	/**
	 * 栏目分类 删除 
	 */
	public function cateDel()
	{
		$db = \think\Db::name('cate')->delete(input("get.cateId"));
		if($db){
			echo json_encode(['resultCode' => 200, 'msg'=>'删除成功']);die;
		}else{
			echo json_encode(['resultCode' => 400, 'msg'=>'删除失败，请重试!']);die;
		}
	}
}