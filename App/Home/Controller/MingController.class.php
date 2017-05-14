<?php 
namespace Home\Controller;
use Think\Controller;
// use Org\ThinkSDK\sdk\QqSDK;
// require_once("ming.class.php");
class MingController extends Controller{
public function index(){
	// $m=new Min();
	//  echo $m->min();
	 // \Org\ThinkSDK\Mings::mis();
	$this->show("<a href='__CONTROLLER__/getOauth'>授权登录<a/>");
}

public function getOauth($type){
 
    // $sns = \Org\ThinkSDK\ThinkOauth::getInstance('qq');
    		$classname=getOauth($type)?getOauth($type):$this->error("参数不退");
    		$oauth=new  $classname();

    		//跳转到授权页面
    		redirect($oauth->getRequestCodeURL());
    

}
public function callback($type = null, $code = null){
		// $type='qq';
		// $type=$_SESSION['authtype'];
		(empty($type) ||empty($code)) && $this->error('参数错误1');
		//加载ThinkOauth类并实例化一个对象

		$name = ucfirst(strtolower($type)) . 'SDK';
    	$names="\Common\OauthSDK\sdk"."\\".$name;
		$oauth=new $names();
		//腾讯微博需传递的额外参数
		$extend = null;
		// if($type == 'tencent'){
		// 	$extend = array('openid' => $this->$_GET('openid'), 'openkey' => $this->$_GET('openkey'));
		// }

		//请妥善保管这里获取到的Token信息，方便以后API调用
		//调用方法，实例化SDK对象的时候直接作为构造函数的第二个参数传入
		//如： $qq = ThinkOauth::getInstance('qq', $token);
		$token = $oauth->getAccessToken($code , $extend);
		// dump($token);
		// 获取当前登录用户信息
		if(is_array($token)){
			$auth=new  \Org\ThinkSDK\TypeEvent();
			$user_info = $auth->$type($token);

			echo("<h1>恭喜！使用 {$type} 用户登录成功</h1><br>");
			echo("授权信息为：<br>");
			dump($token);
			echo("当前登录用户信息为：<br>");
			dump($user_info);
		}
	}
}

 ?>
