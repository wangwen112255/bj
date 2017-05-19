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
.detailpanel{
  width: 18%;
  /* background-color: #ccc; */
  display: inline-block;
  height: 30px;
  line-height: 30px;
  color: #ffff;
  font-size: 18px;
  text-align: center;
}
 .imginfo{
  width: 30px;
  height: 30px;
  border-radius: 15px;
  border:1px solid #515151;
  }
  tr td {
  text-align: center;
  }
</style>


</head>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9">
        <h2></h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">学生管理</a>
            </li>
            <li class="active">
                <strong>学生选课详情</strong>
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
 
    <div class="ibox-content">
        <div class="panel-body">
            <div class="panel-group" id="accordion">
               <?php if(is_array($codata)): $i = 0; $__LIST__ = $codata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><div class="panel panel-default">
                    <div class="panel-heading">
                        <h5 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne<?php echo ($data["id"]); ?>">
                               <span class="detailpanel"><?php echo ($data["realname"]); ?></span>
                               <span class="detailpanel"><?php echo ((isset($data["studentid"]) && ($data["studentid"] !== ""))?($data["studentid"]):"还没有填写"); ?></span>
                               <span class="detailpanel">
                               <img  class="imginfo" src="<?php echo ((isset($data["photo"]) && ($data["photo"] !== ""))?($data["photo"]):'/static/img/logo.png'); ?>">
                               </span>
                               <span class="detailpanel"><?php if(($data["iscomplete"]) == "0"): ?><button type="button" class="btn btn-primary">进行中</button><?php else: ?>
                               <button type="button" class="btn btn-danger">已结束</button><?php endif; ?>
                               </span>
                               <span class="detailpanel">
                               <button type="button" class="btn btn-danger">查看详情</button>
                               </span>
                              
                               
                                </a>
                            </h5>
                    </div>
                    <div id="collapseOne<?php echo ($data["id"]); ?>" class="panel-collapse collapse <?php if(($key) == "0"): ?>in<?php endif; ?>">
                        <div class="panel-body">
                           <table class="table  table-hover">
                             <tbody>
                             <?php if(empty($data["order"])): ?><div class="jumbotron">
                                  <div class="container">
                                    <h1>已经尽力了</h1>
                                    <p>暂时还没有该生的选课信息</p>
                                    <p>
                                      <a class="btn btn-primary btn-lg" onclick="javascript:history.go(-1)">返回</a>
                                    </p>
                                  </div>
                                </div><?php endif; ?>
                             <?php if(is_array($data["order"])): $i = 0; $__LIST__ = $data["order"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                 <td><?php echo ($vo["coname"]); ?></td>
                                 <td><?php echo ($vo["tename"]); ?></td>
                                 <td><span class="badge badge-success">已选<?php echo ($vo["choosenum"]); ?></span></td>
                                 <td>
                                 <?php if($vo['isreceive'] == 0): ?><span class="badge btn-success">待审核</span></td>
                                 <?php else: ?>
                                 <?php if(($vo["is_success"]) == "1"): ?><span class="badge" style="background: #5cb85c">已正选</span></td>
                                 <?php else: ?><span class="badge" style="background: #d9534f">已拒绝</span></td><?php endif; endif; ?>
                               </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                             </tbody>
                           </table>
                        </div>
                    </div>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>   
            </div>
        </div>
    </div>

</div>

<div class="col-sm-12">
<div class="col-sm-12">
  <div class="col-sm-12"> <?php echo ($page); ?></div>
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
</script>

</body>
</html>