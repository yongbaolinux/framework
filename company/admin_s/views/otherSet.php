<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="<?=base_url()?>admin_res/css/reset.css" type="text/css" media="screen" />
<!-- Main Stylesheet -->
<link rel="stylesheet" href="<?=base_url()?>admin_res/css/iframe-style.css" type="text/css" media="screen" />
<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
<link rel="stylesheet" href="<?=base_url()?>admin_res/css/invalid.css" type="text/css" media="screen" />
<!--                       Javascripts                       -->
<!-- jQuery -->
<script type="text/javascript" src="<?=base_url()?>admin_res/scripts/jquery-1.8.2.min.js"></script>
<!-- jQuery Configuration -->
<script type="text/javascript" src="<?=base_url()?>admin_res/scripts/simpla.jquery.configuration.js"></script>
<!-- Facebox jQuery Plugin -->
<script type="text/javascript" src="<?=base_url()?>admin_res/scripts/facebox.js"></script>
<!-- jQuery WYSIWYG Plugin -->
<script type="text/javascript" src="<?=base_url()?>admin_res/scripts/jquery.wysiwyg.js"></script>
<!-- jQuery Datepicker Plugin -->
<!--<script type="text/javascript" src="http://localhost/diskroom/admin_res/scripts/jquery.datePicker.js"></script>
<script type="text/javascript" src="http://localhost/diskroom/admin_res/scripts/jquery.date.js"></script>-->
<!-- 引入弹出层插件blackbox -->
<script type="text/javascript" src="<?=base_url()?>admin_res/plugins/blackbox/js/jquery.blackbox.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>admin_res/plugins/blackbox/css/blackbox.css" media="screen" />
<!-- 引入文件上传插件uploadify -->
<script type="text/javascript" src="<?=base_url()?>admin_res/plugins/uploadify_flash/jquery.uploadify.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>admin_res/plugins/uploadify_flash/uploadify.css" media="screen" />
<!-- 引入图片选区插件Jcrop 以前一直诧异一个jquery插件竟然还能截取图片 其实它只是选取坐标 最后还是交给PHP实现截图 -->
<script type="text/javascript" src="<?=base_url()?>admin_res/plugins/jcrop/jquery.Jcrop.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>admin_res/plugins/jcrop/jquery.Jcrop.css" media="screen" />
</head>
<body>
  <div id="main-content">
    <!-- Main Content Section with everything -->
    <!-- Page Head -->
   <!-- <ul class="shortcut-buttons-set">
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
    <div class="content-box">
      <!-- Start Content Box -->
      <div class="content-box-header">
        <ul class="content-box-tabs">
          <li><a href="#tab1" class="default-tab">通用设置</a></li>
          <!-- href must be unique and match the id of target div -->
          <li><a href="#tab2">前台底部设置</a></li>
        </ul>
        <div class="clear"></div>
      </div>
      <!-- End .content-box-header -->
      <div class="content-box-content">
        <div class="tab-content default-tab" id="tab1">
          <form action="#" method="post" id="tab1Form">
            <fieldset>
            <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
            <p>
              <label>公司名称：</label><input class="text-input small-input" type="text" id="configSiteName" name="configSiteName" value="" />
              <span class="input-notification png_bg"></span>
              <!-- Classes for input-notification: success, error, information, attention -->
            </p>
            <p>
              <label>网站根地址：</label><input class="text-input small-input" type="text" id="configSiteUrl" name="configSiteUrl" value=""/><br/>
              <small>填写完整网络地址http://域名的形式</small> 
            </p>
            <p>
              <label>公司关键词：</label><input class="text-input medium-input" type="text" id="configSiteKey" name="configSiteKey" value=""/><br/>
              <small>填写公司的关键词 用于SEO优化 使用，号或者空格隔开即可</small> 
            </p>
            <p>
              <label>公司描述：</label><textarea class="text-input medium-input"  id="configSiteDescription" name="configSiteDescription"></textarea><br/>
              <small>对公司做简单的描述 用于SEO优化 便于让用户找到你</small> 
            </p>
            
		   	
            <p>
              <label></label><input class="button" type="button" value="保存设置" id="saveTab1" />
            </p> 
            </fieldset>
            <div class="clear"></div>
            <!-- End .clear -->
          </form>
        </div>
        <!-- End #tab1 -->
        <div class="tab-content" id="tab2">
          <form action="#" method="post" id="tab2Form">
            <fieldset>
            <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
            <p>
              <label>联系方式：</label><input class="text-input medium-input" type="text" id="configSiteContact" name="configSiteContact" value=""/>
              <span class="input-notification png_bg"></span>
              <!-- Classes for input-notification: success, error, information, attention --> </p>
            <p>
              <label>网站版权：</label><input class="text-input medium-input datepicker" type="text" id="configSiteCopyright" name="configSiteCopyright" value=""/>
              <span class="input-notification png_bg"></span> </p>
            <p>
              <label>其他信息：</label><input class="text-input medium-input" type="text" id="configSiteOthers" name="configSiteOthers" value=""/>
            </p>
            <!--<p>
              <label>Textarea with WYSIWYG</label>
              <textarea class="text-input textarea wysiwyg" id="textarea" name="textfield" cols="79" rows="15"></textarea>
            </p>-->
            <p>
              <input class="button" type="button" value="保存设置" id="saveTab2" />
            </p>
            </fieldset>
            <div class="clear"></div>
            <!-- End .clear -->
          </form>
        </div>
        <!-- End #tab2 -->
      </div>
      <!-- End .content-box-content -->
    </div>
    <div class="clear"></div>
</div>
</body>
<!-- 引入jquery ui -->
<script type="text/javascript" src="<?=base_url()?>admin_res/plugins/jquery-ui-1.11.1.custom/jquery-ui.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>admin_res/plugins/jquery-ui-1.11.1.custom/jquery-ui.min.css" media="screen" />
<script type="text/javascript"></script>
</html>