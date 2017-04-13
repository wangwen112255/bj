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
     // $this->display();
   }
   public function checkcode(){]}
   


}


?>