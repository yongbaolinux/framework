<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="StyleSheet" href="styles/index.css" />
</head>

<body>
	<div class="container" id="wrap">
    	<div id="header">
          <div id="logo-tools">
          	<a href="http://www.diskroom.com" id="logo"><img src="images/logo.png"/><span id="name">XXX有限公司</span>
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
                <li><a href="product.php">产品展示</a></li>
                <li><a href="index.php">客户案例</a></li>
                <li><a href="index.php" class="current">新闻资讯</a></li>
                <li><a href="index.php">加入我们</a></li>
                <li><a href="index.php">关于我们</a></li>
            </ul>
          </div>
        </div>
		<!-- banner条广告 -->
        <div id="advertisement">
        	<img src="images/images/banner广告.png" />
        </div>
        <!-- 资讯分类 -->
        <div id="articles-cate">
        	<div id="articles-cate-head" class="clearfix">
            	<div id="articles-cate-title" class="left">资讯分类</div>
                <div id="articles-cate-path"><span><a href="index.php">首页</a></span><span class="separator">></span><span><a href="product.php">新闻资讯</a></span><span class="separator">></span><span>行业动态</span></div>
            </div>
            <div id="articles-cate-body">
            	<ul class="clearfix">
                	<li><a href="#">公司新闻</a>
                		<ul>
                        	<li><a href="#">总部新闻</a></li>
                            <li><a href="#">分部新闻</a></li>
                            <li><a href="#">海外新闻</a></li>
                        </ul>
                	</li>
                	<li><a href="#" class="current-cate">行业动态</a></li>
                    <li><a href="#">技术文章</a></li>
                </ul>
            </div>
        </div>
        <!-- 文章列表 -->
        <div id="articles-lists">
        	<h3>文章列表</h3>
            <div id="articles-list" class="clearfix">
            	<ul>
                	<li class="clearfix"><span class="left"><a href="#">第一条新闻资讯第一条新闻资讯第一条新闻资讯第一条新闻资讯</a></span><span class="right">2014-07-31</span></li>
                    <li class="clearfix"><span class="left"><a href="#">第一条新闻资讯第一条新闻资讯第一条新闻资讯第一条新闻资讯</a></span><span class="right">2014-07-31</span></li>
                    <li class="clearfix"><span class="left"><a href="#">第一条新闻资讯第一条新闻资讯第一条新闻资讯第一条新闻资讯</a></span><span class="right">2014-07-31</span></li>
                    <li class="clearfix"><span class="left"><a href="#">第一条新闻资讯第一条新闻资讯第一条新闻资讯第一条新闻资讯</a></span><span class="right">2014-07-31</span></li>
                    <li class="clearfix"><span class="left"><a href="#">第一条新闻资讯第一条新闻资讯第一条新闻资讯第一条新闻资讯</a></span><span class="right">2014-07-31</span></li>
                    <li class="clearfix"><span class="left"><a href="#">第一条新闻资讯第一条新闻资讯第一条新闻资讯第一条新闻资讯</a></span><span class="right">2014-07-31</span></li>
                </ul>
            </div>
        </div>
        <!-- 产品展示分页 -->
        <div id="articles-page">
        	首页 前一页 1 2 3 4 5 后一页 末页
        </div>
        <!-- footer -->
        <div id="footer">
        	<div><span id="copyright">@xx有限公司版权所有</span><span id="support">Diskroom提供技术支持</span></div>
            <div><span id="icp">备案号：湘xxxxxxx号</span></div>
        </div>
    </div>
</body>
<script type="text/javascript" src="js/jquery-1.6.4.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#articles-cate #articles-cate-body a").mouseenter(function(){
			$(this).nextAll("ul").show();
		}).mouseout(function(){
			$(this).nextAll("ul").hide();
		});
		$("#articles-cate #articles-cate-body ul ul").mouseenter(function(){
			$(this).show().prevAll("a").css({color:"#ffffff",backgroundColor:"#bbaa90"});
		}).mouseleave(function(){
			$(this).hide().prevAll("a").css({color:"#8a8a8a",backgroundColor:"transparent"});
		});
	});
	
</script>
</html>