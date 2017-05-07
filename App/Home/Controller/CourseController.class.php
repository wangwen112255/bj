<?php
namespace Home\Controller;
use Think\Controller;
class   CourseController extends BaseController{
   public $dao;
   public $datainfo;
   public function _initialize(){
   parent::_initialize();
   if($_SESSION['role']!='Student'){
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
      $classid=$this->datainfo['class_id'];
      $Te=M("Teacher");
      $codata=$Te->field('xk_teacher.realname,xk_teacher.id as idt,xk_course.coursename,xk_course.limitnum,xk_course.choosenum,xk_course.id as idc,xk_course.status')->where(array('class_id'=>$classid))->group('xk_teacher.id')->join("RIGHT JOIN __COURSE__ ON __COURSE__.teacher_id=__TEACHER__.id")->select();
    $this->assign("codata",$codata);
    //dump($codata);
    $this->display();
    }
    public function classlist(){
      $Te=M('Teacher');
      $mi=$Te->where('class_id='.$this->datainfo['class_id'])->select();
    	dump($mi);
    }
    public function selectcourse(){
      if(IS_AJAX){
        $Or=D('Order');
        $data['student_id'] = $this->datainfo['id'];
        $data['depart_id'] = $this->datainfo['depart_id'];
        $data['class_id'] = $this->datainfo['class_id'];
        $data['course_id'] = $_POST["idc"];
        $isSelect=$Or->where('student_id='.$data['student_id'])->getField('course_id',true);
        if(count($isSelect)>2){
        $this->ajaxReturn(toJson("您已经超过选课数量的限制了"));
        exit;
        }
        if(in_array($data['course_id'],$isSelect)){
        $this->ajaxReturn(toJson("对不起该课程您已经选过了"));
      }
        if($Or->create($data)){
          if($Or->add()){
          $Co=M('Course');
          $Co->where("id=".$data['course_id'])->setInc('choosenum',1);
          $this->ajaxReturn(toJson(true,"恭喜您选课成功"));
          }
          else
         $this->ajaxReturn(toJson($Or->getError()));
        }else{
      $this->ajaxReturn(toJson("选择失败,数据有误"));
      }
      }else{
      $this->ajaxReturn(toJson('网络有问题,请重试'));
      }

    }
    public function classresult(){
      $Or=D('Order');
      $resultdata=$Or->where('xk_order.class_id='.$this->datainfo['class_id'])
                  ->field('xk_teacher.realname as terealname,xk_student.realname as strealname,isreceive,coursename,is_success,xk_course.desc as codesc,createtime')
                  ->join("LEFT JOIN __STUDENT__ ON __STUDENT__.id=__ORDER__.student_id")
                  ->join("LEFT JOIN __COURSE__ ON __COURSE__.id=__ORDER__.course_id")
                  ->join("LEFT JOIN __TEACHER__ ON __TEACHER__.id=__COURSE__.teacher_id")
                  ->select();
      $this->assign('resultdata',$resultdata);
      $this->display();
      //dump($resultdata);
    }

   


}
  

?>