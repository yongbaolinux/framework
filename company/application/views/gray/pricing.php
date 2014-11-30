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
                    	<h1 class="pagetitle">Pricing Box</h1>
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
            
            	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non mi sit amet felis fringilla mollis sed non lacus. Sed ultricies leo id mi mollis eget malesuada nunc dignissim. Integer tellus leo, tempus eget egestas nec, euismod eget elit. Nullam eget diam neque. Suspendisse potenti. Vivamus arcu quam, lacinia et venenatis ac, consequat eu sem. Praesent velit mi, pulvinar sit amet ornare at, malesuada quis nibh. </p>
                
                <div class="separator"></div>
                
                <ul class="list-box">
					<li>
						<h1 class="title-box">Starter</h1>
						<div class="list-box-container">
							<div class="price-text">
								<span class="price">$2.00</span><sub>&nbsp;/&nbsp;Monthly</sub>
							</div>
							<div class="list-box-content">
								<ul>
									<li><strong>16 GB</strong> WebSpace</li>
									<li><strong>120 GB</strong> Bandwidth</li>
									<li><strong>7</strong> Domain</li>
									<li>Emails</li>
									<li>SubDomains</li>
									<li>MySQL</li>
                                    <li>FTP</li>
                                    <li><strong>24X7</strong> Support</li>
								</ul>
								<a href="#" class="button">Purchase Now &rarr;</a>
								<br class="clear" />
							</div>
						</div>
					</li>
					<li class="noborder">
						<h1 class="title-box">Basic</h1>
	
						<div class="list-box-container">
							<div class="price-text">
								<span class="price">$6.00</span><sub>&nbsp;/&nbsp;Monthly</sub>
							</div>
							<div class="list-box-content">
								<ul>
									<li><strong>26 GB</strong> WebSpace</li>
									<li><strong>220 GB</strong> Bandwidth</li>
									<li><strong>7</strong> Domain</li>
									<li>Emails</li>
									<li>SubDomains</li>
									<li>MySQL</li>
                                    <li>FTP</li>
                                    <li><strong>24X7</strong> Support</li>
								</ul>
								<a href="#" class="button">Purchase Now &rarr;</a>
								<br class="clear" />
							</div>
						</div>
					</li>
					<li class="current">
						<h1 class="title-box">Profesional</h1>
						<div class="list-box-container">
							<div class="price-text">
								<span class="price">$15.00</span><sub>&nbsp;/&nbsp;Monthly</sub>
							</div>
							<div class="list-box-content">
								<ul>
									<li><strong>36 GB</strong> WebSpace</li>
									<li><strong>320 GB</strong> Bandwidth</li>
									<li><strong>7</strong> Domain</li>
									<li>Emails</li>
									<li>SubDomains</li>
									<li>MySQL</li>
                                    <li>FTP</li>
                                    <li><strong>24X7</strong> Support</li>
                                    <li><strong>50</strong> Parked Domains</li>
								</ul>
		
								<a href="#" class="button">Purchase Now &rarr;</a>
								<br class="clear" />
							</div>
	
						</div>
					</li>
					<li class="last">
						<h1 class="title-box">Business</h1>
						<div class="list-box-container">
							<div class="price-text">
								<span class="price">$20.00</span><sub>&nbsp;/&nbsp;Monthly</sub>
							</div>
							<div class="list-box-content">
								<ul>
									<li><strong>56 GB</strong> WebSpace</li>
									<li><strong>520 GB</strong> Bandwidth</li>
									<li><strong>7</strong> Domain</li>
									<li>Emails</li>
									<li>SubDomains</li>
									<li>MySQL</li>
                                    <li>FTP</li>
                                    <li><strong>24X7</strong> Support</li>
								</ul>
								<a href="#" class="button">Purchase Now &rarr;</a>
								<br class="clear" />
							</div>
						</div>
					</li>
				</ul>
                
                <div class="separator"></div>
                <div class="separator line"></div>
                <div class="separator"></div>
                
                <ul id="col5" class="list-box">
					<li>
						<h1 class="title-box">Basic</h1>
						<div class="list-box-container">
							<div class="price-text">
								<span class="price">$2.00</span><sub>&nbsp;/&nbsp;Monthly</sub>
							</div>
							<div class="list-box-content">
								<ul>
									<li><strong>16 GB</strong> WebSpace</li>
									<li><strong>120 GB</strong> Bandwidth</li>
									<li><strong>7</strong> Domain</li>
									<li>Emails</li>
									<li>SubDomains</li>
									<li>MySQL</li>
                                    <li>FTP</li>
                                    <li><strong>24X7</strong> Support</li>
								</ul>
								<a href="#" class="button small">Purchase Now &rarr;</a>
								<br class="clear" />
							</div>
						</div>
					</li>
					<li class="noborder">
						<h1 class="title-box">Premium</h1>
	
						<div class="list-box-container">
							<div class="price-text">
								<span class="price">$6.00</span><sub>&nbsp;/&nbsp;Monthly</sub>
							</div>
							<div class="list-box-content">
								<ul>
									<li><strong>26 GB</strong> WebSpace</li>
									<li><strong>220 GB</strong> Bandwidth</li>
									<li><strong>7</strong> Domain</li>
									<li>Emails</li>
									<li>SubDomains</li>
									<li>MySQL</li>
                                    <li>FTP</li>
                                    <li><strong>24X7</strong> Support</li>
								</ul>
								<a href="#" class="button small">Purchase Now &rarr;</a>
								<br class="clear" />
							</div>
						</div>
					</li>
					<li class="current">
						<h1 class="title-box">Profesional</h1>
						<div class="list-box-container">
							<div class="price-text">
								<span class="price">$15.00</span><sub>&nbsp;/&nbsp;Monthly</sub>
							</div>
							<div class="list-box-content">
								<ul>
									<li><strong>36 GB</strong> WebSpace</li>
									<li><strong>320 GB</strong> Bandwidth</li>
									<li><strong>7</strong> Domain</li>
									<li>Emails</li>
									<li>SubDomains</li>
									<li>MySQL</li>
                                    <li>FTP</li>
                                    <li><strong>24X7</strong> Support</li>
                                    <li><strong>50</strong> Parked Domains</li>
								</ul>
		
								<a href="#" class="button small">Purchase Now &rarr;</a>
								<br class="clear" />
							</div>
	
						</div>
					</li>
					<li class="borderright">
						<h1 class="title-box">Business</h1>
	
						<div class="list-box-container">
							<div class="price-text">
								<span class="price">$26.00</span><sub>&nbsp;/&nbsp;Monthly</sub>
							</div>
							<div class="list-box-content">
								<ul>
									<li><strong>26 GB</strong> WebSpace</li>
									<li><strong>220 GB</strong> Bandwidth</li>
									<li><strong>7</strong> Domain</li>
									<li>Emails</li>
									<li>SubDomains</li>
									<li>MySQL</li>
                                    <li>FTP</li>
                                    <li><strong>24X7</strong> Support</li>
								</ul>
								<a href="#" class="button small">Purchase Now &rarr;</a>
								<br class="clear" />
							</div>
						</div>
					</li>
					<li class="last">
						<h1 class="title-box">Vip</h1>
						<div class="list-box-container">
							<div class="price-text">
								<span class="price">$30.00</span><sub>&nbsp;/&nbsp;Monthly</sub>
							</div>
							<div class="list-box-content">
								<ul>
									<li><strong>56 GB</strong> WebSpace</li>
									<li><strong>520 GB</strong> Bandwidth</li>
									<li><strong>7</strong> Domain</li>
									<li>Emails</li>
									<li>SubDomains</li>
									<li>MySQL</li>
                                    <li>FTP</li>
                                    <li><strong>24X7</strong> Support</li>
								</ul>
								<a href="#" class="button small">Purchase Now &rarr;</a>
								<br class="clear" />
							</div>
						</div>
					</li>
				</ul>
                
                
                <div class="separator"></div>
                
                
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
