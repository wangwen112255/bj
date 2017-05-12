<?php 
namespace Home\Controller;
use Think\Controller;
use Org\ThinkSDK\Min;
// require_once("ming.class.php");
class MingController extends Controller{
public function index(){
	$m=new Min();
	 echo $m->min();
	 // \Org\ThinkSDK\Mings::mis();
	$this->show("<a href='__CONTROLLER__/getOauth'>授权登录<a/>");
}

public function getOauth(){
    $oauth=new \Org\ThinkSDK\sdk\QqSDK();
    $sns = $oauth->getInstance('qq');
    redirect($sns->getRequestCodeURL());

}
}

 ?>
