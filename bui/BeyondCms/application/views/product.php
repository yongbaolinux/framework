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
                <li><a href="product.php" class="current">产品展示</a></li>
                <li><a href="index.php">客户案例</a></li>
                <li><a href="index.php">新闻资讯</a></li>
                <li><a href="index.php">加入我们</a></li>
                <li><a href="index.php">关于我们</a></li>
            </ul>
          </div>
        </div>
		<!-- banner条广告 -->
        <div id="advertisement">
        	<img src="images/images/banner广告.png" />
        </div>
        <!-- 产品分类 -->
        <div id="product-cate">
        	<div id="product-cate-head" class="clearfix">
            	<div id="product-cate-title" class="left">产品分类</div>
                <div id="product-cate-path"><span><a href="index.php">首页</a></span><span class="separator">></span><span><a href="product.php">产品中心</a></span><span class="separator">></span><span>大型挖掘机</span></div>
            </div>
            <div id="product-cate-body">
            	<ul class="clearfix">
                	<li><a href="#">小型挖掘机</a>
                		<ul>
                        	<li><a href="#">小型I</a></li>
                            <li><a href="#">小型II</a></li>
                            <li><a href="#">小型III</a></li>
                        </ul>
                	</li>
                	<li><a href="#">中型挖掘机</a></li>
                    <li><a href="#" class="current-cate">大型挖掘机</a></li>
                </ul>
            </div>
        </div>
        <!-- 产品展示列表 -->
        <div id="product-shows">
        	<h3>产品展示</h3>
            <div id="product-show" class="clearfix">
            	<ul>
                	<li><div><img src="images/images/product.png" /></div><span>产品一</span></li>
                    <li><div><img src="images/images/product.png" /></div><span>产品二</span></li>
                    <li><div><img src="images/images/product.png" /></div><span>产品三</span></li>
                    <li><div><img src="images/images/product.png" /></div><span>产品四</span></li>
                    <li><div><img src="images/images/product.png" /></div><span>产品五</span></li>
                    <li><div><img src="images/images/product.png" /></div><span>产品六</span></li>
                </ul>
            </div>
        </div>
        <!-- 产品展示分页 -->
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
<script type="text/javascript" src="js/jquery-1.6.4.min.js"></script>
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