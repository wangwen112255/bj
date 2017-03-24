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
    *{
      font-family: "微软雅黑";
    }
    .WU_header{
      width: 100%;
      background: #fee;
      height: 140px;

    }
    .WU_top{
      width: 100%;
      height: 40px;
      padding: 0px 5%;
      color: #fff;
      line-height: 40px;
      font-size: 16px;
      opacity: 0.9;

     }
     .WU_content{
      padding:20px 5%;
     }
     .relog button{
    border-radius: 18px;
    padding: 6px 22px;
   
    }
    .WU-nav>li{
    padding-right:30px ;
    text-decoration: none;
    font-size:16px ;
    }
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
 </div>
	
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <button id="top" class="btn btn-success">
    	
    	顶部
    </button>
    <script src="/static/js/jquery.js"></script>
    <script type="text/javascript" src="/static/js/holder.min.js"></script>
    <script type="text/javascript" src="/static/js/common.js"></script>
    <script src="/static/js/bootstrap.min.js"></script>
    <script type="text/javascript">
     $(function(){
     	function _navautofix(height=350){
     		$(window).scroll(function(event){
  				 var winPos = $(window).scrollTop();
  				 if(winPos>height)
  				 	$("nav").addClass('navbar-fixed-top').removeClass("navbar-static-top");
  				 else
  				 	$("nav").removeClass('navbar-fixed-top').addClass("navbar-static-top");

    			})
     	}
  		_navautofix(500)
  		$("#top").click(function(){
  			$(window).scrollTop(0);
  		})
      $(".WU-nav li").mouseenter(function(){
        alert(1);
      });
    	});


    </script>
   	
   	

</body>


</html>