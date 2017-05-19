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
                <a href="index.html">院系管理</a>
            </li>
            <li class="active">
                <strong>正选结果</strong>
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
      <div class="fixed-table-toolbar">
          <div class="columns columns-right btn-group pull-right">
              <button class="btn btn-default btn-outline" type="button" title="搜索"><i class="glyphicon glyphicon-search"></i></button>
              <button onclick="javascript:window.location.reload();" class="btn btn-default btn-outline" type="button" name="refresh" title="刷新"><i class="glyphicon glyphicon-repeat"></i></button>
          </div>
          <div class="pull-right search">
              <input class="form-control input-outline" type="text" placeholder="请输入关键字">
          </div>
      </div>
      <table data-toggle="table" data-click-to-select="true" data-mobile-responsive="true">
          <thead>
          <tr>
              <th>编号</th>
              <th data-field="stuname">姓名</th>
              <th data-field="stid">学号</th>
              <th data-field="coname">课程名称</th>
              <th data-field="pic">指导教师</th>
          </tr>
          </thead>
          <tbody>
          <?php if(is_array($codata)): $i = 0; $__LIST__ = $codata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
              <td><?php echo ($key+1); ?></td>
              <td><?php echo ($v["stuname"]); ?></td>
              <td><?php echo ($v["stid"]); ?></td>
              <td><?php echo ($v["coname"]); ?></td>
              <td><?php echo ($v["tename"]); ?></td>
              
          </tr><?php endforeach; endif; else: echo "" ;endif; ?>
          </tbody>
      </table>
      <?php echo ($page); ?>

  </div>


  
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
function _del(obj){
  var oid=$(obj).prev().val();
  _ajaxmodify({url:'/admin.php/Class/del',msg:'您确定要删除这个院系？',check:"确定",data:{id:oid}});

}
</script>

</body>
</html>