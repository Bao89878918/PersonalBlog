<?php
namespace app\common\controller;
use think\Controller;
use think\facade\Session;
use think\facade\Config;
use Firebase\JWT\JWT;

class Base extends Controller
{
    public function initialize(){
        $this->initData();
        $this->isLogin();
    }

    /**
	 * 检测用户是否登录，防止翻墙
	 */
	protected function isLogin(){
		$action = $this->getActionUrl();
        
        //不需要登录的操作
        $no_login = Config::get('app.no_login');
		if( in_array($action,$no_login) ){
			return ;
        }
        $token = request()->header('Authorization');
		if(Session::has('userInfo') && $token == Session::get('userInfo.token')){//用户已登录
			
            $userInfo = Session::get('userInfo');
            $auth = array_map('strtolower',explode(',',$userInfo['role_url']));

			if( in_array($action,$auth) ) {
				return ;
            }
            
            echo return_json(500,'sorry，您账号权限不足！');die;
            
        }else{//用户未登录
            echo return_json(401,'请登录后，再进行操作！');die;
		}
	}
	
	/**
     * 获取当前访问路由
     * @param $Request
     * @return string
     */
    protected function getActionUrl(){
        $module     = request()->module();
        $controller = request()->controller();
        $action     = request()->action();
        $url        = $module.'/'.$controller.'/'.$action;
        return strtolower($url);
    }

    /**
     * 生成token
     * @return String $jwt
     */
    protected function getToken(){
        $userInfo = session("userInfo");
        $token = [
            "iss" => "",  //签发者 可以为空
            "aud" => $userInfo['username'], //面象的用户，可以为空
            "iat" => time(), //签发时间
            "nbf" => time()+100, //在什么时候jwt开始生效  （这里表示生成100秒后才生效）
            "exp" => time()+7200, //token 过期时间
            "uid" => $userInfo['id'] //记录的userid的信息，这里是自已添加上去的，如果有其它信息，可以再添加数组的键值对
        ];
        $jwt = JWT::encode($token,Config::get('app.tokenKey'),"HS256"); //根据参数生成了 token
        return $jwt;
    }

    /**
     * 表单json格式数据转回数组
     * @return array
     */
    protected function initData(){
        $method = request()->method();
        $header = strtolower(request()->header('Content-type'));
        if( $header == 'application/json'){
            switch($method){
                case 'POST':
                    $data = request()->param();
                    $_POST = json_encode($data);
                    break;
                case 'GET':
                    $data = request()->param();
                    $_GET = json_encode($data);
                    break;
            }
        }
        
    }


    /**
     * 解密已加密的token
     * @return Json $info
     */
    protected function checkToken(){
        $token = input("token");
        $info = $JWT::decode($token,Config::get('app.tokenKey'),["HS256"]);
        return json($info);
    }
    
    protected function common_list(){
        # code...
    }

    protected function common_del(){
        # code...
    }

    protected function common_add(){
        # code...
    }

    protected function common_edit(){
        # code...
    }
}
