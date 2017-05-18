<?php
namespace Admin\Controller;
use Think\Controller;
class StudentController extends BaseController {
       protected $dao;
       public function _initialize(){
           //parent::initalize();
            $this->dao=D('Student');
       } 
       public function index(){
             $De=D('Depart');
              $Daodata=$De->selectall();
              $this->assign('dedata',$Daodata['data']);
              $this->assign('page',$Daodata['page']);
              // dump($Daodata);
              $this->display();

        }
        public function classes($id){
            $De=D('Class');
             $Daodata=$De->selectwhole($id);
             $Depa=M('Depart');
             $deinfo=$Depa->find($id);
             $this->assign('deinfo',$deinfo);
             $this->assign('dedata',$Daodata['data']);
             $this->assign('page',$Daodata['page']);
             dump($Daodata);
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
         
       
     
       


        
         
    

    }


    
   

