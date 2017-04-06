<?php
namespace Home\Controller;
use Think\Controller;
class  DepartController extends Controller {
    protected $dao;
    public function _initialize(){
    	//parent::initalize();
    	 $this->dao=M('Depart');
    } 
    public function index(){
    	$dedata=$this->dao->select();
    	$this->assign("dedata",$dedata);
    	$this->display("");
    }
     public function detail(){
    	$id=I('id');
    	$departname=$this->dao->field('departname')->find($id);
        $co=A('Course');
        $codata=$co->departshows($id);
     	$this->assign('departname',$departname);
     	$this->assign('codata',$codata);
     	$this->display();
    }
    public  function indexshows(){
    return $this->dao->select();
    }
   
}


?>