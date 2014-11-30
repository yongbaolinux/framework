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
          	<a href="http://www.diskroom.com" id="logo"><img src="<?=$cfg['configSiteLogo']?>"/><span id="name"><?=$cfg['configSiteName']?></span>
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
        <!-- 客户案例 -->
        <div id="customer-shows">
        	<h3>产品展示</h3>
            <div id="customer-show" class="clearfix">
            	<ul>
                	<li><div class="customer-img"><img src="<?=base_url()?>application_res/<?=$cfg['configSiteTemplate']?>/images/images/product.png" /></div><div class="customer-info"><a href="javascript:void(0);" class="customer-info-link"></a><a href="javascript:void(0);" class="customer-info-maximize"></a></div></li>
                    <li><div class="customer-img"><img src="<?=base_url()?>application_res/<?=$cfg['configSiteTemplate']?>/images/images/product.png" /></div><div class="customer-info"><a href="javascript:void(0);" class="customer-info-link"></a><a href="javascript:void(0);" class="customer-info-maximize"></a></div></li>
                    <li><div class="customer-img"><img src="<?=base_url()?>application_res/<?=$cfg['configSiteTemplate']?>/images/images/product.png" /></div><div class="customer-info"><a href="javascript:void(0);" class="customer-info-link"></a><a href="javascript:void(0);" class="customer-info-maximize"></a></div></li>
                    <li><div class="customer-img"><img src="<?=base_url()?>application_res/<?=$cfg['configSiteTemplate']?>/images/images/product.png" /></div><div class="customer-info"><a href="javascript:void(0);" class="customer-info-link"></a><a href="javascript:void(0);" class="customer-info-maximize"></a></div></li>
                    <li><div class="customer-img"><img src="<?=base_url()?>application_res/<?=$cfg['configSiteTemplate']?>/images/images/product.png" /></div><div class="customer-info"><a href="javascript:void(0);" class="customer-info-link"></a><a href="javascript:void(0);" class="customer-info-maximize"></a></div></li>
                    <li><div class="customer-img"><img src="<?=base_url()?>application_res/<?=$cfg['configSiteTemplate']?>/images/images/product.png" /></div><div class="customer-info"><a href="javascript:void(0);" class="customer-info-link"></a><a href="javascript:void(0);" class="customer-info-maximize"></a></div></li>
                </ul>
            </div>
        </div>
        <!-- 客户案例分页 -->
        <div id="product-page">
        	首页 前一页 1 2 3 4 5 后一页 末页
        </div>
        <!-- footer -->
        <div id="footer">
        	<div><span id="copyright">@xx有限公司版权所有</span><span id="support">Diskroom提供技术支持</span></div>
            <div><span id="icp">备案号：湘xxxxxxx号</span></div>
        </div>
    </div>
</body>
<script type="text/javascript" src="<?=base_url()?>application_res/<?=$cfg['configSiteTemplate']?>/js/jquery-1.6.4.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#product-cate #product-cate-body a").mouseenter(function(){
			$(this).nextAll("ul").show();
		}).mouseout(function(){
			$(this).nextAll("ul").hide();
		});
		$("#product-cate #product-cate-body ul ul").mouseenter(function(){
			$(this).show().prevAll("a").css({color:"#ffffff",backgroundColor:"#bbaa90"});
		}).mouseleave(function(){
			$(this).hide().prevAll("a").css({color:"#8a8a8a",backgroundColor:"transparent"});
		});
	});
	
</script>
</html>