<?php
namespace Wx\Controller;
use Think\Controller;
class TeacherController extends BaseController {
    protected $dao;
    protected $datainfo;
    public function _initialize(){
        // parent::_initialize();
        if($_SESSION['role']!="Teacher")
        $this->redirect('Student/index');
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
        // dump($Userdata);
        if(!empty($_POST['realname']) && isset($_POST['realname'])){
            
            if($this->dao->create($_POST,$_POST['isIntro']==1?1:2)){

                if($this->dao->where('id='.$this->datainfo['id'])->save())
                $this->ajaxReturn(toJson(true,'更新成功',U(CONTROLLER_NAME.'/intro')));
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
            // dump($Usedata);
            // dump("fsdfsad");
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
            // dump($codata);
            $this->display();
    }
    public function safe(){

        if(!empty($_POST['pwd'])){
            $this->dao=D('Teacher');
            if($this->dao->create()){
                $Condition['id']=$this->datainfo['id'];
                $this->dao->pwd=md5($_POST['pwd']);
                if($this->dao->where($Condition)->save())
                {
                session(null);
                $this->ajaxReturn(toJson(true,'密码修改成功',U('Login/index')));
            }
                else
                $this->ajaxReturn(toJson('密码修改失败或未修改'));
            }else{
                $this->ajaxReturn(toJson($this->dao->getError()));
            } 
    
        }else{
        $this->assign('Userdata',$this->datainfo);
        $this->display();   
        }
        // dump($this->datainfo);
     
        
    }


    public function course(){
        // $Or=M('Order');
        $Co=M('Course');
        $counts=$Co->where('teacher_id='.$this->datainfo['id'])->count();
        $page=new \Think\Page($counts,10);
        $show=$page->show();
        $codata=$Co->where('teacher_id='.$this->datainfo['id'])->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('Codata',$codata);
        $status=array("进行中",'结束了');
        $this->assign('status',$status);
        $this->assign("show",$show);
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
            ->field("xk_student.realname as stuname,xk_teacher.realname as tename,xk_course.coursename as coname,xk_student.studentid as stid,xk_teacher.id as teid")
            ->join('LEFT JOIN __STUDENT__ ON __ORDER__.student_id=__STUDENT__.id')
            ->join('LEFT JOIN __COURSE__ ON __ORDER__.course_id=__COURSE__.id') 
            ->join('LEFT JOIN __TEACHER__ ON __COURSE__.teacher_id=__TEACHER__.id')
            ->limit($Page->firstRow.','.$Page->listRows)->select();
            $this->assign('show',$show);
            $this->assign('userid',$this->datainfo['id']);
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
      // if(IS_AJAX){
        $Or=M('Order');
        $condition['is_success']=1;
        $condition['isreceive']=1;
        $condition0['is_success']=0;
        $condition0['isreceive']=1;
        $St=M('Student');
        $Co=M('Course');
        // && $Or->where('id='.I('oid'))->setField($condition) && 
        if($Or->where('course_id='.I('cid'))->setField($condition0) && $Or->where('id='.I('oid'))->setField($condition) && $St->where('studentid='.I('sid'))->setField('iscomplete',1) && $Co->where('id='.I('cid'))->setField("status",1) ){
         $link=U('Teacher/info',array('timestamp'=>time()));
          $this->ajaxReturn(toJson(true,'恭喜您审核通过',$link));
        }else{
          $this->ajaxReturn(toJson('数据有误，审核失败'));

        }
      // }else {
      //     $this->ajaxReturn(toJson('您的数据有误请检查'));
      // }

    }
    public function joincheck(){
        // if(IS_AJAX){
        $Or=M('Order');
        $condition['is_success']=0;
        $condition['isreceive']=1;
         $link=U('Teacher/info',array('timestamp'=>time()));

        if($Or->where('id='.I('oid'))->setField($condition)){
          $this->ajaxReturn(toJson(true,"已加入",$link));
        }else{
          $this->ajaxReturn(toJson('数据有误，审核失败'));

        }
      // }else {
      //     $this->ajaxReturn(toJson('您的数据有误请检查'));
      // }


    }
     public function refuse(){
        // if(IS_AJAX){
        $Or=M('Order');
        $condition['is_success']=0;
        $condition['isreceive']=1;
        if($Or->where('id='.I('oid'))->setField($condition)){
          $this->ajaxReturn(toJson(true,"恭喜您拒绝成功"));
        }else{
          $this->ajaxReturn(toJson('数据有误，审核失败'));

        }
      // }else {
      //     $this->ajaxReturn(toJson('您的数据有误请检查'));
      // }

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
    public function create(){
    if(!empty($_GET['cid'])&&isset($_GET['cid'])){
        $Co=M("Course");
        $Codata=$Co->find($_GET['cid']);
        $this->assign("codata",$Codata);
        // dump($Codata);
        $this->display();
    }else{
        $this->display();
    }
    }


    public function saves(){
    $Co=M("Course");
    $_POST['teacher_id']=$this->datainfo['id'];
    $_POST['desc']=I('post.desc',"htmlspecialchars");
    //$Codata=$Co->where('teacher_id='.$this->datainfo['id'])->select();
    if(IS_AJAX){
     if(!empty($_POST['cid'])&&isset($_POST['cid'])){
       if($Co->create()){
            if($Co->where('id='.$_POST['cid'])->save())
            $this->ajaxReturn(toJson(true,"恭喜您,修改成功"));
            else
            $this->ajaxReturn(toJson("修改失败请稍候"));
        }else{
        $this->ajaxReturn(toJson($this->getError()));
        } 
     }else{
        if($Co->create()){
            if($Co->add())
            $this->ajaxReturn(toJson(true,"设计添加成功，同学们可以选课了"));
            else
            $this->ajaxReturn("添加失败请稍候");
        }else{
        $this->ajaxReturn(toJson($this->getError()));
        }
     }

    }else{
        $this->ajaxReturn(toJson('数据来源有误请重新填写'));
    }
  
  }
    public function delcourse(){
    $Co=M("Course");
    if(IS_AJAX){
     if(!empty($_POST['cid'])&&isset($_POST['cid'])){
            if($Co->delete($_POST['cid']))
            $this->ajaxReturn(toJson(true,"删除成功"));
            else
            $this->ajaxReturn(toJson("删除失败请稍候"));
        }else{
        $this->ajaxReturn(toJson("数据有误，删除失败"));
        }
    }
    else{
        $this->ajaxReturn(toJson('数据来源有误请重新填写'));
    }
    }
    public function resetcourse(){
    $Co=M("Course");
    if(IS_AJAX){
     if(!empty($_POST['cid'])&&isset($_POST['cid'])){
            if($Co->where('id='.$_POST['cid'])->setField('choosenum',0))
            $this->ajaxReturn(toJson(true,"该课程重置成功,可以重新开始选课了"));
            else
            $this->ajaxReturn(toJson("重置失败请稍候"));
        }else{
        $this->ajaxReturn(toJson("数据有误，重置失败"));
        }
    }
    else{
        $this->ajaxReturn(toJson('数据来源有误请重新填写'));
    }
    }
    public function resultcourse(){
   // $Co=M('Course');
   $Or=M('Order');
    if(IS_AJAX){
     if(!empty($_POST['cid'])&&isset($_POST['cid'])){
           $condition['course_id']=$_POST['cid'];
           $condition['is_success']=1;
           $sid=$Or->where($condition)->getField('student_id');
             $St=M('Student');
             $stname=$St->where("id=".$sid)->getField('realname');
            if($stname)
            $this->ajaxReturn(toJson(true,'正选的结果是：'.$stname));
            else
            $this->ajaxReturn(toJson("数据有误，重置失败"));

        }else{
        $this->ajaxReturn(toJson("数据有误，重置失败"));
        }
    }
    else{
        $this->ajaxReturn(toJson('数据来源有误请重新填写'));
    }

    }


    

    }


    
   

