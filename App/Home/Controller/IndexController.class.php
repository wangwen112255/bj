<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function _initalize(){
    	parent::initalize();
    	
    } 

    public function index(){
       $de=A('Depart');
       $dedata=$de->indexshows();
       $co=A('Order');
       $codata=$co->indexshows();
       $this->assign("dedata",$dedata);
       $this->assign("codata",$codata);
       // dump($codata);
       $this->display();
       
   }
   public function search(){
    $this->error('对不起现在还没开通查找功能');
   }

    
}