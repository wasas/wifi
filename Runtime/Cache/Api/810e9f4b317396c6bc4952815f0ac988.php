<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content=" initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<title><?php echo ($shopinfo[0]['shopname']); ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo ($Theme['P']['root']); ?>/tmpl/wifiadv/css/css.css"><!--风格-->
<link rel="stylesheet" type="text/css" href="<?php echo ($Theme['P']['root']); ?>/tmpl/wifiadv/css/media.css"><!--自适应-->

<link rel="stylesheet" type="text/css" href="<?php echo ($Theme['P']['root']); ?>/tmpl/wifiadv/css/form.css"><!--自适应-->
</head>
<body>

<div class="mainbox bgform clearfix">
<div class="formbox">

<form name="regform">
<div class="tips" id="tips"></div>
 <label class="lb_title mr-tb-5" >关注微信号:&nbsp;&nbsp;<?php echo ($wxname); ?></br>即可获取上网密码</label>
<div class="">
</div>
 <label class="lb_title mr-tb-5"  for="password">上网密码:</label>
	<div class="iptbox corner-all-4 mr-tb-5 ">
	<input class="ipt" type="password" name="password" id="password"  placeholder="请输入微信验证密码" value="" autocomplete="off">
</div>
   <div class="tips  mr-tb-10" id="tips"></div>
<a  class="btn_base corner-all-10 t-wh c-wifiadv uba mr-tb-10" href="javascript:void(0);" id="btn_reg">确认登录</a>
<a  class="btn_base corner-all-10 c-eee  t-333  uba b-wh  " href="javascript:void(0);" id="btn_back">返回首页</a>
</div>
	</form>
	<div class="blockdiv"></div>
</div>

<script type="text/javascript" src="<?php echo ($Theme['P']['js']); ?>/jquery.js"></script>
<script type="text/javascript" src="<?php echo ($Theme['T']['js']); ?>/api.js"></script>
<script>
	$(document).ready(function(){
		$("input").each(function(){
			$(this).bind("focusin",function(){
				$(this).parent().addClass('us-input-focus');
			});
			$(this).bind("focusout",function(){
				$(this).parent().removeClass('us-input-focus');

			});
		});
		$("#btn_reg").bind('click',function(){
			var p=$('#password').val();
			if (p == "") {
				Tips("tips", "请填写认证密码", true, 1000);
			    return false;
			}
			$.ajax({
				url: '<?php echo U('userauth/dowxauth');?>',
			    type: "post",
				data:{
					'password':p,
				},
				dataType:'json',
				error:function(){
					 Tips("tips", "服务器忙，请稍候再试", true, 1500);
					},
				success:function(data){
					if(data.error==0){
						Tips("tips", "认证成功", false, 1500);
						setTimeout("goUrl('"+data.url+"')",1500);
					}else{
						Tips("tips", data.msg, true, 2000);
					}
				}
			});
		});
		$('#btn_back').bind('click',function(){
			history.go(-1);
		});
	});

	function goUrl(url){
		location.href=url;
	}
</script>
</body>
</html>