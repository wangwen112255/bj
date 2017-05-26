//
function _ajaxJson(obj){
hui.postJSON(
          obj.url,
          obj.data,
          function(data){
           if(data.code==200){
           hui.iconToast(data.msg);
           if(data.data)
           window.location.href=data.data;
           if(action)
             eval("("+action+")");
           }
          else{
           hui.iconToast(data.msg,'error');
          }
           },     
          function(e){
              hui.iconToast('数据有误或网络故障', 'warn');
          }
      );
}
function _ajaxsubmit(obj){
      // action=obj.action||'window.location.reload()';
      hui.ajax({
        'backType':'json',
        'type':'post',
        'url':obj.url,
        'data':obj.data,
         success:function(data){
         if(data.code==200){
         hui.iconToast(data.msg);
         if(data.data)
         window.location.href=data.data;
         if(action)
           eval("("+action+")");
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