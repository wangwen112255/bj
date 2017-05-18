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
          $this->display();
      }else{
          $this->display();
      }
      }


      public function saves(){
      if(IS_AJAX){
       if(!empty($_POST['cid'])&&isset($_POST['cid'])){
         if($this->dao->create()){
              if($this->dao->where('id='.$_POST['cid'])->save())
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
      public function del(){
      if(IS_AJAX){
       if(!empty($_POST['id'])&&isset($_POST['id'])){
              if($this->dao->delete($_POST['id']))
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
      public function addclass(){

        $this->display();
      }
      public function showclass($cid){
        $Cl=M('Class');
        $cldata=$Cl->where('depart_id='.$cid)->select();
        $this->assign('cldata',$cldata);
        $this->display();
      }
}


?>