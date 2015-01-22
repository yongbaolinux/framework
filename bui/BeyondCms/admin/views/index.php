<!DOCTYPE HTML>
<html>
 <head>
  <title> BUI 管理系统</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <link href="<?=$PUBLIC?>/css/dpl-min.css" rel="stylesheet" type="text/css" />
  <link href="<?=$PUBLIC?>/css/bui-min.css" rel="stylesheet" type="text/css" />
   <link href="<?=$PUBLIC?>/css/main-min.css" rel="stylesheet" type="text/css" />
 </head>
 <body>

  <div class="header">
    
      <div class="dl-title">
        <a href="http://www.builive.com" title="文档库地址" target="_blank"><!-- 仅仅为了提供文档的快速入口，项目中请删除链接 -->
          <span class="lp-title-port">BUI</span><span class="dl-title-text">前端框架</span>
        </a>
      </div>

    <div class="dl-log">欢迎您，<span class="dl-log-user"><?=$adminName?></span><a href="<?=base_url()?>system.php/admin/logout" title="退出系统" class="dl-log-quit">[退出]</a><a href="http://www.builive.com/" title="文档库" class="dl-log-quit">文档库</a>
    </div>
    
    
  </div>
   <div class="content">
    <div class="dl-main-nav">
      <div class="dl-inform"><div class="dl-inform-title">贴心小秘书<s class="dl-inform-icon dl-up"></s></div></div>
      <ul id="J_Nav"  class="nav-list ks-clear">
        <li class="nav-item dl-selected"><div class="nav-item-inner nav-home">网站信息</div></li>
        <li class="nav-item"><div class="nav-item-inner nav-order">内容管理</div></li>
        <li class="nav-item"><div class="nav-item-inner nav-inventory">搜索页</div></li>
        <li class="nav-item"><div class="nav-item-inner nav-supplier">详情页</div></li>
        <li class="nav-item"><div class="nav-item-inner nav-marketing">图表</div></li>
      </ul>
    </div>
    <ul id="J_NavContent" class="dl-tab-conten">

    </ul>
   </div>
  <script type="text/javascript" src="<?=$PUBLIC?>/js/jquery-1.8.1.min.js"></script>
  <script type="text/javascript" src="<?=$PUBLIC?>/js/bui.js"></script>
  <script type="text/javascript" src="<?=$PUBLIC?>/js/config.js"></script>

  <script>
    BUI.use('common/main',function(){
      var config = [{
          id:'menu',
          homePage : 'env',
          menu:[{
              text:'基础信息',
              items:[
                {id:'env',text:'环境信息',href:'<?=base_url()?>system.php/info/envInfo'},
              ]
            },{
			  text:'网站配置',
			  items:[
			  	{id:'config',text:'基础配置',href:'<?=base_url()?>system.php/config/baseConfig'}
			  ]
			}]
          },{
            id:'form',
            menu:[{
                text:'内部文章管理',
                items:[
                  {id:'articlesCate',text:'文章分类',href:'<?=base_url()?>system.php/content/articlesCate'}, 
                  {id:'articlesList',text:'文章列表',href:'<?=base_url()?>system.php/content/articlesList'},
				  {id:'articlesVerify',text:'文章审核',href:'<?=base_url()?>system.php/content/articlesVerify'},
				  {id:'articlesRecycle',text:'文章回收站',href:'<?=base_url()?>system.php/content/articlesRecycle'},
                ]
              },{
                text:'外部数据管理',
                items:[
                {id:'collect',text:'导入文章',href:'<?=base_url()?>system.php/outerData/importArticles'},
            ]
        }]
          },{
            id:'search',
            menu:[{
                text:'搜索页面',
                items:[
                  {id:'code',text:'搜索页面代码',href:'search/code.html'},
                  {id:'example',text:'搜索页面示例',href:'search/example.html'},
                  {id:'example-dialog',text:'搜索页面编辑示例',href:'search/example-dialog.html'},
                  {id:'introduce',text:'搜索页面简介',href:'search/introduce.html'},
                  {id:'config',text:'搜索配置',href:'search/config.html'}
                ]
              },{
                text : '更多示例',
                items : [
                  {id : 'tab',text : '使用tab过滤',href : 'search/tab.html'}
                ]
              }]
          },{
            id:'detail',
            menu:[{
                text:'详情页面',
                items:[
                  {id:'code',text:'详情页面代码',href:'detail/code.html'},
                  {id:'example',text:'详情页面示例',href:'detail/example.html'},
                  {id:'introduce',text:'详情页面简介',href:'detail/introduce.html'}
                ]
              }]
          },{
            id : 'chart',
            menu : [{
              text : '图表',
              items:[
                  {id:'code',text:'引入代码',href:'chart/code.html'},
                  {id:'line',text:'折线图',href:'chart/line.html'},
                  {id:'area',text:'区域图',href:'chart/area.html'},
                  {id:'column',text:'柱状图',href:'chart/column.html'},
                  {id:'pie',text:'饼图',href:'chart/pie.html'},
                  {id:'radar',text:'雷达图',href:'chart/radar.html'}
              ]
            }]
          }];
      new PageUtil.MainPage({
        modulesConfig : config
      });
    });
  </script>
 </body>
</html>
