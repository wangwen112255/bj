<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo ($title); ?></title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link href="/static/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="/static/css/font-awesome.min.css" rel="stylesheet"> -->
    <!-- <link href="/static/css/animate.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" type="text/css" href="/static/css/base.css">

    <!-- <link href="/static/css/style.min.css" rel="stylesheet"> -->
   	<style type="text/css">
  
   .dropdown-menu-li{
    height: 40px;
    font-size: 14px;
    line-height: 40px;
   }
   .dropdown-menu-li:hover{
    background:#0065B3 ;
    }
    .dropdown-menu > li > a:hover{
        background:#0065B3 ;
    }
    .dropdown-menu > li > a{
    line-height: 40px;
    }
    
   	</style>
   	
<style type="text/css">
 


</style>


   </head>
	<body>
  <div class="WU_header">
  <div class="WU_top bluetop">
      毕业论文很重要请慎重选择<span ></span>
  </div> 
  <div class="WU_content"> 
  <div class="WU_navbar">
  <div class="row">
    <div class="col-sm-3">
      <img src="/static/img/logo.png">
    </div>
    <div class="col-sm-9">
    <nav class="navbar ">
     <ul class="nav navbar-nav WU-nav">
       <li><a href="<?php echo U('Index/index');?>">首页</a></li>
       <li><a href="<?php echo U('Depart/index');?>">院系展示</a></li>
       <li><a href="<?php echo U('Teachers/index');?>">教师课题</a></li>
       <li><a href="<?php echo U('Course/index');?>">学生选课</a></li>
     </ul>
    <form class="navbar-form navbar-left" action="ming.html" method="post">
    <div class="input-group " style="position: relative">
    <input type="text" name="username" id="input" class="form-control" placeholder="搜一搜" value="" >
    <div class="WU_search">
    <button  class="btn btn-xs btn-danger" >教师</button>
    <button class="btn btn-danger btn-xs" >专业</button>
    </div>
    <div class="input-group-addon btn-primary"  style="cursor: pointer;position: relative">搜索
      <input type="submit" class="WU_search_submit" name=""  value="">
    </div>
    </div>
    
    </form>
    <!-- <form class="navbar-form navbar-right relog ">
    <div class="form-group">
      <a class="btn  btn-success" href="<?php echo U('Index/register');?>">注册</a>
      <a class="btn btn-danger " data-toggle="modal"  data-target='#WU_login_modal' >登录</a>
   </div>
     </form> -->
      <form class="navbar-text navbar-right dropdown"  style="margin-bottom: 0px;margin-top: -2px;">
      <a href="<?php echo U('Student/index');?>" class="dropdown-toggle" >
      <img src="/static/img/logo.png"   class="WU_login_img img-circle"> 
      <div class="pull-right">
      <p style="margin-left:5px"><?php echo (session('_username_')); ?></p>
      <p style="margin-left:5px"><b>【学生】</b></p> 
      </div>
      </a>
      <ul class="dropdown-menu dropdown-menu_list">
        <li class="dropdown-menu-li"><a href="<?php echo U('Student/photo');?>">我的头像</a></li>
        <li class="dropdown-menu-li"><a href="<?php echo U('Student/intro');?>">基本资料</a></li>
        <li class="dropdown-menu-li"><a href="<?php echo U('Student/info');?>">我的通知</a></li>
        <li class="dropdown-menu-li"><a href="<?php echo U('Student/course');?>">我的课目</a></li>
        <li class="dropdown-menu-li"><a href="<?php echo U('Student/safe');?>">安全设置</a></li>
        <li class="dropdown-menu-li"><a href="<?php echo U('Login/logout');?>">退出</a></li>
      </ul>
      </form>

<!--  -->
      </nav>
      </div>
    </div>
  </div>
  </div>
 </div>
  <!-- ----登陆-->

  <div class="modal fade" id="WU_login_modal" style="z-index:9999">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">登录</h4>
        </div>
        <div class="modal-body">
          <form action="ming.html" class="form-horizontal" method="post">
            <div class="form-group">
              <label class="col-sm-3 control-label">用户名</label>
              <div class="col-sm-6">
              <input type="text" name="username" class="form-control" placeholder="请输进去用户名">
              </div>
            </div>            
            <div class="form-group">
              <label class="col-sm-3 control-label">密码</label>
              <div class="col-sm-6">
              <input type="text" name="username" class="form-control" placeholder="请输进去密码">
              </div>
            </div> 
            <div class="form-group">
               <div class="col-sm-offset-3   col-sm-3">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <input type="radio"   name="role" aria-label="">
                      </span>
                      <input type="" value="学生" disabled class="form-control" aria-label="">
                      </div>
             <!-- --- -->
               </div>
                 <div class="col-sm-3">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <input type="radio"  name="role"   aria-label="">
                        </span>
                        <input type="" value="教师" disabled class="form-control" aria-label="">
                        </div>
               <!-- --- -->
                 </div>
             </div>
            <div class="form-group">
              <div class="col-sm-9 col-sm-offset-3">
                  <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                  <button type="submit" class="btn btn-primary" id="login">登录</button>
              </div>
            </div>
           
          </form>
        </div>
      </div>
    </div>
  </div>

<!-- ------ -->
 <div  class="row">
 
 </div>
  <div style="padding-right: 50px;padding-left: 50px;">
  <div class="container-fluid">
  <!-- ---- -->
    <div class="container-fluid" >

    <div class="WU_info">
     <div class="row WU_inforow">
     <span class='WU_infoheader'>我的中心</span>

       </div>
      <div class="row WU_scrollinfo" style="padding-top:15px; ">
      <div class="col-sm-3">
        <div class="panel panel-default">
          <div class="panel-body">
           <h4>个人中心</h4>
             <ul class="WU_personal">
              <li><a href="<?php echo U('Student/course');?>">我的选课</a></li>
              <li><a href="<?php echo U('Student/info');?>">我的通知</a></li>
              <li><a href="<?php echo U('Student/classes');?>">班级公示</a></li>
              <li><a href="<?php echo U('Student/guide');?>">指导教师</a></li>
            </ul>
          </div>
          <div class="panel-body">
           <h4>账户设置</h4>
             <ul class="WU_personal">
              <li><a href="<?php echo U('Student/intro');?>">基本信息</a></li>
              <li><a href="<?php echo U('Student/photo');?>">头像设置</a></li>
              <li><a href="<?php echo U('Student/safe');?>">安全设置</a></li>
              <li><a href="<?php echo U('Login/logout');?>"><span class=""></span>退出登录</a></li>
            </ul>
          </div>
          </div>
      </div>
        <div class="col-sm-8">
        <div class="panel panel-primary" style="border-color:#ccc" >
          <div class="panel-heading" style="border-color:#ccc;background: #fff">
            <h3 class="panel-title" style="border-color:#ccc;color:#515151"><span>基本信息</span></h3>
          </div>
              
<div class="row">
<div class="col-sm-8 col-sm-offset-2">
<div class="panel-body">
  <form action="<?php echo U('intro');?>" method="POST" role="form" id='introform'>
   
  
    <div class="form-group">
      <label for="">姓名</label>
      <div class="row">
      <div class="col-sm-8">
      <input type="text" class="form-control" value="<?php echo ($Userdata['realname']); ?>" name="realname" placeholder="请输入您的真实姓名">
      </div>

      </div>
    </div>
   
   <div class="form-group">
     <label for="">学号</label>
     <div class="row">
     <div class="col-sm-8">
     <input type="text" class="form-control" value="<?php echo ($Userdata['studentid']); ?>"  name="studentid" placeholder="请输入您的学号">
     </div>
     </div>
   </div>   
   <div class="row">
   <div class="col-sm-4">
    <div class="form-group">
      <label for="">院系</label>
       <select class="form-control" id='depart' name="depart_id">
        <option value=''>--请选择您的院系--</option>
        <?php if(is_array($Dedata)): foreach($Dedata as $key=>$vo): ?><option value='<?php echo ($vo["id"]); ?>' <?php if(($vo["id"]) == $Userdata['depart_id']): ?>selected<?php endif; ?>><?php echo ($vo["departname"]); ?></option><?php endforeach; endif; ?>
       </select>
    </div>
    </div>
      <div class="col-sm-4">
       <div class="form-group">
         <label for="">专业</label>
          <select class="form-control" name='class_id' id='classes'>
          <option value=''>--请选择您的专业--</option>
           <?php if(is_array($Cldata)): foreach($Cldata as $key=>$vo): ?><option value='<?php echo ($vo["id"]); ?>' <?php if(($vo["id"]) == $Userdata['class_id']): ?>selected<?php endif; ?>><?php echo ($vo["classname"]); ?></option><?php endforeach; endif; ?>
       </select>
       </div>
       </div>
    </div>
    <button type="submit" <?php if(($_GET['isIntro']) != "1"): ?>disabled<?php endif; ?> class="btn btn-primary">提交</button>
    <button type="submit"  class="btn btn-success">修改</button>
     </div> 
    
  </form>
  </div>
  </div>
</div>

  
        </div>
      </div>

      </div>

      
      </div>
      </div>
  

    <!-- ------ -->
  </div>
  </div>
     <div class="WU_footer ">
     <div class="row" style="padding-top:10px">
       <div class="col-md-4 col-md-offset-1">
         <img src="/static/img//logo.png" alt="">
       </div>
        <div class="col-md-3 ">
         <p class="text-center text-center-footer ">
           <span>关于选课</span>
           <span>联系me</span>
           <span>关于php</span>
           <span>我的博客</span>
         </p>         
          <p class="text-center">公安备案号豫ICP备16036348号 </p>
          <p class="text-center">友情链接:华北水利水电|中国科技大学 </p>

       </div>
        <div class="col-md-4 ">
         <p class="text-center text-center-footer ">
           <img src="holder.js/80x80">

           <img src="holder.js/80x80">
         </p>         
  
       </div>
     </div>
    
    </div>
    <script src="/static/js/jquery.js"></script>
    <script type="text/javascript" src="/static/js/holder.min.js"></script>
    <script type="text/javascript" src='/static/js/plugins/validate/jquery.validate.min.js'></script>
    <script type="text/javascript" src="/static/js/plugins/layer/layer.min.js"></script>
    <script type="text/javascript" src="/static/js/common.js"></script>
    <script src="/static/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    $(function(){
      $('#WU_login_modal').on('show.bs.modal', function (e) {
    
      })
      $('.dropdown').mouseenter(function(){
        $('.dropdown-menu').show();
      }).mouseleave(function(event) {
        $('.dropdown-menu').hide();
        
      });




     })

    </script>
   	
    
<script type="text/javascript">
    <?php if(($_GET['isIntro']) == "1"): ?>// layer.msg('请您先完善一下个人信息,以免信息不全给您造成不便',{icon:6,time:2000})
    layer.confirm('请您先完善一下个人信息,以免信息不全给您造成不便',{icon:3,title:'提示',btn:['我同意','稍后再说']})<?php endif; ?>

    jQuery.validator.addMethod("isChinesname", function(value, element) {  
    return this.optional(element) || !(/[^\u4e00-\u9fa5]+/.test(value));       
    }, "真实名字必须是中文");
   
   
    var icon="<span class='glyphicon glyphicon-remove-sign'></span>";   
     messageslogin={
     realname:{
      required:icon+'请输入真实姓名',
      maxlength:icon+'请输输入正确长度的用户名,不能超过5',
      isChinesname:icon+'真实名字必须是中文'
     },
     studentid:{
      required:icon+'请输输入学号',
      maxlength:icon+'学号长度不能超过15',
      number:icon+'学号/必须是数字'
     },
     class_id:{
      required:icon+'请选择专业',
     },
     depart_id:{
      required:icon+'请选择院系',
     }
    
    

    };
     ruleslogin={
     realname:{
      required:true,
      maxlength:5,
      isChinesname:true
     },
     studentid:{
      required:true,
      maxlength:15,
      number:true
     }
     // class_id:{
     //  required:true,
     // },
     // depart_id:{
     //  required:true,
     // }
    };

    _validade({id:'introform',rules:ruleslogin,messages:messageslogin})
    $('#depart').change(function(){
        txt=$(this).val();
       $('#classes')[0].options.length = 0;
       // $('#classes')[0].options.add(new Option('','--请选择您的专业--'))
        $.post('/index.php/Class/changeClass',{de:txt},function(data){
            $.each(data,function(index,val){
              $('#classes')[0].options.add(new Option(val,index))
            })

        })
    })



</script>


</body>
   

</html>