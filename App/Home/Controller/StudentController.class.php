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
    	$this->display();
        }
    
}