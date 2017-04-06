<?php
namespace Home\Controller;
use Think\Controller;
class TeacherController extends BaseController {
	protected $dao;
	public function _initialize(){
		//parent::initalize();
		 $this->dao=M('Teacher');
	} 
    public function index(){
        $this->display();
    }
    public function photo(){
    	$this->display();
    }
    public function intro(){
    	$this->display();
    }
    public function info(){
    	$this->display();
    }
    public function safe(){
    	$this->display();
    }
    public function course(){
    	$this->display();
    }
    public function classes(){
    	$this->display();
    }
   
}