<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<head>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="renderer" content="webkit">
    <title>毕业设计后台管理系统</title>

    <!-- CSS文件 -->
   <link href="/static/css/bootstrap.min.css" rel="stylesheet">
   <link href="/static/css/font-awesome.min.css" rel="stylesheet">
   <link href="/static/css/animate.min.css" rel="stylesheet">
   <link href="/static/css/style.min.css" rel="stylesheet">
    

<link rel="stylesheet" type="text/css" href="/static/css/plugins/jadate/jedate.css">

</head>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9">
        <h2></h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html"></a>
            </li>
            <li class="active">
                <strong></strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-3">
        <!-- <div class="title-action">
            <a href="" class="btn btn-primary">活动区域</a>
        </div> -->
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content animated bounceInRight">
            <div class="col-sm-1 pull-right">
                <a  href="" class="btn btn-primary btn-outline"><span class="fa fa-refresh fa-spiner"></span>刷新</a>
            </div>
            

<div class="col-sm-12">
    <?php if(($Time["starttime"]) == "0"): ?><div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      对不起您还没有设置选课时间
    </div>
  
   <?php else: ?>
    <div class="jumbotron">
      <div class="container">
        <h1>当前的选课时间设置的是：</h1>
        <p>您目前设置的选课起始时间为<span class="badge badge-primary"><?php echo (date('Y-m-d H:i:s',$Time["starttime"])); ?></span>结束时间是<span class="badge badge-danger "><?php echo (date('Y-m-d H:i:s',$Time["endtime"])); ?></span></p>
        <p>
         
        </p>
      </div>
    </div><?php endif; ?>
    <form action=""  id='signupForm' method="post" role="form">
   
      <div class="form-group">
        <div class="col-sm-2">
        <input type="text" class="form-control wicon required" id="start" name="starttime" placeholder="请选择起始时间">
        </div>
         <div class="col-sm-2">
        <input type="text" class="form-control wicon required" id="end" name="endtime" placeholder="请选择起始时间">
        </div>
          <button  class="btn btn-primary">点击重置</button>
      </div>
  
    
    </form>

</div>

  




        </div>
    </div>
</div>
<!-- 全局js -->
  <script src="/static/js/jquery.min.js"></script>
  <script src="/static/js/bootstrap.min.js"></script>
  <script src="/static/js/plugins/layer/layer.min.js"></script>
  <script src="/static/js/common.js"></script>

  <!-- 自定义js -->

  <!-- 第三方插件 -->

<script type="text/javascript" src="/static/js/plugins/jadate/jedate.min.js"></script>
<script type="text/javascript">
    var start = {
        format: 'YYYY-MM-DD hh:mm:ss',
        minDate: $.nowDate(0), //设定最小日期为当前日期
        festival:true,
        //isinitVal:true,
        maxDate: '2099-06-16 23:59:59', //最大日期
        choosefun: function(elem,datas){
            end.minDate = datas; //开始日选好后，重置结束日的最小日期
        }
    };
    var end = {
        format: 'YYYY-MM-DD hh:mm:ss',
        minDate: $.nowDate(0), //设定最小日期为当前日期
        festival:true,
        //isinitVal:true,
        maxDate: '2099-06-16 23:59:59', //最大日期
        choosefun: function(elem,datas){
            start.maxDate = datas; //将结束日的初始值设定为开始日的最大日期
        }
    };
    $("#start").jeDate(start);
    $("#end").jeDate(end);
</script>

</body>
</html>