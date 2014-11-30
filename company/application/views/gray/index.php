<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8" />
	<title><?php echo $cfg['configSiteName']; ?>-产品展示-<?php echo $cfg['configSiteKey']; ?>-</title>
    <meta name="robots" content="index, follow" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
<meta name="author" content="" />

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    

	<!-- CSS
  ================================================== -->
  	<link href='http://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/css/skeleton.css" />
    <link rel="stylesheet" href="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/css/style.css" />
    <link rel="stylesheet" href="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/css/inner.css" />
<!-- jQuery Flexslider 网站配置开启首页焦点轮播图时才加载flexslider插件-->
<?php if($cfg['configSiteIndexPicSlider']) { ?>
    <link rel="stylesheet" href="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/css/flexslider.css" />
<?php } ?>
    <link rel="stylesheet" href="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/css/color.css" />
    <link rel="stylesheet" href="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/css/layout.css" />
    <link rel="stylesheet" href="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/css/prettyPhoto.css"  media="screen" />
    

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/images/favicon.ico" />
	<link rel="apple-touch-icon" href="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/images/apple-touch-icon.png" />
	<link rel="apple-touch-icon" sizes="72x72" href="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/images/apple-touch-icon-72x72.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/images/apple-touch-icon-114x114.png" />
    
    
</head>


<body>
<div id="wrapper">
<div id="bodychild">
	<div id="outercontainer">
    
        <!-- HEADER -->
        <div id="outerheader">
        	<div class="container">
            <header id="top" class="twelve columns">
            	<div id="logo"  class="five columns alpha"><a href="javascript:void(0)"><img src="<?=$cfg['configSiteLogo']?>" alt=""/></a></div>
                <div id="topright" class="seven columns omega">
                    <ul id="sn">

                        <li><a href="http://twitter.com" title="Twitter"><span class="icon-img" style="background:url(<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/images/social/twitter.png)"></span></a></li>
                        <li><a href="http://facebook.com" title="Facebook"><span class="icon-img" style="background:url(<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/images/social/fb.png)"></span></a></li>
                        <li><a href="https://plus.google.com" title="Google+"><span class="icon-img" style="background:url(<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/images/social/googleplus.png)"></span></a></li>
                        <li><a href="http://rss.com" title="RSS"><span class="icon-img" style="background:url(<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/images/social/rss.png)"></span></a></li>
                        <li><a href="http://pinterest.com" title="Pinterest"><span class="icon-img" style="background:url(<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/images/social/pinterest.png)"></span></a></li>
                        
                    </ul> 
                </div>
		<!-- 子菜单的缩放由style.css里的300-319行的CSS决定-->
                <section id="navigation">
                    <nav id="nav-wrap">
                        <ul id="topnav" class="sf-menu">
                            <li class="current first"><a href="<?=base_url();?>index.php"><span>首页</span></a></li>
                            <?=$menus1?>
                        </ul>
                    </nav><!-- nav -->	
                    <div class="clear"></div>
                </section>
                <div class="clear"></div>
            </header>
            </div>
        </div>
        <!-- END HEADER -->
        
        <!-- SLIDER -->
        <div id="outerslider">
        	<div class="container">
        	<div id="slidercontainer" class="twelve columns">
            
            	<section id="slider">
                    <div id="slideritems" class="flexslider">
                        <ul class="slides">
			  <?php if(is_array($indexPicSlider) && count($indexPicSlider) > 0 ){
						foreach($indexPicSlider as $key=>$value){
			   ?>
			   <li>
                            	<span class="frameslider"></span>
                                <img src="<?=$value['adv_img_path']?>" alt="" />
                                <div class="flex-caption">
                                    <h1><?=$value['adv_title']?></h1>
                                    <p><?=$value['adv_content']?>.</p>
                                </div>
                            </li>
			  <?php }} ?>
                        </ul>
                    </div>
                    
                </section>
                
            </div>
            </div>
        </div>
        <!-- END SLIDER -->
        
        <!-- BEFORE CONTENT -->
        <div id="outerbeforecontent">
            <div class="container">
                <div id="beforecontent" class="twelve columns pattern3">
                    <div id="pagetitle-container">
                    	<h1 class="pagetitle">因为专注 &amp; 所以自信</h1>
                        <p class="pagedesc">专注于PHP的开发和良好的用户体验.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- END BEFORE CONTENT -->
        
        <!-- MAIN CONTENT -->
        <div id="outermain" class="homepage">
        	<div class="container">
        	<section id="maincontent" class="twelve columns">
				<ul class="services">
                	<li>
                    	<a href="#">
                    	<h2 class="icon-img">创意</h2>
                        <span class="icon-img" style="background:url(<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/images/icons/icon5.png) no-repeat"></span>
                        </a>
                        <p>创意的设计融入生活</p>
                    </li>
                    <li>
                    	<a href="#">
                    	<h2>专注</h2>
                        <span class="icon-img" style="background:url(<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/images/icons/icon6.png) no-repeat"></span>
                        </a>
                        <p>技术源自专一 态度来自专注</p>
                    </li>
                    <li>
                    	<a href="#">
                    	<h2>用户体验</h2>
                        <span class="icon-img" style="background:url(<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/images/icons/icon7.png) no-repeat"></span>
                        </a>
                        <p>良好的用户体验是一切美好的开始</p>
                    </li>
                    <li class="nopadding">
                    	<a href="#">
                    	<h2>新颖</h2>
                        <span class="icon-img" style="background:url(<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/images/icons/icon8.png) no-repeat"></span>
                        </a>
                        <p>极具视觉冲击力 迎来美好一天</p>
                    </li>
                </ul>
                <div class="separator line"></div>
                 
                <article class="ten columns textCenter center">
                    <h2 class="margin_bottom_small">我们是</h2>
                    <p>一个年轻的团队 但我们有野心和壮志 我们坚信 人是为了改变世界而来</p>
                </article>
				<div class="clear margin_bottom_small">&nbsp;</div>
                
                <div class="six columns firstcols">
                	<img src="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/images/icons/icon1.png" alt="" class="alignleft" />
                    <div class="indentleft">
                	<h2>最新动态</h2>
                    	<ul>
                    		<li>PHP 5.6.0alpha3/5.4.26 发布</li>
                    		<li>PHPUnit 4.0.0 发布，PHP 单元测试框架</li>
                    		<li>Facebook重写PHP runtime？ </li>
                    	</ul>
                    <a href="<?=base_url()?>index.php?c=module&m=show&mid=2">更多 &rarr;</a>
                    </div>
                </div>
                <div class="six columns lastcols">
                    <img src="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/images/icons/icon2.png" alt="" class="alignleft" />
                    <div class="indentleft">
                			<h2>业界资讯</h2>
												<ul>
													<li><a href="" target="_blank">七款调试工具推荐：iOS 开发必备的调试利器</a></li>
													<li><a href="" target="_blank">微软开始为厂商提供 SQL Server 2014 OTM</a></li>
													<li><a href="" target="_blank">Android 发布可穿戴设备 SDK 的开发者预览版</a></li>
												</ul>
                    	<a href="<?=base_url()?>index.php?c=module&m=show&mid=3">更多 &rarr;</a>
                    </div>
                </div>
                <div class="separator"></div>
                <div class="six columns firstcols">
                	<img src="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/images/icons/icon3.png" alt="" class="alignleft" />
                	<div class="indentleft">
                    		<h2>Diskroom?</h2>
                    	<p class="indentleft" style="padding:0 0 10px 0;">Diskroom是基于PHP5+MYSQL数据库技术，专为中小型企业量身定做的展示CMS系统.</p>
                    	<a href="">更多 &rarr;</a>
                    </div>
                </div>
                <div class="six columns lastcols">
                	<img src="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/images/icons/icon4.png" alt="" class="alignleft" />
                    <div class="indentleft">
                			<h2>联系我们</h2>
                    	<p class="indentleft">邮箱 : yongbaolinux@gmail.com</p>
                    	<p class="indentleft">QQ : 304513573</p>
                    </div>
                </div>
                <div class="separator small"></div>
                <div class="separator line"></div>
                 
                <article class="ten columns textCenter center">
                    <h2 class="margin_bottom_small">开源工具</h2>
                    <p></p>
                </article>
              	<div class="clear margin_bottom_small"></div>

				<ul id="ts-display" class="ts-display-pf-col-4">
                    <li>
                            <div class="ts-display-pf-img">
                                <div class="rollover">
                                	<a href="http://www.codeigniter.org.cn" class="link" target="_blank">Link</a>
                                    <a href="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/images/content/pf/pf4_1.jpg" data-rel="prettyPhoto[mixed]" class="image">Zoom</a>
                                </div>
                                <img src="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/images/content/pf/pf4_1.jpg" alt=""/>					
                            </div>
                            <div class="ts-display-pf-text">
                                <h2><a href="http://www.codeigniter.org.cn" target="_blank">CI框架</a></h2>
                                <span>CodeIgniter 是一个小巧但功能强大的 PHP 框架.</span>
                            </div>
                            <div class="ts-display-clear"></div>
                        </li>
                        <li>
                            <div class="ts-display-pf-img">
                            	<div class="rollover">
                                	<a href="http://www.php.net" class="link" target="_blank">Link</a>
                                    <a href="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/images/content/pf/pf4_2.jpg" data-rel="prettyPhoto[mixed]" class="image">Zoom</a>
                                </div>
                                <img src="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/images/content/pf/pf4_2.jpg" alt=""/>					
                            </div>
                            <div class="ts-display-pf-text">
                                <h2><a href="#">PHP</a></h2>
                                 <span>PHP是一种通用开源脚本语言.入门门槛较低，易于学习，使用广泛.</span>
                            </div>
                            <div class="ts-display-clear"></div>
                        </li>

                        <li>
                            <div class="ts-display-pf-img">
                            	<div class="rollover">
                                	<a href="http://www.mysql.com" class="link" target="_blank">Link</a>
                                    <a href="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/images/content/pf/pf4_3.jpg" data-rel="prettyPhoto[mixed]" class="image">Zoom</a>
                                </div>
                                <img src="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/images/content/pf/pf4_3.jpg" alt=""/>							
                            </div>
                            <div class="ts-display-pf-text">
                                <h2><a href="#">Mysql</a></h2>
                                <span>中小型企业数据库方案的最佳选择. </span>
                            </div>
                            <div class="ts-display-clear"></div>
                        </li>

                        <li>
                            <div class="ts-display-pf-img">
                            	<div class="rollover">
                                	<a href="http://www.apache.org" class="link" target="_blank">Link</a>
                                    <a href="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/images/content/pf/pf4_4.jpg" data-rel="prettyPhoto[mixed]" class="image">Zoom</a>
                                </div>
                                <img src="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/images/content/pf/pf4_4.jpg" alt=""/>						
                            </div>
                            <div class="ts-display-pf-text">
                                <h2><a href="#">Apache</a></h2>
                                <span>世界排名第一的Web服务器软件.</span>
                            </div>
                            <div class="ts-display-clear"></div>
                        </li>
                </ul>
                
                <div class="clear"></div><!-- clear float --> 
            </section>
            </div>
        </div>
        <!-- END MAIN CONTENT -->
        
        <!-- FOOTER -->
        <div id="outerfooter">
        	<div class="container">
        	<div id="footercontainer" class="twelve columns">
            	<footer id="footer">Copyright &copy;2014. Power by <a href="http://www.diskroom.net" target="_blank">diskroom.net</a></footer>
            </div>
            </div>
        </div>
        <!-- END FOOTER -->
        
	</div><!-- end outercontainer -->
</div><!-- end bodychild -->
</div><!-- end wrapper -->

<!-- ////////////////////////////////// -->
<!-- //      Javascript Files        // -->
<!-- ////////////////////////////////// -->
<script type="text/javascript" src="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/js/jquery-1.6.4.min.js"></script>

<!-- jQuery Superfish -->
<script type="text/javascript" src="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/js/hoverIntent.js"></script> 
<script type="text/javascript" src="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/js/superfish.js"></script> 
<script type="text/javascript" src="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/js/supersubs.js"></script>



<!-- jQuery PrettyPhoto -->
<script type="text/javascript" src="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/js/fade.js"></script>
<script type="text/javascript" src="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/js/jquery-easing-1.3.js"></script>

<!-- jQuery Dropdown Mobile -->
<script type="text/javascript" src="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/js/tinynav.min.js"></script>

<!-- Custom Script -->
<script type="text/javascript" src="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/js/custom.js"></script>

<!-- jQuery Flexslider 网站配置开启首页焦点轮播图时才加载flexslider插件-->
<?php if($cfg['configSiteIndexPicSlider']) { ?>

<script type="text/javascript" src="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/js/jquery.flexslider-min.js"></script>
<script type="text/javascript">
    jQuery('.flexslider').flexslider({
		animation: "slide",              //String: Select your animation type, "fade" or "slide"
		  directionNav: true, //Boolean: Create navigation for previous/next navigation? (true/false)
		  controlNav: true,  //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
        });
</script>	
<?php } ?>
</body>
</html>
