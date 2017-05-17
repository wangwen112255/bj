<?php 
namespace Admin\Common;
use Think\Model;
 class BaseModel extends Model{
  	    public function selectall(){
		$counts=$this->count();
		$page=new \Think\Page($counts,10);
		$show=$page->show();
		$codata=$this->where()->limit($page->firstRow.','.$page->listRows)->select();
		$data['data']=$codata;
		$data['page']=$show;
		return $data;
	}

 }

 ?>