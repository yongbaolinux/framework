<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="StyleSheet" href="<?=base_url()?>application_res/<?=$cfg['configSiteTemplate']?>/css/index.css" />
</head>

<body>
	<div class="container" id="wrap">
    	<div id="header">
          <div id="logo-tools">
          	<a href="http://www.diskroom.com" id="logo"><img src="<?=$cfg['configSiteLogo']?>"/><span id="name"><?=$cfg['configSiteName']?></span>
            </a>
            
            <ul id="tools">
            	<li><a href="javascript:void(0);">WAP站</a> | <a href="javascript:void(0);">英文版</a> | <a href="javascript:void(0);">加为收藏</a></li>
                <li>QQ : 304513573</li>
            </ul>
          </div>
          <!-- 导航菜单 -->
          <div id="menu">
          	<ul>
            	<li><a href="index.php">首页</a></li>
                <?php foreach($menus1 as $key=>$value){?>
                	<li><a href="<?=base_url()?>index.php?c=module&m=show&mid=<?=$value['id']?>" class="<?php if($mid===$value['id']){echo 'current';}?>"><?=$value['module_cname']?></a></li>
                <?php } ?>
            </ul>
          </div>
        </div>
		<!-- banner条广告 -->
        <div id="advertisement">
        	<img src="<?=base_url()?>application_res/<?=$cfg['configSiteTemplate']?>/images/images/banner广告.png" />
        </div>
        <!-- 加入我们 -->
        <div id="join-us">
        	<h3>招聘职位</h3>
            <div id="join">
				<div class="job">
                	<h4>PHP工程师</h4>
                    <div class="job-info">
                        <dl>
                            <dt>岗位要求：</dt>
                            <dd>1.熟悉PHP，能够熟练运用各大常用PHP框架</dd>
                            <dd>2.能独立开发项目</dd>
                            <dd>3.思维严谨，工作态度认真</dd>
                        </dl>
                        <dl>
                            <dt>工作内容：</dt>
                            <dd>1.负责后台程序开发</dd>
                            <dd>2.维护现有PHP程序</dd>
                        </dl>
                        <span>招聘5人	简历发至邮箱 : xxxxx@gmail.com		更新时间 : 2014年07月24日</span>
                     </div>
                </div>
                <div class="job">
                	<h4>网页设计师</h4>
                    <div class="job-info">
                        <dl>
                            <dt>岗位要求：</dt>
                            <dd>1.有良好的视觉感受，能设计出有视觉冲击力的作品</dd>
                            <dd>2.灵活运用PS，AI等平面设计软件</dd>
                            <dd>3.懂HTML+CSS，能够熟练切图</dd>
                        </dl>
                        <dl>
                            <dt>工作内容：</dt>
                            <dd>1.负责设计WEB程序前端页面</dd>
                            <dd>2.将网页设计稿转化为HTML文件</dd>
                        </dl>
                        <span>招聘5人	简历发至邮箱 : xxxxx@gmail.com		更新时间 : 2014年07月24日</span>
                     </div>
                </div>
            </div>
        </div>
        <!-- 招聘分页 -->
        <div id="recruit-page">
        	首页 前一页 1 2 后一页 末页
        </div>
        <!-- footer -->
        <div id="footer">
        	<div><span id="copyright">@xx有限公司版权所有</span><span id="support">Diskroom提供技术支持</span></div>
            <div><span id="icp">备案号：湘xxxxxxx号</span></div>
        </div>
    </div>
</body>
</html>