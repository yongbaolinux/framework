<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>diskroom</title>
<!-- CSS -->
<!-- Reset Stylesheet -->
<link rel="stylesheet" href="<?=base_url()?>admin_res/css/reset.css" type="text/css" media="screen" />
<!-- Main Stylesheet -->
<link rel="stylesheet" href="<?=base_url()?>admin_res/css/iframe-style.css" type="text/css" media="screen" />
<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
<link rel="stylesheet" href="<?=base_url()?>admin_res/css/invalid.css" type="text/css" media="screen" />
<!-- Javascripts -->
<!-- jQuery -->
<script type="text/javascript" src="<?=base_url()?>admin_res/scripts/jquery-1.8.2.min.js"></script>
<!-- jQuery Configuration -->
<!--<script type="text/javascript" src="<?=base_url()?>admin_res/js/simpla.jquery.configuration.js"></script>
<script type="text/javascript" src="<?=base_url()?>admin_res/js/facebox.js"></script>
<script type="text/javascript" src="<?=base_url()?>admin_res/js/jquery.wysiwyg.js"></script>
<script type="text/javascript" src="<?=base_url()?>admin_res/js/jquery.datePicker.js"></script>
<script type="text/javascript" src="<?=base_url()?>admin_res/js/jquery.date.js"></script>-->
<!-- Black Box -->
<script type="text/javascript" src="<?=base_url()?>admin_res/plugins/blackbox/js/jquery.blackbox.min.js"></script>
<!-- 引入Black Box CSS文件 切记切记 -->
<link rel="stylesheet" href="<?=base_url()?>admin_res/plugins/blackbox/css/blackbox.css" type="text/css" media="screen" />
<!-- kindeditor -->
<script type="text/javascript" src="<?=base_url()?>admin_res/plugins/kindeditor-4.1.9/kindeditor-min.js"></script>
<script type="text/javascript" src="<?=base_url()?>admin_res/plugins/kindeditor-4.1.9/lang/zh_CN.js"></script>
</head>
<body>
  <div id="main-content">
    <!-- Main Content Section with everything -->
    <noscript>
    <!-- Show a notification if the user has disabled javascript -->
    <div class="notification error png_bg">
      <div> Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
        Download From <a href="http://www.exet.tk">exet.tk</a></div>
    </div>
    </noscript>
    <!-- Page Head -->
    <div class="clear"></div>
    <!-- End .clear -->
    <div class="content-box">
      <div class="content-box-header">
        <h3>文章管理</h3>
      </div>
      <div class="content-box-content">
        <div class="tab-content default-tab"> 
          <p>
            <input type="button" id="addArticle" value="添加文章" class="button">
          </p>
          <script type="text/javascript">
		  //全局函数
		  //点击列表选择目录
		  function chooseCategory(dom){
			  var category_id = parseInt($(dom).attr('mid'));
			  var category_name = $(dom).html();
			  $("#current_category").html(category_name).attr('data-id',category_id);
			  $("#category_list").hide();
		  }
		  //关闭目录列表
		  function closeCategory(){
			  $("#category_list").hide();  
		  }
		  var box = new BlackBox();
		  //添加文章
		  $("#addArticle").click(function(){
			  var menuSelect = '<select name="template">';
			  box.popup('<div id="addArticleDiv" style="width:960px; padding:10px; background:#F5F5F5;"><form id="addArticleForm"><p><span style="display:inline-block;width:80px;">文章标题</span><input class="text-input small-input" type="text" id="title" name="title" /><span class="input-notification png_bg"></span><small></small></p>\
			  <div style="padding:5px 0px 10px 0px;">\
			  	<span style="display:inline-block;width:80px;font-size:14px;">所属模块</span>\
				<div id="CategoryPicker" style="border-radius:5px 5px 5px 5px;display:inline-block;background:linear-gradient(#FFFCFC, #EDEEEF) repeat scroll 0 0 rgba(0, 0, 0, 0);border:1px solid #AD9C9C;padding:0 24px 0 12px;width:100px;cursor:pointer;position:relative;">\
				  <div class="current"><span style="height:30px;line-height:30px;" id="current_category" data-id="">请选择所属模块</span><span class="downArrow"></span></div>\
				  <div id="category_list" style="display:none;position:absolute;background-color:#ffffff;border:1px solid #AAAAAA;border-radius:6px;box-shadow:0 0 17px #BBBBBB;width:245px;top:-1px;left:-1px;">\
				  	<div id="exist_category"></div>\
				  	<div class="create_category">\
					<!--<input type="text" id="category_name" class="text-input" placeholder="创建新模块" style="width:100px;margin-right:8px;"/><input id="add_category" type="button" value="创建" style="border-radius:6px;border:1px solid #BBBBBB;background:-moz-linear-gradient(center top , #FDFAFB, #F9F7F7 50%, #F6F3F4 50%, #F0EDED) repeat scroll 0 0 rgba(0, 0, 0, 0);padding:6px;font-size:14px;margin-right:8px;"/>-->\
					<input id="close_category" type="button" value="关闭" onclick="closeCategory();"style="border-radius:6px;border:1px solid #BBBBBB;background:-moz-linear-gradient(center top , #FDFAFB, #F9F7F7 50%, #F6F3F4 50%, #F0EDED) repeat scroll 0 0 rgba(0, 0, 0, 0);padding:6px;font-size:14px;"/></div>\
				  </div>\
				</div>\
				<span class="input-notification png_bg"></span><small></small>\
			  </div>\
			  <p><span style="display:inline-block;width:80px;vertical-align:top;line-height:14px;">文章内容</span><textarea style="width:800px !important;height:342px;" class="text-input small-input" id="content" name="content"></textarea><span class="input-notification png_bg"></span><small></small></p><p><span style="display:inline-block;width:80px;"><input class="button" type="button" value="确认添加" id="addArticleSure" name="submit"/></span><input class="button" type="button" value="取消添加" id="addArticleCancel"/></p></form></div>',function(content){
				  	//编辑器初始化
				  	var editor = KindEditor.create(content.find("#content"),{allowImageUpload:false,width:'700px',items:['fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline','removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist','insertunorderedlist', '|', 'emoticons', 'image', 'multiimage', 'link', 'code','media','flash'],cssPath:['<?=base_url()?>admin_res/plugins/kindeditor-4.1.9/plugins/code/prettify.css']});
					//目录选择的js
					content.find('.current').click(function(){
						$("#category_list").show();
						//ajax获取所有模块
						$.ajax({
							'url':'<?=base_url()?>admin_s.php/modules/getAllModules',
							'type':'POST',
							'dataType':'json',
							'success':function(res){
								var category = '<ul>';
								for(var i = 0;i < res.length;i++){
									category += '<li style="padding-left:'+res[i].module_level*10+'px;" mid="'+res[i].id+'" onclick="chooseCategory(this);">'+res[i].module_cname+'</li>';
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
							$("#title").next().html('标题不能为空').css('color','#F00');
							return false;
						} else {
							$("#title").next().html('');
						}
						if($("#current_category").attr('data-id') === ''){
							$("#CategoryPicker").next().html('模块不能为空').css('color','#F00');
							return false;
						} else {
							$("#CategoryPicker").next().html('');
						}
						if(editor.html() === ''){
							$("#content").next().html('内容不能为空').css('color','#F00');
							return false;
						} else {
							$("#content").next().html('');
							var module_id = $("#current_category").attr("data-id");
							//var cate_name = $("#current_category").html();
							//ajax提交数据
							//var add_data = 'title='+$('#title').val()+'&content='+editor.html()+'&category_id='+cate_id+'&category_name='+cate_name;
							var add_data = {'title':$('#title').val(),'content':editor.html(),'module_id':module_id};	//如果内容里有html实体就用对象提交
							$.ajax({
								'url':'<?=base_url()?>admin_s.php/articles/doAddArticle',
								'type':'POST',
								'data':add_data,
								'dataType':'json',
								'async':false,
								/*'processData':false,*/
								'success':function(res){
									if(res.res){
										//时间戳转换为时间字符串
										res.data.postime = new Date(parseInt(res.data.postime) * 1000).toLocaleString().replace(/年|月/g, "-").replace(/日|星期/g, " ");
										//利用boxClose的回调函数
										box.boxClose(function(){
											var tr = '<tr><td>'+res.data.id+'</td><td><a target="_blank" href="<?=base_url()?>index.php/index/article/'+res.data.id+'">'+res.data.title+'</a></td><td>'+res.data.module_name+'</td><td>'+res.data.module_type+'</td><td>'+res.data.author+'</td><td>'+res.data.postime+'</td><td><a href="javascript:void(0);" title="article_edit" onclick="article_edit(this,'+res.data.id+')"><img src="<?=base_url()?>admin_res/images/icons/pencil.png" alt="article_edit" /></a> <a href="javascript:void(0);" title="article_del" onclick="article_del(this,'+res.data.id+')" style="cursor:pointer;"><img src="<?=base_url()?>admin_res/images/icons/cross.png" alt="article_del" /></a></td></tr>';
											box.alert('添加成功',function(){
												$("#articles tbody").prepend(tr);
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
			
			//删除文章
			function article_del(dom,id){
				box.confirm('确定删除',function(data){
					if(data){
						var post_data = {'id':id};
						$.ajax({
							'url':'<?=base_url()?>admin_s.php/articles/doDelArticle',
							'type':'POST',
							'data':post_data,
							'dataType':'json',
							'success':function(res){
								if(res){
									$(dom).parent().parent().remove();
								} else {
									alert('删除失败');
								}
							}
						});
					}
				},{title:'删除',value:''});
			}
			
			//修改文章
			function article_edit(dom,id){
				var id = parseInt(id);
				//获取单篇文章信息
				$.ajax({
					'url':'<?=base_url()?>admin_s.php/articles/editArticle',
					'data':{'id':id},
					'type':'POST',
					'dataType':'json',
					'success':function(result){
						box.popup('<div id="editArticleDiv" style="width:960px; padding:10px; background:#F5F5F5;"><form id="editArticleForm">\
						  <p><span style="display:inline-block;width:80px;">文章标题</span><input class="text-input small-input" type="text" id="title" name="title" value="'+result.data[0].title+'"/><span class="input-notification png_bg"></span><small></small></p>\
						  <div style="padding:5px 0px 10px 0px;">\
							<span style="display:inline-block;width:80px;font-size:14px;">文章目录</span>\
							<div style="border-radius:5px 5px 5px 5px;display:inline-block;background:linear-gradient(#FFFCFC, #EDEEEF) repeat scroll 0 0 rgba(0, 0, 0, 0);border:1px solid #AD9C9C;padding:0 24px 0 12px;width:100px;cursor:pointer;position:relative;">\
							  <div class="current"><span style="height:30px;line-height:30px;" id="current_category" data-id="'+result.data[0].module_id+'">'+result.data[0].module_cname+'</span><span class="downArrow"></span></div>\
							  <div id="category_list" style="display:none;position:absolute;background-color:#ffffff;border:1px solid #AAAAAA;border-radius:6px;box-shadow:0 0 17px #BBBBBB;width:200px;top:-1px;left:-1px;z-index:999;">\
								<div id="exist_category"></div><div class="create_category"><input id="close_category" type="button" value="关闭" onclick="closeCategory();"style="border-radius:6px;border:1px solid #BBBBBB;background:-moz-linear-gradient(center top , #FDFAFB, #F9F7F7 50%, #F6F3F4 50%, #F0EDED) repeat scroll 0 0 rgba(0, 0, 0, 0);padding:6px;font-size:14px;"/></div>\
							  </div>\
							</div>\
						  </div>\
						  <p><span style="display:inline-block;width:80px;vertical-align:top;line-height:14px;">文本内容</span><textarea style="width:800px !important;height:342px;" class="text-input small-input" id="content" name="content"></textarea></p><p><span style="display:inline-block;width:80px;"><input class="button" type="button" value="确认修改" id="editArticleSure" name="submit"/></span><input class="button" type="button" value="取消修改" id="editArticleCancel"/></p></form></div>',
						  	function(content){
								//变换博文的目录
								content.find(".current").click(function(){
									$.ajax({
										'url':'<?=base_url()?>admin_s.php/modules/getAllModules',
										'type':'POST',
										'dataType':'json',
										'success':function(res){
											var category = '<ul style="height:200px;overflow:scroll;">';
											for(var i = 0;i < res.length;i++){
												category += '<li style="padding-left:'+res[i].module_level*10+'px;" mid="'+res[i].id+'" onclick="chooseCategory(this);">'+res[i].module_cname+'</li>';
											}
											category += '</ul>';
											$("#exist_category").html(category);
										}
									});
									$("#category_list").show();	
								});
								//初始化编辑器及设置好编辑器的值
							  var editor = KindEditor.create(content.find("#content"),{allowImageUpload:false,width:'700px',items:['fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline','removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist','insertunorderedlist', '|', 'emoticons', 'image', 'multiimage', 'link', 'code'],cssPath:['<?=base_url()?>admin_res/plugins/kindeditor-4.1.9/plugins/code/prettify.css'] });
							  editor.html(result.data[0].content);
							  content.find('#editArticleSure').click(function(){
								  var module_id = $("#current_category").attr("data-id");
								  //var module_cname = $.trim($("#current_category").html());
								  //var edit_data = 'title='+$("#title").val()+'&id='+id+'&content='+editor.html()+'&category_id='+cate_id+'&category_name='+cate_name;
								  //提交的内容里有html实体 就用对象提交
								  var edit_data = {'title':$("#title").val(),'id':id,'content':editor.html(),'module_id':module_id};	
								  $.ajax({
									  'url':'<?=base_url()?>admin_s.php/articles/doEditArticle',
									  'type':'POST',
									  'data':edit_data,
									  'dataType':'json',
									  'success':function(result){
										 if(result.res){
											 box.boxClose(function(){
												 	/*$(dom).parent().parent().children().eq(1).children().html(result.data.title);
													$(dom).parent().parent().children().eq(2).html(result.data.category_name);*/
													box.alert('修改成功',function(){
														window.location.reload();
														},{});													
												});
										 } else {
											box.boxClose(function(){
													alert('修改失败');
												}); 
										 }
									  }
								  });
							  })
							  
							  content.find('#editArticleCancel').click(function(){
								  box.boxClose();
							  });
						  });	
					}
				});
				
			}
		  </script>
          <table id="articles">
            <thead>
              <tr>
              	<th><a href="<?=base_url()?>admin.php/admin/articles/order/id/by/">id</a></th>
                <th width="20%">文章标题</th>
                <th>所属模块</th>
                <th>模块类型</th>
                <th>作者</th>
                <th><a href="<?=base_url()?>admin.php/admin/articles/order/postime/by/">发表时间</a></th>
                <th>操作</th>
              </tr>
            </thead>
            <tfoot>
                <tr>
                  <td colspan="6">
                    <!--<div class="bulk-actions align-left">
                      <select name="dropdown">
                        <option value="option1">Choose an action...</option>
                        <option value="option2">Edit</option>
                        <option value="option3">Delete</option>
                      </select>
                      <a class="button" href="#">应用到所选</a> </div>-->
                    <!--<div class="pagination"> <a href="#" title="First Page">&laquo; First</a><a href="#" title="Previous Page">&laquo; Previous</a> <a href="#" class="number" title="1">1</a> <a href="#" class="number" title="2">2</a> <a href="#" class="number current" title="3">3</a> <a href="#" class="number" title="4">4</a> <a href="#" title="Next Page">Next &raquo;</a><a href="#" title="Last Page">Last &raquo;</a> </div>-->
                    <div class="pagination"><?php echo $pagination; ?></div>
                    <!-- End .pagination -->
                    <div class="clear"></div>
                  </td>
                </tr>
            </tfoot>
            <tbody>
			 <?php foreach($articles as $article){ ?> 
              <tr>
              	<td><?=$article['id']?></td>
                <td><a href="<?=base_url()?>index.php/index/article/<?=$article['id']?>" title="<?=$article['title']?>" target="_blank"><?=$article['title']?></a></td>
                <td><?=$article['module_cname']?></td>
                <td><?php 
					switch($article['module_type']){
						case 1:
							echo '单页面';
							break;
						case 2:
							echo '列表页';
							break;
						case 3:
							echo '图片页';
						case 4:
							echo '下载页';
						default:
							break;
					}
				?></td>
                <td><?=$article['creator']?></td>
                <td><?=date('Y-m-d H:i:s',$article['ctime']);?></td>
                <td>
                  <a href="javascript:void(0);" title="article_edit" onclick="article_edit(this,<?=$article['id']?>)"><img src="<?=base_url()?>admin_res/images/icons/pencil.png" alt="menu_edit" /></a> <a href="javascript:void(0);" title="article_del" onclick="article_del(this,<?=$article['id']?>)" style="cursor:pointer;"><img src="<?=base_url()?>admin_res/images/icons/cross.png" alt="menu_del" /></a></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- End #footer -->
  </div>
  <!-- End #main-content -->
</body>
<!-- Download From www.exet.tk-->
</html>
