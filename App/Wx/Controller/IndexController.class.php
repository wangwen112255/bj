<?php
namespace Wx\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function _initalize(){
    	parent::initalize();
    	
    } 

    public function index(){
       $De=D('Depart');
       $Dedata=$De->select();
       $this->assign('Dedata',$Dedata);
       $this->display();
       
   }
   public function search(){
    $this->error('对不起现在还没开通查找功能');
   }

    
}