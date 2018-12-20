<?php 
namespace app\admin\controller;
use app\admin\controller\Base;
/**
 * 文章控制器
 */
class Article extends Base
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$articleList = \think\Db::name('article')->order('id','desc')->select();
		$this->assign('articleList',$articleList);
		return $this->fetch();
	}

	/**
	 * 文章添加
	 */
	public function articleAdd()
	{
		$db = \think\Db::name('article');
		if(request()->isAjax()){
			$data = [
				'title' => input('post.datas.title'),
				'descibe'	=> trim(input('post.text')),
				'content' => input('post.datas.content'),
				'type' => input('post.datas.type'),
				'owner' => input('post.datas.owner'),
				'hits' => input("post.datas.hits"),
				'time' => time(),
			];
			// print_r($data);die;
			$validate = \think\Loader::validate('Article');
			if(!$validate->check($data)){
				echo json_encode(['resultCode'=>400,'msg'=>$validate->geterror()]);die;
			}
			$db->insert($data);
			if($db){
				echo json_encode(['resultCode'=>200,'msg'=>'文章添加成功！']);die;
			}else{
				echo json_encode(['resultCode'=>400,'msg'=>'文章添加失败，请重新尝试！']);die;
			}
		}
		$cates = \think\Db::name('cate')->select();
		$this->assign('cates',$cates);
		return $this->fetch();
	}

	/**
	 * 文章删除
	 */
	public function articleDel()
	{
		if(request()->isAjax()){
			$db = \think\Db::name('article')->delete(input('get.id'));
			if($db){
				echo json_encode(['resultCode'=>200,'msg'=>'删除成功！']);die;
			}else{
				echo  json_encode(['resultCode'=>400,'msg'=>'删除失败，请重新尝试！']);die;
			}
		}
		return $this->fetch();
	}

	/**
	 * 文章修改
	 */
	public function articleEdit()
	{
		$db = \think\Db::name('article');
		if(request()->isAjax()){
			$data = [
				'title' => input("post.datas.title"),
				'descibe'	=> trim(input('post.text')),
				'content' => input("post.datas.content"),
				'type' => input("post.datas.type"),
				'owner' => input("post.datas.owner"),
				'hits' => input("post.datas.hits"),
				'time' => time()
			];
			$validate = \think\Loader::validate('Article');
			if($validate->check($data)){
				$result = $db->where('id',input('get.id'))->update($data);
				if($result){
					echo json_encode(['resultCode'=>200,'msg'=>'修改成功！']);die;
				}else{
					echo json_encode(['resultCode'=>400,'msg'=>'修改失败，请稍后重试！']);die;
				}
			}else{
				echo json_encode(['resultCode'=>400,'msg'=>$validate->geterror()]);die;
			}
		}
		$articleInfo = $db->where('id',input('get.id'))->find();
		$cates = \think\Db::name('cate')->select();
		$this->assign('articleInfo',$articleInfo);
		$this->assign('cates',$cates);
		return $this->fetch();
	}
}