<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>


<!-- Mirrored from www.zi-han.net/theme/hplus/404.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:19:52 GMT -->
<head>

    <meta charset="utf-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->


    <title>H+ 后台主题UI框架 - 404 页面</title>
    <meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
    <meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术">

    <link rel="shortcut icon" href="favicon.ico"> 
    <link href="/static/css/bootstrap.min.css" rel="stylesheet">
    <link href="/static/css/font-awesome.min.css" rel="stylesheet">

    <link href="/static/css/animate.min.css" rel="stylesheet">
    <link href="/static/css/style.min.css" rel="stylesheet">
     <style type="text/css">
    .btn-circle.btn-lg {
    width: 100px;
    height: 100px;
    padding: 10px 10px;
    border-radius: 50px;
    font-size: 78px;
    line-height: 78px;
    text-align: center;
    }
     .jump-error{
        color:rgb(192, 152, 83);
        letter-spacing: 5px;
        font-size: 32px;
        font-weight: 300;
     }
    
     .jump-info a,.wait{
       color:#667fa0;
     }
   
     </style>
</head>

<body class="gray-bg" >

    <div class="jumbotron" <?php if(empty($message)): ?>style="background:#FCF8E3;" <?php else: ?>
   style="background:#DFF0D8;" #FCF8E3<?php endif; ?>">
    
        <p></p>
           <div class="row" >
           <div class="col-sm-2" >
               <?php if(!empty($message)): ?><button  type="button" class="btn btn-info btn-circle btn-lg"><span class="fa fa-check"></span></button>
                </div>
                 <div class="col-sm-10" >
        
                     <h2 class="jump-error"><?php echo ($message); ?></h2>
                     <p class="jump-info"><a id='href' href="<?php echo ($jumpUrl); ?>">[点击这里跳转]</a>
                     <span class='wait'>[<b id="wait" style="font-size:30px;"><?php echo ($waitSecond); ?></b>秒后自动跳转]</span>
                     </p>
                 </div>

                <?php else: ?>
                <button  type="button" class="btn btn-warning btn-circle btn-lg"><span class="fa fa-times"></span></button>
                 </div>
                 <div class="col-sm-10" >
        
                     <h2 class="jump-error"><?php echo ($error); ?></h2>
                     <p class="jump-info"><a id='href' href="<?php echo ($jumpUrl); ?>">[点击这里跳转]</a>
                     <span class='wait'>[<b id="wait" style="font-size:30px;"><?php echo ($waitSecond); ?></b>秒后自动跳转]</span>
                     </p>
                 </div><?php endif; ?>
           
         
           
         </div>
         <p></p>
      
    </div>

    <script src="/static/js/bootstrap.min.js?v=3.3.6"></script>
    <script type="text/javascript">
        // (function(){
        // var wait = document.getElementById('wait'),href = document.getElementById('href').href;
        // var interval = setInterval(function(){
           
        //     var time = --wait.innerHTML;
        //     if(time <= 0) {
        //         location.href = href;
        //         clearInterval(interval);
        //     };
           
        // }, 1000);
        // })();
    </script>    
</body>


<!-- Mirrored from www.zi-han.net/theme/hplus/404.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:19:52 GMT -->
</html>