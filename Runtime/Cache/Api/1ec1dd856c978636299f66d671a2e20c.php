<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1; minimum-scale=1; user-scalable=no;" />

<title><?php echo ($shopinfo[0]['shopname']); ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo ($Theme['P']['root']); ?>/tmpl/wifiadv/css/css.css"><!--风格-->
<link rel="stylesheet" type="text/css" href="<?php echo ($Theme['P']['root']); ?>/tmpl/wifiadv/css/media.css"><!--自适应-->
<link href="<?php echo ($Theme['P']['js']); ?>/swiper/swiper.css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo ($Theme['P']['js']); ?>/jquery.js"></script>
<style type="text/css">
	/*.btnbox{
		width: 110px;
		height: 140px;
	}*/
</style>
</head>
<body>
	<!-- 头部 BOF-->
	
	<!-- 头部 EOF-->
<div class="mainbox bgindex clearfix">
	<!-- 轮播广告 BOF-->
	<div class="focus">
		<div class="swiper-container">
	      <div class="swiper-wrapper" >
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
		<?php echo C('sitename');?>为您提供安全可靠的上网服务
	</div>
	<!-- 功能菜单 BOF-->
	<div class="bbox">
		<div class="boxcontent" >
			<?php if(($show) == "1"): if($authmode['open'] == true): if(($authmode['overmax']) == "0"): ?><!-- <?php if(($authmode['wx_f']) == "1"): ?><div>
							<font size="5" color="8E2929"><a href="<?php echo ($shopinfo[0]['wxurl']); ?>" style="font-size:14px;color:#8E2929;">点击关注微信号"<?php echo ($shopinfo[0]['wx']); ?>"即可认证上网</a><font/>
						</div><?php endif; ?> -->
					<?php if(($authmode['wx_f']) == "1"): ?><a href="<?php echo ($shopinfo[0]['wxurl']); ?>">
							<div class="btnbox">
								<img src="<?php echo ($Theme['P']['root']); ?>/tmpl/wifiadv/img/01.png"/>
								<div class="btntitle">
								微信关注
								</div>
							</div>
						</a><?php endif; ?>
					<?php if(($authmode['allow']) == "1"): ?><a href="<?php echo U('userauth/noAuth');?>">
						<div class="btnbox">
							<img src="<?php echo ($Theme['P']['root']); ?>/tmpl/wifiadv/img/02.png"/>
							<div class="btntitle">
							一键上网
							</div>
						</div>
					</a><?php endif; ?>
						<?php if(($authmode['phone']) == "1"): ?><a href="<?php echo U('userauth/mobile');?>">
						<div class="btnbox">
							<img src="<?php echo ($Theme['P']['root']); ?>/tmpl/wifiadv/img/03.png"/>
							<div class="btntitle">
							手机认证
							</div>
						</div>
					</a><?php endif; ?>
						<?php if(($authmode['reg']) == "1"): ?><a href="<?php echo U('userauth/reg');?>">
						<div class="btnbox">
							<img src="<?php echo ($Theme['P']['root']); ?>/tmpl/wifiadv/img/04.png"/>
							<div class="btntitle">
							注册认证
							</div>
						</div>
					</a>
					
					<a href="<?php echo U('userauth/login');?>">
						<div class="btnbox">
							<img src="<?php echo ($Theme['P']['root']); ?>/tmpl/wifiadv/img/05.png"/>
							<div class="btntitle">
							用户登录
							</div>
						</div>
					</a><?php endif; ?>
					<a href="<?php echo U('userauth/comments');?>">
						<div class="btnbox">
							<img src="<?php echo ($Theme['P']['root']); ?>/tmpl/wifiadv/img/06.png"/>
							<div class="btntitle">
							客户留言
							</div>
						</div>
					</a>
					<div class="clear"></div>
				<?php else: ?>
					<h2 style="text-align: center;line-height:40px;">每日免费上网次数是<?php echo ($shopinfo[0]['countmax']); ?>次 </br><?php endif; ?>
			<?php else: ?>
				<h2 style="text-align: center;line-height:40px;">当前时间不提供免费上网服务.</br>
				<?php if(($authmode['openflag']) == "true"): ?>上网开放时间为每日 <?php echo ($authmode["opensh"]); ?>:00点至<?php echo ($authmode["openeh"]); ?>:00点<?php endif; ?>
				</h2><?php endif; endif; ?>
				
			</div>
			
		
	</div>
	<!-- 功能菜单 BOF-->
		
</div>
<script type="text/javascript" src="<?php echo ($Theme['P']['js']); ?>/swiper/swiper.js"></script>
<script>
           var mySwiper = new Swiper('.swiper-container',{
        	    loop:true,
        	    grabCursor: true,
        	    paginationClickable: true,
        	    calculateHeight:true,
        		autoplay:3000,
        	  });
           $(function(){
	           	$.ajax({
				  	url: '<?php echo U('login/countad');?>',
			        type: "post",
					data:{
						'ids':"<?php echo ($adid); ?>",
						},
					dataType:'json',
					error:function(){},
					success:function(data){}
				  });
           	});
 </script>
</body>
</html>