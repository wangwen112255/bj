<?php
namespace Home\Model;
use Think\Model;

class StudentModel  extends Model{
 protected $_validate=array(
 	array('username','require','用户名必须输入'),
 	// array('username','isChinese','用户名必须是字母或数字组成','0','function',1),
 	array('username','','用户名已经存在','0','unique',1),
 	array('username','10','用户名长度不够','0','length',1)
 	);

}

function isChinese($data){

}

?>