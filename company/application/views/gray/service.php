<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8" />
	<title><?php echo $cfg['configSiteName']; ?>-产品展示-<?php echo $cfg['configSiteKey']; ?></title>
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
    <link rel="stylesheet" href="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/css/color.css" />
    <link rel="stylesheet" href="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/css/layout.css" />
    

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
            	<div id="logo"  class="five columns alpha"><a href="index.html"><img src="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/images/logo.png" alt=""/></a></div>                
                <div id="topright" class="seven columns omega">
                    <ul id="sn">
                        <li><a href="http://twitter.com" title="Twitter"><span class="icon-img" style="background:url(<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/images/social/twitter.png)"></span></a></li>
                        <li><a href="http://facebook.com" title="Facebook"><span class="icon-img" style="background:url(<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/images/social/fb.png)"></span></a></li>
                        <li><a href="https://plus.google.com" title="Google+"><span class="icon-img" style="background:url(<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/images/social/googleplus.png)"></span></a></li>
                        <li><a href="http://rss.com" title="RSS"><span class="icon-img" style="background:url(<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/images/social/rss.png)"></span></a></li>
                        <li><a href="http://pinterest.com" title="Pinterest"><span class="icon-img" style="background:url(<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/images/social/pinterest.png)"></span></a></li>
                    </ul> 
                </div>
                <section id="navigation">
                    <nav id="nav-wrap">
                        <ul id="topnav" class="sf-menu">
                            <li class="current first"><a href="<?=base_url();?>index.php"><span>首页</span></a></li>
                            <?=$menus1?>
                        </ul><!-- topnav -->
                    </nav><!-- nav -->	
                    <div class="clear"></div>
                </section>
                <div class="clear"></div>
            </header>
            </div>
        </div>
        <!-- END HEADER -->
        
        <!-- AFTER HEADER -->
        <div id="outerbeforecontent">
            <div class="container">
                <div id="beforecontent" class="twelve columns pattern3">
                    <div id="pagetitle-container">
                    	<h1 class="pagetitle"></h1>
                        <span class="pagedesc">Diskroom现在是企业CMS解决方案 将来会成为开源产品</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- END AFTER HEADER -->
        
        <!-- MAIN CONTENT -->
        <div id="outermain">
        	<div class="container">
        	<section id="maincontent" class="twelve columns">
            
                <h2 class="margin_bottom_middle"></h2>
                <p></p>
                
                <div class="four columns alpha">
                    <h2 class="titleSection margin_bottom_middle">努力</h2>
                    <p>多年前曾寻觅一款同等产品 未果 今天 梦想终将实现.</p>
                </div>
                <div class="four columns">
                    <h2 class="titleSection margin_bottom_middle"></h2>
                    <p></p>
                </div>
                <div class="four columns omega">
                    <h2 class="titleSection margin_bottom_middle">设计流程</h2>
                    <ul class="checklist">
                    	<li>客户对效果图满意</li>
                        <li>交付预付款</li>
                        <li>开发</li>
                        <li>客户验收</li>
                        <li>结款</li>
                    </ul>
                </div>
                
                <div class="separator line"></div>
                
                <h2></h2>
				<ul id="ts-display" class="ts-display-pf-col-4">
                    <li>
                        <div class="ts-display-pf-img">
                            <img src="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/images/content/pf/pf4_7.jpg" alt="" class="aligncenter"/>
                        </div>
                        <h4>有力技术支持</h4>
                    </li>
                    <li>
                        <div class="ts-display-pf-img">
                            <img src="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/images/content/pf/pf4_9.jpg" alt="" class="aligncenter"/>					
                        </div>
             			<h4>自定义风格</h4>
                    </li>
                    <li>
                        <div class="ts-display-pf-img">
                            <img src="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/images/content/pf/pf4_6.jpg" alt="" class="aligncenter"/>					
                        </div>
          				<h4>谷歌/百度地图</h4>
                    </li>
                    <li>
                        <div class="ts-display-pf-img">
                            <img src="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/images/content/pf/pf4_12.jpg" alt="" class="aligncenter"/>						
                        </div>
                        <h4>多模板自由切换</h4>
                    </li>
                </ul>
                
                 <div class="separator line"></div>
                 
                 <!--<div class="six columns alpha">
                 	<img src="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/images/icons/icon9.png" alt="" class="alignleft" />
                 	<div class="indentleft">
                    <h3>Slider Manager</h3>
                    <p>Nullam accumsan mattis purus, quis elementum metus feugiat at.<br/> Fusce ut mi est, id lobortis lacus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
                    </div>
                 </div>
                 <div class="six columns omega">
                 	<img src="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/images/icons/icon10.png" alt="" class="alignleft" />
                 	<div class="indentleft">
                    <h3>Custom Post Types</h3>
                    <p>Nullam accumsan mattis purus, quis elementum metus feugiat at.<br/> Fusce ut mi est, id lobortis lacus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
                    </div>
                 </div>
                 
                 <div class="separator small"></div>
                 
                 <div class="six columns alpha">
                 	<img src="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/images/icons/icon11.png" alt="" class="alignleft" />
                 	<div class="indentleft">
                    <h3>New Slider Builder</h3>
                    <p>Nullam accumsan mattis purus, quis elementum metus feugiat at.<br/> Fusce ut mi est, id lobortis lacus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
                    </div>
                 </div>
                 <div class="six columns omega">
                 	<img src="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/images/icons/icon12.png" alt="" class="alignleft" />
                 	<div class="indentleft">
                    <h3>Element Color</h3>
                    <p>Nullam accumsan mattis purus, quis elementum metus feugiat at.<br/> Fusce ut mi est, id lobortis lacus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
                    </div>
                 </div>-->
                
                
                <div class="clear"></div><!-- clear float --> 
            </section>
            </div>
        </div>
        <!-- END MAIN CONTENT -->
        
        <!-- FOOTER -->
        <div id="outerfooter">
        	<div class="container">
        	<div id="footercontainer" class="twelve columns">
            	<footer id="footer">Copyright &copy;2014. Power by <a href="http://www.diskroom.net">diskroom.net</a></footer>
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

<!-- jQuery Dropdown Mobile -->
<script type="text/javascript" src="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/js/tinynav.min.js"></script>

<!-- Custom Script -->
<script type="text/javascript" src="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/js/custom.js"></script>
</body>
</html>
