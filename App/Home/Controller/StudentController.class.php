<?php
namespace Home\Controller;
use Think\Controller;
class StudentController extends BaseController {
    protected $dao;
    protected $datainfo;
    public function _initialize(){
        parent::_initialize();
        $this->dao=D('Student');
        $condition['username']=session('_username_');
        if(ACTION_NAME!='intro'){
        $this->datainfo=$this->dao->where($condition)->find();
        if($this->datainfo['class_id']==0)
            // echo "<script>alert('请先完善信息')</script>";
            $this->redirect('Student/intro',array('isIntro'=>1));
            // $this->display('intro');
        }

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

                if($this->dao->where('id='.$Userdata['id'])->save())
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

    	$this->display();
    }
    public function safe(){
        if(IS_AJAX){
            $this->dao=D('Student');
            if($this->dao->create()){
                $Condition['id']=$this->datainfo['id'];
                $this->dao->pwd=md5($_POST['pwd']);
                if($this->dao->where($Condition)->save())
                $this->ajaxReturn(toJson(true,'密码修改成功',U('Login/logout')));
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
            $counts= $Co->where('class_id='.$this->datainfo['class_id'])->count();
            $Page=new  \Think\Page($counts,10);
            $show=$Page->show();
            // dump($show);
            $codata= $Co
            ->where('xk_order.class_id='.$this->datainfo['class_id'])
            ->field("departname as dename,xk_student.realname as stuname,xk_teacher.realname as tename,xk_course.coursename as coname,xk_class.classname as clname")
            ->join('LEFT JOIN __STUDENT__ ON __ORDER__.student_id=__STUDENT__.id')
            ->join('LEFT JOIN __COURSE__ ON __ORDER__.course_id=__COURSE__.id') 
            ->join('LEFT JOIN __TEACHER__ ON __COURSE__.teacher_id=__TEACHER__.id')
            ->join('LEFT JOIN __DEPART__ ON __STUDENT__.depart_id=__DEPART__.id')
            ->join('LEFT JOIN __CLASS__ ON __STUDENT__.class_id=__CLASS__.id')
            ->limit($Page->firstRow.','.$Page->listRows)->select();
            $this->assign('showpage',$show);
            $this->assign('codata',$codata);
            var_dump($codata);
            // $this->display();

 
        }
    public function guide(){
        $Te=M('Teacher');
        $Tedata=$Te->field('count(xk_course.id) as total,xk_teacher.realname,xk_teacher.id as idt,photo,xk_teacher.desc as desct')->where(array('class_id'=>$this->datainfo['class_id']))->group('idt')->join("LEFT JOIN __COURSE__ ON __COURSE__.teacher_id=__TEACHER__.id")->select();
        // dump($Ted
        $this->assign('Tedata',$Tedata);
        $this->display();
    }
    public function selectCourse(){


    

    }

}