<?php if (!defined('THINK_PATH')) exit();?>
  <link href="/static/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="/static/css/plugins/fileinput/fileinput.min.css">
  <link rel="stylesheet" type="text/css" href="/static/css/base.css">
  <style type="text/css">
    .help-block {
     padding: 5px;
      }
  </style>

  <form id="signupForm" action="<?php echo U('saves');?>"  style="margin-top: 30px" method="post" class="form-horizontal">
    <div class="col-sm-8 col-sm-offset-1">
    <div class="panel panel-success">
      <div class="panel-heading">
        <h3 class="panel-title">专业名称</h3>
      </div>
      <div class="panel-body">
          <div class="form-group ">
          <div class="col-md-2 control-label" >
            <label >专业名称</label>
          </div>
          <div class="col-md-8">
          <input type="text"  placeholder="请输进去毕业设计题目，必填项"   class="form-control" value="<?php echo ($codata["classname"]); ?>"  name="classname">
          </div>
          </div>
          <input type="hidden" name="cid" value="<?php echo ($codata["id"]); ?>">  

          <div class="col-md-3 col-md-offset-2">
          <button id="addsubmit" class="btn btn-primary">提交</button>
          <button type="reset" class="btn-primary btn">取消</button>
            
          </div>
      </div>
    </div>
  </div>
  <div class="col-sm-2">
  <div class="panel panel-success">
    <div class="panel-heading">
      <h3 class="panel-title">院系选择</h3>
    </div>
    <div class="panel-body">
      <?php if(is_array($dedata)): $i = 0; $__LIST__ = $dedata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="radio">
         <label>
           <input type="radio" name="depart_id" id="input" value="<?php echo ($vo["cid"]); ?>"  <?php if(($vo["cid"]) == $did): ?>checked<?php endif; ?> <?php if(($vo["cid"]) == $codata["depart_id"]): ?>checked<?php endif; ?>>
           <?php echo ($vo["departname"]); ?>
         </label>
       </div><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
  </div>
  </div>
  </form>

<script src="/static/js/jquery.js"></script>
<script type="text/javascript" src='/static/js/plugins/validate/jquery.validate.min.js'></script>
<script type="text/javascript" src="/static/js/plugins/layer/layer.min.js"></script>
<script type="text/javascript" src="/static/js/plugins/fileinput/fileinput.min.js"></script>
<script type="text/javascript" src="/static/js/plugins/fileinput/zh.js"></script>
<script type="text/javascript" src="/static/js/common.js"></script>
<script src="/static/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/static/js//iCheck/icheck.min.js"></script>
<script type="text/javascript">
$(function(){
$.extend($.validator.defaults,{ignore:""});
var icon = "<i class='glyphicon  glyphicon-remove'></i> ";
var rule={
  classname:{
   required:true,
   maxlength:30
  }

 };

 var message={
  classname:{
   required:icon+"请输进去正确的院系名称",
   maxlength:icon+"最长的题目不能超过三十个字"
  }
  
 };

_validade({rules:rule,messages:message,class:'help-block'});

});
</script>

</block>