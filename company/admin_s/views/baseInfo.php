<html>
<head>
<link rel="stylesheet" href="<?=base_url();?>admin_res/css/reset.css" type="text/css" media="screen" />
<!-- Main Stylesheet -->
<link rel="stylesheet" href="<?=base_url();?>admin_res/css/iframe-style.css" type="text/css" media="screen" />
<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
<link rel="stylesheet" href="<?=base_url();?>admin_res/css/invalid.css" type="text/css" media="screen" />
<!--                       Javascripts                       -->
<!-- jQuery -->
<script type="text/javascript" src="<?=base_url();?>admin_res/scripts/jquery-1.8.2.min.js"></script>
<!-- jQuery Configuration -->
<script type="text/javascript" src="<?=base_url();?>admin_res/scripts/simpla.jquery.configuration.js"></script>
<!-- Facebox jQuery Plugin -->
<script type="text/javascript" src="<?=base_url();?>admin_res/scripts/facebox.js"></script>
<!-- jQuery WYSIWYG Plugin -->
<script type="text/javascript" src="<?=base_url();?>admin_res/scripts/jquery.wysiwyg.js"></script>
<!-- jQuery Datepicker Plugin -->
<script type="text/javascript" src="<?=base_url();?>admin_res/scripts/jquery.datePicker.js"></script>
<script type="text/javascript" src="<?=base_url();?>admin_res/scripts/jquery.date.js"></script>
</head>
<body>
  <div id="main-content">
    <!-- Main Content Section with everything -->
    <!-- Page Head -->
    <!--<ul class="shortcut-buttons-set">
      <li><a class="shortcut-button" href="#"><span> <img src="resources/images/icons/pencil_48.png" alt="icon" /><br />
        Write an Article </span></a></li>
      <li><a class="shortcut-button" href="#"><span> <img src="resources/images/icons/paper_content_pencil_48.png" alt="icon" /><br />
        Create a New Page </span></a></li>
      <li><a class="shortcut-button" href="#"><span> <img src="resources/images/icons/image_add_48.png" alt="icon" /><br />
        Upload an Image </span></a></li>
      <li><a class="shortcut-button" href="#"><span> <img src="resources/images/icons/clock_48.png" alt="icon" /><br />
        Add an Event </span></a></li>
      <li><a class="shortcut-button" href="#messages" rel="modal"><span> <img src="resources/images/icons/comment_48.png" alt="icon" /><br />
        Open Modal </span></a></li>
    </ul>-->
    <!-- End .shortcut-buttons-set -->
    <div class="clear"></div>
    <!-- End .clear -->

    <div class="content-box column-left">
      <div class="content-box-header">
        <h3>服务器信息</h3>
      </div>
      <!-- End .content-box-header -->
      <div class="content-box-content">
        <div class="tab-content default-tab">
          <table>
          	<tr><td>服务器操作系统</td><td><?php echo $serverInfo['os']; ?></td></tr>
            <tr><td>web server/PHP 版本</td><td><?php echo $serverInfo['server']; ?></td></tr>
            <tr><td>Mysql版本</td><td><?php echo $serverInfo['mysql']; ?></td></tr>
            <tr><td>PHP运行方式</td><td><?php echo $serverInfo['php_sapi_name']; ?></td></tr>
          </table>
        </div>
        <!-- End #tab3 -->
      </div>
      <!-- End .content-box-content -->
    </div>
    <!-- End .content-box -->
    <div class="content-box column-right">
      <div class="content-box-header">
        <!-- Add the class "closed" to the Content box header to have it closed by default -->
        <h3>访问统计</h3>
      </div>
      <!-- End .content-box-header -->
      <div class="content-box-content">
        <div class="tab-content default-tab">
          <table>
          	<tr><td>时间</td><td>PV</td><td>独立IP</td><td>每IP浏览数</td></tr>
            <tr><td>今天</td><td>PV</td><td>独立IP</td><td>每IP浏览数</td></tr>
            <tr><td>最近三天</td><td>PV</td><td>独立IP</td><td>每IP浏览数</td></tr>
            <tr><td>最近一周</td><td>PV</td><td>独立IP</td><td>每IP浏览数</td></tr>
          </table>
        </div>
        <!-- End #tab3 -->
      </div>
      <!-- End .content-box-content -->
    </div>
    <!-- End .content-box -->
    <div class="clear"></div>
    <!-- End Notifications -->
    
    <!-- End #footer -->
</div>
</body>
</html>