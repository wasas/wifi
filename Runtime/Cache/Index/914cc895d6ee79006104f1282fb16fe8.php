<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo C('sitename');?>--会员中心</title>
<meta name="keywords" content="<?php echo C('keyword');?>"/>
<meta name="description" content="<?php echo C('content');?>"/>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="<?php echo ($Theme['P']['root']); ?>/matrix/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo ($Theme['P']['root']); ?>/matrix/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="<?php echo ($Theme['P']['root']); ?>/matrix/css/matrix-style.css" />
<link rel="stylesheet" href="<?php echo ($Theme['P']['root']); ?>/matrix/css/matrix-media.css" />
<link href="<?php echo ($Theme['P']['root']); ?>/matrix/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href="<?php echo ($Theme['P']['root']); ?>/font/googlefont.css" rel="stylesheet" />

</head>
<body>
   <!--Header-part-->
<div id="header">
  <h1><a href="#"></a></h1>
</div>
<!--close-Header-part--> 
<!--top-Header-menu-->

<div id="user-nav" class="navbar navbar-inverse">

  <ul class="nav">
    <li  class="dropdown" id="profile-messages" >
      <a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle">
      <i class="icon icon-user"></i>  
      <span class="text">欢迎光临</span>
      <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li>
          <a href="<?php echo U('User/account');?>"><i class="icon-user"></i> 修改密码</a>
        </li>
        <li class="divider"></li>
        <li>
          <a href="<?php echo U('User/logout');?>"><i class="icon-key"></i>退出</a>
        </li>
      </ul>
    </li>
	
    <li class="">
      <a title="" href="<?php echo U('User/logout');?>"><i class="icon icon-share-alt"></i> <span class="text">退出</span></a>
    </li>
    <li class="">
      <a title="" href="javascript:void(0);">服务热线：<?php echo C('linktel');?></a>
    </li>
    <li>
      <a title="" href="javascript:void(0);">商务合作：</a>
    </li>
    <li class="">
      <a title="" href="javascript:void(0);">QQ:<?php echo C('qq');?></a>
    </li>
    <li>
      <a title="" href="javascript:void(0);">技术支持：<?php echo C('sitename');?></a>
    </li>
  </ul>
     
</div>

<!--close-top-Header-menu-->

   <!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li class="<?php if(($a == 'index')): ?>active"<?php endif; ?>" ><a href="<?php echo U('User/index');?>"><i class="icon icon-home"></i> <span>首页</span></a> </li>
     <li class="<?php if(($a == 'info')): ?>active"<?php endif; ?>"> <a href="<?php echo U('User/info');?>"><i class="icon icon-group"></i> <span>商户信息</span></a> </li>
    <li class="<?php if(($a == 'application')): ?>active"<?php endif; ?>"> <a href="<?php echo U('User/application');?>"><i class="icon icon-cogs"></i> <span>应用设置</span></a> </li>
    <li class="<?php if(($a == 'three_p')): ?>active"<?php endif; ?>"> <a href="<?php echo U('User/three_p');?>"><i class="icon icon-cogs"></i> <span>微信动态认证</span></a> </li>
           <li class="<?php if(($a == 'routemap')): ?>active"<?php endif; ?>"> <a href="<?php echo U('User/routemap');?>"><i class="icon icon-group"></i> <span>路由管理</span></a> </li>
      <li class="<?php if(($a == 'authtplset')): ?>active"<?php endif; ?>"> <a href="<?php echo U('Authset/tplset');?>"><i class="icon icon-th"></i> <span>认证页面</span></a> </li>
     
     
     <li class="submenu <?php if(($a == 'adv')): ?>active"<?php endif; ?>"> <a href="#" id="adv"><i class="icon icon-cloud"></i> <span>广告管理</span></a>
   	 <ul>
        <li><a href="<?php echo U('User/adv');?>">广告管理</a></li>
        
         <li><a href="<?php echo U('User/advrpt');?>">广告统计</a></li>
		
      </ul>
   </li>
   
           <li class="submenu <?php if(($a == 'web3g')): ?>active"<?php endif; ?>"> <a href="#" id="web3g"><i class="icon icon-th-large"></i> <span>小微官网</span></a>
      <ul>
        <li><a href="<?php echo U('index/web/index');?>">网站设置</a></li>
        
         <li><a href="<?php echo U('web/catelog');?>">网站分类</a></li>
		 <li><a href="<?php echo U('web/arts');?>">文章管理</a></li>
		  <li><a href="<?php echo U('web/tempset');?>">模板管理</a></li>
      </ul>
    </li>
     <li class="<?php if(($a == 'comment')): ?>active"<?php endif; ?>"> <a href="<?php echo U('User/comment');?>"><i class="icon icon-envelope-alt"></i> <span>客户留言</span></a> </li>
         <li class="submenu <?php if(($a == 'report')): ?>active"<?php endif; ?>" > <a href="#" id="urpt"><i class="icon icon-user"></i> <span>用户统计</span></a>
      <ul>
        <li><a href="<?php echo U('User/userchart');?>">统计报表</a></li>
        <li><a href="<?php echo U('User/report');?>">用户列表</a></li>
       

      </ul>
    </li>
    <li class="<?php if(($a == 'online')): ?>active"<?php endif; ?>"> <a href="<?php echo U('User/rpt');?>"><i class="icon icon-signal"></i> <span>上网统计</span></a> </li>
   <li class="submenu <?php if(($a == 'advfun')): ?>active"<?php endif; ?>" > <a href="#" id="sale"><i class="icon icon-dashboard"></i> <span>营销管理</span></a>
      <ul>
        <li><a href="<?php echo U('index/Adv/phonelist');?>">手机号码管理</a></li>
         <li><a href="<?php echo U('adv/set');?>">短信帐号管理</a></li>
        <li><a href="<?php echo U('adv/sms');?>">短信群发</a></li>
      	<li><a href="<?php echo U('adv/smslist');?>">短信发送列表</a></li>
      </ul>
    </li>
  
  </ul>
</div>
<!--sidebar-menu-->
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="<?php echo U('user/index');?>" title="返回首页" class="tip-bottom"><i class="icon-home"></i>首页</a> <a href="#" class="current">模板管理</a> </div>
    <h1>模板列表</h1>
 
  </div>
  <div  class="container-fluid">
        <div class="widget-box">
    
    <div class="widget-title">
            <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#tab1">首页模板</a></li>
              <li><a data-toggle="tab" href="#tab2">列表模板</a></li>
              <li><a data-toggle="tab" href="#tab3">文章模板</a></li>
            </ul>
       </div>
        <div class="widget-content tab-content">
            <div id="tab1" class="tab-pane active">
            	<div class="widget-content">
            	<ul class="cateradio">
            	<?php if(is_array($tpl)): $i = 0; $__LIST__ = $tpl;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i; if($list['group'] == 0): ?><li <?php if(($info['home_tpl']) == $list['id']): ?>class="active"<?php endif; ?>><label><img
											src="<?php echo ($Theme['P']['root']); ?>/images/webtpl/<?php echo ($list['pic']); ?>"><input class="radio" type="radio" name="optype" value="<?php echo ($list['id']); ?>"
										<?php if(($info['home_tpl']) == $list['id']): ?>checked<?php endif; ?> /> <?php echo ($list['title']); ?></label></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
            		
            	</ul>
            	<div style="clear:both;"></div>
            	</div>
            
            </div>
            <div id="tab2" class="tab-pane">
             
             <div class="widget-content">
            	<ul class="cateradio">
            	<?php if(is_array($tpl)): $i = 0; $__LIST__ = $tpl;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i; if($list['group'] == 1): ?><li <?php if(($info['list_tpl']) == $list['id']): ?>class="active"<?php endif; ?>><label><img
											src="<?php echo ($Theme['P']['root']); ?>/images/webtpl/<?php echo ($list['pic']); ?>"><input class="radio2" type="radio" name="optype2" value="<?php echo ($list['id']); ?>"
										<?php if(($info['list_tpl']) == $list['id']): ?>checked<?php endif; ?> /> <?php echo ($list['title']); ?></label></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
            		
            	</ul>
            	<div style="clear:both;"></div>
            	</div>
             
            </div>
            <div id="tab3" class="tab-pane">
            <div class="widget-content">
            	<ul class="cateradio">
            	<?php if(is_array($tpl)): $i = 0; $__LIST__ = $tpl;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i; if($list['group'] == 2): ?><li <?php if(($info['info_tpl']) == $list['id']): ?>class="active"<?php endif; ?>><label><img
											src="<?php echo ($Theme['P']['root']); ?>/images/webtpl/<?php echo ($list['pic']); ?>"><input class="radio3" type="radio" name="optype3" value="<?php echo ($list['id']); ?>"
										<?php if(($info['info_tpl']) == $list['id']): ?>checked<?php endif; ?> /> <?php echo ($list['title']); ?></label></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
            		
            	</ul>
            	<div style="clear:both;"></div>
            	</div>
            </div>
          </div>
        
  </div>
</div>
</div>

   <!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12"> 2015-2018 &copy; cuckoowifo <a href="<?php echo C('siteurl');?>"><?php echo C('shortsiteurl');?></a><br> <a href="http://www.miitbeian.gov.cn/">京ICP备14017729号</a></div>
</div>
<!--end-Footer-part--> 
<script>

</script>
<script src="<?php echo ($Theme['P']['root']); ?>/matrix/js/jquery.min.js"></script> 
<script src="<?php echo ($Theme['P']['root']); ?>/matrix/js/jquery.ui.custom.js"></script> 
<script src="<?php echo ($Theme['P']['root']); ?>/matrix/js/bootstrap.min.js"></script> 
<script src="<?php echo ($Theme['P']['root']); ?>/matrix/js/matrix.js"></script> 

<script src="<?php echo ($Theme['P']['root']); ?>/matrix/js/common.js"></script> 
<script>
						$(".radio")
								.click(
										function() {

											$(".cateradio li").each(function() {

												$(this).removeClass("active");

											});

											$(this).parents("li").addClass(
													"active");

											var myurl = '/index.php?g=index&m=web&a=home&tpl='
													+ $(this).val()
													+ '&r='
													+ Math.random();

											$.ajax({
												url : myurl,
												async : false
											});

											

											

										});

						$(".radio2")
								.click(
										function() {

											$(".cateradio2 li").each(
													function() {

														$(this).removeClass(
																"active");

													});

											$(this).parents("li").addClass(
													"active");

											var myurl = '/index.php?g=index&m=web&a=lists&tpl='
													+ $(this).val()
													+ '&r='
													+ Math.random();

											$.ajax({
												url : myurl,
												async : false
											});

										});

						$(".radio3")
								.click(
										function() {

											$(".cateradio3 li").each(
													function() {

														$(this).removeClass(
																"active");

													});

											$(this).parents("li").addClass(
													"active");

											var myurl = '/index.php?g=index&m=web&a=info&tpl='
													+ $(this).val()
													+ '&r='
													+ Math.random();

											$.ajax({
												url : myurl,
												async : false
											});

										});



						

						$(document).ready(function(){
							
							$('#web3g').trigger('click');
						});
						</script>
</body>
</html>