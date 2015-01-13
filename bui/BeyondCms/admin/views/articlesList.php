<?php @ini_get('short_open_tag', 'On'); ?>
<!DOCTYPE HTML>
<html>
<head>
<title>文章列表</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?=$PUBLIC?>/css/dpl-min.css" rel="stylesheet" type="text/css" />
<link href="<?=$PUBLIC?>/css/bui-min.css" rel="stylesheet" type="text/css" />
<link href="<?=$PUBLIC?>/css/page-min.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<div style="margin:20px;">
		<button id="addArticle" class="button button-primary">添加文章</button>
	</div>
    <div id="grid">
    </div>
</body>
<script type="text/javascript" src="<?=$PUBLIC?>/js/jquery-1.8.1.min.js"></script>
<script type="text/javascript" src="<?=$PUBLIC?>/js/kindeditor-4.1.9/kindeditor-min.js"></script>
<script type="text/javascript" src="<?=$PUBLIC?>/js/kindeditor-4.1.9/lang/zh_CN.js"></script>
<script type="text/javascript" src="<?=$PUBLIC?>/js/bui-min.js"></script>
<script type="text/javascript" src="<?=$PUBLIC?>/js/config-min.js"></script>
<!-- Black Box -->
<script type="text/javascript" src="<?=$PUBLIC?>/js/jquery.blackbox.min.js"></script>
<!-- 引入Black Box CSS文件 切记切记 -->
<link rel="stylesheet" href="<?=$PUBLIC?>/css/blackbox.css" type="text/css" media="screen" />
<script type="text/javascript">
    //全局函数
    //点击列表选择目录
    function chooseCategory(dom){
    	  //var category_id = parseInt($(dom).attr('mid'));
		  var category_id = $(dom).html();
    	  var category_name = $(dom).html();
    	  $("#current_category").html(category_name).attr('data-id',category_id);
    	  $("#category_list").hide();
    }
    function hoverCategory(dom){
        dom.style.backgroundColor = '#eeeeee';
    }
    function outCategory(dom){
    	dom.style.backgroundColor = 'transparent';
    }
    //关闭目录列表 注意onmouseout和onmouseleave的区别
    function closeCategory(dom){
    	  dom.style.display = 'none';  
    }
   var box = new BlackBox();
   	  //添加文章
	  $("#addArticle").click(function(){
		  var menuSelect = '<select name="template">';
		  box.popup('<p>添加新文章</p><div id="addArticleDiv" style="width:960px; padding:10px; background:#F5F5F5;"><form id="addArticleForm"><p><span style="display:inline-block;width:80px;">文章标题</span><input class="text-input small-input" type="text" id="title" name="title" /><span class="x-field-error"><span class="input-notification png_bg"></span><label></label></span></p>\
		  <div style="padding:5px 0px 10px 0px;">\
		  	<span style="display:inline-block;width:80px;font-size:14px;">文章分类</span>\
			<div id="CategoryPicker" style="border-radius:5px 5px 5px 5px;display:inline-block;background:linear-gradient(#FFFCFC, #EDEEEF) repeat scroll 0 0 rgba(0, 0, 0, 0);border:1px solid #AD9C9C;padding:0 24px 0 12px;width:100px;cursor:pointer;position:relative;">\
			  <div class="current"><span style="height:30px;line-height:30px;" id="current_category" data-id="">请选择所属分类</span><span class="downArrow"></span></div>\
    			  <div id="category_list" onmouseleave="closeCategory(this);" style="display:none;position:absolute;background-color:#ffffff;border:1px solid #AAAAAA;border-radius:6px;box-shadow:0 0 17px #BBBBBB;width:245px;top:-1px;left:-1px;">\
    			  	<div id="exist_category"></div>\
    			  	<div class="create_category">\
    				<!--<input type="text" id="category_name" class="text-input" placeholder="创建新模块" style="width:100px;margin-right:8px;"/><input id="add_category" type="button" value="创建" style="border-radius:6px;border:1px solid #BBBBBB;background:-moz-linear-gradient(center top , #FDFAFB, #F9F7F7 50%, #F6F3F4 50%, #F0EDED) repeat scroll 0 0 rgba(0, 0, 0, 0);padding:6px;font-size:14px;margin-right:8px;"/>-->\
    			  </div>\
			  </div>\
		     </div>\
			<span class="x-field-error"><span class="input-notification png_bg"></span><label></label></span>\
		  </div>\
		  <p><span style="display:inline-block;width:80px;vertical-align:top;line-height:14px;">文章内容</span><textarea style="width:800px !important;height:342px;" class="text-input small-input" id="content" name="content"></textarea><span class="x-field-error"><span class="input-notification png_bg"></span><label></label></span></p><p><span style="display:inline-block;width:80px;"><input class="button" type="button" value="确认添加" id="addArticleSure" name="submit"/></span><input class="button" type="button" value="取消添加" id="addArticleCancel"/></p></form></div>',function(content){
			  	//编辑器初始化
			  	var editor = KindEditor.create(content.find("#content"),{allowImageUpload:false,width:'700px',items:['fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline','removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist','insertunorderedlist', '|', 'emoticons', 'image', 'multiimage', 'link', 'code','media','flash'],cssPath:['<?=$PUBLIC?>/js/kindeditor-4.1.9/plugins/code/prettify.css']});
				//目录选择的js
				content.find('.current').live('click',function(){
					$("#category_list").show();
					//ajax获取所有模块
					$.ajax({
						'url':'<?=$CONTROLLER?>/ajaxGetArticleCates',
						'type':'POST',
						'dataType':'json',
						'success':function(data){
							var category = '<ul>';
							for(var i = 0;i < data.length;i++){
								category += '<li style="padding-left:'+data[i].cate_level*10+'px;padding:5px;" mid="'+data[i].id+'" onclick="chooseCategory(this);" onmouseover="hoverCategory(this);" onmouseout="outCategory(this);">'+data[i].cate_cname+'</li>';
							}
							category += '</ul>';
							$("#exist_category").html(category);
						}
					});
				});
				
				//创建模块
				/*content.find('#add_category').click(function(){
					if($("#category_name").val() === ''){
						$("#category_list").hide();
					} else {
						$.ajax({
							'url':'<?=base_url()?>admin.php/admin/addCategory',
							'type':'POST',
							'data':'category_name='+$("#category_name").val(),
							'dataType':'json',
							'success':function(res){
								if(res.res){
									$("#category_list").hide();	
									$("#current_category").html(res.data.category_name).attr('data-id',res.data.id);
								} else {
									alert('添加失败或目录已存在');	
								}
							}
						});	
					}
				});*/
				
			  	content.find('#addArticleSure').click(function(){
				 	//验证数据  
					if($("#title").val() === ''){
						$("#title").next().find('span').html('!').addClass('x-icon x-icon-mini x-icon-error').next().addClass('x-field-error-text').html('标题不能为空');
						return false;
					} else {
						$("#title").next().find('span').html('').removeClass('x-icon x-icon-mini x-icon-error').next().html('');
					}
					if($("#current_category").attr('data-id') === ''){
						$("#CategoryPicker").next().find('span').html('!').addClass('x-icon x-icon-mini x-icon-error').next().addClass('x-field-error-text').html('分类不能为空');
						return false;
					} else {
						$("#CategoryPicker").next().find('span').html('').removeClass('x-icon x-icon-mini x-icon-error').next().html('');
					}
					if(editor.html() === ''){
						$("#content").next().find('span').html('!').addClass('x-icon x-icon-mini x-icon-error').next().addClass('x-field-error-text').html('内容不能为空');
						return false;
					} else {
						$("#content").next().find('span').html('').removeClass('x-icon x-icon-mini x-icon-error').next().html('');;
						var cate_id = $("#current_category").attr("data-id");
						//var cate_name = $("#current_category").html();
						//ajax提交数据
						//var add_data = 'title='+$('#title').val()+'&content='+editor.html()+'&category_id='+cate_id+'&category_name='+cate_name;
						var add_data = {'title':$('#title').val(),'content':editor.html(),'cate_id':cate_id};	//如果内容里有html实体就用对象提交
						$.ajax({
							'url':'<?=$CONTROLLER?>/ajaxAddArticle',
							'type':'POST',
							'data':add_data,
							'dataType':'json',
							'async':false,
							/*'processData':false,*/
							'success':function(data){
								if(data.code){
									//时间戳转换为时间字符串
									//res.data.postime = new Date(parseInt(res.data.postime) * 1000).toLocaleString().replace(/年|月/g, "-").replace(/日|星期/g, " ");
									//利用boxClose的回调函数
									box.boxClose(function(){
										/*var tr = '<tr><td>'+res.data.id+'</td><td><a target="_blank" href="<?=base_url()?>index.php/index/article/'+res.data.id+'">'+res.data.title+'</a></td><td>'+res.data.module_name+'</td><td>'+res.data.module_type+'</td><td>'+res.data.author+'</td><td>'+res.data.postime+'</td><td><a href="javascript:void(0);" title="article_edit" onclick="article_edit(this,'+res.data.id+')"><img src="<?=base_url()?>admin_res/images/icons/pencil.png" alt="article_edit" /></a> <a href="javascript:void(0);" title="article_del" onclick="article_del(this,'+res.data.id+')" style="cursor:pointer;"><img src="<?=base_url()?>admin_res/images/icons/cross.png" alt="article_del" /></a></td></tr>';*/
										box.alert('添加成功',function(){
											window.location.reload();
										},{});
										
									});	
								} else {
									alert('添加失败');	
								}
							}
						});
					}
				});
			 	content.find('#addArticleCancel').click(function(){
					box.boxClose();
				});
				
			});
		});

	//ajax获取全部文章分类信息
	$.ajax({
	    'url':'<?=$CONTROLLER?>/ajaxGetArticleCates',
		'type':'GET',
		'dataType':'json',
		'success':function(data){
			var html = '<option value="0">请选择</option>';
			for(i in data){
				html += '<option value="'+data[i]['id']+'">'+data[i]['cate_name']+'</option>';
			}
			$("#article-cate").html(html);
		}
	});
	//渲染文章列表数据
	BUI.use(['bui/grid','bui/data'],function(Grid){
		var Format = Grid.Format;
		var columns = [{title : 'id',dataIndex :'id', width:'10%'},
			       		{title : '文章标题',dataIndex :'title', width:'20%'},
			       		{title : '所属分类',dataIndex : 'cate_cname',width:'20%'},
			       		{title : '发布作者',dataIndex :'author', width:'20%'},
			       		{title : '发表时间',dataIndex :'ctime', width:'20%',renderer:BUI.Grid.Format.datetimeRenderer},
			       		{title : '置顶操作',dataIndex :'top', width:'10%',
				       		renderer:function(value,obj){
					       		 if(value === '1'){
						       		   return '<a href="javascript:topArticle('+obj.id+',0)">取消置顶</a><a href="javascript:editArticle('+obj.id+')">编辑</a><a href="javascript:delArticle('+obj.id+')">删除</a>';
					       		 } else {
						       			return '<a href="javascript:topArticle('+obj.id+',1)">置顶</a><a href="javascript:editArticle('+obj.id+')">编辑</a><a href="javascript:delArticle('+obj.id+')">删除</a>';
					       		 }
					       	}
			       		}];
		var data = <?=$articles?>;
		for(i in data){
			data[i]['ctime'] = parseInt(data[i]['ctime'])*1000;//BUI.Grid.Format.datetimeRenderer的参数为整形 所以在这里需要对其进行强制类型转换 （并且要注意 是毫秒数）
		}
		 var grid = new Grid.SimpleGrid({
		  render:'#grid',
		  columns : columns,
		  items : data,
		 });
 		 grid.render();
	});
</script>
</html>
