<?php
namespace Home\Controller;
use Think\Controller;
class   LoginController extends Controller{
   public $dao;
   public function _initialize(){
 
   }
    public function index(){
      $this->assign('islog',rand(1,1000));
    	$this->display('Index/register');
    }
    public function dologin(){
    	// $this->show();
      dump($_POST);
    }
    public function register(){
    	 $this->display();
    }
   public function doregister(){
    if(I('role')=='st'){
      $this->dao=D('Student');
      if($this->dao->create()){
        $this->ajaxReturn(toJson(true,'注册成功'));
      }
      else{
        $this->ajaxReturn(toJson($this->dao->getError()));
      }

    }
    else{
      $this->dao=D('student');
    }
   }



}


?>