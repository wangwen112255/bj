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
.layui-layer-setwin .layui-layer-close1 {
        display:block !important;
    }
.table>tbody>tr>td{
vertical-align:middle 
}
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
      <a href="<?php echo U('Teacher/index');?>" target="_blank" class="dropdown-toggle" >
      <img src="/static/img/logo.png"   class="WU_login_img img-circle"> 
      <div class="pull-right">
      <p style="margin-left:5px"><?php echo (session('_username_')); ?></p>
      <p style="margin-left:5px"><b>【教师】</b></p> 
      </div>
      </a>
      <ul class="dropdown-menu dropdown-menu_list">
        <li class="dropdown-menu-li"><a href="<?php echo U('Teacher/photo');?>">我的头像</a></li>
        <li class="dropdown-menu-li"><a href="<?php echo U('Teacher/intro');?>">基本资料</a></li>
        <li class="dropdown-menu-li"><a href="<?php echo U('Teacher/info');?>">我的通知</a></li>
        <li class="dropdown-menu-li"><a href="<?php echo U('Teacher/course');?>">我的课目</a></li>
        <li class="dropdown-menu-li"><a href="<?php echo U('Teacher/safe');?>">安全设置</a></li>
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
      <div class="col-sm-3" style="height:650px">
        <div class="panel panel-default">
          <div class="panel-body">
           <h4>个人中心</h4>
             <ul class="WU_personal">
              <li><a href="<?php echo U('Teacher/course');?>">我的题目</a></li>
              <li><a href="<?php echo U('Teacher/info');?>">我的消息</a></li>
              <li><a href="<?php echo U('Teacher/classes');?>">班级正选公示</a></li>
              <li><a href="<?php echo U('Teacher/guide');?>">毕业班学生</a></li>

            </ul>
          </div>
          <div class="panel-body">
           <h4>账户设置</h4>
             <ul class="WU_personal">
              <li><a href="<?php echo U('Teacher/intro');?>">基本信息</a></li>
              <li><a href="<?php echo U('Teacher/photo');?>">头像设置</a></li>
              <li><a href="<?php echo U('Teacher/safe');?>">安全设置</a></li>
              <li><a href="<?php echo U('Login/logout');?>"><span class=""></span>退出登录</a></li>
            </ul>
          </div>
          </div>
      </div>
        <div class="col-sm-8">
        <div class="panel panel-primary" style="border-color:#ccc" >
          <div class="panel-heading" style="border-color:#ccc;background: #fff">
            <h3 class="panel-title" style="border-color:#ccc;color:#515151"><span>我的选课</span></h3>
          </div>
              

<div class="panel-body">
     <div style="width: 100%;height: 50px;">
            <div class="col-sm-2 pull-left">
            <div class="btn-group">
                <button type="button" class="btn  btn-outline btn-default" title="增加" onclick="_openLayerUrl('<?php echo U('create');?>','添加毕业设计题目','60%','45%',['250px','28%'])"><span class="glyphicon glyphicon-plus"></span></button>
             <button type="button" onclick="_delall();" class="btn btn-default  btn-outline" title="删除"><span class="glyphicon glyphicon-trash"></span></button>
            </div>
            </div>
            <div class="col-sm-4 pull-right">
              <form>
                   <div class="btn-group pull-right">
                    <button class="btn btn-outline btn-default " title="搜索"><span class="glyphicon glyphicon-search"></span></button>
                    <a  href="" class="btn btn-outline btn-default" title="刷新"><span class="glyphicon glyphicon-repeat"></span></a>
                  
                    </div>
                     <div class="pull-right" style="margin-right: 8px">
                    <input type="text" name="" id="input"  class="form-control " value="" placeholder="搜你想搜得"  required="required" pattern="" title=""> 
                   </div>
                </form>
             </div>
        </div>
        <div class="col-sm-12">
      <table class="table table-striped table-hover  table-bordered ">
	<thead>
		<tr>
			<th>毕设题目</th>
		
			<th>课程要求</th>
		
			<th>选课情况</th>
			
			<th>课程状态</th>
		
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
	
	<?php if(is_array($Codata)): $i = 0; $__LIST__ = $Codata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
			<td><?php echo ($vo["coursename"]); ?></td>
			<td><?php echo ($vo["desc"]); ?></td>
			<td>
			<div class="progress " style="width:90%;">
          <div class="progress-bar progress-bar-<?php echo ($vo['choosenum']==$vo['limitnum']?'danger':'success'); ?>  progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo ($vo['choosenum']/$vo['limitnum']*100); ?>%">
           <?php echo ($data['choosenum']/$data['limitnum']*100); ?>%(<?php echo ($data['choosenum']); ?>人)
         	</div>
        	</div>
			</td>
			<td>
			
			   	<button type="button"  cid='<?php echo ($vo["id"]); ?>'  class="changestatus <?php if(($vo["status"]) == "0"): ?>btn btn-success<?php else: ?>btn btn-default<?php endif; ?>"><?php  $m=$vo['status'];echo $status[$m];?></button>
			</td>
			<td>
			  <button type="button"  id='status<?php echo ($v["id"]); ?>' onclick="_openLayerUrl('<?php echo U('create',array('id'=>$v['id']));?>','编辑','100%','70%')" class="btn btn-info"><span class="fa fa-edit"></span ><span >编辑</span></button>
                <button type="button" class="btn btn-warning"  id="del<?php echo ($v["id"]); ?>" onclick="_del(<?php echo ($v["id"]); ?>,'<?php echo U('del');?>')" ><span class="fa fa-trash"></span>删除</button>
			</td>
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	</tbody>
</table>
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
   $('.changestatus').click(function(){
  	var cid=$(this).attr('cid');
  	_ajaxmodify({url:'/index.php/Teacher/changestatus','msg':'您确定修改该题目的课程状态吗？','data':{'cid':cid},'action':'alert($(this).attr("cid"))'});
  	});
</script>


</body>
   

</html>