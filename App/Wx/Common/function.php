
<?php 


/**
 * [getTree description、菜单生成树]
 * @param  [array]  $data [description]
 * @param  integer $id   [description]
 * @return [array]        [description]
 */
 function getTree($data, $id=0) {
 $list = array();
 foreach($data as $v) {
 if($v['pid'] == $id) {
 $v['child'] =getTree($data, $v['id']);
 if(empty($v['child'])) {
 unset($v['child']);
 }
 array_push($list, $v);
 }
 }
 return $list;
}
/**
 * 加密字符串登陆时候用
 * @param $pass 字符串
 * @param $prefix 前缀
 * @return string 加密后字符串
 */


function setUser($user){
 $_SESSION['_username_']=$user;
 
}
function getUser(){
	if(!isset($_SESSION['_username_'])||empty($_SESSION['_username_'])){
	redirect('/index.php/Login/index');
	}
}
function toJson($res,$msg,$data){
if($res===true){
	return array('code'=>200,'msg'=>isset($msg)?$msg:'操作成功','data'=>$data);
	exit;
}
else{
	return array('code'=>100,'msg'=>$res);
}



}
function check_verify($code,$id=''){ 
$verify = new \Think\Verify();	
return $verify->check($code,$id);
}
function getOauth($type){
	if($type){
	$name = ucfirst(strtolower($type)) . 'SDK';
	$names="Org\ThinkSDK\sdk"."\\".$name;
	return $names;
	}
	else{
		return false;
	}
	
}
 ?>



