<?php if (!defined('THINK_PATH')) exit();?>
  <link href="/static/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="/static/css/plugins/fileinput/fileinput.min.css">
  <link rel="stylesheet" type="text/css" href="/static/css/base.css">
  <style type="text/css">
   body{
    padding: 10px;
    margin: 10px;
   }
   button{
    margin: 5px;
   }
  </style>
  

  <?php if(is_array($cldata)): $i = 0; $__LIST__ = $cldata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><button type="button" class="btn btn-success"><?php echo ($vo["classname"]); ?><span class="badge"><?php echo ($key+1); ?></span></button><?php endforeach; endif; else: echo "" ;endif; ?>
  <?php if(empty($cldata)): ?><div class="jumbotron">
           <div class="container">
             <h1>已经尽力了</h1>
             <p>您还没有添加任何专业呢</p>
             <p>
               <a class="btn btn-primary btn-lg" onclick="javascript:history.go(-1)">右上角关闭</a>
             </p>
           </div>
         </div><?php endif; ?>
<script src="/static/js/jquery.js"></script>
<script src="/static/js/bootstrap.min.js"></script>


</script>

</block>