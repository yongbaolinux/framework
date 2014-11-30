<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<title><?php echo $cfg['configSiteName']; ?>-产品展示-<?php echo $cfg['configSiteKey']; ?>-</title>
<meta name="description" content="网站描述，一般显示在搜索引擎搜索结果中的描述文字，用于介绍网站，吸引浏览者点击。">
<meta name="keywords" content="网站关键词">
<meta name="generator" content="Diskroom1.0">
<link href="" rel="shortcut icon">
<link rel="stylesheet" type="text/css" href="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/css/metinfo_ui.css" id="metuimodule" data-module="10001">
<link rel="stylesheet" type="text/css" href="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/css/metinfo.css">
<!--<script src="<?=base_url();?>application_res/js/jQuery1.js" type="text/javascript"></script>-->
<script src="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/js/metinfo_ui.js" type="text/javascript"></script>
<script src="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/js/ch.js" type="text/javascript"></script>
<!--[if IE]>
<script src="public/js/html5.js" type="text/javascript"></script>
<![endif]-->
<link href="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/css/online.css" rel="stylesheet" type="text/css" id="onlinecss"></head>
<body>
    <header>
		<div class="inner">
			<div class="top-logo">
				<a href="" title="网站名称" id="web_logo">
					<img src="" alt="网站名称" title="网站名称" style="margin:20px 0px 0px 0px;">
				</a>

				<ul class="top-nav list-none">
					<li class="t"><a href="#" onclick='SetHome(this,window.location,"非IE浏览器不支持此功能，请手动设置！");' style="cursor:pointer;" title="设为首页">设为首页</a><span>|</span><a href="#" onclick='addFavorite("非IE浏览器不支持此功能，请手动设置！");' style="cursor:pointer;" title="收藏本站">收藏本站</a><span>|</span><a class="fontswitch" id="StranLink" href="javascript:StranBody()">繁体中文</a><span>|</span><a href="http://cn.metcms.cn/wap/index.php?lang=cn" title="WAP">WAP</a><span>|</span><a href="http://en.metcms.cn/" title="English">English</a><span>|</span><a href="http://jp.metcms.cn/" title="Japan" target="_blank">Japan</a></li>
					<li class="b"><p>
	优化推广-SEO参数设置-头部优化文字</p>
</li>
				</ul>
			</div>
			<nav>
				<ul class="list-none">
					<li data-corner="tl 5px" class="myCorner" id="nav_10001" style="width:<?=$menuWidth?>px"><a href="<?=base_url();?>index.php">网站首页</a></li><li class="line"></li>
					<?php foreach($menus1 as $key=>$value){ ?>
        				<li data-corner="tl 5px" class="myCorner" id="nav_10001" style="width:<?=$menuWidth?>px"><a href="<?=base_url();?>index.php?c=module&m=show&mid=<?php echo $value['id']; ?>" title="<?php echo $value['module_title']; ?>" class="nav"><span><?php echo $value['module_cname']; ?></span></a></li>
        				<li class="line"></li>
        				<?php } ?>
				</ul>
			</nav>
		</div>
	</header>

	<div class="inner met_flash">
<link href="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/css/css.css" rel="stylesheet" type="text/css">
<script src="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/js/jquery.js"></script>
<!--轮播start-->
<div class="flash flash6" style="width:980px; height:245px;">
	<div class="bx-wrapper" style="width:980px; position:relative;">
	<div class="bx-window" style="width:980px; height:245px; position:relative; overflow:hidden;">
	<ul style="height: 999999px; position: relative; top: -245px;" id="slider6" class="list-none"><li style="list-style: none outside none; height: 245px;"><a href="http://www.diskroom.net/" target="_blank" title="diskroom企业网站管理系统">
		<img src="uploads/flash/1.jpg" alt="MetInfo企业网站管理系统" height="245" width="980"></a></li>
		<li class="pager" style="list-style: none outside none; height: 245px;"><a href="http://www.metinfo.cn/" target="_blank" title="MetInfo企业网站管理系统">
		<img src="uploads/flash/2.jpg" alt="MetInfo企业网站管理系统" height="245" width="980"></a></li>
		<li class="pager" style="list-style: none outside none; height: 245px;"><a href="http://www.metinfo.cn/" target="_blank" title="MetInfo企业网站管理系统">
		<img src="uploads/flash/3.jpg" alt="MetInfo企业网站管理系统" height="245" width="980"></a></li>
		<li style="list-style: none outside none; height: 245px;"><a href="http://www.metinfo.cn/" target="_blank" title="MetInfo企业网站管理系统">
		<img src="uploads/flash/4.jpg" alt="MetInfo企业网站管理系统" height="245" width="980"></a></li></ul></div><div class="bx-pager"><a href="" class="pager-link pager-1 pager-active">1</a><a href="" class="pager-link pager-2">2</a></div></div>
</div>
<!--轮播end-->
<script type="text/javascript">
$(document).ready(function(){ 
		$('#slider6').bxSlider({ mode:'vertical',autoHover:true,auto:true,pager: true,pause: 5000,controls:false});
	});
</script></div>
<div class="index inner">
	<div class="aboutus style-1">
		<h3 class="title">
			<span style="border-top-left-radius: 5px; border-top-right-radius: 5px;" class="myCorner" data-corner="top 5px">关于我们</span>
			<a href="http://cn.metcms.cn/about/show.php?lang=cn&amp;id=19" class="more" title="链接关键词">更多&gt;&gt;</a>
		</h3>
		<div style="height: 225px;" class="active editor clear contour-1"><div>
	<img alt="" src="%E7%BD%91%E7%AB%99%E5%85%B3%E9%94%AE%E8%AF%8D-%E7%BD%91%E7%AB%99%E5%90%8D%E7%A7%B0_files/20120716_094159.jpg" style="margin: 8px; width: 196px; float: left; height: 209px; "></div>
<div style="padding-top:10px;">
	<span style="font-size:14px;"><strong>关于“为合作伙伴创造价值”</strong></span></div>
<div>
	米拓信息认为客户、供应商、公司股东、公司员工等一切和自身有合作关系的单位和个人都是自己的合作伙伴，并只有通过努力为合作伙伴创造价值，才能体现自身的价值并获得发展和成功。</div>
<div>
	&nbsp;</div>
<div>
	<span style="font-size:14px;"><strong>关于“诚实、宽容、创新、服务”</strong></span></div>
<div>
	<span style="font-size:12px;">米拓信息认为诚信是一切合作的基础，宽容是解决问题的前提，创新是发展事业的利器，服务是创造价值的根本。</span></div>
<div class="clear"></div></div>
	</div>
	<div class="case style-2">
		<h3 style="border-top-left-radius: 5px; border-top-right-radius: 5px;" class="title myCorner" data-corner="top 5px">
		客户案例
		<a href="http://cn.metcms.cn/case/img.php?lang=cn&amp;class1=33" title="链接关键词" class="more">更多&gt;&gt;</a>
		</h3>
		<div style="height: 225px;" class="active dl-jqrun contour-1">

		<dl class="ind">
            <dt style="height: 87px;"><a href="http://cn.metcms.cn/case/showimg.php?lang=cn&amp;id=5" target="_self"><img src="%E7%BD%91%E7%AB%99%E5%85%B3%E9%94%AE%E8%AF%8D-%E7%BD%91%E7%AB%99%E5%90%8D%E7%A7%B0_files/1342431883.jpg" alt="图片关键词" title="图片关键词" style="width:116px; height:80px;"></a></dt>
			<dd style="width: 149px; height: 87px;">
			    <h4><a href="http://cn.metcms.cn/case/showimg.php?lang=cn&amp;id=5" target="_self" title="示例案例六">示例案例六</a></h4>
				<p class="desc" title="相关描述文字，相关描述文字，相关描述文字，相关描述文字，相关描述文字。">相关描述文字，相关描述文字，相关描述文字，相关描述文字，相关..</p>
			</dd>
		</dl>

		<dl class="ind">
            <dt style="height: 87px;"><a href="http://cn.metcms.cn/case/showimg.php?lang=cn&amp;id=4" target="_self"><img src="%E7%BD%91%E7%AB%99%E5%85%B3%E9%94%AE%E8%AF%8D-%E7%BD%91%E7%AB%99%E5%90%8D%E7%A7%B0_files/1342428068.jpg" alt="图片关键词" title="图片关键词" style="width:116px; height:80px;"></a></dt>
			<dd style="width: 149px; height: 87px;">
			    <h4><a href="http://cn.metcms.cn/case/showimg.php?lang=cn&amp;id=4" target="_self" title="示例案例五">示例案例五</a></h4>
				<p class="desc" title="相关描述文字，相关描述文字，相关描述文字，相关描述文字，相关描述文字。">相关描述文字，相关描述文字，相关描述文字，相关描述文字，相关..</p>
			</dd>
		</dl>

        <div class="clear"></div>
		</div>
	</div>
	<div class="clear"></div>
	<div class="index-news style-1">
		<h3 class="title">
			<span style="border-top-left-radius: 5px; border-top-right-radius: 5px;" class="myCorner" data-corner="top 5px">公司动态</span>
			<a href="http://cn.metcms.cn/news/news.php?lang=cn&amp;class2=4" class="more" title="链接关键词">更多&gt;&gt;</a>
		</h3>
		<div style="height: 150px;" class="active clear listel contour-2"><ol class="list-none metlist"><li class="list top"><span class="time">2012-07-16</span><a href="http://cn.metcms.cn/news/shownews.php?lang=cn&amp;id=4" title="新手使用MetInfo建站步骤" target="_self">新手使用MetInfo建站步骤</a></li><li class="list "><span class="time">2012-07-16</span><a href="http://cn.metcms.cn/news/shownews.php?lang=cn&amp;id=5" title="MetInfo企业建站系统有何优势？" target="_self">MetInfo企业建站系统有何优势？</a></li><li class="list "><span class="time">2012-07-16</span><a href="http://cn.metcms.cn/news/shownews.php?lang=cn&amp;id=3" title="商业版和免费版在系统功能上有区别吗？" target="_self">商业版和免费版在系统功能上有区别吗？</a></li><li class="list "><span class="time">2012-07-16</span><a href="http://cn.metcms.cn/news/shownews.php?lang=cn&amp;id=1" title="为什么企业要建多国语言网站？" target="_self">为什么企业要建多国语言网站？</a></li><li class="list "><span class="time">2012-07-16</span><a href="http://cn.metcms.cn/news/shownews.php?lang=cn&amp;id=2" title="如何获取MetInfo网站管理系统商业授权？" target="_self">如何获取MetInfo网站管理系统商业授权？</a></li></ol></div>
	</div>
	<div class="index-news style-1">
		<h3 class="title">
			<span style="border-top-left-radius: 5px; border-top-right-radius: 5px;" class="myCorner" data-corner="top 5px">业界资讯</span>
			<a href="http://cn.metcms.cn/news/news.php?lang=cn&amp;class2=5" class="more" title="链接关键词">更多&gt;&gt;</a>
		</h3>
		<div style="height: 150px;" class="active clear listel contour-2"><ol class="list-none metlist"><li class="list top"><span class="time">2012-07-17</span><a href="http://cn.metcms.cn/news/shownews.php?lang=cn&amp;id=10" title="如何选择网站关键词?" target="_self">如何选择网站关键词?</a></li><li class="list "><span class="time">2012-07-16</span><a href="http://cn.metcms.cn/news/shownews.php?lang=cn&amp;id=9" title="企业网站应该多长时间备份一次？" target="_self">企业网站应该多长时间备份一次？</a></li><li class="list "><span class="time">2012-07-16</span><a href="http://cn.metcms.cn/news/shownews.php?lang=cn&amp;id=8" title="如何充分发挥MetInfo的SEO功能" target="_self">如何充分发挥MetInfo的SEO功能</a></li><li class="list "><span class="time">2012-07-16</span><a href="http://cn.metcms.cn/news/shownews.php?lang=cn&amp;id=7" title="什么是伪静态？伪静态有何作用?" target="_self">什么是伪静态？伪静态有何作用?</a></li><li class="list "><span class="time">2012-07-16</span><a href="http://cn.metcms.cn/news/shownews.php?lang=cn&amp;id=6" title="企业用网站进行网络宣传的优势" target="_self">企业用网站进行网络宣传的优势</a></li></ol></div>
	</div>
	<div class="index-conts style-2">
		<h3 style="border-top-left-radius: 5px; border-top-right-radius: 5px;" class="title myCorner" data-corner="top 5px">
			招贤纳士
			<a href="http://cn.metcms.cn/job/index.php?lang=cn" title="链接关键词" class="more">更多&gt;&gt;</a>
		</h3>
		<div style="height: 150px;" class="active clear listel contour-2"><ol class="list-none metlist"><li class="list top"><span class="time">2012-07-16</span><a href="http://cn.metcms.cn/job/showjob.php?lang=cn&amp;id=1" title="PHP技术支持" target="_self">PHP技术支持</a></li><li class="list "><span class="time">2012-07-16</span><a href="http://cn.metcms.cn/job/showjob.php?lang=cn&amp;id=2" title="网络销售" target="_self">网络销售</a></li><li class="list "><span class="time">2012-07-16</span><a href="http://cn.metcms.cn/job/showjob.php?lang=cn&amp;id=3" title="网页UI设计师" target="_self">网页UI设计师</a></li><li class="list "><span class="time">2012-07-16</span><a href="http://cn.metcms.cn/job/showjob.php?lang=cn&amp;id=4" title="Web前端开发人员" target="_self">Web前端开发人员</a></li><li class="list "><span class="time">2012-07-16</span><a href="http://cn.metcms.cn/job/showjob.php?lang=cn&amp;id=5" title="电子商务专员" target="_self">电子商务专员</a></li></ol></div>
	</div>
	<div class="clear p-line"></div>
	<div class="index-product style-2">
		<h3 style="border-top-left-radius: 5px; border-top-right-radius: 5px;" class="title myCorner" data-corner="top 5px">
			<span>产品展示</span>
		    <div class="flip">
				<p id="trigger"><a class="" target="_self" href="javascript:void(0);">1</a><a class="" target="_self" href="javascript:void(0);">2</a><a class="" target="_self" href="javascript:void(0);">3</a><a class="" target="_self" href="javascript:void(0);">4</a><a class="" target="_self" href="javascript:void(0);">5</a><a class="current" target="_self" href="javascript:void(0);">6</a><a class="" target="_self" href="javascript:void(0);">7</a><a class="" target="_self" href="javascript:void(0);">8</a></p>
		        <a class="prev" id="car_prev" href="javascript:void(0);"></a>
			    <a class="next" id="car_next" href="javascript:void(0);"></a>
			</div>
			<a href="http://cn.metcms.cn/product/product.php?lang=cn&amp;class1=3" title="链接关键词" class="more">更多&gt;&gt;</a>
		</h3>
		<div class="active clear">
			<div style="height: 157px;" class="profld" id="indexcar" data-listnum="5">
			<ol style="height: 157px; left: -960px;" class="list-none metlist"><li style="height: 157px; margin: 0px 15px; position: relative; left: 0px;" class="list"><a href="http://cn.metcms.cn/product/showproduct.php?lang=cn&amp;id=13" title="示例产品八" target="_self" class="img"><img src="%E7%BD%91%E7%AB%99%E5%85%B3%E9%94%AE%E8%AF%8D-%E7%BD%91%E7%AB%99%E5%90%8D%E7%A7%B0_files/1342405015.jpg" alt="示例产品八" title="示例产品八" height="130" width="160"></a><h3 style="width:160px;"><a href="http://cn.metcms.cn/product/showproduct.php?lang=cn&amp;id=13" title="示例产品八" target="_self">示例产品八</a></h3></li><li style="height: 157px; margin: 0px 15px; position: relative;" class="list"><a href="http://cn.metcms.cn/product/showproduct.php?lang=cn&amp;id=3" title="示例产品七" target="_self" class="img"><img src="%E7%BD%91%E7%AB%99%E5%85%B3%E9%94%AE%E8%AF%8D-%E7%BD%91%E7%AB%99%E5%90%8D%E7%A7%B0_files/1342404422.jpg" alt="示例产品七" title="示例产品七" height="130" width="160"></a><h3 style="width:160px;"><a href="http://cn.metcms.cn/product/showproduct.php?lang=cn&amp;id=3" title="示例产品七" target="_self">示例产品七</a></h3></li><li style="height: 157px; margin: 0px 15px; position: relative;" class="list"><a href="http://cn.metcms.cn/product/showproduct.php?lang=cn&amp;id=14" title="示例产品六" target="_self" class="img"><img src="%E7%BD%91%E7%AB%99%E5%85%B3%E9%94%AE%E8%AF%8D-%E7%BD%91%E7%AB%99%E5%90%8D%E7%A7%B0_files/1342404422.jpg" alt="示例产品六" title="示例产品六" height="130" width="160"></a><h3 style="width:160px;"><a href="http://cn.metcms.cn/product/showproduct.php?lang=cn&amp;id=14" title="示例产品六" target="_self">示例产品六</a></h3></li><li style="height: 157px; margin: 0px 15px; position: relative;" class="list"><a href="http://cn.metcms.cn/product/showproduct.php?lang=cn&amp;id=2" title="示例产品三" target="_self" class="img"><img src="%E7%BD%91%E7%AB%99%E5%85%B3%E9%94%AE%E8%AF%8D-%E7%BD%91%E7%AB%99%E5%90%8D%E7%A7%B0_files/1342404144.jpg" alt="示例产品三" title="示例产品三" height="130" width="160"></a><h3 style="width:160px;"><a href="http://cn.metcms.cn/product/showproduct.php?lang=cn&amp;id=2" title="示例产品三" target="_self">示例产品三</a></h3></li><li style="height: 157px; margin: 0px 15px; position: relative;" class="list"><a href="http://cn.metcms.cn/product/showproduct.php?lang=cn&amp;id=1" title="示例产品五" target="_self" class="img"><img src="%E7%BD%91%E7%AB%99%E5%85%B3%E9%94%AE%E8%AF%8D-%E7%BD%91%E7%AB%99%E5%90%8D%E7%A7%B0_files/1342360923.jpg" alt="示例产品五" title="示例产品五" height="130" width="160"></a><h3 style="width:160px;"><a href="http://cn.metcms.cn/product/showproduct.php?lang=cn&amp;id=1" title="示例产品五" target="_self">示例产品五</a></h3></li><li style="height: 157px; margin: 0px 15px; position: relative;" class="list"><a href="http://cn.metcms.cn/product/showproduct.php?lang=cn&amp;id=4" title="示例产品四" target="_self" class="img"><img src="%E7%BD%91%E7%AB%99%E5%85%B3%E9%94%AE%E8%AF%8D-%E7%BD%91%E7%AB%99%E5%90%8D%E7%A7%B0_files/1342405015.jpg" alt="示例产品四" title="示例产品四" height="130" width="160"></a><h3 style="width:160px;"><a href="http://cn.metcms.cn/product/showproduct.php?lang=cn&amp;id=4" title="示例产品四" target="_self">示例产品四</a></h3></li><li style="height: 157px; margin: 0px 15px; position: relative;" class="list"><a href="http://cn.metcms.cn/product/showproduct.php?lang=cn&amp;id=15" title="示例产品二" target="_self" class="img"><img src="%E7%BD%91%E7%AB%99%E5%85%B3%E9%94%AE%E8%AF%8D-%E7%BD%91%E7%AB%99%E5%90%8D%E7%A7%B0_files/1342404144.jpg" alt="示例产品二" title="示例产品二" height="130" width="160"></a><h3 style="width:160px;"><a href="http://cn.metcms.cn/product/showproduct.php?lang=cn&amp;id=15" title="示例产品二" target="_self">示例产品二</a></h3></li><li style="height: 157px; margin: 0px 15px; position: relative;" class="list"><a href="http://cn.metcms.cn/product/showproduct.php?lang=cn&amp;id=16" title="示例产品一" target="_self" class="img"><img src="%E7%BD%91%E7%AB%99%E5%85%B3%E9%94%AE%E8%AF%8D-%E7%BD%91%E7%AB%99%E5%90%8D%E7%A7%B0_files/1342360923.jpg" alt="示例产品一" title="示例产品一" height="130" width="160"></a><h3 style="width:160px;"><a href="http://cn.metcms.cn/product/showproduct.php?lang=cn&amp;id=16" title="示例产品一" target="_self">示例产品一</a></h3></li><li style="height: 157px; margin: 0px 15px; position: relative;" class="list clone"><a href="http://cn.metcms.cn/product/showproduct.php?lang=cn&amp;id=13" title="示例产品八" target="_self" class="img"><img src="%E7%BD%91%E7%AB%99%E5%85%B3%E9%94%AE%E8%AF%8D-%E7%BD%91%E7%AB%99%E5%90%8D%E7%A7%B0_files/1342405015.jpg" alt="示例产品八" title="示例产品八" height="130" width="160"></a><h3 style="width:160px;"><a href="http://cn.metcms.cn/product/showproduct.php?lang=cn&amp;id=13" title="示例产品八" target="_self">示例产品八</a></h3></li><li style="height: 157px; margin: 0px 15px; position: relative;" class="list clone"><a href="http://cn.metcms.cn/product/showproduct.php?lang=cn&amp;id=3" title="示例产品七" target="_self" class="img"><img src="%E7%BD%91%E7%AB%99%E5%85%B3%E9%94%AE%E8%AF%8D-%E7%BD%91%E7%AB%99%E5%90%8D%E7%A7%B0_files/1342404422.jpg" alt="示例产品七" title="示例产品七" height="130" width="160"></a><h3 style="width:160px;"><a href="http://cn.metcms.cn/product/showproduct.php?lang=cn&amp;id=3" title="示例产品七" target="_self">示例产品七</a></h3></li><li style="height: 157px; margin: 0px 15px; position: relative;" class="list clone"><a href="http://cn.metcms.cn/product/showproduct.php?lang=cn&amp;id=14" title="示例产品六" target="_self" class="img"><img src="%E7%BD%91%E7%AB%99%E5%85%B3%E9%94%AE%E8%AF%8D-%E7%BD%91%E7%AB%99%E5%90%8D%E7%A7%B0_files/1342404422.jpg" alt="示例产品六" title="示例产品六" height="130" width="160"></a><h3 style="width:160px;"><a href="http://cn.metcms.cn/product/showproduct.php?lang=cn&amp;id=14" title="示例产品六" target="_self">示例产品六</a></h3></li><li style="height: 157px; margin: 0px 15px; position: relative;" class="list clone"><a href="http://cn.metcms.cn/product/showproduct.php?lang=cn&amp;id=2" title="示例产品三" target="_self" class="img"><img src="%E7%BD%91%E7%AB%99%E5%85%B3%E9%94%AE%E8%AF%8D-%E7%BD%91%E7%AB%99%E5%90%8D%E7%A7%B0_files/1342404144.jpg" alt="示例产品三" title="示例产品三" height="130" width="160"></a><h3 style="width:160px;"><a href="http://cn.metcms.cn/product/showproduct.php?lang=cn&amp;id=2" title="示例产品三" target="_self">示例产品三</a></h3></li><li style="height: 157px; margin: 0px 15px; position: relative;" class="list clone"><a href="http://cn.metcms.cn/product/showproduct.php?lang=cn&amp;id=1" title="示例产品五" target="_self" class="img"><img src="%E7%BD%91%E7%AB%99%E5%85%B3%E9%94%AE%E8%AF%8D-%E7%BD%91%E7%AB%99%E5%90%8D%E7%A7%B0_files/1342360923.jpg" alt="示例产品五" title="示例产品五" height="130" width="160"></a><h3 style="width:160px;"><a href="http://cn.metcms.cn/product/showproduct.php?lang=cn&amp;id=1" title="示例产品五" target="_self">示例产品五</a></h3></li></ol>
			</div>
		</div>
	</div>

	<div class="clear"></div>
	<div class="index-links">
		<h3 class="title">
			友情链接
			<a href="http://cn.metcms.cn/link/index.php?lang=cn" title="链接关键词" class="more">更多&gt;&gt;</a>
		</h3>
		<div class="active clear">
			<div class="img"><ul class="list-none">
</ul>
</div>
			<div class="txt"><ul class="list-none">
<li><a href="http://www.metinfo.cn/" target="_blank" title="MetInfo企业网站管理系统">MetInfo</a></li>
<li><a href="http://www.metinfo.cn/" target="_blank" title="MetInfo企业网站管理系统">米拓信息</a></li>
</ul>
</div>
		</div>
		<div class="clear"></div>
	</div>

</div>

<footer>
	<div class="inner">
		<div class="foot-nav"><a href="http://cn.metcms.cn/news/news.php?lang=cn&amp;class2=4" title="公司动态">公司动态</a><span>|</span><a href="http://cn.metcms.cn/message/index.php?lang=cn" title="在线留言">在线留言</a><span>|</span><a href="http://cn.metcms.cn/feedback/index.php?lang=cn&amp;id=31" title="在线反馈">在线反馈</a><span>|</span><a href="http://cn.metcms.cn/link/index.php?lang=cn" title="友情链接">友情链接</a><span>|</span><a href="http://cn.metcms.cn/member/index.php?lang=cn" title="会员中心">会员中心</a><span>|</span><a href="http://cn.metcms.cn/search/index.php?lang=cn" title="站内搜索">站内搜索</a><span>|</span><a href="http://cn.metcms.cn/sitemap/index.php?lang=cn" title="网站地图">网站地图</a><span>|</span><a href="http://www.metcms.cn/demo/admin/" title="网站管理">网站管理</a></div>
		<div class="foot-text">
			<p>我的网站 版权所有 2008-2012 湘ICP备8888888 <script src="%E7%BD%91%E7%AB%99%E5%85%B3%E9%94%AE%E8%AF%8D-%E7%BD%91%E7%AB%99%E5%90%8D%E7%A7%B0_files/stat.php" language="JavaScript"></script><script src="%E7%BD%91%E7%AB%99%E5%85%B3%E9%94%AE%E8%AF%8D-%E7%BD%91%E7%AB%99%E5%90%8D%E7%A7%B0_files/core.php" charset="utf-8" type="text/javascript"></script><a href="http://www.cnzz.com/stat/website.php?web_id=1670348" target="_blank" title="站长统计">站长统计</a></p>
<p>电话：0731-12345678 12345678  QQ:88888888 999999  Email:metinfo@metinfo.cn</p>

<!--以下是版权信息，购买商业授权之后方可去除！-->
			<div class="powered_by_metinfo">
				Powered&nbsp;by&nbsp;<a href="http://www.metinfo.cn/" target="_blank" title="企业网站管理系统">MetInfo&nbsp;5.2.0</a>
				©2008-2014&nbsp;
				<a href="http://www.metinfo.cn/" target="_blank" title="企业网站建设">www.metinfo.cn</a>
			</div>
<!--版权信息结束-->
		</div>
	</div>
</footer>
<script src="%E7%BD%91%E7%AB%99%E5%85%B3%E9%94%AE%E8%AF%8D-%E7%BD%91%E7%AB%99%E5%90%8D%E7%A7%B0_files/fun.js" type="text/javascript"></script>
<script src="%E7%BD%91%E7%AB%99%E5%85%B3%E9%94%AE%E8%AF%8D-%E7%BD%91%E7%AB%99%E5%90%8D%E7%A7%B0_files/stat.html" type="text/javascript"></script>
<script src="%E7%BD%91%E7%AB%99%E5%85%B3%E9%94%AE%E8%AF%8D-%E7%BD%91%E7%AB%99%E5%90%8D%E7%A7%B0_files/online.js" type="text/javascript" id="metonlie_js"></script>

<div id="onlinebox" class="onlinebox onlinebox_1 onlinebox_1_4" style="position: fixed; top: 110px; left: 1315px;"><div class="onlinebox-showbox"><span>在<br>线<br>交<br>流<br></span></div><div class="onlinebox-conbox" style="display:none;">		<div class="onlinebox-top" title="点击可隐藏"><a href="javascript:;" onclick="return onlineclose();" class="onlinebox-close" title="关闭"></a><span>在线交流</span>		</div>		<div class="onlinebox-center">			<div class="onlinebox-center-box"><dl><dt>咨询销售</dt><dd><a href="tencent://message/?uin=2736253951&amp;Site=&amp;Menu=yes" title="QQ咨询销售"><img src="%E7%BD%91%E7%AB%99%E5%85%B3%E9%94%AE%E8%AF%8D-%E7%BD%91%E7%AB%99%E5%90%8D%E7%A7%B0_files/pa_002.gif" border="0"></a></dd></dl><div class="clear"></div><dl><dt>咨询销售</dt><dd><a href="tencent://message/?uin=1945054372&amp;Site=&amp;Menu=yes" title="QQ咨询销售"><img src="%E7%BD%91%E7%AB%99%E5%85%B3%E9%94%AE%E8%AF%8D-%E7%BD%91%E7%AB%99%E5%90%8D%E7%A7%B0_files/pa_003.gif" border="0"></a></dd></dl><div class="clear"></div><dl><dt>空间域名</dt><dd><a href="tencent://message/?uin=2692979334&amp;Site=&amp;Menu=yes" title="QQ空间域名"><img src="%E7%BD%91%E7%AB%99%E5%85%B3%E9%94%AE%E8%AF%8D-%E7%BD%91%E7%AB%99%E5%90%8D%E7%A7%B0_files/pa.gif" border="0"></a></dd></dl><div class="clear"></div><dl><dt></dt><dd></dd></dl><div class="clear"></div>			</div>		</div>		<div class="onlinebox-bottom">			<div class="onlinebox-bottom-box"><div class="online-tbox"><p>
	界面风格-在线交流设置</p>
			</div></div>		</div><div class="onlinebox-bottom-bg"></div></div></div></body></html>