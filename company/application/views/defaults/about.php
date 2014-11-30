<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="StyleSheet" href="<?=base_url()?>application_res/<?=$cfg['configSiteTemplate']?>/css/index.css" />
</head>

<body>
	<div class="container" id="wrap">
    	<div id="header">
          <div id="logo-tools">
          	<a href="<?=base_url()?>" id="logo"><img src="<?=$cfg['configSiteLogo']?>"/><span id="name"><?=$cfg['configSiteName']?></span>
            </a>
            
            <ul id="tools">
            	<li><a href="javascript:void(0);">WAP站</a> | <a href="javascript:void(0);">英文版</a> | <a href="javascript:void(0);">加为收藏</a></li>
                <li>QQ : 304513573</li>
            </ul>
          </div>
          <!-- 导航菜单 -->
          <div id="menu">
          	<ul>
            	<li><a href="index.php">首页</a></li>
                <?php foreach($menus1 as $key=>$value){?>
                	<li><a href="<?=base_url()?>index.php?c=module&m=show&mid=<?=$value['id']?>" class="<?php if($mid===$value['id']){echo 'current';}?>"><?=$value['module_cname']?></a></li>
                <?php } ?>
            </ul>
          </div>
        </div>
		<!-- banner条广告 -->
        <div id="advertisement">
        	<img src="<?=base_url()?>application_res/<?=$cfg['configSiteTemplate']?>/images/images/banner广告.png" />
        </div>
        <!-- 关于我们 -->
        <div id="about-us">
        	<h3>关于我们</h3>
            <div id="about" class="clearfix">
            	<div class="left"><img src="<?=base_url()?>application_res/<?=$cfg['configSiteTemplate']?>/images/images/about-us.png" /></div>
                <p class="left">关于我们关于我们关于我们</p>
            </div>
        </div>
        <!-- footer -->
        <div id="footer">
        	<div><span id="copyright">@xx有限公司版权所有</span><span id="support">Diskroom提供技术支持</span></div>
            <div><span id="icp">备案号：湘xxxxxxx号</span></div>
        </div>
    </div>
</body>
</html>