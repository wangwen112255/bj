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
        // $co=A('Course');
        // $codata=$co->departshows($id);
     	$this->assign('departname',$departname);
     	$Co=M('Order');
     	$counts= $Co->where('depart_id='.$id)->count();
     	$Page=new  \Think\Page($counts,10);
     	$show=$Page->show();
    	// dump($show);
     	$codata= $Co
     	->where('xk_order.depart_id='.$id)
     	->field("departname as dename,xk_student.realname as stuname,xk_teacher.realname as tename,xk_course.coursename as coname,xk_class.classname as clname")
     	->join('LEFT JOIN __STUDENT__ ON __ORDER__.student_id=__STUDENT__.id')
     	->join('LEFT JOIN __COURSE__ ON __ORDER__.course_id=__COURSE__.id') 
     	->join('LEFT JOIN __TEACHER__ ON __COURSE__.teacher_id=__TEACHER__.id')
     	->join('LEFT JOIN __DEPART__ ON __STUDENT__.depart_id=__DEPART__.id')
     	->join('LEFT JOIN __CLASS__ ON __STUDENT__.class_id=__CLASS__.id')
     	->limit($Page->firstRow.','.$Page->listRows)->select();
     	$this->assign('showpage',$show);
     	$this->assign('codata',$codata);
     	$this->display();

    }
    public  function indexshows(){
    return $this->dao->select();
    }
   
}


?>