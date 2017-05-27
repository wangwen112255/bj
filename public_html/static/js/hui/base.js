//
function _ajaxJson(obj){
   action=obj.action;
hui.postJSON(
         
          obj.url,
          obj.data,
          function(data){
           if(data.code==200){
           hui.upToast(data.msg);
            if(action){
             eval("("+action+")");
            }
            if(data.url)
           window.location.href=data.url;
           }
          
          else{
           hui.upToast(data.msg,'error');
          }
           },     
          function(e){
              hui.iconToast('数据有误或网络故障', 'warn');
          }
      );
}
function _ajaxPost(obj){
   action=obj.action;
    hui.post(
          obj.url,
          obj.data,
          function(data){
           if(data.code==200){
            hui.upToast(data.msg,'success');
            if(action)
             eval("("+action+")");
              if(data.url)
           window.location.href=data.url;
            }
           else{
           hui.upToast(data.msg,'error');
          }
          },     
          function(e){
              hui.iconToast('数据有误或网络故障', 'warn');
          }
      );
}

function _ajaxsubmit(obj){
      id=obj.id||'submit';
      // id='submit'
      action=obj.action;
      hui.ajax({
         'complete' : function(){hui("#"+id).resetLoadingButton();},
         'beforeSend' : function(){hui("#"+id).loadingButton('提交中...');},
        'backType':'json',
        'type':'post',
        'url':obj.url,
        'data':obj.data,
         success:function(data){
         if(data.code==200){
         // hui.iconToast(data.msg,'success');
          hui.iconToast(data.msg,'success');
         if(action)
           eval("("+action+")");
         if(data.url)
         window.location.href=data.url;
          }
        else{
         hui.iconToast(data.msg,'error');
        }
        }, 
        error:function()
        {
           hui.iconToast('数据有误或网络故障','warn');
        }    
        });
    }
function _ajaxchange(obj){
hui.confirm(obj.msg,['取消','确定'],function(){
 _ajaxsubmit(obj)
})




}