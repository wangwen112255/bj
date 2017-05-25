<?php
namespace Admin\Controller;
use Think\Controller;
class ClassController extends BaseController {
	   protected $dao;
    public function _initialize(){
        parent::_initialize();
         $this->dao=D('Class');
    } 
    public function index(){
           $Daodata=$this->dao->selectall();
           $this->assign('codata',$Daodata['data']);
           $this->assign('page',$Daodata['page']);
           $this->display();

     }
    
  
      public function create(){
      $De=D('Depart');
      $dedata=$De->selectall();
      $this->assign('dedata',$dedata['data']);
      $this->assign('page',$dedata['page']);
      if(!empty($_GET['cid'])&&isset($_GET['cid'])){
          $Codata=$this->dao->find($_GET['cid']);
          $this->assign("codata",$Codata);
          $this->display();
      }else{
          $this->assign('did',$_GET['did']);
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
              $this->ajaxReturn(toJson(true,"专业添加成功,您可以继续添加"));
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
    public function result($cid){
          $Co=M('Order');
          $condition['xk_order.class_id']=$cid;
          $condition['xk_order.is_success']=1;
          $counts= $Co->where( $condition)->count();
          $Page=new  \Think\Page($counts,10);
          $show=$Page->show();
          $codata= $Co
          ->where($condition)
          ->field("xk_student.realname as stuname,xk_teacher.realname as tename,xk_course.coursename as coname,xk_student.studentid as stid")
          ->join('LEFT JOIN __STUDENT__ ON __ORDER__.student_id=__STUDENT__.id')
          ->join('LEFT JOIN __COURSE__ ON __ORDER__.course_id=__COURSE__.id') 
          ->join('LEFT JOIN __TEACHER__ ON __COURSE__.teacher_id=__TEACHER__.id')
          ->limit($Page->firstRow.','.$Page->listRows)->select();
          $this->assign('id',$cid);
          $this->assign('page',$show);
          $this->assign('codata',$codata);
          // dump($codata);
          $this->display();
    }
     public function excel($id){
        $Co=M('Order');$Cl=M('Class');
        $classname=$Cl->where('id='.$id)->getField('classname');
        $condition['xk_order.class_id']=$id;
        $condition['xk_order.is_success']=1;
         $codata= $Co
          ->where($condition)
          ->field("xk_student.realname as stuname,xk_student.studentid as stid,xk_course.coursename as coname,xk_teacher.realname as tename")
          ->join('LEFT JOIN __STUDENT__ ON __ORDER__.student_id=__STUDENT__.id')
          ->join('LEFT JOIN __COURSE__ ON __ORDER__.course_id=__COURSE__.id') 
          ->join('LEFT JOIN __TEACHER__ ON __COURSE__.teacher_id=__TEACHER__.id')
          ->select();
          array_unshift($codata,array('学生姓名','学生学号','课题名称','指导教师'));
          // dump($codata);
        // dump(range('A','Z'));
        $this->getExcel($classname,$codata,'专业结果');
       
    }
     private function getExcel($fileName,$data,$title,$width=40){
        import("Org.PhpExcel.PHPExcel");
        import("Org.PhpExcel.PHPExcel.Writer.Excel5");
        import("Org.PhpExcel.PHPExcel.IOFactory.php");
        if(empty($data[1]) || !is_array($data)){
           echo "<script>alert('暂时没有数据可导出,请自行关闭');window.close();</script>";
           exit;
        }
        //检查文件名
        if(empty($fileName)){
            exit;
        }
            $date = date("Y_m_d_H:i:s",time());
            $fileName .= "_{$date}.xls";
            $objPHPExcel = new \PHPExcel();
            $objPHPExcel->getProperties()->setCreator("管理员");
            $objPHPExcel->getProperties()->setLastModifiedBy("管理员");
            $objActSheet = $objPHPExcel->getActiveSheet();
            $charA=range('A','Z');
            $objActSheet->getRowDimension(1)->setRowHeight(24);
            foreach($charA as $val) { 
                $objActSheet->getStyle($val.'1')->getFont()->setSize(18);
            }
            $i=0;
             foreach($data[0] as $key=>$val){
                $objActSheet->getColumnDimension($charA[$i])->setWidth($width);
                $objActSheet->getStyle($charA[$i])->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                $i++;
            } 
            $objActSheet->setTitle($title);
            $objActSheet->fromArray($data);
            $fileName = iconv("utf-8", "gb2312", $fileName);
           
            //设置活动单指数到第一个表,所以Excel打开这是第一个表
            // $objPHPExcel->setActiveSheetIndex(0);
            ob_end_clean();
            header('Content-Type: application/vnd.ms-excel');
            header("Content-Disposition: attachment;filename=\"$fileName\"");
            header('Cache-Control: max-age=0');
            $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
            $objWriter->save('php://output'); //文件通过浏览器下载
            exit;
        }
            // public function excel(){
            //     //导入PHPExcel类库，因为PHPExcel没有用命名空间，只能inport导入
            //     import("Org.PhpExcel.PHPExcel");
            //     //要导入的xls文件，位于根目录下的Public文件夹
            //     $filename="./Public/1.xls";
            //     //创建PHPExcel对象，注意，不能少了\
            //     $PHPExcel=new \PHPExcel();
            //     //如果excel文件后缀名为.xls，导入这个类
            //     import("Org.PhpExcel.PHPExcel.Reader.Excel5");
            //     //如果excel文件后缀名为.xlsx，导入这下类
            //     //import("Org.Util.PHPExcel.Reader.Excel2007");
            //     //$PHPReader=new \PHPExcel_Reader_Excel2007();

            //     $PHPReader=new \PHPExcel_Reader_Excel5();
            //     //载入文件
            //     $PHPExcel=$PHPReader->load($filename);
            //     //获取表中的第一个工作表，如果要获取第二个，把0改为1，依次类推
            //     $currentSheet=$PHPExcel->getSheet(0);
            //     //获取总列数
            //     $allColumn=$currentSheet->getHighestColumn();
            //     //获取总行数
            //     $allRow=$currentSheet->getHighestRow();
            //     //循环获取表中的数据，$currentRow表示当前行，从哪行开始读取数据，索引值从0开始
            //     for($currentRow=1;$currentRow<=$allRow;$currentRow++){
            //         //从哪列开始，A表示第一列
            //         for($currentColumn='A';$currentColumn<=$allColumn;$currentColumn++){
            //             //数据坐标
            //             $address=$currentColumn.$currentRow;
            //             //读取到的数据，保存到数组$arr中
            //             $arr[$currentRow][$currentColumn]=$currentSheet->getCell($address)->getValue();
            //         }
                
            //     }
            //         dump($arr);
            // }
}
