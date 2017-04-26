<?php
namespace Home\Controller;
use Think\Controller;
class   TeachersController extends Controller {
	protected $dao;
    public function _initialize(){
		 $this->dao=M('Teacher');
    } 
	public function index(){
		$tedata=$this->dao->field('count(xk_course.id) as total,xk_teacher.realname,xk_teacher.id as idt,photo,xk_teacher.desc as desct')->where(array('class_id'=>array('neq',0)))->group('idt')->join("LEFT JOIN __COURSE__ ON __COURSE__.teacher_id=__TEACHER__.id")->select();
		$this->assign("tedata",$tedata);
	    $this->display();
	}
	public function lists(){
	    $condition['teacher_id']=I('id');
	    // $condition['status']=0;
	    $course=M('Course');
	    $name=$this->dao->find($condition['teacher_id']);
	    $codata=$course->where($condition)->select();
	    // dump($codata);
	   $this->assign('name',$name);
	   $this->assign('codata',$codata);
	   // dump($codata);ikjjkkkjkkkkkhjkhkj
	   $this->display();
	}
    public function detail(){
    	$numid=I('numid');
    	$co=M('Course');
    	$codata=$co->find($numid);
    	$this->assign('codata',$codata);
    	$this->display();

    }
	

}
?>