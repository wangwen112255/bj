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
    	$this->display("");
    }
     public function detail(){
    	$this->display();
    }
    public  function indexshows(){
    return $this->dao->select();
    }
   
}


?>