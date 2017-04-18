<?php
namespace Home\Controller;
use Think\Controller;
class StudentController extends BaseController {
    protected $dao;
    public function _initialize(){
        parent::_initialize();
        $this->dao=D('Student');
        $condition['username']=session('_username_');
        if(ACTION_NAME!='intro'){
        $datainfo=$this->dao->where($condition)->getField('class_id');
        if($datainfo==0)
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
        $Userdata=$this->dao->where('username='.session('_username_'))->find();
        if(!empty(I('realname')) && isset($_POST['realname'])){
            
            if($this->dao->create($_POST,$_GET['isIntro']==1?1:2)){

                if($this->dao->where('id='.$Userdata['id'])->save())
                $this->ajaxReturn(toJson(true,'修改成功',U(CONTROLLER_NAME.'/intro')));
                else
                $this->ajaxReturn(toJson('修改失败或未进行修改'));
            }else{
                $this->ajaxReturn(toJson($this->dao->getError()));
            }
            exit;
        }else{
            $De=M('Depart');
            $Dedata=$De->select();
            $Cl=M('Class');
            $Cldata=$Cl->field('id,classname')->where('depart_id='.$Userdata['depart_id'])->select();
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
    	$this->display();
    }
    public function course(){
    	$this->display();
    }
    public function classes(){
    	$this->display();
        }
    
}