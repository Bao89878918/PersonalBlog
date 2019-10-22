<?php 
namespace app\api\controller;

use app\common\controller\Api;
use app\common\model\Article;

class Article extends Api
{
    public function _initialize(){
        parent::_initialize();
    }

    public function add(){
        $articleInfo = $this->request->request();
        
        $this->success('添加成功！');
    }
}