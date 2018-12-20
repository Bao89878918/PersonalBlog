<?php
namespace app\index\controller;
use think\Controller;
class Share extends Controller
{
    public function index()
    {
    	return $this->fetch('share');
    }
}
