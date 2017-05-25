<?php
namespace Home\Controller;
use Think\Controller;
class StudentController extends BaseController {
    protected $dao;
    protected $datainfo;
    public function _initialize(){
        parent::_initialize();
        if($_SESSION['role']!="Student")
        $this->redirect('Teacher/index');
        $this->dao=D('Student');
        $condition['username']=session('_username_');
        $this->datainfo=$this->dao->where($condition)->find();
        if(ACTION_NAME!='intro'){
        if($this->datainfo['class_id']==0){
            // echo "<script>alert('请先完善信息')</script>";
            $this->redirect('Student/intro',array('isIntro'=>1));
            // $this->display('intro');
        }
        }
        $this->assign('Userdata',$this->datainfo);
    }
    public function index(){
       
       $this->display();
    }
    public function photo(){
        $this->assign('pic',$this->datainfo['photo']);
    	$this->display();
    }
    public function intro(){
        $Condition['username']=session('_username_');
        $Userdata=$this->dao->where($Condition)->find();
        if(!empty($_POST['realname']) && isset($_POST['realname'])){
            
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
    
    public function safe(){
        if(IS_AJAX){
            $this->dao=D('Student');
            if($this->dao->create()){
                $Condition['id']=$this->datainfo['id'];
                $this->dao->pwd=md5($_POST['pwd']);
                if($this->dao->where($Condition)->save()){
                // $_SESSION['_username_']="null"
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
        $Or=M('Order');
        $codata=$Or->where("student_id=".$this->datainfo['id'])
                 ->field("xk_teacher.realname as tename,xk_order.id as oid,xk_course.coursename as coname,choosenum,xk_order.id as oid,is_success,isreceive")
                 ->join('LEFT JOIN __COURSE__ ON __ORDER__.course_id=__COURSE__.id') 
                 ->join('LEFT JOIN __TEACHER__ ON __COURSE__.teacher_id=__TEACHER__.id')
                 ->select();
     
        $this->assign("Codata",$codata);         
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
            ->field("xk_student.realname as stname,xk_teacher.realname as tename,xk_course.coursename as coname,xk_student.studentid as stuid")
            ->join('LEFT JOIN __STUDENT__ ON __ORDER__.student_id=__STUDENT__.id')
            ->join('LEFT JOIN __COURSE__ ON __ORDER__.course_id=__COURSE__.id') 
            ->join('LEFT JOIN __TEACHER__ ON __COURSE__.teacher_id=__TEACHER__.id')
            ->limit($Page->firstRow.','.$Page->listRows)->select();
            $this->assign('show',$show);
            $this->assign('codata',$codata);
            // dump($codata);
            $this->show();
        }
    public function guide(){
        $Te=M('Teacher');
        $Tedata=$Te->field('count(xk_course.id) as total,xk_teacher.realname,xk_teacher.id as idt,photo,xk_teacher.desc as desct')->where(array('class_id'=>$this->datainfo['class_id']))->group('idt')->join("LEFT JOIN __COURSE__ ON __COURSE__.teacher_id=__TEACHER__.id")->select();
        // dump($Ted
        $this->assign('Tedata',$Tedata);
        $this->display();
    }
    public function trashcourse(){
        if(IS_AJAX){
            $condition['id']=$_POST['id'];
            $condition['student_id']=$this->datainfo['id'];
            $Or=M('Order');
            $cid=$Or->where('id='.$condition['id'])->getField('course_id');
            $Co=M('Course');
            if($Or->where($condition)->delete()&&  $Co->where('id='.$cid)->setDec('choosenum',1)){
            $this->ajaxReturn(toJson(true,'撤销成功,不可恢复！'));
            }
            else{
            $this->ajaxReturn(toJson('撤销失败,稍后重试！'));
            } 
            }else{
            $this->ajaxReturn(toJson("对不起,请求数据有误"));
            }
        
        }

    }


