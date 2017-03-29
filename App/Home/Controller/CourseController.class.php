<?php
namespace Home\Controller;
use Think\Controller;
class   CourseController extends BasedController {
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
}


?>