<?php 
namespace Admin\Model;
use Admin\Common\BaseModel;
class ClassModel extends BaseModel{
  public function selectall(){
		$counts=$this->count();
		$page=new \Think\Page($counts,10);
		$show=$page->show();
		$codata=$this->where()->field('count(xk_student.id) as clnum,count(xk_teacher.id) as tenum,xk_class.id as cid,classname')
		        ->join('LEFT JOIN  __STUDENT__ ON  __STUDENT__.class_id=__CLASS__ .id')
		        ->join('LEFT JOIN  __TEACHER__ ON  __TEACHER__.class_id=__CLASS__ .id')
	    		->group('xk_class.id')->limit($page->firstRow.','.$page->listRows)->select();
		$data['data']=$codata;
		$data['page']=$show;
		return $data;
	}
	public function selectwhole($id){
		$counts=$this->count();
		$page=new \Think\Page($counts,10);
		$show=$page->show();
		$codata=$this->where('depart_id='.$id)->select();
		$data['data']=$codata;
		$data['page']=$show;
		return $data;

	}

}


 ?>