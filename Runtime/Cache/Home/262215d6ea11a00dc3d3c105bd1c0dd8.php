<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link href="/static/css/bootstrap.min.css" rel="stylesheet">
    <link href="/static/css/font-awesome.min.css" rel="stylesheet">
    <link href="/static/css/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/static/css/base.css">

    <!-- <link href="/static/css/style.min.css" rel="stylesheet"> -->
   	<style type="text/css">
   .WU_carousel_dotted{
      width:20px !important;
      height:20px !important;
      border-radius: 10px !important;
   }
   	</style>
   	
<style type="text/css">
  .WU_scrollli {
    border-bottom: 1px dashed #ccc !important; 
  } 
  
  .WU_scrollinfo > .infotitle span:hover{
  opacity: 0.5;
  }
  
 /*  .showdetail:hover{
    cursor: pointer;
  } */

</style>


   </head>
	<body>
  <div class="WU_header">
  <div class="WU_top bluetop">
      毕业论文很重要请慎重选择
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
    <div class="WU_search" style="font-size:12px;position:absolute;z-index:8000;top:8px;left:80px;">
    <button  class="btn btn-xs btn-danger" >教师</button>
    <button class="btn btn-danger btn-xs" >专业</button>
    </div>
    <div class="input-group-addon btn-primary"  style="cursor: pointer;position: relative">搜索
      <input type="submit" name="" style="position: absolute;left:0px;width:50px;opacity: 0;height:40px;top:0px" value=>

    </div>
    </div>
    
    </form>
    <!-- <form class="navbar-form navbar-right relog ">
    <div class="form-group">
      <a class="btn  btn-success" href="<?php echo U('Index/register');?>">注册</a>
      <a class="btn btn-danger " data-toggle="modal"  data-target='#WU_login_modal' >登录</a>
   </div>
     </form> -->
      <form class="navbar-text navbar-right">
       <img src="/static/img/logo.png">
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
 <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
   <!-- Indicators -->
   <ol class="carousel-indicators">
     <li data-target="#carousel-example-generic " data-slide-to="0" class="active WU_carousel_dotted"></li>
     <li data-target="#carousel-example-generic" class="WU_carousel_dotted" data-slide-to="1"></li>
     <li data-target="#carousel-example-generic" class="WU_carousel_dotted" data-slide-to="2"></li>
     <!-- <li data-target="#carousel-example-generic" data-slide-to="2"></li> -->
   </ol>
   <!-- Wrapper for slides -->
   <div class="carousel-inner" role="listbox">
     <div class="item active">
       <img src="/static/img/header2.png" alt="...">
       <div class="carousel-caption">
         ...
       </div>
     </div>
     <div class="item">
       <img src="/static/img/header1.png" alt="...">
       
       <div class="carousel-caption">
         ...
       </div>
     </div>
     <div class="item">
       <img src="/static/img/header4.png" alt="...">
       
       <div class="carousel-caption">
         ...
       </div>
     </div>
  
   </div>

   <!-- Controls -->
 <!--   <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
     <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
     <span class="sr-only">Previous</span>
   </a>
   <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
     <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
     <span class="sr-only">Next</span>
   </a> -->
 </div>
 <!-- --- -->
 <!-- ---- -->

 </div>
  <div style="padding-right: 50px;padding-left: 50px;">
  <div class="container-fluid">
    


    
    <!-- 导航图 -->
  <div class="container-fluid" >

  <div class="WU_info">
   <div class="row WU_inforow">
   <span class='WU_infoheader'>毕设选课详情</span>

     </div>
    <div class="row WU_scrollinfo" style="padding-top:15px; ">
    <div class="col-sm-12 relog" style='margin-bottom: 20px'>
      <a  href="<?php echo U('classlist');?>" class="btn btn-info btn-lg active">班级选题</a>
      <a  href="<?php echo U('teacherlist');?>"  class="btn btn-info btn-lg">指导教师</a>
      <a  href="<?php echo U('classresult');?>"class="btn btn-info btn-lg">选课结果</a>
    </div>
    <div class="col-sm-12 infotitle">
    <span >课程题目</span>
    <span >指导教师</span>
    <span >已选人数</span>
    <span >课程要求</span>
    <span >选课/</span>
    </div>
    </div>
     <div class="row WU_scrollinfo" style="padding-top:3px;height:600px;overflow: hidden ">
        <div class="col-sm-12">
       <div class="WU_myscroll">
       <ul >
        <li class="WU_scrollli" >
        <span >课程题目</span>
        <span >指导教师</span>
        <span >已选人数</span>
        <span ><a  href='' class="showdetail">查看详情</a></span>
        <span ><button class="btn btn-danger">在线选课</button></span>
        </li>
         <li class="WU_scrollli" >
        <span >课程题目</span>
        <span >指导教师</span>
        <span ><button class="btn btn-success"> <span class="badge ">42</span></button></span>
        <span ><a  href='' class="showdetail">查看详情</a></span>
        <span ><button class="btn btn-danger">在线选课</button></span>
        </li>
       
       </ul>
       </div>
      </div>
    </div>
    </div>
    </div>


  
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
    <script type="text/javascript" src="/static/js/common.js"></script>
    <script src="/static/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      $('#WU_login_modal').on('show.bs.modal', function (e) {
    
      })
       $('#WU_login_modal').modal({
          'remote':'http://www.baidu.com'
          'show':false

       });
    </script>
   	
    
<script type="text/javascript">
  myscroll=$(".WU_myscroll")[0];
  myscrollafter=$(".WU_myscrollafter")[0];
  scrollinfo=$(".WU_scrollinfo")[1];
  myscrollafter.innerHTML=myscroll.innerHTML;
  // alert(myscroll.offsetHeight);
  // alert(scrollinfo.scrollTop);
    // setInterval(function(){
    //  if(scrollinfo.scrollTop>=myscroll.offsetHeight)
    //    scrollinfo.scrollTop=scrollinfo.scrollTop-myscroll.offsetHeight;
    //  else
    //    scrollinfo.scrollTop++;
    //  },10)

</script>

</body>
   

</html>