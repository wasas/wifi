<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="UTF-8">
	<title> <?php echo C('sitename');?>--商户登录</title>
	<meta name="keywords" content="无线营销、WiFi营销、起讯科技、wifi广告营销">
	<meta name="description" content="无线营销、WiFi营销、起讯科技、wifi广告营销">
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
	<script src="<?php echo ($Theme['P']['js']); ?>/jquery.js"></script>
	 <link rel="stylesheet" type="text/css" href="<?php echo ($Theme['P']['root']); ?>/css/lnr.css" />
</head>
<body>
	<div class="g logoBox">
		<div class="logo l"><a href="<?php echo C('siteurl');?>"> <img src="<?php echo ($Theme['P']['root']); ?>/images/fc1de264202918add5d20c8eee7ed90e.png" alt="起讯云wifi-LOGO" height="88" width="250"></a></div>
	</div>
	<div class="g focusBox">
		<div class="focus">
			<img src="<?php echo ($Theme['P']['root']); ?>/images/focus.png" alt="功能">
		</div>
		<div class="loginBox png24">
				<h1><span class="r">没账号？<a href="<?php echo U('index/index/reg');?>">立即注册</a></span>商户登录</h1>
				<div class="alert " style="display: none; border:1px solid #333;text-align:center">
					  <span id="alertmsg" style="color:#c40000"></span>
				</div>	
			<form  method="post">
				<ul>
					<li>
					<input name="txt_user" id="txt_user" tabindex="1" class="ipt tipinput1" placeholder="请输入您的账号" autocomplete="off" maxlength="100" suggestwidth="340px" type="text">					</li>
					<li class="l2">
					<input value="" name="password" id="password" tabindex="2" class="ipt tipinput1" placeholder="请输入您的密码" maxlength="20" autocomplete="off" type="password">					</li>
					<li class="l3"><span class="l"><input id="hold" checked="checked" value="1" name="remme" style="outline:none;vertical-align:middle" type="checkbox">&nbsp;自动登录</span></li>
					<li class="l4"><input tabindex="4" id="btn-login" value="" type="submit"></li>
					<li class="l5">联系我们客服QQ</li>
					<li class="l6"><a href="http://wpa.qq.com/msgrd?v=3&amp;uin=7895490&amp;site=qq&amp;menu=yes" class="l"><img src="<?php echo ($Theme['P']['root']); ?>/images/bt_blue.png" style="vertical-align:top;width:140px;height:40px;"></a></li>
				</ul>
			</form>
		</div>
	</div>
	<div class="g cpr hc">Copyright©2012-2019 起讯科技  All Rights Reserved.</div>
<script src="<?php echo ($Theme['P']['root']); ?>/bootadmin/js/bootstrap.min.js"></script>
<script src="<?php echo ($Theme['P']['root']); ?>/bootadmin/js/theme.js"></script>
<script src="<?php echo ($Theme['P']['root']); ?>/bootadmin/js/common.js"></script>	
<script type="text/javascript">

	document.onkeydown=function(event){
	    e = event ? event :(window.event ? window.event : null);
	    if(e.keyCode==13){
    	    //执行的方法
    	  	$('#btn-login').click();
	    }
	}

    $(function () {
        $('#btn-login').bind('click',function(){
			var u=$('#txt_user').val();
			var p=$('#password').val();
			if (u == "") {
				AlertTips( "请输入用户名",  2000);
			    return false;
			}
			if (p == "") {
				AlertTips( "请输入密码",2000);
			    return false;
			}
			$.ajax({
				url: '<?php echo U('index/user/dologin');?>',
			    type: "post",
				data:{
					'user':u,
					'password':p,
					'__hash__':$('input[name="__hash__"]').val()
				},
				dataType:'json',
				error:function(){
					AlertTips("服务器忙，请稍候再试",2000);
					},
				success:function(data){
					if(data.error==0){
						location.href=data.url;
					}else{
						AlertTips(data.msg, 2000);
					}
				}
			});
			return false;
		});
    });
</script>
</body></html>