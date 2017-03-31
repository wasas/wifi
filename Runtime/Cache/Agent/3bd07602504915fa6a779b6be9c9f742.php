<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo C('sitename');?>--代理商平台</title>
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
<script src="<?php echo ($Theme['P']['root']); ?>/matrix/js/jquery.min.js"></script> 
<link rel="stylesheet" href="<?php echo ($Theme['P']['root']); ?>/matrix/css/uniform.css" />
<link rel="stylesheet" href="<?php echo ($Theme['P']['root']); ?>/matrix/css/select2.css" />
</head>
<body>
 <link href="<?php echo ($Theme['P']['root']); ?>/css/qq/css/contact.css" rel="stylesheet" type="text/css" />

<!--Header-part-->
<div id="header">
  <h1><a href="#"></a></h1>
</div>
<!--close-Header-part--> 
<!--top-Header-menu-->

<div id="user-nav" class="navbar navbar-inverse">

  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>登录帐号:(<?php echo (session('account')); ?>)</a>
      <ul class="dropdown-menu">
        <li><a href="<?php echo U('index/pwd');?>"><i class="icon-user"></i> 修改密码</a></li>
        <li class="divider"></li>
        <li><a href="<?php echo U('index/index/alogout');?>"><i class="icon-key"></i>退出</a></li>
      </ul>
    </li>
	
  <li class=""><a title="" href="<?php echo U('index/index/alogout');?>"><i class="icon icon-share-alt"></i> <span class="text">退出</span></a></li>
    </ul>
     
</div>

<!--close-top-Header-menu-->

<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li class="<?php if(($nav['a'] == 'index')): ?>active"<?php endif; ?>"><a href="<?php echo U('Index/index');?>"><i class="icon icon-home"></i> <span>首页</span></a> </li>
    <li class="<?php if(($nav['a'] == 'account')): ?>active"<?php endif; ?>"><a href="<?php echo U('Index/account');?>"><i class="icon icon-group"></i> <span>账户管理</span></a> </li>
    <li class="submenu <?php if(($nav['a'] == 'shop')): ?>active"<?php endif; ?>"><a href="#" id="shop"><i class="icon icon-user"></i> <span>商户管理</span></a>
   	  <ul> 
        <li><a href="<?php echo U('Index/shoplist');?>">商户列表</a></li>
        <li><a href="<?php echo U('Index/shopadd');?>">添加商户</a></li>
      </ul>
    </li>
    <li class="submenu <?php if(($nav['a'] == 'adman')): ?>active"<?php endif; ?>"><a href="#" id="adman"><i class="icon icon-cloud"></i> <span>广告管理</span></a>
      <ul>
        <li><a href="<?php echo U('Admanage/shopad');?>">广告列表</a></li>
        <li><a href="<?php echo U('Admanage/adrpt');?>">广告统计</a></li>
      </ul>
    </li>
    <li class="submenu <?php if(($nav['a'] == 'pushadv')): ?>active"<?php endif; ?>"><a href="#" id="pushadv"><i class="icon icon-th-large"></i> <span>广告推送管理</span></a>
      <ul>
        <li><a href="<?php echo U('pushadv/set');?>">推送设置</a></li>
        <li><a href="<?php echo U('pushadv/index');?>">广告列表</a></li>
        <li><a href="<?php echo U('pushadv/add');?>">投放广告</a></li>
        <li><a href="<?php echo U('pushadv/rpt');?>">投放统计</a></li>
      </ul>
    </li>
    <li class="<?php if(($nav['a'] == 'report')): ?>active"<?php endif; ?>"><a href="<?php echo U('Index/report');?>"><i class="icon icon-envelope-alt"></i> <span>资金报表</span></a> </li>
  </ul>
</div>
<!--sidebar-menu-->
<!--main-container-part-->
<div id="content">
  <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb">
            <a href="<?php echo U('index/index');?>" title="返回首页" class="tip-bottom"><i class="icon-home"></i>首页</a>
            <a href="#" class="current">投放广告</a>
        </div>
        <h1>投放广告</h1>
    </div>
    <!--End-breadcrumbs-->
    <div class="container-fluid" >
        <hr>
        <div class="row-fluid">
            <div class="span8">
                <div class="widget-box">
                    <div class="widget-title">
                        <span class="icon"><i class="icon-align-justify"></i></span>
                        <h5>投放广告</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form name="doad"  action="__URL__/add"  method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="control-group">
                                <div class="alert span9" style="display: none;margin: 10px 0 10px 150px;">
                                    <span id="alertmsg"></span>
                                </div>
                            </div>    
                            <div class="control-group">
                                <label class="control-label">广告名称:</label>
                                <div class="controls">
                                    <input class="span11" type="text"  data-toggle="tooltip" data-trigger="focus" title="请输入标题" data-placement="right" name="title" id="title" value="<?php echo ($info['title']); ?>"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">广告备注:</label>
                                <div class="controls">
                                    <textarea class="textarea_editor span11" rows="2" placeholder="输入内容 ..." name="info"><?php echo (htmlspecialchars_decode($info["info"])); ?></textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">排序:</label>
                                <div class="controls">
                                    <input class="span11" type="text"  data-toggle="tooltip" data-trigger="focus" title="输入广告投放顺序，数字越大越靠后" data-placement="right" name="sort" id="sort" value="<?php echo ($info['sort']); ?>"/>
                                </div>
                            </div>
                                <div class="control-group">
                                    <label class="control-label">选择广告:</label>
                                    <div class="controls">
                                        <input type="file"  name="img" id="upload"/>
                                        <span >上传图片比例建议:760*480</span>
                                    </div>
                                </div>
                                
                                
                                <div class="control-group">
                                    <label class="control-label">投放时间:</label>
                                    <div class="controls">
                                          <div id="startdt"  >
                                 	<input type="text" class="span9" value="" name="startdate" id="startdate"  data-date-format="yyyy-mm-dd"> 
                                 </div>
                                          <label>到:</label>
                                          <div id="enddt" >
                                	<input type="text" class="span9" value="" name="enddate" id="enddate"  data-date-format="yyyy-mm-dd"> 
                                </div>
                                    </div>
                                </div>
                                <!-- <div class="control-group">
                                    <label class="control-label">投放时间:</label>
                                    <div class="controls">
                                        <label>投放时间:</label>
                                         <div class="" id="startdt" data-date="<?php echo (date('Y-m-d',$info["startdate"])); ?>" data-date-format="yyyy-mm-dd">
                                          <input type="text" class="span9" value="<?php echo (date('Y-m-d',$info["startdate"])); ?>" data-date-format="yyyy-mm-dd" name="startdate" id="startdate" > 
                                         </div>
                                          <label>到:</label>
                                          <div id="enddt" data-date="<?php echo (date('Y-m-d',$info["enddate"])); ?>" data-date-format="yyyy-mm-dd">
                                          <input type="text" class="span9" value="<?php echo (date('Y-m-d',$info["enddate"])); ?>" data-date-format="yyyy-mm-dd" name="enddate" id="enddate" > 
                                          </div>
                                    </div>
                                </div> -->
                                <div class="control-group">
                                  <input type="hidden" name="id" value="<?php echo ($info["id"]); ?>">
                                  <input type="submit"   class="btn btn-success" id="btn_save" value="保存信息" style="margin: 20px;">
                                &nbsp;
                                  <a class="btn btn-primary" href="<?php echo U('index');?>">返回列表</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="span4 column pull-right">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo ($Theme['P']['root']); ?>/matrix/js/jquery.ui.custom.js"></script> 
<script src="<?php echo ($Theme['P']['root']); ?>/matrix/js/bootstrap.min.js"></script> 
<script src="<?php echo ($Theme['P']['root']); ?>/matrix/js/matrix.js"></script> 
<script src="<?php echo ($Theme['P']['root']); ?>/matrix/js/jquery.uniform.js"></script> 
<script src="<?php echo ($Theme['P']['root']); ?>/matrix/js/select2.min.js"></script> 
<script src="<?php echo ($Theme['P']['root']); ?>/matrix/js/common.js"></script> 
<script src="<?php echo ($Theme['P']['root']); ?>/matrix/js/bootstrap-datepicker.js"></script>
<script src="<?php echo ($Theme['P']['root']); ?>/bootadmin/js/bootstrap.datepicker.js"></script>


  <script type="text/javascript">
  $(document).ready(function(){
		$('#pushadv').trigger('click');
	});

                        $(function () {
                             var shownow=new Date();
                             shownow=shownow.getTime();
                           $("#startdate").datepicker().on('changeDate',function(ev){
                              var startTime = ev.date.valueOf();
                             
                              if(startTime<shownow){
                               
                               $("#startdate").focus();
                              }
                            });
                           $("#enddate").datepicker().on('changeDate',function(ev){
                             var et = ev.date.valueOf();
                             var t=$("#startdate").val();
                             if($("#startdate").val()==""){
                                  $("#enddate").val("");
                      alert("请先选择投放时间");
                      return;
                      
                                 }else{
                                 var dt=Date.parse($("#startdate").val());
                                 if(et<dt){
                                   $("#enddate").val($("#startdate").val());
                                     alert("广告结束时间不能小于开始时间");
                                
                                  }
                                 }
                             
                             
                             });
                            // add uniform plugin styles to html elements
                            $("input:checkbox, input:radio,input[type=file]").uniform();

                        });
                    </script>
</body>
</html>