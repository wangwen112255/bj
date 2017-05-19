<?php
namespace Admin\Controller;
use Think\Controller;
class StudentController extends BaseController {
       protected $dao;
       public function _initialize(){
           parent::_initialize();
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
             // dump($Daodata);
             $this->display();

        }
        public function detail($id){
             $St=M('Student');
             $Or=M('Order');
             $counts=$St->where("class_id=".$id)->count();
             $page=new \Think\Page($counts,10);
             $show=$page->show();
             $stdata=$St->where("class_id=".$id)->limit($page->firstRow.','.$page->listRows)->select();
             foreach ($stdata as $key => $v) {
             $info=$Or->where('student_id='.$v['id'])
                      ->field("xk_teacher.realname as tename,xk_order.id as oid,xk_course.coursename as coname,choosenum,xk_order.id as oid,is_success,isreceive")
                      ->join('LEFT JOIN __COURSE__ ON __ORDER__.course_id=__COURSE__.id') 
                      ->join('LEFT JOIN __TEACHER__ ON __COURSE__.teacher_id=__TEACHER__.id')
                      ->select();
             $v['order']=$info;
             $stdetaildata[]=$v;
             }
             // dump($stdetaildata);
             $this->assign('codata',$stdetaildata);
             $this->assign('page',$show);
             $this->display();  // echo "dfsd";
             
        }
              
         
        public function realtions()
         {
           // code...
           $data=$this->dao->relation(true)->select();
           dump($data);
         }
         
       
     
       


        
         
    

    }


    
   

