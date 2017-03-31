<?php if (!defined('THINK_PATH')) exit();?><html><head>
<meta charset="utf-8">
<title><?php echo ($shopinfo[0]['shopname']); ?></title>
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
<link rel="apple-touch-icon-precomposed" href="">
<meta name="format-detection" content="telephone=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<link href="<?php echo ($Theme['T']['css']); ?>/model1/common.css" rel="stylesheet">

</head>

<body>

<section id="wrapper" class="wrapper">
   
   <!-- 图片轮播 -->
   <section class="slide-photos">
      <ul class="slides">
       <?php if(!empty($ad)): if(is_array($ad)): $i = 0; $__LIST__ = $ad;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div  class="swiper-slide">
	     		<?php if(($vo['mode']) == "1"): ?><li style="display: list-item; background-image: url(<?php echo ($vo["ad_thumb"]); ?>);"><a href="<?php echo U('userauth/showad',array('id'=>$vo['id']));?>">
		 <img src="<?php echo ($vo["ad_thumb"]); ?>">
		 </a></li>
	     		<?php else: ?>
	     			<li style="display: list-item; background-image: url(<?php echo ($vo["ad_thumb"]); ?>);">
		 <img src="<?php echo ($vo["ad_thumb"]); ?>"></li><?php endif; ?>
	     		</div><?php endforeach; endif; else: echo "" ;endif; ?>   		
	     		<?php else: ?>
	     		<li style="display: list-item; background-image: url(<?php echo ($Theme['P']['root']); ?>/images/ad/noad01.jpg);"></li>
	     		<li style="display: list-item; background-image: url(<?php echo ($Theme['P']['root']); ?>/images/ad/noad02.jpg);"></li><?php endif; ?>	 
	 </ul> <input type="hidden" id="go_auth" value="<?php echo U('userauth/noAuth');?>"/>  
   </section> 

   <!-- 主体 -->
   <section class="index-wrap">
		<div class="btn-wrap">
			<a id="foot_daojisi" href="#" class="btn-phone">还有14秒</a>	
		  </div>
   </section> 
   
   <!-- 底部 -->
   <div class="foot-space"></div>
   <footer class="index-foot">起讯无线版权所有</footer>
<input type="hidden" id="ad_show_time" value="<?php echo ($shopinfo[0]['ad_show_time']); ?>"/> 
<script src="<?php echo ($Theme['P']['root']); ?>/matrix/js/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo ($Theme['P']['js']); ?>/model1/jquery.flexslider.min.js" type="text/javascript"></script>
<script type="text/javascript">   
//图片轮播
$(window).load(function(){
     $('.slide-photos').flexslider({
        animation: "slide",
		slideshowSpeed:5000,
		animationSpeed:800,
		pauseOnHover:false,
		directionNav: false,
		start: function(slider){
           $('.index-head').removeClass('loading');
        }  
     });
	 
});
</script>
<!-- ///////////////////////新开页面只要下面的代码就行 要放在Jquery下面.......//////////////////// -->

<!--如果有倒计时-->
<script language="javascript">	
function rptk_oneclick(){
	showPop();
}
// 速度 一般不用修改	
var speed = 1000; 	
// 停留时间 单位：秒				
var djwait = document.getElementById("ad_show_time").value; 
function updateinfo(){					
	if(djwait == 0){
		// document.write('<?php echo ($jump); ?>');
		// 跳转到指定的网址
		window.location.href='<?php echo ($jump); ?>';
	}else{
		$("#foot_daojisi").html ( "正在验证中，剩余还有"+djwait+"秒");
		djwait--;
		window.setTimeout("updateinfo()",speed);
	}
}
updateinfo();
</script>
<!-- //////////////////新开页面只要上面的代码就行..////////////////////     -->
</section>

   <div id="bodyMask" class="body-mask" onclick="hidePop()"></div>   
   <script>
	  var mask=document.getElementById("bodyMask")
	  var popbox=document.getElementById("popWrap")
	  var popMain=document.getElementById("popMain")
	  //触发弹窗
	  function showPop(){
		  mask.style.display="block"
		  popbox.style.display="block"
		  var boxHeight=popMain.clientHeight
		  var wHeight=window.innerHeight
		  if(wHeight<boxHeight){
			  popbox.style.position="absolute"
		  }
	  }
	  //关闭弹窗
	  function hidePop(){
		  mask.style.display="none";
		  popbox.style.display="none";
		  popbox.style.position="fixed";
		  $("#popMain").show();
			$("#popMainCode").hide();
			$("#sendCode").show();//2014-7-21  手机认证修改
			$("#loginform").hide();//2014-7-21  手机认证修改
      }	
   </script>
   <!--// 弹窗 --> 
</section>

</body></html>