<?php @ini_get('short_open_tag' , 'On');?>
<!DOCTYPE HTML>
<html>
 <head>
  <title> 首页代码结构</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
       <link href="../assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/bui-min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/page-min.css" rel="stylesheet" type="text/css" />   <!-- 下面的样式，仅是为了显示代码，而不应该在项目中使用-->
   <style type="text/css">
    code {
      padding: 0px 4px;
      color: #dd1144;
      background-color: #f7f7f9;
      border: 1px solid #e1e1e8;
    }
   </style>
 </head>
 <body>
 <div class="container">
     <div class="detail-page">
         <h2>信息</h2>
         <div class="detail-section">
             <h3>服务器硬件及软件信息</h3>
             <div class="row detail-row">
                 <div class="span8">
                     <label>服务器IP：</label><span class="detail-text"><?=$_SERVER['SERVER_ADDR']?></span>
                 </div>
                 <div class="span8">
                     <label>服务器主机名：</label><span class="detail-text"><?=$_SERVER['SERVER_NAME']?></span>
                 </div>
                 <div class="span8">
                     <label>服务器CGI规范：</label><span class="detail-text"><?=$_SERVER['GATEWAY_INTERFACE']?></span>
                 </div>
             </div>
             <div class="row detail-row">
                 <div class="span8">
                     <label>服务器通信协议：</label><span class="detail-text"><?=$_SERVER['SERVER_PROTOCOL']?></span>
                 </div>
                 <div class="span8">
                     <label>服务器管理员邮箱：</label><span class="detail-text"><?=$_SERVER['SERVER_ADMIN']?></span>
                 </div>
                 <div class="span8">
                     <label>服务器Web端口：</label><span class="detail-text"><?=$_SERVER['SERVER_PORT']?></span>
                 </div>
             </div>
             <div class="row detail-row">
                 <div class="span8">
                     <label>当前脚本url相对路径：</label><span class="detail-text"><?=$_SERVER['SCRIPT_NAME']?></span>
                 </div>
                 <div class="span8">
                     <label>当前脚本磁盘路径：</label><span class="detail-text"><?=__FILE__?></span>
                 </div>
                 <!--<div class="span8">
                     <label>当前脚本绝对路径：</label><span class="detail-text"><?/*=$_SERVER['SCRIPT_FILENAME']*/?></span>
                 </div>-->
                 <div class="span8">
                     <label>服务器标识字符串：</label><span class="detail-text"><?=$_SERVER['SERVER_SOFTWARE']?></span>
                 </div>
             </div>
             <div class="row detail-row">
                 <!--<div class="span8">
                     <label>Apache加载模块：</label>
				<span class="detail-text"><?php foreach(apache_get_modules() as $key=>$module){
                             if($key%2 == 1){
                                 echo "<a href='http://httpd.apache.org/docs/2.4/mod/".$module.".html' target='_new' style='background-color:#ccc;'>".$module."</a> ";
                             } else {
                                 echo "<a href='http://httpd.apache.org/docs/2.4/mod/".$module.".html' target='_new'>".$module."</a> ";
                             }
                         }?></span>
                 </div>-->
			<div class="span24">
				<label>Apache加载模块：</label>
 <div id="grid">
   <div class="bui-simple-grid bui-simple-list bui-grid-border" style="width: 950px;" aria-disabled="false" aria-pressed="false">
    <table cellspacing="0" cellpadding="0" class="bui-grid-table">
     <thead>
      <tr>
       <th width="80" class="bui-grid-hd ">
        <div class="bui-grid-hd-inner">
         <span class="bui-grid-hd-title">模块名</span>
        </div></th>
       <th width="100" class="bui-grid-hd ">
        <div class="bui-grid-hd-inner">
         <span class="bui-grid-hd-title">模块备注</span>
        </div></th>
      </tr>
     </thead>
     <tbody>
	<?php foreach(apache_get_modules() as $key=>$module){ ?>
      <tr class="bui-grid-row bui-grid-row-odd">
       <td class="bui-grid-cell ">
        <div class="bui-grid-cell-inner">
         <span class="bui-grid-cell-text"><a href='http://httpd.apache.org/docs/2.4/mod/<?php echo $module;?>.html' target='_new' style='/*background-color:#ccc;*/'><?php echo $module;?></a></span>
        </div></td>
       <td class="bui-grid-cell ">
        <div class="bui-grid-cell-inner">
         <span class="bui-grid-cell-text">李四</span>
        </div></td>
      </tr>
<?php } ?>
     </tbody>
    </table>
   </div>
  </div>
          </div>
                 <div class="span8">
                     <label>服务器操作系统：</label><span class="detail-text"><?=php_uname()?></span>
                 </div>
                 <div class="span8">
                     <label>服务器CPU架构平台：</label><span class="detail-text"><?php

 			if(substr(PHP_OS,0,3) == 'WIN'){
                     ob_start();
                     system('systeminfo',$retval);
                     $return = ob_get_contents();
                     ob_end_clean();
                     $arr = explode("\n",$return);
                     foreach ($arr as $item){
                         $temp = explode(":",$item);
                         //从ob缓存中取出来的字符集为gbk 转换成utf8
                         $temp[0] = iconv('gbk','utf-8',$temp[0]);
                         if($temp[0] == '系统类型'){
                             echo iconv('gbk','utf-8',$temp[1]);
                         }
                     }
            } else {


            }
                     ?></span>
                 </div>
             </div>
         </div>
         <div class="detail-section">
			<h3>PHP信息</h3>
            <div class="row detail-row">
                 <div class="span8">
                     <label>PHP接口类型：</label><span class="detail-text"><?=php_sapi_name()?></span>
                 </div>
                 <div class="span8">
                     <label>PHP版本：</label><span class="detail-text"><?=PHP_VERSION?></span>
                 </div>

                 <div class="span8">
                     <label>PHP加载模块：</label><span class="detail-text"><?php
                         echo implode(' ',get_loaded_extensions());

                         ?></span>
                 <!--<div class="span8">
                     <label>已加载的PHP普通模块：</label><span class="detail-text"><?=system('php -m')?></span>
                 </div>-->
		     <div class="span24">
                     <label>已加载的PHP普通模块：</label>
			    <div id="grid">
   <div class="bui-simple-grid bui-simple-list bui-grid-border" style="width: 950px;" aria-disabled="false" aria-pressed="false">
    <table cellspacing="0" cellpadding="0" class="bui-grid-table">
     <thead>
      <tr>
       <th width="80" class="bui-grid-hd ">
        <div class="bui-grid-hd-inner">
         <span class="bui-grid-hd-title">模块名</span>
        </div></th>
       <th width="100" class="bui-grid-hd ">
        <div class="bui-grid-hd-inner">
         <span class="bui-grid-hd-title">模块备注</span>
        </div></th>
      </tr>
     </thead>
     <tbody>
	<?php foreach(get_loaded_extensions(false) as $key=>$module){ ?>
      <tr class="bui-grid-row bui-grid-row-odd">
       <td class="bui-grid-cell ">
        <div class="bui-grid-cell-inner">
         <span class="bui-grid-cell-text"><a href="http://php.net/manual/zh/book.<?php echo $module;?>.php" target="_new"><?php echo $module;?></a></span>
        </div></td>
       <td class="bui-grid-cell ">
        <div class="bui-grid-cell-inner">
         <span class="bui-grid-cell-text">李四</span>
        </div></td>
      </tr>
<?php } ?>
     </tbody>
    </table>
   </div>
  			</div><!-- grid end -->
                 </div>
			
             </div>
	<div class="row detail-row">
		<div class="span24">
                     <label>已加载的Zend模块：</label>
			    <div id="grid">
   <div class="bui-simple-grid bui-simple-list bui-grid-border" style="width: 950px;" aria-disabled="false" aria-pressed="false">
    <table cellspacing="0" cellpadding="0" class="bui-grid-table">
     <thead>
      <tr>
       <th width="80" class="bui-grid-hd ">
        <div class="bui-grid-hd-inner">
         <span class="bui-grid-hd-title">模块名</span>
        </div></th>
       <th width="100" class="bui-grid-hd ">
        <div class="bui-grid-hd-inner">
         <span class="bui-grid-hd-title">模块备注</span>
        </div></th>
      </tr>
     </thead>
     <tbody>
	<?php foreach(get_loaded_extensions(true) as $key=>$module){ ?>
      <tr class="bui-grid-row bui-grid-row-odd">
       <td class="bui-grid-cell ">
        <div class="bui-grid-cell-inner">
         <span class="bui-grid-cell-text"><?php echo $module;?></span>
        </div></td>
       <td class="bui-grid-cell ">
        <div class="bui-grid-cell-inner">
         <span class="bui-grid-cell-text">李四</span>
        </div></td>
      </tr>
<?php } ?>
     </tbody>
    </table>
   </div>
  			</div><!-- grid end -->
                 </div>
		</div>
         </div>
         <div class="detail-section">
             
         </div>
     </div>
 </div>
  <script type="text/javascript" src="../assets/js/jquery-1.8.1.min.js"></script>
  <script type="text/javascript" src="../assets/js/bui-min.js"></script>
  <script type="text/javascript" src="../assets/js/config-min.js"></script>
  <script type="text/javascript">
    BUI.use('common/page');
  </script>

<body>
</html>
