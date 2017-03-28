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
      <img src="holder.js/120x60">
    </div>
    <div class="col-sm-9">
    <nav class="navbar ">
     <ul class="nav navbar-nav WU-nav">
       <li><a href="">首页</a></li>
       <li><a href="">院系查看</a></li>
       <li><a href="">教师风采</a></li>
       <li><a href="">学生选课</a></li>
     </ul>
    <form class="navbar-form navbar-left">
    <div class="input-group ">
    <input type="text" name="" id="input" class="form-control" placeholder="搜您想搜的" value="" >
    <div class="input-group-addon btn-primary" style="cursor: pointer;">搜索</div>
    </div>
    
    </form>
    <form class="navbar-form navbar-right relog ">
    <div class="form-group">
        <button class="btn ">注册</button>
      <button class="btn btn-danger ">登录</button>
   </div>
     </form>
      </nav>
      </div>
    </div>
  </div>
  </div>
 </div>
 <div  class="row">
 <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
   <!-- Indicators -->
   <ol class="carousel-indicators">
     <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
     <li data-target="#carousel-example-generic" data-slide-to="1"></li>
     <!-- <li data-target="#carousel-example-generic" data-slide-to="2"></li> -->
   </ol>
   <!-- Wrapper for slides -->
   <div class="carousel-inner" role="listbox">
     <div class="item active">
       <img src="holder.js/100px300" alt="...">
       <div class="carousel-caption">
         ...
       </div>
     </div>
     <div class="item">
       <img src="holder.js/100px300" alt="...">
       
       <div class="carousel-caption">
         ...
       </div>
     </div>
  
   </div>

   <!-- Controls -->
   <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
     <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
     <span class="sr-only">Previous</span>
   </a>
   <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
     <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
     <span class="sr-only">Next</span>
   </a>
 </div>
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
      <button type="button" class="btn btn-info btn-lg active">班级选题</button>
      <button type="button" class="btn btn-info btn-lg">指导教师</button>
      <button type="button" class="btn btn-info btn-lg">选课结果</button>
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
         <img src="holder.js/160x80" alt="">
       </div>
        <div class="col-md-3 ">
         <p class="text-center text-center-footer ">
           <span>关于选课</span>
           <span>联系me</span>
           <span>关于php</span>
           <span>我的博客</span>
         </p>         
          <p class="text-center">公安备案号</p>
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
    <script type="text/javascript"></script>
   	
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