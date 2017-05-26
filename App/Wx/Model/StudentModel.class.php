<?php
namespace Wx\Model;
use Think\Model;

class StudentModel  extends Model{
 protected $_validate=array(
 	array('username','5,20','用户名长度不够','0','length'),
 	array('username','require','用户名必须输入'),
 	// array('username','isChinese','用户名必须是字母或数字组成','0','function',1),
 	array('username','','用户名已经存在','0','unique',1),
 	array('username','require','用户名必须输入',0,'',4),
 	array('pwd','require','请输入用户名'),
 	array('repwd','require','请输入用户名'),
 	array('repwd','pwd','两次密码不一样','','confirm','1'),
 	array('repwd','6,20','密码的长度是6至20的字符','','length','1'),
 	array('pwd','6,20','密码的长度是6至20的字符','','length','1'),
 	array('realname','require','真实姓名必须输入'),
 	array('studentid','require','学号必须输入'),
 	array('studentid','','请检查您的学号是否正确','0','unique',1),
 	array('class_id','require','请选择您的专业名'),
 	array('depart_id','require','请选择您的院系名'),
 	array('realname','2,5','用户名长度不正确','0','length'),
 	array('studentid','9','用户名长度为9','0','length'),
 	// array('studentid','number','学号必须是数字')

 	);

}



?>