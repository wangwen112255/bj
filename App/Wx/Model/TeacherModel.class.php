<?php
namespace Wx\Model;
use Think\Model;

class TeacherModel  extends Model{
 protected $_validate=array(
 	array('username','6,20','用户名长度不够','0','length'),
 	array('username','require','用户名必须输入'),
 	// array('username','isChinese','用户名必须是字母或数字组成','0','function',1),
 	array('username','','用户名已经存在','0','unique',1),
 	array('realname','require','真实姓名必须输入'),
 	array('studentid','require','学号必须输入'),
 	array('class_id','require','请选择您的专业名'),
 	array('depart_id','require','请选择您的院系名'),
 	array('realname','2,5','用户名长度不正确','0','length'),
 	// array('username','isChinese','用户名必须是字母或数字组成','0','function'),
 	array('studentid','number','学号必须是数字'),
 	array('coursename','2,30','用户名长度不够不正确','0','length'),
 	array('courrname','require','用户名必须输入'),
 	array('desc','require','基本要求必须填写'),
 	array('limitnum','number','限制数量必须是数字'),
 	array('limitnum',array(1,2,3),'限制的数量不能超过3！','0','in'), 
 	array('limit','2,200','基本要求太长了不超过200','0','length'),
 	
 	);

}

function isChinese($data){
 if($data=='123456')
 	return false;
 return true;
}

?>