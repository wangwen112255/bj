<?php
namespace Home\Controller;
use Think\Controller;
class BasedController extends Controller {
   public function _initialize(){
   	if(!isset($_SESSION['_username_'])||empty($_SESSION['_username_'])){
   	$this->redirect('Login/index');
   }
}
   public function index(){

   }
    }
    // public function _empty(){
    // 	$this->display(THINK_PATH."Tpl/404.html");
   	// }
