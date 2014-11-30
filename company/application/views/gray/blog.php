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
        
        
        <!-- BEFORE CONTENT -->
        <div id="outerbeforecontent">
            <div class="container">
                <div id="beforecontent" class="twelve columns pattern3">
                    <div id="pagetitle-container">
                    	<h1 class="pagetitle">Our Upcomming News</h1>
                        <span class="pagedesc">This can be your tagline or something. You can edit, remove form option page</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- END BEFORE CONTENT -->
      
        
        <!-- MAIN CONTENT -->
        <div id="outermain">
        	<div class="container">
        	<section id="maincontent" class="twelve columns">
            
            	<section id="content" class="positionleft eight columns alpha"> 
                
                        <article class="post">
                            <div class="postimg">
                            	<span class="frame">
                                <img src="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/images/content/post3.jpg" alt="" class="scale-with-grid" />
                                </span>
                            </div>
                            
                            <div class="entry-utility2">
                                <div class="entry-date">
                                  <span class="postmonth">Sept</span>
                                  <span class="postdate">04</span>
                                  <span class="postyear">2012</span>
                                </div>
                                <div class="entry-comment">
                                	<a href="single.html">
                                        <span class="postcomm">0</span>
                                        <span class="postcommtext">Comments</span>
                                    </a>
                                </div>
                            </div>
                            
                            <div class="entry-text">
                               <h2 class="posttitle"><a href="single.html">Suspendisse convallis posuere turpis.</a></h2>
                               
                               <div class="entry-content">
                               <p>Donec tristique nunc ut felis tincidunt non ultrices mauris scelerisque. Vivamus orci nisl, tempus eget scelerisque non, mattis sed mi. Nulla aliquam diam quis arcu pretium ut elementum arcu pretium. Quisque enim augue, mattis eget feugiat nec, posuere id purus. Sed sodales nisi id enim vestibulum non ornare quam vulputate...</p>
                               <a href="single.html">Continue reading &rarr;</a>
                              </div>
                              
                            </div>
                            <div class="entry-utility">
                                <div class="user">Posted by <a href="#">Tsdemo</a></div> <div class="tag"> Tag in <a href="#">Photography</a>, <a href="#">html</a> </div>
                                <div class="like"><a href="#">10 Likes</a></div>
                                <div class="clear"></div>  
                            </div> 
                            <div class="clear"></div>    
                        </article>
                        
                        <article class="post">
                            <div class="postimg">
                            	<span class="frame">
                                <img src="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/images/content/post2.jpg" alt="" class="scale-with-grid" />
                                </span>
                            </div>
                            
                            <div class="entry-utility2">
                                <div class="entry-date">
                                  <span class="postmonth">Sept</span>
                                  <span class="postdate">02</span>
                                  <span class="postyear">2012</span>
                                </div>
                                <div class="entry-comment">
                                	<a href="single.html">
                                        <span class="postcomm">0</span>
                                        <span class="postcommtext">Comments</span>
                                    </a>
                                </div>
                            </div>
                            
                            <div class="entry-text">
                               <h2 class="posttitle"><a href="single.html">Nulla vestibulum luctus dui, vitae faucibus.</a></h2>
                               
                               <div class="entry-content">
                               <p>Donec tristique nunc ut felis tincidunt non ultrices mauris scelerisque. Vivamus orci nisl, tempus eget scelerisque non, mattis sed mi. Nulla aliquam diam quis arcu pretium ut elementum arcu pretium. Quisque enim augue, mattis eget feugiat nec, posuere id purus. Sed sodales nisi id enim vestibulum non ornare quam vulputate...</p>
                               <a href="single.html">Continue reading &rarr;</a>
                              </div>
                            </div> 
                            
                            <div class="entry-utility">
                                <div class="user">Posted by <a href="#">Tsdemo</a></div> <div class="tag"> Tag in <a href="#">Photography</a>, <a href="#">html</a> </div>
                                <div class="like"><a href="#">10 Likes</a></div>
                                <div class="clear"></div>  
                            </div> 
                            
                            <div class="clear"></div>    
                        </article>
                        
                        <article class="post">
                            <div class="postimg">
                            	<span class="frame">
                                <img src="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/images/content/post1.jpg" alt="" class="scale-with-grid" />
                                </span>
                            </div>
                            
                            <div class="entry-utility2">
                                <div class="entry-date">
                                  <span class="postmonth">Sept</span>
                                  <span class="postdate">01</span>
                                  <span class="postyear">2012</span>
                                </div>
                                <div class="entry-comment">
                                	<a href="single.html">
                                        <span class="postcomm">0</span>
                                        <span class="postcommtext">Comments</span>
                                    </a>
                                </div>
                            </div>
                            
                            <div class="entry-text">
                               <h2 class="posttitle"><a href="single.html">Mauris dictum adipiscing tellus.</a></h2>
                               
                               <div class="entry-content">
                               <p>Donec tristique nunc ut felis tincidunt non ultrices mauris scelerisque. Vivamus orci nisl, tempus eget scelerisque non, mattis sed mi. Nulla aliquam diam quis arcu pretium ut elementum arcu pretium. Quisque enim augue, mattis eget feugiat nec, posuere id purus. Sed sodales nisi id enim vestibulum non ornare quam vulputate...</p>
                               <a href="single.html">Continue reading &rarr;</a>
                              </div>
                            </div>
                             
                            <div class="entry-utility">
                                <div class="user">Posted by <a href="#">Tsdemo</a></div> <div class="tag"> Tag in <a href="#">Photography</a>, <a href="#">html</a> </div>
                                <div class="like"><a href="#">10 Likes</a></div>
                                <div class="clear"></div>  
                            </div> 
                            
                            <div class="clear"></div>    
                        </article>
                        
                        <div class="wp-pagenavi">
                            <span class="pages">Page 1 of 3</span><a href="#" class="page">1</a><span class="current">2</span><a href="#" class="page">3</a>
                        </div>
                
				</section>
                <aside id="sidebar" class="positionright four columns omega">
                    <ul>
                         <li class="widget-container">
                            <h2 class="widget-title">Blog Categories</h2>
                            <ul>
                                <li><a href="#">Photography</a></li>
                                <li><a href="#">Wordpress</a></li>
                                <li><a href="#">Joomla</a></li>
                                <li><a href="#">Website Design</a></li>
                            </ul>
                        </li>
                        <li class="widget-container">
                            <h2 class="widget-title">Search</h2>
                            <form method="get" id="searchform" action="#">
                                <div class="bgsearch">
                                <input type="text" name="s" id="s" value="" /> 
                                <input type="submit" class="searchbutton" value="Search" />
                                </div>
                            </form>                               
                        </li>

                        <li class="widget-container">
                            <h2 class="widget-title">Tags</h2>
                           		<div class="gallery">
                                <a href="#"><span class="rollover"></span><img alt="" src="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/images/content/gal1.jpg"></a>
                                </div>
                                <div class="gallery">
                                <a href="#"><span class="rollover"></span><img alt="" src="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/images/content/gal2.jpg"></a>
                                </div>
                                <div class="gallery">
                                <a href="#"><span class="rollover"></span><img class="no-margin" alt="" src="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/images/content/gal3.jpg"></a>
        						</div>
                                <div class="gallery">
                                <a href="#"><span class="rollover"></span><img alt="" src="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/images/content/gal4.jpg"></a>
                                </div>
                                <div class="gallery">
                                <a href="#"><span class="rollover"></span><img alt="" src="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/images/content/gal5.jpg"></a>
                                </div>
                                <div class="gallery">
                                <a href="#"><span class="rollover"></span><img class="no-margin" alt="" src="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/images/content/gal6.jpg"></a>
                            	</div>
                                <div class="clear"></div>
                        </li>
                        <li class="widget-container">
                            <h2 class="widget-title">Recent posts</h2>
							<div class="tabcontainer">
                                <ul class="tabs">
                                    <li><a href="#tab0">Recent Post</a></li>
                                    <li><a href="#tab1">Popular Post</a></li>
                                </ul>
                          
                                <div id="tab-body">
                                    <div id="tab0" class="tab-content">
                                        <ul class="rp-widget">
                                            <li>
                                                <img class="alignleft scale-with-grid" alt="" src="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/images/content/rp1.jpg">
                                                <h3><a href="#">Donec tristique rhoncus libero vitae cursus</a></h3>
                                                <span class="smalldate">September 14, 2012</span>
                                                <span class="clear"></span>
                                            </li>
                                            <li>
                                                <img class="alignleft scale-with-grid" alt="" src="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/images/content/rp2.jpg">
                                                <h3><a href="#">Donec semper diam eu leo rhoncus ac auctor</a></h3>
                                                <span class="smalldate">September 14, 2012</span>
                                                <span class="clear"></span>
                                            </li>
                                            <li class="last">
                                                <img class="alignleft scale-with-grid" alt="" src="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/images/content/rp3.jpg">
                                                <h3><a href="#">Cras ullamcorper facilisis lorem us nisi tincidunt</a></h3>
                                                <span class="smalldate">April 20, 2012</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div id="tab1" class="tab-content">
                                        <ul class="rp-widget">
                                            <li>
                                                <img class="alignleft scale-with-grid" alt="" src="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/images/content/lp2.jpg">
                                                <h3><a href="#">Nam vel nunc at augue vehicula feugiat.</a></h3>
                                                <span class="smalldate">September 14, 2012</span>
                                                <span class="clear"></span>
                                            </li>
                                            <li class="last">
                                                <img class="alignleft scale-with-grid" alt="" src="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/images/content/lp3.jpg">
                                                <h3><a href="#">Integer pretium ipsum sit amet dui feugiat.</a></h3>
                                                <span class="smalldate">April 20, 2012</span>
                                                <span class="clear"></span>
                                            </li>
                                            <li class="last">
                                                <img class="alignleft scale-with-grid" alt="" src="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/images/content/lp1.jpg">
                                                <h3><a href="#">Donec tristique rhoncus libero vitae cursus</a></h3>
                                                <span class="smalldate">September 14, 2012</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </li>
                        <li class="widget-container">
                            <h2 class="widget-title">Archives</h2>
                            <ul>
                                <li><a href="#">September 2012</a></li>
                                <li><a href="#">August 2012</a></li>
                                <li><a href="#">July 2012</a></li>
                                <li><a href="#">June 2012</a></li>
                                <li><a href="#">May 2012</a></li>
                            </ul>
                        </li>
                    </ul>

                </aside>

                
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
