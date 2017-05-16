/*
 * 密码强度检查插件
 * power by hcoder.net
 */
jQuery.fn.extend({
	hcPwdCheck : function(showId){
		$(this).keyup(function(){hcCheckPwdBase($(this), showId);});
	}
});

function hcCheckPwdBase(pwdObj, showId){
	var pwd = pwdObj.val();
	if(pwd.length < 4){return null;}
	var res = hcCheckPwdRes(pwd);
	var html = '<style>.hcPwdCheckSboxes{width:58px; height:18px; line-height:18px; background-color:#E4E4E4; color:#CECECE; font-size:12px; text-align:center; float:left; margin-right:2px;} .hcPwdCheckSboxesBgr{background-color:#CC0000 !important; color:#FFFFFF !important;} .hcPwdCheckSboxesBgy{background-color:#FFCC00 !important; color:#FFFFFF !important;} .hcPwdCheckSboxesBgg{background-color:#009900 !important; color:#FFFFFF !important;}</style>';
	if(res <= 60){
		html += '<div class="hcPwdCheckSboxes hcPwdCheckSboxesBgr">弱</div><div class="hcPwdCheckSboxes">中等</div><div class="hcPwdCheckSboxes">强</div>';
	}else if(res > 60 && res <= 85){
		html += '<div class="hcPwdCheckSboxes hcPwdCheckSboxesBgy"></div><div class="hcPwdCheckSboxes hcPwdCheckSboxesBgy">中等</div><div class="hcPwdCheckSboxes">强</div>';
	}else{
		html += '<div class="hcPwdCheckSboxes hcPwdCheckSboxes_bgg"></div><div class="hcPwdCheckSboxes hcPwdCheckSboxes_bgg"></div><div class="hcPwdCheckSboxes hcPwdCheckSboxesBgg">强</div>';
	}
	$("#"+showId).html(html);
	$("#"+showId).show();
}

function hcCheckPwdRes(password){
	//密码长度小于 5 返回 0 分
	if(password.length < 5) return 0;
	var res    = 0;
	var resReg = null;
	/*
	 1 密码长度积分:
	 ---------------------
	 | 密码长度   |  得分  |
	 ---------------------
	 |  == 5     |   5   |
	 ---------------------
	 |  > 6 <= 8 |   15  |
	 ---------------------
	 |  > 8      |   30  |
	 ---------------------
	*/
	var passwordLength = password.length;
	if(passwordLength == 5){
		res += 5;
	}else if(passwordLength > 5 && passwordLength <=8){
		res += 15;
	}else{
		res += 30;
	}
	
	/* 2 字母情况等分
	---------------------
	| 字母数   |  得分   |
	---------------------
	|  0      |   0     |
	---------------------
	|  1      |   5     |
	---------------------
	|  2      |   10    |
	---------------------
	|  3及以上 |   25    |
	---------------------
	|  有大写奖励 10 分   |
	---------------------
	*/
	var reg = /[a-zA-Z]/gi;
	var resReg = password.match(reg);
	if(resReg != null){
		var res_length = resReg.length;
		if(res_length == 1){
			res += 5;
		}else if(res_length == 2){
			res += 10;
		}else{
			res += 25;
		}
	}
	//大写奖励
	var reg = /[A-Z]/;
	if(reg.test(password)){res += 20;}
	/* 数字积分 
	---------------------
	|  0      |   0     |
	---------------------
	|  1      |   5     |
	---------------------
	|  2      |   10    |
	---------------------
	|  3及以上 |   25    |
	---------------------
	*/
	var reg = /[0-9]/g;
	resReg = password.match(reg);
	if(resReg != null){
		var resLength = resReg.length;
		if(resLength == 1){
			res += 5;
		}else if(resLength == 2){
			res += 10;
		}else{
			res += 25;
		}
	}
	
	/* 特殊字符
	---------------------
	| 每个积15分 最高45分 |
	---------------------
	*/
	var reg = /[A-Za-z0-9]/g;
	resReg = password.match(reg);
	if(resReg == null){
		res += 45;
	}else{
		var resLength = password.length - resReg.length;
		var integral   = resLength * 15;
		if(integral > 45){integral = 45;}
		res += integral;
	}
	if(res > 100) res = 100;
	return res;
}