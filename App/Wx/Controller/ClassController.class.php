<?php
namespace Wx\Controller;
use Think\Controller;
class ClassController extends BaseController {
	protected $dao;
	public function _initialize(){
		$this->dao=M('class');

	}
    public function index(){
        
    }
    public function changeClass(){
        $Condition['depart_id']=$_POST['de'];
        $cldata=$this->dao->where($Condition)->getField('id,classname',true);
        $this->ajaxReturn($cldata);
    }
}