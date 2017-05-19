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
    

<link href="/static/css/plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet">
<style type="text/css">

</style>


</head>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9">
        <h2></h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html"><?php echo ($codata[0]['realname']); ?></a>
            </li>
            <li class="active">
                <strong>课程如下</strong>
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
      
      <table data-toggle="table" data-click-to-select="true" data-mobile-responsive="true">
          <thead>
          <tr>
              <th >课程编号</th>
              <th data-field="name">课程题目</th>
              <th data-field="pic">选课情况</th>
              <th data-field="">限制人数</th>
              <th>课程状态</th>
             
          </tr>
          </thead>
          <tbody>
         <?php if(is_array($codata)): $i = 0; $__LIST__ = $codata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
              <td ><?php echo ($key+1); ?></td>
              <td><?php echo ($vo["coursename"]); ?></td>
              <td class="project-completion">
                <small>选课进度：<?php echo ($vo['choosenum']/$vo['limitnum']*100); ?>%--已经报名<?php echo ($vo['choosenum']); ?>人</small>
                <div class="progress progress-mini">
                    <div style="width:<?php echo ($vo['choosenum']/$vo['limitnum']*100); ?>%;" class="progress-bar"></div>
                </div>
              </td>
              <td><span class="badge badge-danger"><?php echo ($vo["limitnum"]); ?></span></td>
              <td>
                 <button type="button"  cid='<?php echo ($vo["id"]); ?>' statusid='<?php echo ($vo["status"]); ?>'  class="changestatus <?php if(($vo["status"]) == "0"): ?>btn btn-success<?php else: ?>btn btn-default<?php endif; ?>"><?php  $m=$vo['status'];echo $status[$m];?></button>
              </td>
          </tr><?php endforeach; endif; else: echo "" ;endif; ?>
          </tbody>
      </table>
      <?php echo ($page); ?>

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

<script src="/static/js/plugins/bootstrap-table/bootstrap-table.min.js"></script>
<script src="/static/js/plugins/bootstrap-table/bootstrap-table-mobile.min.js"></script>
<script src="/static/js/plugins/bootstrap-table/locale/bootstrap-table-zh-CN.min.js"></script>
<script type="text/javascript">


</script>

</body>
</html>