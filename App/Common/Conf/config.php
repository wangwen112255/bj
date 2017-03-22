<?php
return array(
	//'配置项'=>'配置值'
	'LOAD_EXT_CONFIG'=>"wx.db",
	"SESSION_AUTO_START"=>true,
	// "SHOW_PAGE_TRACE"=>true,//开启调试页面
	"URL_CASE_INSENSITIVE"=>true,
	'URL_HTML_SUFFIX'=>'html|shtml',
	"URL_MODEL"=>1,
	"VAR_MODULE"=>"m",
	"VAR_CONTROLLER"=>"c",
	"VAR_ACTION"=>"a",
	// 'ACTION_SUFFIX'         =>  'Action', // 操作方法后缀	
	// 'CONTROLLER_LEVEL'      =>  2,//设置一下控制的等级
	"URL_ROUTER_ON"=>true,
	"URL_ROUTE_RULES"=>array(

	 ),
	"DEFAULT_THEME"=>'default',
	// "DEFAULT_V_LAYER"=>"views",//修改模板视图的文件加
	'TMPL_PARSE_STRING'=>array(
		"__PUBLIC__"=>"/static/",
		"__JS__"=>"/static/js/",
		"__CSS__"=>"/static/css/",
		"__UPLOAD__"=>"/static/upload/",
		"__IMG__"=>"/static/img/",
	),
	// "TMPL_L_DELIM_"=>''  模板中的定界符的修改
	// "TMPL_R_DELIM_"=>''
 	'TAGLIB_BEGIN'=>'{',
 	'TAGLIB_END'=>'}',
 	'TMPL_ACTION_ERROR' => THINK_PATH . 'Tpl/disjump.html',//修改成功跳转对应的模板文件
 	'TMPL_ACTION_SUCCESS' => THINK_PATH . 'Tpl/disjump.html',//修改成功的
 	'SHOW_ERROR_MSG' => true,
 	'ERROR_MESSAGE'  =>    '发生错误！'
 	// 'ERROR_PAGE' =>'http://www.baidu.com'
);