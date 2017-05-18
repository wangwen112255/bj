<?php 
namespace Admin\Model;
use Admin\Common\BaseModel;
class TeacherModel extends BaseModel{
  public function selectall($did){
		$counts=$this->where('depart_id='.$did)->count();
		if(!$counts){
			$data=array();
			
		}
		$page=new \Think\Page($counts,10);
		$show=$page->show();
		$codata=$this->
				field('count(xk_course.id) as cnum,realname,photo,xk_teacher.id as tid')
			   ->where('depart_id='.$did)->limit($page->firstRow.','.$page->listRows)
			   ->join('LEFT JOIN __COURSE__ ON __COURSE__.teacher_id=__TEACHER__.id')
			   ->group('xk_teacher.id')->select();
		$data['data']=$codata;
		$data['page']=$show;
		return $data;
	}

}


 ?>