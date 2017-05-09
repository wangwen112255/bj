<?php
namespace Home\Controller;
use Think\Controller;
class TeacherController extends BaseController {
    protected $dao;
    protected $datainfo;
    public function _initialize(){
        parent::_initialize();
        if($_SESSION['role']!="Teacher")
        $this->redirect('Teacher/index');
        $this->dao=D('Teacher');
        $condition['username']=session('_username_');
        $this->datainfo=$this->dao->where($condition)->find();
        if(ACTION_NAME!='intro'){
        if($this->datainfo['class_id']==0){
            // echo "<script>alert('请先完善信息')</script>";
            $this->redirect('Teacher/intro',array('isIntro'=>1));
            // $this->display('intro');
        }
        }
        $this->assign('Userdata',$this->datainfo);
    }
    public function index(){
       
       $this->display();
    }
    public function photo(){
        $this->display();
    }
    public function intro(){
        $Condition['username']=session('_username_');
        $Userdata=$this->dao->where($Condition)->find();
        if(!empty(I('realname')) && isset($_POST['realname'])){
            
            if($this->dao->create($_POST,$_POST['isIntro']==1?1:2)){

                if($this->dao->where('id='.$this->datainfo['id'])->save())
                $this->ajaxReturn(toJson(true,'修改成功',U(CONTROLLER_NAME.'/intro')));
                else
                $this->ajaxReturn(toJson('修改失败或未进行修改'.$_GET['isIntro']));
            }else{
                $this->ajaxReturn(toJson($this->dao->getError()));
            }
            exit;
        }else{
            $De=M('Depart');
            $Dedata=$De->select();
            $Cl=M('Class');
            $Cldata=$Cl->field('id,classname')->where(array('depart_id'=>$Userdata['depart_id']))->select();
            $this->assign('Dedata',$Dedata); 
            $this->assign('Cldata',$Cldata); 
            $this->assign('Userdata',$Userdata);
            $this->display();
        
        }
        
        // $this->display();
        
    }
    public function info(){
            $Co=M('Course');
            $condition['teacher_id']=$this->datainfo['id'];
            // $counts= $Co->where($condition)->count();
            $Page=new  \Think\Page($counts,10);
            $show=$Page->show();
            // dump($show);
            $codata= $Co
            ->where($condition)
            ->field("xk_student.realname as stuname,xk_teacher.realname as tename,xk_course.coursename as coname,xk_order.id as oid,is_success,isreceive,iscomplete,xk_student.studentid as stid,xk_order.course_id as cid")
            ->order('xk_course.coursename')
            ->join('RIGHT JOIN __ORDER__ ON __ORDER__.course_id=__COURSE__.id')
            ->join('LEFT JOIN __STUDENT__ ON __ORDER__.student_id=__STUDENT__.id') 
            ->join('LEFT JOIN __TEACHER__ ON __COURSE__.teacher_id=__TEACHER__.id')
            ->select();
            $this->assign('codata',$codata);
            dump($codata);
            $this->display();
    }
    public function safe(){
        if(IS_AJAX){
            $this->dao=D('Teacher');
            if($this->dao->create()){
                $Condition['id']=$this->datainfo['id'];
                $this->dao->pwd=md5($_POST['pwd']);
                if($this->dao->where($Condition)->save())
                {
                session("_username_",null);
                $this->ajaxReturn(toJson(true,'密码修改成功'));
            }
                else
                $this->ajaxReturn(toJson('密码修改失败或未修改'));
            }else{
                $this->ajaxReturn(toJson($this->dao->getError()));
            } 
        exit;
        }else if(!empty($_GET['md'])&&isset($_GET['md'])){
        $this->display('Public:changepwd');
        exit;
        }
        // dump($this->datainfo);
     
        $this->assign('Userdata',$this->datainfo);
        $this->display();
    }

    public function course(){
        // $Or=M('Order');
        $Co=M('Course');
        $codata=$Co->where('teacher_id='.$this->datainfo['id'])->select();
        $this->assign('Codata',$codata);
        $status=array("进行中",'结束了');
        $this->assign('status',$status);
        $this->display();
    }
    public function classes(){
            $Co=M('Order');
            $condition['xk_order.class_id']=$this->datainfo['class_id'];
            $condition['is_success']=1;
            $counts= $Co->where($condition)->count();
            $Page=new  \Think\Page($counts,10);
            $show=$Page->show();
            // dump($show);
            $codata= $Co
            ->where($condition)
            ->field("xk_student.realname as stuname,xk_teacher.realname as tename,xk_course.coursename as coname,xk_student.studentid as stid")
            ->join('LEFT JOIN __STUDENT__ ON __ORDER__.student_id=__STUDENT__.id')
            ->join('LEFT JOIN __COURSE__ ON __ORDER__.course_id=__COURSE__.id') 
            ->join('LEFT JOIN __TEACHER__ ON __COURSE__.teacher_id=__TEACHER__.id')
            ->limit($Page->firstRow.','.$Page->listRows)->select();
            $this->assign('show',$show);
            $this->assign('codata',$codata);
            // dump($codata);
            $this->display();
         
        }
    public function guide(){
        $Te=M('Student');
        $counts=$Te->where("class_id=".$this->datainfo['class_id'])->count();
        $Page=new \Think\Page($counts,8);
        $show=$Page->show();
        $Tedata=$Te->where("class_id=".$this->datainfo['class_id'])->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('show',$show);
        $this->assign('Tedata',$Tedata);
        // dump($Tedata);
       $this->display();
    }
    public function studentdetail(){
        $Or=M('Order');
        $Stdetaildata=$Or->where("student_id=".$_GET['id'])
                  ->field('xk_teacher.realname as terealname,xk_student.realname as strealname,isreceive,coursename,is_success,xk_course.desc as codesc,createtime')
                  ->join("LEFT JOIN __STUDENT__ ON __STUDENT__.id=__ORDER__.student_id")
                  ->join("LEFT JOIN __COURSE__ ON __COURSE__.id=__ORDER__.course_id")
                  ->join("LEFT JOIN __TEACHER__ ON __TEACHER__.id=__COURSE__.teacher_id")
                  ->select();
        $this->assign("Stdetaildata",$Stdetaildata);
        $this->display();

    }
    public function accept(){
      if(IS_AJAX){
        $Or=M('Order');
        $condition['is_success']=1;
        $condition['isreceive']=1;
        $condition0['is_success']=0;
        $condition0['isreceive']=1;
        $St=M('Student');
        // && $Or->where('id='.I('oid'))->setField($condition) && 
        if($Or->where('course_id='.I('cid'))->setField($condition0) && $Or->where('id='.I('oid'))->setField($condition) && $St->where('studentid='.I('sid'))->setField('iscomplete',1) ){
          $this->ajaxReturn(toJson(true,'恭喜您审核通过,马上提醒同学联系您'));
        }else{
          $this->ajaxReturn(toJson('数据有误，审核失败'));

        }
      }else {
          $this->ajaxReturn(toJson('您的数据有误请检查'));
      }

    }
    public function joincheck(){
        if(IS_AJAX){
        $Or=M('Order');
        $condition['is_success']=0;
        $condition['isreceive']=1;
        if($Or->where('id='.I('oid'))->setField($condition)){
          $this->ajaxReturn(toJson(true,"已加入"));
        }else{
          $this->ajaxReturn(toJson('数据有误，审核失败'));

        }
      }else {
          $this->ajaxReturn(toJson('您的数据有误请检查'));
      }


    }
     public function refuse(){
        if(IS_AJAX){
        $Or=M('Order');
        $condition['is_success']=0;
        $condition['isreceive']=1;
        if($Or->where('id='.I('oid'))->setField($condition)){
          $this->ajaxReturn(toJson(true,"恭喜您拒绝成功"));
        }else{
          $this->ajaxReturn(toJson('数据有误，审核失败'));

        }
      }else {
          $this->ajaxReturn(toJson('您的数据有误请检查'));
      }

    }
    public function create(){
    $this->display();

    }
    public function changestatus(){
        if(IS_AJAX){
        $Co=M('Course');
        $status= $Co->where("id=".I('cid'))->getField('status');
        $condition['status']=abs($status-1);
        if($Co->where('id='.I('cid'))->setField($condition)){
          $this->ajaxReturn(toJson(true,"修改成功"));
        }else{
          $this->ajaxReturn(toJson('数据有误，审核失败'));

        }
      }else {
          $this->ajaxReturn(toJson('您的数据有误请检查'));
      }


    }
   

}