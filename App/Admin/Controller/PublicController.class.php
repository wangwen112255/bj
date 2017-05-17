<?php
namespace Admin\Controller;
use Think\Controller;
class PublicController extends Controller{
	public $dao;
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
	  public function checkusername(){
	  	$condition['username']=$_POST['username'];
	  	$Stu=M('Student');
	  	$Tea=M('Teacher');
	  	$s=$Stu->where($condition)->find();
	  	$t=$Tea->where($condition)->find();
	  	if($s!=null || $t!=null){
	  	    $data['isExit']=1;
	       $this->ajaxReturn($data);
	   }
	   else{
	   		 $data['isExit']=0;
	   	     $this->ajaxReturn($data);
	   }
	  	// }
	  	// else{
	  	// 	$data['isExit']=0;
	   //     $this->ajaxReturn($data);	
	  	// }
	  }
	  public function forgetpwd(){
	  	if(isset($_POST["cid"])){
	  		if(!isset($_POST["username"])||empty($_POST["username"])){
	  		$this->error('信息有误无法发查询');
	  		exit;
	  		}
	  		if(!isset($_POST["pwd"])||empty($_POST["pwd"])){
	  		$this->error('信息有误无法发查询');
	  		exit;
	  		}
	  		if(!isset($_POST["studentid"])||empty($_POST["studentid"])){
	  		$this->error('信息有误无法发查询');
	  		exit;
	  		}
	  		if(!isset($_POST["realname"])||empty($_POST["realname"])){
	  		$this->error('信息有误无法发查询');
	  		exit;
	  		}
	  		$St=M('Student');
	  		$Condition['username']=$_POST["username"];
	  		$Condition['studentid']=$_POST["studentid"];
	  		$Condition['realname']=$_POST["realname"];
	  	if($St->where($Condition)->setField('pwd',$value))
	  		$this->success('设置成功');
	  	else
	  		$this->error('信息有误无法发查询');
	  	}
	    else
	  	$this->display();
	  }
	
	  public function uploadfile($itemname='photo',$wid=150,$hei=150){
	  	    	$config = array( 
	  	    		'maxSize'    =>    3145728,
	  	    		    'savePath'   =>    './'.$itemname.'/',  
	  	    		    'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),   
	  	    		    'autoSub'    =>    true,   
	  	    		    'subName'    =>    array('date','Ymd'),
	  	    		    );
	  	    	$upload = new \Think\Upload($config);// 实例化上传类
	  	    	$upload->saveName = date('YmdHis',time()).'_'.mt_rand();
	  	    	$info=$upload->uploadOne($_FILES['myfile']);
	  	    	if(!$info){
	  	    	  $this->ajaxReturn(toJson($upload->getError()));
	  	    	  }else{
	  	    	  $url='/Uploads'.ltrim($info['savepath'].$info['savename'],'.');
	  	    	  $image = new \Think\Image();
	  	    	  $image->open('.'.$url);
	  	    	  $suffx=strchr($url,'.');
	  	    	  $thumurl=substr($url,0,strripos($url,'.')).'_thumb'.$suffx;
	  	    	  unlink('.'.$url);
	  	    	  $image->thumb($wid, $hei,\Think\Image::IMAGE_THUMB_FIXED)->save('.'.$thumurl); 
	  	    	   session('_pic_',$thumurl); 		
	  	    	   $this->ajaxReturn(toJson(true,"恭喜您成功上传",$thumurl));
	  	    		}
	  	    	 
	  	    	
	  	    	}
	  	    
	  	
	    
     }



?>