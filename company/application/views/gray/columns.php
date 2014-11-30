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
                    	<h1 class="pagetitle">Features Columns</h1>
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
            
                <div class="one_third firstcols">
                    <h4>One Third</h4>
                    Praesent pretium massa quis leo tempor quis elementum quam volutpat. Proin bibendum, urna quis ullamcorper venenatis, lectus odio imperdiet turpis, sit amet consequat erat turpis eu magna.
				</div><!-- end .one_third -->
				<div class="one_third">
                    <h4>One Third</h4>
                    Praesent pretium massa quis leo tempor quis elementum quam volutpat. Proin bibendum, urna quis ullamcorper venenatis, lectus odio imperdiet turpis, sit amet consequat erat turpis eu magna.
				</div><!-- end .one_third -->
				<div class="one_third lastcols">
                    <h4>One Third</h4>
                    Praesent pretium massa quis leo tempor quis elementum quam volutpat. Proin bibendum, urna quis ullamcorper venenatis, lectus odio imperdiet turpis, sit amet consequat erat turpis eu magna.
				</div><!-- end .one_third -->
				
				<br class="clear" />
				<hr />
                
                <div class="two_third firstcols">
                    <h4>Two Third</h4>
                    Praesent pretium massa quis leo tempor quis elementum quam volutpat. Proin bibendum, urna quis ullamcorper venenatis, lectus odio imperdiet turpis, sit amet consequat erat turpis eu magna. Nunc eu sodales orci. Duis iaculis malesuada est, non scelerisque lectus commodo non. Proin in ipsum odio, ut egestas quam. Cras eget dapibus lacus. In consequat ligula et nulla laoreet sodales. non sollicitudin ligula tortor non nulla.
				</div><!-- end .two_third -->
				<div class="one_third lastcols">
                    <h4>One Third</h4>
                    Praesent pretium massa quis leo tempor quis elementum quam volutpat. Proin bibendum, urna quis ullamcorper venenatis, lectus odio imperdiet turpis, sit amet consequat erat turpis eu magna.
				</div><!-- end .one_third -->
				
				<br class="clear" />
				<hr />
                
                <div class="one_fourth firstcols">
                    <h4>One Fourth</h4>
                    Praesent pretium massa quis leo tempor quis elementum quam volutpat. Proin bibendum, urna quis ullamcorper venenatis, lectus odio imperdiet turpis, sit amet consequat erat turpis eu magna.
				</div><!-- end .one_fourth -->
				<div class="one_fourth">
                    <h4>One Fourth</h4>
                    Praesent pretium massa quis leo tempor quis elementum quam volutpat. Proin bibendum, urna quis ullamcorper venenatis, lectus odio imperdiet turpis, sit amet consequat erat turpis eu magna.
				</div><!-- end .one_fourth -->
				<div class="one_fourth">
                    <h4>One Fourth</h4>
                    Praesent pretium massa quis leo tempor quis elementum quam volutpat. Proin bibendum, urna quis ullamcorper venenatis, lectus odio imperdiet turpis, sit amet consequat erat turpis eu magna.
				</div><!-- end .one_fourth -->
				<div class="one_fourth lastcols">
                    <h4>One Fourth</h4>
                    Praesent pretium massa quis leo tempor quis elementum quam volutpat. Proin bibendum, urna quis ullamcorper venenatis, lectus odio imperdiet turpis, sit amet consequat erat turpis eu magna.
				</div><!-- end .one_fourth -->
				
				<br class="clear" />
				<hr />
                
                <div class="one_half firstcols">
                    <h4>One Half</h4>
                    Praesent pretium massa quis leo tempor quis elementum quam volutpat. Proin bibendum, urna quis ullamcorper venenatis, lectus odio imperdiet turpis, sit amet consequat erat turpis eu magna. Nunc eu sodales orci. Duis iaculis malesuada est, non scelerisque lectus commodo non. Proin in ipsum odio, ut egestas quam. Cras eget dapibus lacus. In consequat ligula et nulla laoreet sodales.
				</div><!-- end .one_half -->
				<div class="one_half lastcols">
                    <h4>One Half</h4>
                    Praesent pretium massa quis leo tempor quis elementum quam volutpat. Proin bibendum, urna quis ullamcorper venenatis, lectus odio imperdiet turpis, sit amet consequat erat turpis eu magna. Nunc eu sodales orci. Duis iaculis malesuada est, non scelerisque lectus commodo non. Proin in ipsum odio, ut egestas quam. Cras eget dapibus lacus. In consequat ligula et nulla laoreet sodales.
				</div><!-- end .one_half -->
				
				<br class="clear" />
				<hr />
                
                <div class="one_fourth firstcols">
                    <h4>One Fourth</h4>
                    Praesent pretium massa quis leo tempor quis elementum quam volutpat. Proin bibendum, urna quis ullamcorper venenatis, lectus odio imperdiet turpis, sit amet consequat erat turpis eu magna. 
				</div><!-- end .one_fourth -->
				<div class="three_fourth lastcols">
                    <h4>Three Fourth</h4>
                    Praesent pretium massa quis leo tempor quis elementum quam volutpat. Proin bibendum, urna quis ullamcorper venenatis, lectus odio imperdiet turpis, sit amet consequat erat turpis eu magna. Nunc eu sodales orci. Duis iaculis malesuada est, non scelerisque lectus commodo non. Proin in ipsum odio, ut egestas quam. Cras eget dapibus lacus. In consequat ligula et nulla laoreet sodales. Nunc mattis, velit vel vehicula ultricies, nulla elit porttitor nibh, non sollicitudin ligula tortor non nulla. Sed pulvinar tristique magna adipiscing vestibulum. Phasellus fringilla fermentum dictum. Cras id justo vel ante venenatis venenatis. Nunc mi urna, tempor a rutrum et, pretium ac erat. Nunc fringilla malesuada dignissim.
				</div><!-- end .three_fourth -->
                               			
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
