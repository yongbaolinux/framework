<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<title><?php echo $cfg['configSiteName']; ?>-产品展示-<?php echo $cfg['configSiteKey']; ?>-</title>
<meta name="description" content="网站关键词">
<meta name="keywords" content="网站关键词">
<meta name="generator" content="MetInfo 5.2.2">
<link href="http://localhost/MetInfo5.1/favicon.ico" rel="shortcut icon">
<link rel="stylesheet" type="text/css" href="<?=base_url();?>application_res/css/metinfo_ui.css" id="metuimodule" data-module="3">
<link rel="stylesheet" type="text/css" href="<?=base_url();?>application_res/css/metinfo.css">
<!--<script src="<?=base_url();?>application_res/js/jQuery1.js" type="text/javascript"></script>-->
<script src="<?=base_url();?>application_res/js/metinfo_ui.js" type="text/javascript"></script>
<script src="<?=base_url();?>application_res/js/ch.js" type="text/javascript"></script>
<!--[if IE]>
<script src="../public/js/html5.js" type="text/javascript"></script>
<![endif]-->
<link href="<?=base_url();?>application_res/css/online.css" rel="stylesheet" type="text/css" id="onlinecss">
</head>
<body>
<header>
  <div class="inner">
    <div class="top-logo"> <a href="<?=base_url();?>" title="" id="web_logo"> <img src="<?=base_url();?>application_res/images/1342516579.png" alt="" title="" style="margin:20px 0px 0px 0px;"> </a>
      <ul class="top-nav list-none">
        <li class="t"><a href="#" onclick='SetHome(this,window.location,"非IE浏览器不支持此功能，请手动设置！");' style="cursor:pointer;" title="设为首页">设为首页</a><span>|</span><a href="#" onclick='addFavorite("非IE浏览器不支持此功能，请手动设置！");' style="cursor:pointer;" title="收藏本站">收藏本站</a><span>|</span><a class="fontswitch" id="StranLink" href="javascript:StranBody()">繁体中文</a><span>|</span><a href="<?=base_url();?>wap/" title="WAP">WAP</a><span>|</span><a href="<?=base_url();?>index_en.html" title="English">English</a></li>
        <li class="b">
          <p> 优化推广-SEO参数设置-头部优化文字</p>
        </li>
      </ul>
    </div>
    <nav id="menu">
      <ul class="list-none">
      	<li data-corner="tl 5px" class="myCorner" id="nav_10001" style="width:<?=$menuWidth?>px"><a href="<?=base_url();?>index.php">网站首页</a></li><li class="line"></li>
        <?php foreach($menus1 as $key=>$value){ ?>
        <li data-corner="tl 5px" class="myCorner" id="nav_10001" style="width:<?=$menuWidth?>px"><a href="<?=base_url();?>index.php?c=module&m=show&mid=<?php echo $value['id']; ?>" title="<?php echo $value['module_title']; ?>" class="nav"><span><?php echo $value['module_cname']; ?></span></a></li>
        <li class="line"></li>
        <?php } ?>
      </ul>
    </nav>
    <script type="text/javascript">
		var width = $("#menu").width();
		var count = $("#menu li").length/2;
		var count_ = count -1 ; //间隙数量
		width -= count_*2;
		var width_li = width/count;
		//设置菜单元素宽度 第一个菜单元素 左圆角 最后一个菜单元素右圆角
		var menu = $("#menu li.myCorner");
		menu.width(width_li).first().css('border-radius','5px 0px 0px 0px').end().last().css('border-radius','0px 5px 0px 0px');
		menu.each(function(index,element){
			$(element).hover(function(){
				$(this).css('background-color','#FFF').children('a').css('color','#555555');			
			},function(){
				$(this).css('background-color','#007AC7').children('a').css('color','#FFF');
			});
		});
	</script>
  </div>
</header>
<div class="inner met_flash">
  <div class="flash"> <a href="http://www.diskroom.net/" target="_blank" title="diskroom企业网站管理系统"></a> </div>
</div>
<div class="sidebar inner">
  <div class="sb_nav">
    <h3 style="border-top-left-radius: 5px; border-top-right-radius: 5px;" class="title myCorner" data-corner="top 5px"><?=$module['module_cname']?></h3>
    <div class="active" id="sidebar" data-csnow="3" data-class3="0" data-jsok="2">
    <?php foreach($children as $key=>$value) { ?>
      <dl class="list-none navnow">
        <dt id="part2_6"><a href="<?=base_url()?>index.php?c=module&m=show&mid=<?=$value['id']?>" title="<?=$value['module_cname']?>"><span><?=$value['module_cname']?></span></a></dt>
      </dl>
    <?php } ?>
      <div class="clear"></div>
    </div>
    <h3 style="border-top-left-radius: 5px; border-top-right-radius: 5px;" class="title line myCorner" data-corner="top 5px">联系方式</h3>
    <div class="active editor">
	<?php if(is_array($public) && count($public) > 0 ){
		foreach($public as $value){
	?>
      		<div> <?=$value['publicInfo']?> </div>
	<?php }} ?>
      <div class="clear"></div>
    </div>
  </div>
  <div class="sb_box">
    <h3 class="title">
      <div class="position">当前位置：<a href="<?=base_url();?>" title="网站首页">网站首页</a> <?php if(is_array($postion) && count($postion) > 0 ){ foreach($postion as $value){ ?>&gt; <a href="<?=base_url();?>index.php?c=module&m=show&mid=<?=$value['id']?>"><?=$value['module_cname']?></a><?php } } ?></div>
      <span><?=$module['module_cname']?></span> </h3>
    <div class="clear"></div>
    <div class="active" id="productlist">
      <ul class="list-none metlist">
	<?php if(is_array($imagesData) && count($imagesData) > 0 ){ foreach($imagesData as $image ){ ?>
		<li class="list" style="width: 162px; margin-left: 11px; margin-right: 11px; height: 165px;"><a href="<?=base_url();?>index.php?c=image&m=show&iid=<?=$image['imageID']?>" title="<?=$image['title']?>" target="_self" class="img"><img src="<?=base_url();?><?=$image['path']?>" alt="<?=$image['title']?>" title="<?=$image['title']?>" height="130" width="160"></a>
			<h3><a href="<?=base_url();?>index.php/image/<?=$image['imageID']?>" title="<?=$image['title']?>" target="_self"><?=$image['title']?></a></h3>
		</li>
	<?php } } ?>
      </ul>
      <div class="clear"></div>
    </div>
    <div id="flip">
      <!--<div class="digg4 metpager_8"><span class="disabled disabledfy"><b>«</b></span><span class="disabled disabledfy">‹</span><span class="current">1</span><span class="disabled disabledfy">›</span><span class="disabled disabledfy"><b>»</b></span></div>-->
	<?=$pagination?>
    </div>
  </div>
  <div class="clear"></div>
</div>
<footer>
  <div class="inner">
    <div class="foot-nav">
    <?php foreach($menus2 as $key=>$value){ 
		if($key !== 0){ ?>
			<span>|</span>
	<?php	} ?>
    <a href="index/module/<?php echo $value['id']; ?>" title="<?php echo $value['module_title']; ?>"><?php echo $value['module_cname']; ?></a>
    <?php } ?>
    </div>
    <div class="foot-text">
      <p><?php echo $cfg['configSiteCopyright']; ?> <script src="%E4%BA%A7%E5%93%81%E5%B1%95%E7%A4%BA-%E7%BD%91%E7%AB%99%E5%85%B3%E9%94%AE%E8%AF%8D-_files/stat.php" language="JavaScript"></script><script src="%E4%BA%A7%E5%93%81%E5%B1%95%E7%A4%BA-%E7%BD%91%E7%AB%99%E5%85%B3%E9%94%AE%E8%AF%8D-_files/core.php" charset="utf-8" type="text/javascript"></script><a href="http://www.cnzz.com/stat/website.php?web_id=1670348" target="_blank" title="站长统计">站长统计</a></p>
      <p><?php echo $cfg['configSiteContact']; ?></p>
      <p><?php echo $cfg['configSiteOthers']; ?></p>
      
      <!--以下是版权信息，购买商业授权之后方可去除！-->
      <div class="powered_by_metinfo"> Powered&nbsp;by&nbsp;<a href="http://www.metinfo.cn/" target="_blank" title="企业网站管理系统">MetInfo&nbsp;5.2.2</a> ©2008-2014&nbsp; <a href="http://www.metinfo.cn/" target="_blank" title="企业网站建设">www.metinfo.cn</a> </div>
      <!--版权信息结束--> 
    </div>
  </div>
</footer>
<script src="%E4%BA%A7%E5%93%81%E5%B1%95%E7%A4%BA-%E7%BD%91%E7%AB%99%E5%85%B3%E9%94%AE%E8%AF%8D-_files/fun.js" type="text/javascript"></script> 
<script src="%E4%BA%A7%E5%93%81%E5%B1%95%E7%A4%BA-%E7%BD%91%E7%AB%99%E5%85%B3%E9%94%AE%E8%AF%8D-_files/stat.htm" type="text/javascript"></script> 
<script src="%E4%BA%A7%E5%93%81%E5%B1%95%E7%A4%BA-%E7%BD%91%E7%AB%99%E5%85%B3%E9%94%AE%E8%AF%8D-_files/online.js" type="text/javascript" id="metonlie_js"></script>
<div id="onlinebox" class="onlinebox onlinebox_1 onlinebox_1_4" style="position: fixed; top: 110px; left: 1313px;">
  <div class="onlinebox-showbox"><span>在<br>
    线<br>
    交<br>
    流<br>
    </span></div>
  <div class="onlinebox-conbox" style="display:none;">
    <div class="onlinebox-top" title="点击可隐藏"><a href="javascript:;" onclick="return onlineclose();" class="onlinebox-close" title="关闭"></a><span>在线交流</span> </div>
    <div class="onlinebox-center">
      <div class="onlinebox-center-box">
        <dl>
          <dt>咨询销售</dt>
          <dd><a href="tencent://message/?uin=348468810&amp;Site=&amp;Menu=yes" title="QQ咨询销售"><img src="%E4%BA%A7%E5%93%81%E5%B1%95%E7%A4%BA-%E7%BD%91%E7%AB%99%E5%85%B3%E9%94%AE%E8%AF%8D-_files/pa_004.gif" border="0"></a><span class="met_taobao"><a target="_blank" href="http://amos.im.alisoft.com/msg.aw?v=2&amp;uid=metinfo&amp;site=cntaobao&amp;s=2&amp;charset=utf-8"><img src="%E4%BA%A7%E5%93%81%E5%B1%95%E7%A4%BA-%E7%BD%91%E7%AB%99%E5%85%B3%E9%94%AE%E8%AF%8D-_files/online.gif" alt="咨询销售" border="0"></a></span></dd>
        </dl>
        <div class="clear"></div>
        <dl>
          <dt>咨询销售</dt>
          <dd><a href="tencent://message/?uin=1498488199&amp;Site=&amp;Menu=yes" title="QQ咨询销售"><img src="%E4%BA%A7%E5%93%81%E5%B1%95%E7%A4%BA-%E7%BD%91%E7%AB%99%E5%85%B3%E9%94%AE%E8%AF%8D-_files/pa_002.gif" border="0"></a><span class="met_msn"><a href="msnim:chat?contact=metinfo@metinfo.cn"><img alt="MSN咨询销售" src="%E4%BA%A7%E5%93%81%E5%B1%95%E7%A4%BA-%E7%BD%91%E7%AB%99%E5%85%B3%E9%94%AE%E8%AF%8D-_files/msn_1.gif" border="0"></a></span></dd>
        </dl>
        <div class="clear"></div>
        <dl>
          <dt>空间域名</dt>
          <dd><a href="tencent://message/?uin=2545740365&amp;Site=&amp;Menu=yes" title="QQ空间域名"><img src="%E4%BA%A7%E5%93%81%E5%B1%95%E7%A4%BA-%E7%BD%91%E7%AB%99%E5%85%B3%E9%94%AE%E8%AF%8D-_files/pa_003.gif" border="0"></a><span class="met_taobao"><a target="_blank" href="http://amos.im.alisoft.com/msg.aw?v=2&amp;uid=metinfo&amp;site=cntaobao&amp;s=2&amp;charset=utf-8"><img src="%E4%BA%A7%E5%93%81%E5%B1%95%E7%A4%BA-%E7%BD%91%E7%AB%99%E5%85%B3%E9%94%AE%E8%AF%8D-_files/online.gif" alt="空间域名" border="0"></a></span></dd>
        </dl>
        <div class="clear"></div>
        <dl>
          <dt>合作加盟</dt>
          <dd><a href="tencent://message/?uin=909059761&amp;Site=&amp;Menu=yes" title="QQ合作加盟"><img src="%E4%BA%A7%E5%93%81%E5%B1%95%E7%A4%BA-%E7%BD%91%E7%AB%99%E5%85%B3%E9%94%AE%E8%AF%8D-_files/pa.gif" border="0"></a><span class="met_msn"><a href="msnim:chat?contact=metinfo@metinfo.cn"><img alt="MSN合作加盟" src="%E4%BA%A7%E5%93%81%E5%B1%95%E7%A4%BA-%E7%BD%91%E7%AB%99%E5%85%B3%E9%94%AE%E8%AF%8D-_files/msn_1.gif" border="0"></a></span></dd>
        </dl>
        <div class="clear"></div>
      </div>
    </div>
    <div class="onlinebox-bottom">
      <div class="onlinebox-bottom-box">
        <div class="online-tbox">
          <p> 界面风格-在线交流设置</p>
        </div>
      </div>
    </div>
    <div class="onlinebox-bottom-bg"></div>
  </div>
</div>
</body>
</html>