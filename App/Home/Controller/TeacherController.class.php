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
            ->field("xk_student.realname as stuname,xk_teacher.realname as tename,xk_course.coursename as coname,xk_order.id as oid,is_success,isreceive")
            ->join('RIGHT JOIN __ORDER__ ON __ORDER__.course_id=__COURSE__.id')
            ->join('LEFT JOIN __STUDENT__ ON __ORDER__.student_id=__STUDENT__.id') 
            ->join('LEFT JOIN __TEACHER__ ON __COURSE__.teacher_id=__TEACHER__.id')
            ->select();
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
            dump($codata);
            $this->show();
          
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
   

}