<?php
namespace Home\Controller;
use Think\Controller;
class StudentController extends BaseController {
    protected $dao;
    public function _initialize(){
        parent::_initialize();
        $this->dao=M('Student');
        $condition['username']=session('_username_');
        if(ACTION_NAME!='intro'){
        $datainfo=$this->dao->where($condition)->getField('class_id');
        if($datainfo==0)
            echo "<script>alert('请先完善信息')</script>";
            $this->redirect('Student/intro');
        }

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