<?php
namespace Admin\Controller;
use Think\Controller;
class TeacherController extends BaseController {
       protected $dao;
       public function _initialize(){
           //parent::initalize();
            $this->dao=D('Teacher');
       } 
       public function index(){
             $De=D('Depart');
              $Daodata=$De->selectall();
              $this->assign('dedata',$Daodata['data']);
              $this->assign('page',$Daodata['page']);
              // dump($Daodata);
              $this->display();

        }
        public function lists($id){
               $Daodata=$this->dao->selectall($id);
               $this->assign('codata',$Daodata['data']);
               $this->assign('page',$Daodata['page']);
               // dump($Daodata);
               $this->display();

         }
         public function detail($id){
              $Co=M('Course');
              $counts=$Co->where('teacher_id='.$id)->count();
              $page=new \Think\Page($counts,10);
              $show=$page->show();
              $codata=$Co->where('teacher_id='.$id)->limit($page->firstRow.','.$page->listRows)->select();
              $this->assign('codata',$codata);
              $status=array("进行中",'结束了');
              $this->assign('status',$status);
              $this->assign("page",$show);
              // dump($codata);
              $this->display();  // echo "dfsd";
              
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
         public function addclasses(){

           $this->display();
         }


    

    }


    
   

