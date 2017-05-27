function _openLayerUrl(url,title,width,height,offset)
{

 var width=width||'100%';
 var height=height||'100%';
 var offset=offset||'0px';
 var title=title||'操作';
 layer.open({
   type: 2,
   anim: 2,
   title: title,
   content:url,
   offset:offset,
   area: [width,height],
   // maxmin: false,
   success:function(layero,index){
   	var body = layer.getChildFrame('body', index);
    var iframeWin = window[layero.find('iframe')[0]['name']]; //得到iframe页的窗口对象，执行iframe页的方法：iframeWin.method();
    //alert(body.html()); //得到iframe页的body内容
    // // body.find('input').val('Hi，我是从父页来的')

  },
  end: function(){
  // _layOpenSuccess();
  // alert("end");
   }

 })
 
}   

    function _layCloseIframe(){
    var index=parent.layer.getFrameIndex(window.name);
    parent.layer.close(index);
    } 
    function _ajaxError(){
      layer.alert('连接失败，服务器开小差了', {icon: 5},function(index){
        layer.close(index);
        window.location.reload();
      }); 
    }
    function _ajaxSuccess(data){
      if(data.code==200){
        layer.msg(data.msg,{icon:1,time:1000},function(){
        // setTimeout(function(){
         if(data.data)
         window.location.href=data.data;
         else if(window.parent)
         window.parent.location.reload();
         else
         window.location.reload();

        // $('form').reset();
        // _layCloseIframe();
        // window.parent.$('form').reset();
        // alert(0);
      
        });
        // $('#loging').click();
      }
      else{
        layer.alert(data.msg, {icon: 5},function(index){
        layer.close(index);
        $(selector).find('button').last().html(lastbtnval).removeClass('disabled');
        // window.location.reload(); 
        });
        // setTimeout(function(){
        //   location.reload(); 
        // },2000); 
        }
      }
      
    
  
    function _ajax(objajax){
      var url=objajax.url;
      var type=objajax.type||'post';
      var data=objajax.data;
      var success=objajax.success||_ajaxSuccess;
      var error=objajax.error||_ajaxError;
      selector=objajax.id;
      $.ajax({
        'url':url,
        'type':type,
        'data':data,
        'datatype':'json',
         success:success,
         error:error,
      
      })

    }

    function _validadeCallback(form){
     // $(form).find('').eq(0).html("正在提交中<span style='font-size:18px' class='fa fa-spinner fa-spin'></span>").addClass('disabled');
     // layer.load();
     // $(form).find('a').html();
      lastbtnval=$(form).find('button').last().html();
      $(form).find('button').last().html("正在提交中<span style='font-size:18px' class='fa fa-spinner fa-spin'></span>").addClass('disabled')
      _ajax({
          url:$(form).attr("action"),
          data:$(form).serialize(),
          id:form
          })
      // $(form).reset();
        // alert(0)
      }
    function _validade(objform){
    var rule=objform.rules;
    var message=objform.messages;
    var id=objform.id||'signupForm';
    var submitHandler=objform.callbacks||_validadeCallback;
    var errorclass=objform.class||'help-block';
    $("#"+id).validate({
        // onfocusout: false,
        onclick:false,
        onkeyup:false,
        // onsubmit:false, 
        rules:rule,
        messages:message,
        submitHandler:submitHandler,
        errorClass : errorclass,
        errorPlacement: function(error, element) {  
          error.appendTo(element.parent().parent());  
        },
        success:function(label){
        // label.parent().removeClass('has-error');
        // label.parent().addClass('has-success');
        label.html("<span  style='font-size:18px;color:green;' class='glyphicon glyphicon-ok'></span>");
        },
       // errorContainer: "#errors",
       // errorLabelContainer: $("#errors"),
       // wrapper: "li",
     })
    }
    //状态改变
  function _SwitchStatus(jscheck){

    var switches=$(jscheck);
    for(var i=0;i<switches.length;i++){
          new Switchery($(jscheck)[i], {
             
          }); 
          $(jscheck).eq(i).change(function() {
           if(this.checked){
              $(this).siblings('input').val(0);
              //console.log($(this).next().next());
             }
             else{
             $(this).siblings('input').val(1);
             }
           });
    }
  
    } 

      

        function _setStatus(id,url){
        layer.confirm("您确定要修改状态吗？",{'btn':['确定','取消']},function(index){
              _ajax({
                'url':url,
                'data':{'id':id},
                success:function(data){
                  if(data.code===200){
                    layer.msg(data.msg,{icon:1,time:700});
                    $("#status"+id).html(data.data);
                     var c=$("#status"+id).attr("class");
                     c=(c=='btn btn-default')?"btn btn-info":"btn btn-default";
                    $("#status"+id).attr("class",c);
                  }
                  else{
                    layer.alert(data.msg,{icon:5});
                  }
                }

            });
              layer.close(index);
        })

        }
        //
        function _ajaxmodify(obj){
        layer.confirm(obj.msg,{'btn':['确定','取消'],icon:3,title:'请慎重选择'},function(index){
               action=obj.action||'window.location.reload()';
              _ajax({
                'url':obj.url,
                'data':obj.data,
                 success:function(data){
                 if(data.code==200){
                 layer.msg(data.msg,{icon:1,time:1000},function(){
                 if(data.data)
                 window.location.href=data.data;
                else
                   eval("("+action+")");
                });
                }
                else{
                layer.alert(data.msg, {icon: 5},function(index){
                layer.close(index);
                });
                }
                }, 
                });
              layer.close(index);
        })
        }
          function _uploadFile(uploadid,uploadurl,receiveid) {
            $("#" + uploadid).fileinput({
                language: 'zh', //设置语言
                uploadUrl: uploadurl, //上传的地址
                allowedFileExtensions: ['jpg', 'gif', 'png'],//接收的文件后缀
                //uploadExtraData:{"id": 1, "fileName":'123.mp3'},
                uploadAsync: true, //默认异步上传
                showUpload: true, //是否显示上传按钮
                showRemove: true, //显示移除按钮
                showPreview: true, //是否显示预览
                showCaption: false,//是否显示标题
                autoReplace: true,
                browseClass: "btn btn-primary", //按钮样式
                dropZoneEnabled: true,//是否显示拖拽区
                maxImageHeight: 1000,//图片的最大高度
                maxFileCount: 1,
                validateInitialCount: true,
                previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
                msgFilesTooMany: "选择上传的文件数量({n}) 超过允许的最大数值{m}！"
            }).on("fileuploaded", function (e, data) {
                var remsg=data.response;
                if(remsg.code==200) {
                layer.msg(remsg.msg,{icon:1,time:500});
                $('.WU_login_img ').attr('src',remsg.data);
                $("#"+receiveid).val(remsg.data);
                }
                else{
                $(".progress-bar-success").attr('style','width:20%');
                layer.alert(remsg.msg, {icon: 5},function(index){
                layer.close(index);
                });
                }
                // console.log(data.response);
            });
        }

    srheight=document.documentElement.scrollHeight;
    clheight=document.documentElement.clientHeight;
    topheight=document.body.scrollTop;
   
   

   
   