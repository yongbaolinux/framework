<?php @ini_set('short_open_tag' , 'On');?>
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
             <h3>服务器信息</h3>
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
                 <div class="span8">
                     <label>Apache服务器加载模块：</label><span class="detail-text"><?php foreach(apache_get_modules() as $key=>$module){
                             if($key%2 == 1){
                                 echo "<a href='http://httpd.apache.org/docs/2.4/mod/".$module.".html' target='_new' style='background-color:#ccc;'>".$module."</a> ";
                             } else {
                                 echo "<a href='http://httpd.apache.org/docs/2.4/mod/".$module.".html' target='_new'>".$module."</a> ";
                             }
                         }?></span>
                 </div>
             </div>
         </div>
         <div class="detail-section">

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