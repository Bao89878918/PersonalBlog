<?php
namespace app\index\controller;
use think\Controller;
class Index extends Controller
{
    public function index()
    {
        $db = \think\Db::name('article');
    	//查文章
    	$articleList = $db->order('id','desc')->select();
        $this->assign('articleList',$articleList);
        //点击排行
        $articleHot = $db->order('hits','desc')->limit(5)->select();
        $this->assign('articleHot',$articleHot);
    	//友情链接
    	$linkList = \think\Db::name('link')->select();
    	$this->assign('linkList',$linkList);
    	return $this->fetch('index');
    }
}
