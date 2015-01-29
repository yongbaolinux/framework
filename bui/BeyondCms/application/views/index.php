<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="StyleSheet" href="<?=$PUBLIC?>/css/index.css" />
</head>

<body>
	<div class="container" id="wrap">
    	<div id="header">
          <div id="logo-tools">
          	<a href="/" id="logo"><img width="145" height="50" src="<?=$CONFIGS['config_logo']?>"/><span id="name"><?=$CONFIGS['config_company_name']?></span>
            </a>
            
            <ul id="tools">
            	<li><a href="javascript:void(0);">WAP站</a> | <a href="javascript:void(0);">英文版</a> | <a href="javascript:void(0);">加为收藏</a></li>
                <li>QQ : <?=$CONFIGS['config_qq']?></li>
            </ul>
          </div>
          <!-- 导航菜单 -->
          <div id="menu">
          	
          	<ul>
            	<li><a href="index.php" class="current">首页</a></li>
                <li><a href="product.php">产品展示</a></li>
                <li><a href="index.php">客户案例</a></li>
                <li><a href="index.php">新闻资讯</a></li>
                <li><a href="index.php">加入我们</a></li>
                <li><a href="index.php">关于我们</a></li>
            </ul>
          </div>
        </div>
        <!-- 图片轮播 -->
        <div id="pic-slider">
        	<img src="<?=$PUBLIC?>/images/images/pic-slider-pic.png" />
        </div>
        <!-- 公司简介与联系我们 -->
        <div id="introduction-contact" class="left">
        	<div id="introduction" class="left">
            	<!-- 圆角插件 -->
            	<h3>公司简介</h3>
                <div id="intro" class="left">
                	<div class="left" id="pic-company">
                    	<img src="<?=$PUBLIC?>/images/images/pic-company_03.png"/>
                    </div>
                    <p><?=mb_substr($CONFIGS['config_company_info'],0,100)?><a href="#">全部简介 ></a></p>
                </div>
            </div>
            <div id="contact" class="right">
            	<h3>联系我们</h3>
                <div id="us">
                	<ul>
                    	<li>企业QQ : <?=$CONFIGS['config_company_qq']?></li>
                        <li>固话 : <?=$CONFIGS['config_company_phone']?></li>
                        <li>传真 : <?=$CONFIGS['config_company_fax']?></li>
                        <li>地址 : <?=$CONFIGS['config_company_address']?></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- 产品展示 -->
        <div id="product">
        	<h3><span class="left">产品展示</span><a href="#" class="right">全部产品 > </a></h3>
            <div id="product-list">
            	<ul>
                	<li><a href="#"><img src="<?=$PUBLIC?>/images/images/企业站首页_03.png" /></a></li><li><a href="#"><img src="<?=$PUBLIC?>/images/images/企业站首页_05.png" /></a></li><li><a href="#"><img src="<?=$PUBLIC?>/images/images/企业站首页_07.png" /></a></li><li><a href="#"><img src="<?=$PUBLIC?>/images/images/企业站首页_09.png" /></a></li><li><a href="#"><img src="<?=$PUBLIC?>/images/images/企业站首页_11.png" /></a></li>
                </ul>
            </div>
        </div>
        <!-- 新闻资讯 -->
        <div id="news">
        	<h3><span class="left">新闻资讯</span><a href="#" class="right">全部文章 > </a></h3>
            <div id="news-list">
            	<ul class="left" id="left-block">
                	<li class="clearfix"><span class="left"><a href="#">第一条资讯第一条资讯</a></span><span class="right">2014-07-23</span></li>
                    <li class="clearfix"><span class="left"><a href="#">第二条资讯第二条资讯</a></span><span class="right">2014-07-23</span></li>
                    <li class="clearfix"><span class="left"><a href="#">第三条资讯第三条资讯</a></span><span class="right">2014-07-23</span></li>
                    <li class="clearfix"><span class="left"><a href="#">第四条资讯第四条资讯</a></span><span class="right">2014-07-23</span></li>
                    <li class="clearfix"><span class="left"><a href="#">第五条资讯第五条资讯</a></span><span class="right">2014-07-23</span></li>
                </ul>
                <ul class="right" id="right-block">
                	<li class="clearfix"><span class="left"><a href="#">第一条资讯第一条资讯</a></span><span class="right">2014-07-23</span></li>
                    <li class="clearfix"><span class="left"><a href="#">第二条资讯第二条资讯</a></span><span class="right">2014-07-23</span></li>
                    <li class="clearfix"><span class="left"><a href="#">第三条资讯第三条资讯</a></span><span class="right">2014-07-23</span></li>
                    <li class="clearfix"><span class="left"><a href="#">第四条资讯第四条资讯</a></span><span class="right">2014-07-23</span></li>
                    <li class="clearfix"><span class="left"><a href="#">第五条资讯第五条资讯</a></span><span class="right">2014-07-23</span></li>
                </ul>
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