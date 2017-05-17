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
                <strong>查看院系</strong>
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
            

  <div class="col-sm-12">
      <div class="fixed-table-toolbar">
          <div class="bars pull-left">
              <div class="btn-group hidden-xs">
                  <button onclick="_openLayerUrl('<?php echo U('create');?>','添加')" type="button" class="btn btn-outline btn-default" >
                      <i class="glyphicon glyphicon-plus" aria-hidden="true"></i>
                  </button>
                  <button onclick="_delall()" type="button" class="btn btn-outline btn-default">
                      <i class="glyphicon glyphicon-trash" aria-hidden="true"></i>
                  </button>
              </div>
          </div>
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
              <th data-field="id" data-checkbox="true"></th>
              <th data-field="name">名称</th>
              <th>专业数目</th>
              <th>操作</th>
          </tr>
          </thead>
          <tbody>
          <?php if(is_array($codata)): $i = 0; $__LIST__ = $codata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr >
              <td><input type="checkbox" name="id" value="<?php echo ($v["cid"]); ?>" /></td>
              <td><?php echo ($v["departname"]); ?></td>
              <td><?php echo ($v["clnum"]); ?></td>
              <td>
                  <button onclick="_openLayerUrl('<?php echo U('create', array('pid'=>$v['id']));?>')" class="btn btn-info " type="button"><i class="fa fa-plus"></i> 添加专业</button>
                  <button onclick="_openLayerUrl('<?php echo U('create',array('cid'=>$v['cid']));?>', '修改')" class="btn btn-info " type="button"><i class="fa fa-paste"></i> 编辑</button>
                  <button onclick="_del(<?php echo ($v["id"]); ?>);" class="btn btn-danger" type="button"><i class="fa fa-trash"></i> 删除</button>
              </td>
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
<script type="text/javascript"></script>

</body>
</html>