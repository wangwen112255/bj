<?php
namespace Home\Model;
use Think\Model;

class TeacherModel  extends Model{
 protected $_validate=array(
 	array('username','6,20','用户名长度不够','0','length'),
 	array('username','require','用户名必须输入'),
 	array('username','isChinese','用户名必须是字母或数字组成','0','function',1),
 	array('username','','用户名已经存在','0','unique',1)
 	// array('username','6,20','用户名长度不够','0','length',4),
 	// array('username','require','用户名必须输入'),
 	// array('username','isChinese','用户名必须是字母或数字组成','0','function'),
 	// array('username','','用户名已经存在','0','unique',1)

 	);

}

function isChinese($data){
 if($data=='123456')
 	return false;
 return true;
}

?>