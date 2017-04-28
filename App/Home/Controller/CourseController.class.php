<?php
namespace Home\Controller;
use Think\Controller;
class   CourseController extends BaseController{
   public $dao;
   public $datainfo;
   public function _initialize(){
   parent::_initialize();
   if(!$_SESSION['role']=='st'){
    if(IS_AJAX){
      $this->ajaxReturn(toJson('请先核实您的身份'));
    }
    else{
      $this->redirect('Teacher/index');
    }
   }
   $this->dao=D('Student');
   $condition['username']=session('_username_');
   $this->datainfo=$this->dao->where($condition)->find();
   }
    public function index(){
    	$this->display("");
    }
    public function classlist(){
      $Te=M('Teacher');
      $mi=$Te->where('class_id='.$this->datainfo['class_id'])->select();
    	dump($mi);
    }
    public function classresult(){
    	 $this->display();
    
    }
    public function detail(){

    }

   


}


?>