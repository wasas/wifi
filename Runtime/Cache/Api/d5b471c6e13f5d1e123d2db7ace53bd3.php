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

<label class="lb_title mr-tb-5" for="txt_user">手机号码:</label>

	<div class="iptbox corner-all-4 mr-tb-5 ">
 <input type="tel" class="ipt" name="txt_user" id="txt_user" placeholder="输入手机号码" value="" maxlength="11">
	</div>

	<label class="lb_title mr-tb-5"  for="password">验证码:</label>
	
	<div class="ugbox">
		<div style="width:8em;" >
			<div class="iptbox corner-all-4 mr-tb-5 ">
		 		<input type="tel" class="ipt"  name="smscode" id="smscode"  placeholder="输入验证码" value="">
			</div>
		</div>
	<div class="boxf1" style="padding:0em .5em;">
		<a  class="btn_base2 corner-all-10  c-eee  t-333  uba b-wh " href="javascript:void(0);" id="btn_getcode">获取验证码</a>
	</div>
	</div>
	<div class="tips mr-tb-5" id="scode"  style="display: none;" >
  		<div class="onSuccess" id="scodetext"><?php echo ($smscode); ?></div>
  	</div>
	
	
	<a class="btn_base corner-all-10 t-wh c-wifiadv uba mr-tb-10" href="javascript:void(0);" id="btn_reg">登录</a>
	<a class="btn_base corner-all-10 c-eee  t-333  uba b-wh  " href="javascript:void(0);" id="btn_back">返回首页</a>
	
</div>
  	
	</form>
	<div class="blockdiv"></div>
</div>




<script type="text/javascript" src="<?php echo ($Theme['P']['js']); ?>/jquery.js"></script>
<script type="text/javascript" src="<?php echo ($Theme['T']['js']); ?>/api.js"></script>
<script>

	var bajax=false;
	var blive=false;
	var dcount=1*30;
	function ChangeLive(){
		dcount--;
		if(dcount<=0){
			if(blive){
				blive=false;
			}
		}else{
			setTimeout("ChangeLive()",1000);
		}
	}
	$(document).ready(function(){
		  $("input").each(function(){
				$(this).bind("focusin",function(){
				
					$(this).parent().addClass('us-input-focus');
				});
				$(this).bind("focusout",function(){
					$(this).parent().removeClass('us-input-focus');
				
				});
			  });
		  $("#btn_getcode").bind('click',function(){
			  	var u=$('#txt_user').val();
				if(u==""){
					Tips("tips", "请输入手机号码", true, 1000);
					
					 return false;
				}
				if(isPhone(u)){
					$('#scode').show();
					}else{
						Tips("tips", "输入的手机号码格式不正确", true, 1000);
					}
			  });
		  
		$("#btn_getcode").bind('click',function(){
			if(bajax){
				Tips("tips", "请耐心等待...", true, 1000);
				return false;
			}
			if(blive){
				Tips("tips", dcount+"秒后可以再试获取验证码", true, 1000);
				return false;
			}
			var u=$('#txt_user').val();
			if(u==""){
				Tips("tips", "请输入手机号码", true, 1000);
				
				 return false;
			}
			bajax=true;
			dcount=1*60;
			$.ajax({
			  	url: '<?php echo U('userauth/smscode');?>',
		        type: "post",
				data:{
					'phone':u,
					},
				dataType:'json',
				error:function(){
						 bajax=false;
						 Tips("tips", "服务器忙，请稍候再试", true, 1500);
						
				},
				success:function(data){
							bajax=false;
							
							if(data.error==0){
								$('#scode').show();
								$('#scodetext').html('您的验证码是:'+data.msg);
								blive=true;
								setTimeout("ChangeLive()",1000);
								
							}else{
								Tips("tips", data.msg, true, 1500);
							}
						
						
				}
			  });
			
			
		});
		
		$("#btn_reg").bind('click',function(){
			
			var u=$('#txt_user').val();
			var p=$('#smscode').val();
			 if (u == "") {
			        Tips("tips", "请输入手机号码", true, 1000);
			      return false;
			 }
			  if (p == "") {
				  Tips("tips", "请填写验证码", true, 1000);
			        return false;
			  }
			  if(p.length!=6){
				  Tips("tips", "验证码位数必须是6位", true, 1000);
			      return false;
			}
			  $.ajax({
				  	url: '<?php echo U('userauth/smslogin');?>',
			        type: "post",
					data:{
						'user':u,
						'smscode':p,
						'__hash__':$('input[name="__hash__"]').val()
						},
					dataType:'json',
					error:function(){
							 Tips("tips", "服务器忙，请稍候再试", true, 1500);
							},
					success:function(data){
							if(data.error==0){
								Tips("tips", "操作成功", false, 1500);
								setTimeout("goUrl('"+data.url+"')",1500);
							}else{
								Tips("tips", data.msg, true, 1500);
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