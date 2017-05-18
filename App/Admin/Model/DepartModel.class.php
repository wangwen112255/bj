<?php 
namespace Admin\Model;
use Admin\Common\BaseModel;
class DepartModel extends BaseModel{
  public function selectall(){
		$counts=$this->count();
		$page=new \Think\Page($counts,10);
		$show=$page->show();
		$codata=$this->where()->field('count(xk_class.id) as clnum,pic,xk_depart.id as cid,departname')
		        ->join('LEFT JOIN  __CLASS__ ON  __CLASS__.depart_id=__DEPART__ .id')
	    		->group('xk_depart.id')->limit($page->firstRow.','.$page->listRows)->select();
		$data['data']=$codata;
		$data['page']=$show;
		return $data;
	}

}


 ?>