<?php
namespace Admin\Controller;
use Think\Controller;
class  DepartController extends Controller {
    protected $dao;
    public function _initialize(){
    	//parent::initalize();
    	 $this->dao=D('Depart');
    } 
    public function index(){
           $Daodata=$this->dao->selectall();
           // dump($Daodata);
           $this->assign('codata',$Daodata['data']);
           $this->assign('page',$Daodata['page']);
           $this->display();

     }
    
  
      public function create(){
      if(!empty($_GET['cid'])&&isset($_GET['cid'])){
          $Codata=$this->dao->find($_GET['cid']);
          $this->assign("codata",$Codata);
          dump($Codata);
          $this->display();
      }else{
          $this->display();
      }
      }


      public function saves(){
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
          if($this->dao->create()){
              if($this->dao->add())
              $this->ajaxReturn(toJson(true,"院系添加成功,您可以继续添加"));
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
}


?>