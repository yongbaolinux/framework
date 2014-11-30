<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Diskroom后台管理系统</title>
<!-- CSS -->
<!-- Reset Stylesheet -->
<link rel="stylesheet" href="<?=base_url();?>admin_res/css/reset.css" type="text/css" media="screen" />
<!-- Main Stylesheet -->
<link rel="stylesheet" href="<?=base_url();?>admin_res/css/style.css" type="text/css" media="screen" />
<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
<link rel="stylesheet" href="<?=base_url();?>admin_res/css/invalid.css" type="text/css" media="screen" />
<!--                       Javascripts                       -->
<!-- jQuery -->
<script type="text/javascript" src="<?=base_url();?>admin_res/scripts/jquery-1.8.2.min.js"></script>
<!-- jQuery Configuration -->
<script type="text/javascript" src="<?=base_url();?>admin_res/scripts/simpla.jquery.configuration.js"></script>
<script type="text/javascript" src="<?=base_url();?>admin_res/scripts/facebox.js"></script>
<script type="text/javascript" src="<?=base_url();?>admin_res/scripts/jquery.wysiwyg.js"></script>
<script type="text/javascript" src="<?=base_url();?>admin_res/scripts/jquery.datePicker.js"></script>
<script type="text/javascript" src="<?=base_url();?>admin_res/scripts/jquery.date.js"></script>
</head>
<body>
<div id="body-wrapper">
  <!-- Wrapper for the radial gradient background -->
  <div id="sidebar">
    <div id="sidebar-wrapper">
      <!-- Sidebar with logo and menu -->
      <h1 id="sidebar-title"><a href="#">admin</a></h1>
      <!-- Logo (221px wide) -->
      <a href="#"><img id="logo" src="<?=base_url();?>admin_res/images/logo.png" alt="diskroom logo" /></a>
      <!-- Sidebar Profile links -->
      <div id="profile-links"> 你好, <a href="#" title="Edit your profile"><?php echo $adminName; ?></a>, you have <a href="#messages" rel="modal" title="3 Messages">3 Messages</a><br />
        <br />
        <a href="<?=base_url();?>index.php" title="访问前台首页" target="_blank">访问网站首页</a> | <a href="admin/logout" title="退出">登出</a> </div>
      <ul id="main-nav">
        <!-- Accordion Menu -->
        <li> <a href="#" class="nav-top-item no-submenu current" target="main-content">
          <!-- Add the class "no-submenu" to menu items with no sub menu -->
          网站信息 </a> 
          <ul>
          	<li><a href="<?=base_url();?>admin_s.php/admin/baseInfo" target="main-content">概要信息</a></li>
          </ul>
        </li>
        <li> <a href="#" class="nav-top-item">
          <!-- Add the class "current" to current menu item -->
          网站设置 </a>
          <ul>
            <li><a href="<?=base_url();?>admin_s.php/settings/baseSet" target="main-content">基本设置</a></li>
            <!--<li><a class="" href="<?=base_url();?>admin_s.php/settings/moduleSet" target="main-content">模块设置</a></li>-->
            <!-- Add class "current" to sub menu items also -->
            <li><a href="<?=base_url();?>admin_s.php/settings/templateSet" target="main-content">模板设置</a></li>
            <li><a href="<?=base_url();?>admin_s.php/settings/otherSet" target="main-content">其他设置</a></li>
          </ul>
        </li>
        <li> <a href="#" class="nav-top-item"> 内容管理 </a>
          <ul>
            <li><a href="<?=base_url();?>admin_s.php/modules/moduleShow" target="main-content">模块管理</a></li>
            <li><a href="<?=base_url();?>admin_s.php/articles/articleShow" target="main-content">文章管理</a></li>
            <li><a href="<?=base_url();?>admin_s.php/images/imageShow" target="main-content">图片管理</a></li>
            <li><a href="<?=base_url();?>admin_s.php/advertises/advertiseShow" target="main-content"">广告管理</a></li>
            <li><a href="#">下载管理</a></li>
          </ul>
        </li>
        <!--<li> <a href="#" class="nav-top-item"> Image Gallery </a>
          <ul>
            <li><a href="#">Upload Images</a></li>
            <li><a href="#">Manage Galleries</a></li>
            <li><a href="#">Manage Albums</a></li>
            <li><a href="#">Gallery Settings</a></li>
          </ul>
        </li>
        <li> <a href="#" class="nav-top-item"> Events Calendar </a>
          <ul>
            <li><a href="#">Calendar Overview</a></li>
            <li><a href="#">Add a new Event</a></li>
            <li><a href="#">Calendar Settings</a></li>
          </ul>
        </li>
        <li> <a href="#" class="nav-top-item"> Settings </a>
          <ul>
            <li><a href="#">General</a></li>
            <li><a href="#">Design</a></li>
            <li><a href="#">Your Profile</a></li>
            <li><a href="#">Users and Permissions</a></li>
          </ul>
        </li>-->
      </ul>
      <!-- End #main-nav -->
      <div id="messages" style="display: none">
        <!-- Messages are shown when a link with these attributes are clicked: href="#messages" rel="modal"  -->
        <h3>3 Messages</h3>
        <p> <strong>17th May 2009</strong> by Admin<br />
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue. <small><a href="#" class="remove-link" title="Remove message">Remove</a></small> </p>
        <p> <strong>2nd May 2009</strong> by Jane Doe<br />
          Ut a est eget ligula molestie gravida. Curabitur massa. Donec eleifend, libero at sagittis mollis, tellus est malesuada tellus, at luctus turpis elit sit amet quam. Vivamus pretium ornare est. <small><a href="#" class="remove-link" title="Remove message">Remove</a></small> </p>
        <p> <strong>25th April 2009</strong> by Admin<br />
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue. <small><a href="#" class="remove-link" title="Remove message">Remove</a></small> </p>
        <form action="#" method="post">
          <h4>New Message</h4>
          <fieldset>
          <textarea class="textarea" name="textfield" cols="79" rows="5"></textarea>
          </fieldset>
          <fieldset>
          <select name="dropdown" class="small-input">
            <option value="option1">Send to...</option>
            <option value="option2">Everyone</option>
            <option value="option3">Admin</option>
            <option value="option4">Jane Doe</option>
          </select>
          <input class="button" type="submit" value="Send" />
          </fieldset>
        </form>
      </div>
      <!-- End #messages -->
    </div>
  </div>
  <!-- End #sidebar -->
  <div id="main-content">
   <iframe name="main-content" frameborder="0" src="<?=base_url();?>admin_s.php/admin/baseInfo" scrolling="yes" style="width:100%;height:700px;"></iframe>
     <div id="footer">
       <small>
        <!-- Remove this notice or replace it with whatever you want -->
        &#169; Copyright 2010 Diskroom | Powered by <a href="http://www.diskroom.net">diskroom.net</a> | <a href="#top">Top</a>
       </small>
     </div>
   </div>
  <!-- End #main-content -->
</div>

</body>
<!-- Download From www.exet.tk-->
</html>
