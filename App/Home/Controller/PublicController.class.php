<?php
namespace Home\Controller;
use Think\Controller;
class PublicController extends Controller{
	public function verifys(){
		ob_clean();
		session_start();
		$config =array(
		    'fontSize'  =>  22,              // 验证码字体大小(px)
		    'imageH'    =>  50,               // 验证码图片高度
		    'imageW'    =>  150,               // 验证码图片宽度
		    'length'    =>  4,               // 验证码位数
		    // 'fontttf'   =>  '6.ttf',              // 验证码字体，不设置随机获取
		    // 'useImgBg'  =>  true,       // 使用背景图片 
		    //'useZh'     =>  false,           // 使用中文验证码 
		   // 'useCurve'  =>  true,            // 是否画混淆曲线
		    'useNoise'  =>  true,            // 是否添加杂点
		    // 'bg'        =>  array(143, 151, 154),  // 背景颜色
		   );
		// $verify=new \Think\Verify($config);
		// $verify->entry();
		$Verify = new \Think\Verify($config);
		$Verify->entry();

	}
	function check()  {
	
	      $code = $_POST['code'];  
	      if(check_verify($code) === true)  
	      {  
	       $data['isCode']=1;
	       $this->ajaxReturn($data);
	      }else  
	      {  
			$data['isCode']=0;
	       $this->ajaxReturn($data);	          // $this->
	      }  
	
	  }  
	  function checks()  {
	
	      $code = $_GET['code'];  
	      if(check_verify($code) === true)  
	      {  
	       // $data['isCode']=1;
	       // $this->ajaxReturn($data);
	       echo '成功';
	      }else  
	      {  
			// $data['isCode']=0;
	       // $this->ajaxReturn($data);	          // $this->
	       echo 'shibai';

	      }  
	
	  } 
}



?>