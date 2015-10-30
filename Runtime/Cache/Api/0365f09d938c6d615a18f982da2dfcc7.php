<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1; minimum-scale=1; user-scalable=no;" />
<title><?php echo ($shopinfo[0]['shopname']); ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo ($Theme['P']['root']); ?>/tmpl/wifiadv/css/css.css"><!--风格-->
<link rel="stylesheet" type="text/css" href="<?php echo ($Theme['P']['root']); ?>/tmpl/wifiadv/css/media.css"><!--自适应-->
<link href="<?php echo ($Theme['P']['js']); ?>/swiper/swiper.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="<?php echo ($Theme['P']['root']); ?>/tmpl/wifiadv/css/form.css"><!--自适应-->
<script type="text/javascript" src="<?php echo ($Theme['P']['js']); ?>/jquery.js"></script>

</head>
<body>
	<!-- 头部 BOF-->
	
	<!-- 头部 EOF-->
<div class="mainbox bgindex clearfix">
	<!-- 轮播广告 BOF-->
	<div class="focus">
		<div class="swiper-container">
	      <div class="swiper-wrapper">
	       <?php if(!empty($ad)): if(is_array($ad)): $i = 0; $__LIST__ = $ad;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div  class="swiper-slide">
	     		<?php if(($vo['mode']) == "1"): ?><a href="<?php echo U('userauth/showad',array('id'=>$vo['id']));?>"><img src="<?php echo ($vo["ad_thumb"]); ?>" width="100%"></a>
	     		<?php else: ?>
	     		<img src="<?php echo ($vo["ad_thumb"]); ?>" width="100%"><?php endif; ?>
	     		</div><?php endforeach; endif; else: echo "" ;endif; ?>
			<?php else: ?>
			<div  class="swiper-slide">
	     		<img src="<?php echo ($Theme['P']['root']); ?>/images/ad/noad01.jpg" width="100%">
	     		</div>
				<div  class="swiper-slide">
	     		<img src="<?php echo ($Theme['P']['root']); ?>/images/ad/noad02.jpg" width="100%">
	     		</div><?php endif; ?>   		
	      </div>
    	</div>
	</div>
	<!-- 轮播广告 EOF -->
	<div class="wifinote">
		<span style="color:#0BBC73"><?php echo C('sitename');?></span>为您提供安全可靠的上网服务
	</div>
	<!-- 表单数据 BOF-->
	<div class="formbox" style="background:#fff;padding-top:0px">
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
			<a class="btn_base corner-all-10 t-wh c-wifiadv uba mr-tb-10" href="javascript:void(0);" id="btn_reg">立即上网</a>	
		</form>
	</div>
	<!-- 表单数据 BOF-->
	
</div>
<script type="text/javascript" src="<?php echo ($Theme['P']['js']); ?>/swiper/swiper.js"></script>
<script type="text/javascript" src="<?php echo ($Theme['T']['js']); ?>/api.js"></script>
<!-- 轮播图 -->
<script>
   var mySwiper = new Swiper('.swiper-container',{
	    loop:true,
	    grabCursor: true,
	    paginationClickable: true,
	    calculateHeight:true,
		autoplay:3000,
	  });
   
 </script>
 <!-- 表单验证 -->
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
		// 获得验证码
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