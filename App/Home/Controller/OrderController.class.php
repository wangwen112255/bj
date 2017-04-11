<?php
namespace Home\Controller;
use Think\Controller;
class   OrderController extends BasedController {
   public $dao;
   public function _initialize(){
        $this->dao=M('Order');
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
        
        return $this->dao
        ->where('xk_order.id>10')
        ->field("departname as dename,xk_student.realname as stuname,xk_teacher.realname as tename,xk_course.coursename as coname,xk_class.classname as clname")
        ->join('LEFT JOIN __STUDENT__ ON __ORDER__.student_id=__STUDENT__.id')
        ->join('LEFT JOIN __COURSE__ ON __ORDER__.course_id=__COURSE__.id') 
        ->join('LEFT JOIN __TEACHER__ ON __COURSE__.teacher_id=__TEACHER__.id')
        ->join('LEFT JOIN __DEPART__ ON __STUDENT__.depart_id=__DEPART__.id')
        ->join('LEFT JOIN __CLASS__ ON __STUDENT__.class_id=__CLASS__.id')
        ->select();
    }
    public function departshows($id){
        
        $counts= $this->dao
        ->where('xk_order.depart_id='.$id)
        ->field("departname as dename,xk_student.realname as stuname,xk_teacher.realname as tename,xk_course.coursename as coname,xk_class.classname as clname")
        ->join('LEFT JOIN __STUDENT__ ON __ORDER__.student_id=__STUDENT__.id')
        ->join('LEFT JOIN __COURSE__ ON __ORDER__.course_id=__COURSE__.id') 
        ->join('LEFT JOIN __TEACHER__ ON __COURSE__.teacher_id=__TEACHER__.id')
        ->join('LEFT JOIN __DEPART__ ON __STUDENT__.depart_id=__DEPART__.id')
        ->join('LEFT JOIN __CLASS__ ON __STUDENT__.class_id=__CLASS__.id')
        ->count();
        $Page=new \Think\Page($counts,10);
        $show=$page->show();
        $codata= $this->dao
        ->where('xk_order.depart_id='.$id)
        ->field("departname as dename,xk_student.realname as stuname,xk_teacher.realname as tename,xk_course.coursename as coname,xk_class.classname as clname")
        ->join('LEFT JOIN __STUDENT__ ON __ORDER__.student_id=__STUDENT__.id')
        ->join('LEFT JOIN __COURSE__ ON __ORDER__.course_id=__COURSE__.id') 
        ->join('LEFT JOIN __TEACHER__ ON __COURSE__.teacher_id=__TEACHER__.id')
        ->join('LEFT JOIN __DEPART__ ON __STUDENT__.depart_id=__DEPART__.id')
        ->join('LEFT JOIN __CLASS__ ON __STUDENT__.class_id=__CLASS__.id')
        ->limit($Page->firstRow.','.$Page->listRows)->select();
    }

}


?>