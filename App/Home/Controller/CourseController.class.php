<?php
namespace Home\Controller;
use Think\Controller;
class   CourseController extends BasedController {
   public $dao;
   public function _initialize(){
        $this->dao=M('order');
    }
    public function index(){
    	$this->display("");
    }
    public function classlist(){
    	$this->display();
    }
    public function teacherlist(){
    	 $this->display();
    }
    public function classresult(){
    	 $this->display();
    }
    public function indexshows(){
         return $this->dao->limit('200')->select();
    }
}


?>