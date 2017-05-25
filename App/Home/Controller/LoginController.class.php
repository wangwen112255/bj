<?php
namespace Home\Controller;
use Think\Controller;
class   LoginController extends Controller{
   public $dao;
   public function _initialize(){
      if(I('role')=='st')
        $this->dao=D('Student');
      else
        $this->dao=D('Teacher');
   }
    public function index(){
      $this->assign('islog',rand(1,1000));
    	$this->display('Index/register');
    }
    public function dologin(){
      if($this->dao->create($_POST,4)){
        $info=$this->dao->where(array("username"=>$_POST['username']))->find();
        if($info['pwd']==md5($_POST['password'])){
          $_SESSION['_username_']=$_POST['username'];
          $_SESSION['_pic_']=$info['photo'];
          $_SESSION['role']=$_POST['role']=="st"?'Student':'Teacher';
          $link=U($_SESSION['role']."/course");
          $this->ajaxReturn(toJson(true,'登录成功',$link));
        }else{
          $this->ajaxReturn(toJson('用户密码有误'));
        }
         // $this->ajaxReturn(toJson($password));
      }else{
        $this->ajaxReturn(toJson($this->dao->getError()));
      }
     
    }
    public function authlogin($type = null){
    empty($type) && $this->error('参数错误');
    $name = ucfirst(strtolower($type)) . 'SDK';
      $names="Common\OauthSDK\sdk"."\\".$name;
    $oauth=new $names();
    redirect($oauth->getRequestCodeURL());
  }   

    public function register(){
    	 $this->display();
    }
    public function doregister(){
    $code=$_POST['validatecode'];
    if(check_verify($code)){
    if(I('role')=='st'){
      $this->dao=D('Student');
      if($this->dao->create($_POST,1)){
        $this->dao->pwd=md5($_POST['pwd']);
        $this->dao->add();
        $this->ajaxReturn(toJson(true,'注册成功'));
      }
      else{
        $this->ajaxReturn(toJson($this->dao->getError()));
      }

    }
    else{
      $this->dao=D('Teacher');
      $_POST['pwd']=md5($_POST['pwd']);
      if($this->dao->create($_POST,1)){
        $this->dao->add();
        $this->ajaxReturn(toJson(true,'注册成功'));
      }
      else{
        $this->ajaxReturn(toJson($this->dao->getError()));
      }

    }
   }else{
    $this->ajaxReturn(toJson('验证码有误'));
   }

 }
    public function logout(){
      session(null);
      // session('_username_',null);
      // session('role',null);
      // $this->redirect('Index/index');
      $this->success('退出成功',U('Index/index'),3);
    }


}


?>