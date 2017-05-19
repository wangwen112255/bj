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
      <div class="ibox float-e-margins">
                   <div class="" id="ibox-content">
              <div id="vertical-timeline" class="vertical-container light-timeline">
                 <div class="vertical-timeline-block">
                     <div class="vertical-timeline-icon navy-bg">
                         <i class="fa fa-briefcase"></i>
                     </div>

                     <div class="vertical-timeline-content ">
                    <div class="jumbotron">
                      <div class="container navy-bg" >
                        <h1>欢迎您超级管理管理员请查阅<i class="fa fa-warning"></i>
                    </h1>
                        <p>
                          <!-- <a class="btn btn-primary btn-lg">Learn more</a> -->
                        </p>
                      </div>
                    </div>
                     </div>
                 </div>
                  <div class="vertical-timeline-block">
                      <div class="vertical-timeline-icon  <?php if(($de) == "1"): ?>navy-bg<?php endif; ?>">
                          <i class="fa fa-briefcase"></i>
                      </div>

                      <div class="vertical-timeline-content">
                          <h2>填写院系</h2>
                          <p>首先管理需要在后台进行院系的添加，添加步骤很简单，只需要填写名字、院系图标以及集散的介绍，这个必须要填写，要不然的话学生和老师都找不到家
                          </p>
                          <?php if(($de) == "1"): ?><button  class="btn btn-sm btn-primary">已完成<span class="fa fa-check"></span></a>
                          <?php else: ?>  
                           <a href="javascript:" onclick="opendepart()" class="btn btn-sm btn-primary"> 去完成任务</a><?php endif; ?>
                         
                     
                      </div>
                  </div>
                  <div class="vertical-timeline-block">
                      <div class="vertical-timeline-icon  <?php if(($cl) == "1"): ?>navy-bg<?php endif; ?>">
                          <i class="fa fa-briefcase"></i>
                      </div>

                      <div class="vertical-timeline-content">
                          <h2>填写专业</h2>
                          <p>首先管理需要在后台进行专业的添加，添加步骤很简单，只需要填写名字以及所属院系，这个必须要填写，要不然的话学生和老师都找不到家
                          </p>
                          <a href="#" class="btn btn-sm btn-primary"> 具体操作</a>
                     具体操作
                      </div>
                  </div>
                  <div class="vertical-timeline-block">
                      <div class="vertical-timeline-icon  <?php if(($te) == "1"): ?>navy-bg<?php endif; ?>">
                          <i class="fa fa-briefcase"></i>
                      </div>

                      <div class="vertical-timeline-content">
                          <h2>教师信息</h2>
                          <p>等到教师进行注册完后以及把课程发布上后就可以进行查看了
                          </p>
                          <a href="#" class="btn btn-sm btn-primary"> 具体操作</a>
                     具体操作
                      </div>
                  </div>
                  <div class="vertical-timeline-block">
                      <div class="vertical-timeline-icon <?php if(($st) == "1"): ?>navy-bg<?php endif; ?>">
                          <i class="fa fa-briefcase"></i>
                      </div>

                      <div class="vertical-timeline-content">
                          <h2>学生信息</h2>
                          <p>等到学生进行注册完后以及把课程发布上后就可以进行查看了
                          </p>
                          <a href="#" class="btn btn-sm btn-primary"> 具体操作</a>
                     具体操作
                      </div>
                  </div>
                  <div class="vertical-timeline-block">
                      <div class="vertical-timeline-icon ">
                          <i class="fa fa-briefcase"></i>
                      </div>

                      <div class="vertical-timeline-content">
                          <h2>结果查看</h2>
                          <p>最后可以通过院系和专业的菜单中可以查看当前的选课结果
                          </p>
                          <a href="#" class="btn btn-sm btn-primary"> 具体操作</a>
                     具体操作
                      </div>
                  </div>
               

              </div>

          </div>
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

<script type="text/javascript">
function opendepart(){
$('#depart', window.parent.document).click();
$('#showdepart', window.parent.document).click();

}  
</script>

</body>
</html>