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
                    	<h1 class="pagetitle">Features Element</h1>
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
            
                    <div class="one_half firstcols">
                        <h2>jQuery  Tabs</h2>
                        <div class="tabcontainer">
                            <ul class="tabs">
                                <li><a href="#tab0">Recent Post</a></li>
                                <li><a href="#tab1">Popular Post</a></li>
                                <li><a href="#tab2">Lorem Ipsum</a></li>
                            </ul>
                            <div id="tab-body">
                                <div id="tab0" class="tab-content">
                                <p>#1. Praesent mattis, massa quis luctus fermentum, turpis mi volutpat justo, eu volutpat enim diam eget metus. Sed placerat libero quis metus malesuada venenatis. Nulla facilisi malesuada.</p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis feugiat rutrum luctus. Proin nisl augue, tempus quis lacinia at, ultrices eget sapien. Vestibulum at orci a eros molestie rutrum. Fusce interdum erat vel eros elementum vitae interdum massa varius. 
                                </div>
                                <div id="tab1" class="tab-content">
                                #2. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis feugiat rutrum luctus. Proin nisl augue, tempus quis lacinia at, ultrices eget sapien. Vestibulum at orci a eros molestie rutrum. Fusce interdum erat vel eros elementum vitae interdum massa varius.
                                </div>
                                <div id="tab2" class="tab-content">
                                #3. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis feugiat rutrum luctus. Proin nisl augue, tempus quis lacinia at, ultrices eget sapien. Vestibulum at orci a eros molestie rutrum. Fusce interdum erat vel eros elementum vitae interdum massa varius. Morbi fermentum commodo nisi, id interdum mauris suscipit pellentesque. Morbi velit eros, accumsan ut faucibus at, viverra id mi.
                                </div>
                            </div>
                        </div><!-- end tab container -->
                    </div>
                    <div class="one_half lastcols">
                        <h2>jQuery  Toggle</h2>
                        <div id="toggle">
                        
                            <h2 class="trigger"><span>Excepteur sint occaecat</span></h2>
                            <div class="toggle_container">
                                <div class="block">
                                    <p>Consequat te olim letalis premo ad hos olim odio olim indoles ut venio iusto. Euismod, sagaciter diam neque antehabeo blandit, jumentum transverbero luptatum. Lenis vel diam praemitto molior facilisi facilisi suscipere abico, ludus, at. Wisi suscipere nisl ad capto comis esse, autem genitus. Feugiat immitto ullamcorper hos luptatum gilvus eum. Delenit patria nunc os pneum acsi nulla magna singularis proprius autem exerci accumsan.</p>
                                    <p>Praesent duis vel similis usitas camur, nostrud eros opes verto epulae feugiat ad. Suscipit modo magna letalis amet et tego accumsan facilisi, meus. Vindico luptatum blandit ulciscor mos caecus praesent sed meus velit si quis lobortis praemitto, uxor.</p>
                                </div>
                            </div>
                        
                        
                            <h2 class="trigger"><span>Maecenas et lacus est, et congue velit</span></h2>
                            <div class="toggle_container">
                                <div class="block">
                                    <p>Consequat te olim letalis premo ad hos olim odio olim indoles ut venio iusto. Euismod, sagaciter diam neque antehabeo blandit, jumentum transverbero luptatum. Lenis vel diam praemitto molior facilisi facilisi suscipere abico, ludus, at. Wisi suscipere nisl ad capto comis esse, autem genitus. Feugiat immitto ullamcorper hos luptatum gilvus eum. Delenit patria nunc os pneum acsi nulla magna singularis proprius autem exerci accumsan.</p>
                                    <p>Praesent duis vel similis usitas camur, nostrud eros opes verto epulae feugiat ad. Suscipit modo magna letalis amet et tego accumsan facilisi, meus. Vindico luptatum blandit ulciscor mos caecus praesent sed meus velit si quis lobortis praemitto, uxor.</p>
                                </div>
                            </div>
                        
                        
                            <h2 class="trigger"><span>Sed lobortis massa id magna</span></h2>
                            <div class="toggle_container">
                                <div class="block">
                                    <p>Consequat te olim letalis premo ad hos olim odio olim indoles ut venio iusto. Euismod, sagaciter diam neque antehabeo blandit, jumentum transverbero luptatum. Lenis vel diam praemitto molior facilisi facilisi suscipere abico, ludus, at. Wisi suscipere nisl ad capto comis esse, autem genitus. Feugiat immitto ullamcorper hos luptatum gilvus eum. Delenit patria nunc os pneum acsi nulla magna singularis proprius autem exerci accumsan.</p>
                                    <p>Praesent duis vel similis usitas camur, nostrud eros opes verto epulae feugiat ad. Suscipit modo magna letalis amet et tego accumsan facilisi, meus. Vindico luptatum blandit ulciscor mos caecus praesent sed meus velit si quis lobortis praemitto, uxor.</p>
                                </div>
                            </div>
                        
                        
                            <h2 class="trigger"><span>Maecenas ultrices odio a orci dapibus</span></h2>
                            <div class="toggle_container">
                                <div class="block">
                                    <p>Consequat te olim letalis premo ad hos olim odio olim indoles ut venio iusto. Euismod, sagaciter diam neque antehabeo blandit, jumentum transverbero luptatum. Lenis vel diam praemitto molior facilisi facilisi suscipere abico, ludus, at. Wisi suscipere nisl ad capto comis esse, autem genitus. Feugiat immitto ullamcorper hos luptatum gilvus eum. Delenit patria nunc os pneum acsi nulla magna singularis proprius autem exerci accumsan.</p>
                                    <p>Praesent duis vel similis usitas camur, nostrud eros opes verto epulae feugiat ad. Suscipit modo magna letalis amet et tego accumsan facilisi, meus. Vindico luptatum blandit ulciscor mos caecus praesent sed meus velit si quis lobortis praemitto, uxor.</p>
                                </div>
                            </div>
                        
                        
                            <h2 class="trigger"><span>Excepteur sint occaecat</span></h2>
                            <div class="toggle_container">
                                <div class="block">
                                    <p>Consequat te olim letalis premo ad hos olim odio olim indoles ut venio iusto. Euismod, sagaciter diam neque antehabeo blandit, jumentum transverbero luptatum. Lenis vel diam praemitto molior facilisi facilisi suscipere abico, ludus, at. Wisi suscipere nisl ad capto comis esse, autem genitus. Feugiat immitto ullamcorper hos luptatum gilvus eum. Delenit patria nunc os pneum acsi nulla magna singularis proprius autem exerci accumsan.</p>
                                    <p>Praesent duis vel similis usitas camur, nostrud eros opes verto epulae feugiat ad. Suscipit modo magna letalis amet et tego accumsan facilisi, meus. Vindico luptatum blandit ulciscor mos caecus praesent sed meus velit si quis lobortis praemitto, uxor.</p>
                                </div>
                            </div>
                        
                        
                            <h2 class="trigger"><span>Maecenas et lacus est, et congue velit</span></h2>
                            <div class="toggle_container">
                                <div class="block">
                                    <p>Consequat te olim letalis premo ad hos olim odio olim indoles ut venio iusto. Euismod, sagaciter diam neque antehabeo blandit, jumentum transverbero luptatum. Lenis vel diam praemitto molior facilisi facilisi suscipere abico, ludus, at. Wisi suscipere nisl ad capto comis esse, autem genitus. Feugiat immitto ullamcorper hos luptatum gilvus eum. Delenit patria nunc os pneum acsi nulla magna singularis proprius autem exerci accumsan.</p>
                                    <p>Praesent duis vel similis usitas camur, nostrud eros opes verto epulae feugiat ad. Suscipit modo magna letalis amet et tego accumsan facilisi, meus. Vindico luptatum blandit ulciscor mos caecus praesent sed meus velit si quis lobortis praemitto, uxor.</p>
                                </div>
                            </div>
                        
                        </div><!-- end toggle -->
                    </div>
                    <br class="clear"/><br/>
                    <div class="separator line"><div></div></div>
                    
                    <div class="one_half firstcols">
                    <h2>Tables</h2>
                    <table>
                    <thead>
                        <tr>
                        <th>Header 1</th>
                        <th>Header 2</th>
                        <th>Header 3</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td>Division 1</td>
                        <td>Division 2</td>
                        <td>Division 3</td>
                        </tr>
                        <tr class="even">
                        <td>Division 1</td>
                        <td>Division 2</td>
                        <td>Division 3</td>
                        </tr>
                        <tr>
                        <td>Division 1</td>
                        <td>Division 2</td>
                        <td>Division 3</td>
                        </tr>
                        <tr class="even">
                        <td>Division 1</td>
                        <td>Division 2</td>
                        <td>Division 3</td>
                        </tr>
                        <tr>
                        <td>Division 1</td>
                        <td>Division 2</td>
                        <td>Division 3</td>
                        </tr>
                    </tbody>
                    </table>
                    </div>
                    <div class="one_half lastcols">
                    	<h2>Accordion</h2>
                        <ul class="ts-accordion">
                            <li>
                                <h2 class="accordion-title"><span class="accordion-icon"></span>Bussiness Company </h2>
                                <div class="accordion-content">Aliquam luctus rhoncus eros, non malesuada nunc consectetur a. Donec tristique rhoncus libero vitae cursus. </div>
                            </li>
                            <li>
                                <h2 class="accordion-title"><span class="accordion-icon"></span>Communication</h2>
                                <div class="accordion-content">Aliquam luctus rhoncus eros, non malesuada nunc consectetur a. Donec tristique rhoncus libero vitae cursus. </div>
                            </li>
                            <li>
                                <h2 class="accordion-title"><span class="accordion-icon"></span>Recreation</h2>
                                <div class="accordion-content">Aliquam luctus rhoncus eros, non malesuada nunc consectetur a. Donec tristique rhoncus libero vitae cursus. </div>
                            </li>
                            <li>
                                <h2 class="accordion-title"><span class="accordion-icon"></span>Motion Graphic Design</h2>
                                <div class="accordion-content">Aliquam luctus rhoncus eros, non malesuada nunc consectetur a. Donec tristique rhoncus libero vitae cursus. </div>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="separator line"><div></div></div>
                    
                    <h2>Icon Boxes</h2>
                    <div class="three columns alpha">
                        <img src="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/images/icons/icon1.png" alt="" class="alignleft"/>
                        <h3 class="margin_bottom_small">Simple &amp; Unique</h3>
                        <p class="indentleft">Etiam feugiat sapien vel felis scelerisque dapibus. Curabitur dictum massa id.</p>
                    </div>
                    <div class="three columns">
                        <img src="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/images/icons/icon2.png" alt="" class="alignleft"/>
                        <h3 class="margin_bottom_small">HTML &amp; CSS3</h3>
                        <p class="indentleft">Etiam feugiat sapien vel felis scelerisque dapibus. Curabitur dictum massa id.</p>
                    </div>
                    <div class="three columns">
                        <img src="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/images/icons/icon3.png" alt="" class="alignleft"/>
                        <h3 class="margin_bottom_small">Web Design</h3>
                        <p class="indentleft">Etiam feugiat sapien vel felis scelerisque dapibus. Curabitur dictum massa id.</p>
                    </div>
                    <div class="three columns omega">
                        <img src="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/images/icons/icon4.png" alt="" class="alignleft"/>
                        <h3 class="margin_bottom_small">Wordpress Theme</h3>
                        <p class="indentleft">Etiam feugiat sapien vel felis scelerisque dapibus. Curabitur dictum massa id.</p>
                    </div>
                    
                    <div class="separator line"></div>
                    
                    <div class="one_half firstcols">
                        <h2>Button</h2>
                        <p><a href="#" class="button">Small Button</a>&nbsp;&nbsp;<a href="#" class="button medium">Medium Button</a>&nbsp;&nbsp;<a href="#" class="button large">Large Button</a></p>
                        
                    </div>
                    <div class="one_half lastcols">
                        <h2>Tooltips</h2>
                        <p>Condiment <a href="#" title="Tooltip Text">adipiscing varius </a> accumsan. Fusce placerat neque sed sapien rutrum laoreet justo ultrices. In pellentesque lorem <a href="#" title="Example Tooltip Text">condimentum</a> dui consequat adipiscing nisi tincidunt. Morbi pulvinar dui non quam pretium ut lacinia tortor.</p>
                        
                    </div>
                    
                    <div class="separator line"><div></div></div>
                    
            
            
                    <div class="one_half firstcols">
                        <h2>Images in Paragraph</h2>
                        <p><span class="frame alignleft"><img src="images/content/s1.jpg" alt="" /></span>Praesent mattis, massa quis luctus fermentum, turpis mi volutpat justo, eu volutpat enim diam eget metus. Sed placerat libero quis metus malesuada venenatis. Nulla facilisi. Duis condimentum molestie lacus.</p>
                        <p>Morbi a eros sed nisi laoreet.Praesent mattis, massa quis luctus fermentum, turpis mi volutpat justo, eu volutpat enim diam eget metus.laoreet molestie. Nulla facilisi. Duis condimentum molestie lacus ac tincidunt.Morbi a eros sed nisi laoreet molestie. Sed placerat libero quis metus malesuada venenatis. Proin vulputate, ligula id pellentesque laoreet, arcu odio tincidunt nunc.</p>
                    </div>
                    <div class="one_half lastcols">
                        <h2>Alert Boxes</h2>
                        <div class="notification error"><strong>Error! </strong>Ups, an error ocurred.</div>
                        <div class="notification success"><strong>Success! </strong>Congrats, you did it!.</div>
                        <div class="notification warning"><strong>Warning! </strong>Wait, I must warn you!.</div>
                        <div class="notification notice"><strong>Notice! </strong>Please edit the information below!.</div>
                        
                    </div>
                    
                    <div class="separator line"><div></div></div>
                    
                    
                    <h2>Dropcaps</h2>
                    <div class="one_third firstcols">
                        <p><span class="dropcap1">L</span>orem ipsum dolor sit amet, consectetuer adipiscing elit. Nullam dignissim convallis est. Quisque aliquam. This is a blockquote. Aenean arcu elit, tristique semper pulvinar adipiscing. Donec faucibus. Nam sit amet sem. Aliquam libero nisi, imperdiet.</p>
                    </div>
                    <div class="one_third">
                        <p><span class="dropcap2">L</span>orem ipsum dolor sit amet, consectetuer adipiscing elit. Nullam dignissim convallis est. Quisque aliquam. This is a blockquote. Aenean arcu elit, tristique semper pulvinar adipiscing. Donec faucibus. Nam sit amet sem. Aliquam libero nisi, imperdiet.</p>
                    </div>
                    <div class="one_third lastcols">
                        <p><span class="dropcap3">L</span>orem ipsum dolor sit amet, consectetuer adipiscing elit. Nullam dignissim convallis est. Quisque aliquam. This is a blockquote. Aenean arcu elit, tristique semper pulvinar adipiscing. Donec faucibus. Nam sit amet sem. Aliquam libero nisi, imperdiet.</p>
                    </div>
                    
                    <div class="separator line"><div></div></div>
                    
                    
                    
                    <h2>Highlights</h2>
                    <div class="one_third firstcols">
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. <span class="highlight1">Nullam dignissim convallis est.</span> Quisque aliquam. Aenean arcu elit, tristique semper pulvinar adipiscing. Donec faucibus. Nam sit amet sem. Aliquam libero nisi, imperdiet.</p>
                    </div>
                    <div class="one_third">
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. <span class="highlight2">Nullam dignissim convallis est.</span> Quisque aliquam. Aenean arcu elit, tristique semper pulvinar adipiscing. Donec faucibus. Nam sit amet sem. Aliquam libero nisi, imperdiet.</p>
                    </div>
                    <div class="one_third lastcols">
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. <span class="highlight3">Nullam dignissim convallis est.</span> Quisque aliquam. Aenean arcu elit, tristique semper pulvinar adipiscing. Donec faucibus. Nam sit amet sem. Aliquam libero nisi, imperdiet.</p>
                    </div>
                    
                    <div class="separator line"><div></div></div>
                    
                    
                    <h2>Blockquotes</h2>
                    <blockquote class="right"><span>This is a blockquote right. Nam sit amet sem. Aliquam libero nisi, imperdiet at, tincidunt nec, gravida vehicula, nisl.</span></blockquote>
                    <p>This is a blockquote. Donec iaculis mollis mauris. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.Nullam dignissim convallis est.</p>
                    <p>Quisque aliquam. Donec faucibus. Nunc iaculis suscipit dui. Nam sit amet sem. Aliquam libero nisi, imperdiet at, tincidunt nec, gravida vehicula, nisl. Praesent mattis, massa quis luctus fermentum, turpis mi volutpat justo, eu volutpat enim diam eget metus.</p>
                    <blockquote class="left"><span>This is a blockquote left. Nam sit amet sem. Aliquam libero nisi, imperdiet at, tincidunt nec, gravida vehicula, nisl.</span></blockquote>
                    <p>Quisque aliquam. Donec faucibus. Nunc iaculis suscipit dui. Nam sit amet sem. Aliquam libero nisi, imperdiet at, tincidunt nec.</p>                    <p>Quisque aliquam. Donec faucibus. Nunc iaculis suscipit dui. Nam sit amet sem. Aliquam libero nisi, imperdiet at, tincidunt nec, gravida vehicula, nisl. Praesent mattis, massa quis luctus fermentum, turpis mi volutpat justo, eu volutpat enim diam eget metus.</p>

                    <p>Vivamus placerat cursus lorem, id mollis enim cursus quis. Pellentesque ac tortor ac quam hendrerit pharetra. Integer turpis eros, vulputate et pellentesque rhoncus, tincidunt sodales est. Aliquam volutpat egestas leo vitae pretium. Sed et urna nisi, aliquet faucibus magna.</p>
                    <blockquote><span>This is blockquote. Sed iaculis, purus quis imperdiet laoreet, dui arcu vulputate urna, non molestie enim tellus a metus. Pellentesque ac tortor ac quam hendrerit pharetra.Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nullam dignissim convallis est.</span>
                    </blockquote>
                    <p>Vivamus placerat cursus lorem, id mollis enim cursus quis. Pellentesque ac tortor ac quam hendrerit pharetra. Integer turpis eros, vulputate et pellentesque rhoncus, tincidunt sodales est. Aliquam volutpat egestas leo vitae pretium. Sed et urna nisi, aliquet faucibus magna.</p>
                               			
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

<!-- jQuery tooltips -->
<script type="text/javascript" src="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/js/jquery.qtip.js"></script>


<!-- jQuery Dropdown Mobile -->
<script type="text/javascript" src="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/js/tinynav.min.js"></script>

<!-- Custom Script -->
<script type="text/javascript" src="<?=base_url();?>application_res/<?=$cfg['configSiteTemplate']?>/js/custom.js"></script>

<!-- Custom Tooltip -->
<script type="text/javascript">
   jQuery('a[href][title]').qtip({
	position: {
		  corner: {
			 target: 'topCenter',
			 tooltip: 'bottomLeft'
		  }
	},
	style: 'dark' // Give it some style
   });
	   
</script>
</body>
</html>
