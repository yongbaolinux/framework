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
    <div id="grid" style="margin:20px;">
    	<select onChange="javascript:multiOperateArticles(this)" style="margin-bottom:20px;">
        	<option value="0">批量操作</option>
    		<option value="1">审核所选</option>
        	<option value="2">删除所选</option>
    	</select>
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
<!-- 引入上传插件uploadify -->
<script type="text/javascript" src="<?=$PUBLIC?>/js/uploadify_flash/jquery.uploadify.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?=$PUBLIC?>/js/uploadify_flash/uploadify.css" media="screen" />
<script type="text/javascript">
    //全局函数
    //点击列表选择目录
    function chooseCategory(dom){
    	  //var category_id = parseInt($(dom).attr('mid'));
		  var category_id = $(dom).html();
    	  var category_name = $(dom).html();
    	  $("#current_category").html(category_name).attr('data-cname',category_id);
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
   	//审核文章
	function verifyArticle(id){
		var id = parseInt(id);
		//获取单篇文章信息
		$.ajax({
			'url':'ajaxGetOneArticle',
			'data':{'article_id':id},
			'type':'POST',
			'dataType':'json',
			'success':function(result){
				result.thumbPath = result.thumbPath ? result.thumbPath : '<?=$PUBLIC?>img/defaultArticleThumb.jpg';
				box.popup('<p class="title">修改文章</p><div id="editNewDiv" style="width:960px; padding:10px; background:#F5F5F5;"><form id="editArticleForm">\
				  <p><span style="display:inline-block;width:80px;">文章标题</span><input class="text-input small-input" type="text" id="title" name="title" value="'+result.title+'"/><span class="input-notification png_bg"></span><small></small></p>\
				  <div style="padding:5px 0px 10px 0px;">\
					<span style="display:inline-block;width:80px;font-size:14px;">文章分类</span>\
					<div style="border-radius:5px 5px 5px 5px;display:inline-block;background:linear-gradient(#FFFCFC, #EDEEEF) repeat scroll 0 0 rgba(0, 0, 0, 0);border:1px solid #AD9C9C;padding:0 24px 0 12px;width:100px;cursor:pointer;position:relative;">\
					  <div class="current"><span style="height:30px;line-height:30px;" id="current_category" data-cname="'+result.cate_cname+'">'+result.cate_cname+'</span><span class="downArrow"></span></div>\
					  <div id="category_list" onmouseleave="closeCategory(this);" style="display:none;position:absolute;background-color:#ffffff;border:1px solid #AAAAAA;border-radius:6px;box-shadow:0 0 17px #BBBBBB;width:200px;top:-1px;left:-1px;z-index:999;">\
						<div id="exist_category"></div>\
					  </div>\
					</div>\
				  </div>\
				  <p><span style="display:inline-block;width:80px;">文章封面</span><input type="file" id="editThumb" /><span class="input-notification png_bg"></span><small></small></p>\
				  <p><span style="display:inline-block;width:80px;"></span><img src="'+result.thumbPath+'" width="150px" height="150px" id="editThumbImg"/><input type="hidden" id="verifyThumbPath" name="verifyThumbPath" value="'+result.thumbPath+'"/></p>\
				  <p><span style="display:inline-block;width:80px;vertical-align:top;line-height:14px;">文本内容</span><textarea style="width:800px !important;height:342px;" class="text-input small-input" id="content" name="content"></textarea></p><p><span style="display:inline-block;width:80px;"><input class="button" type="button" value="通过审核" id="verifyArticleSure"/></span><input class="button" type="button" value="取消" id="verifyArticleCancel"/></p></form></div>',
					function(content){
						//初始化封面上传插件uploadify
						content.find("#editThumb").uploadify({
							'multi':false,								//是否允许多文件上传
							'auto':true,								//是否允许自动上传
							'width':'120',								//上传控件宽度
							'height':'30',								//上传控件高度
							'fileTypeExts':'*.*',						//所允许上传文件的类型
							'fileSizeLimit':'6144KB',					//所允许上传文件的大小
							'buttonText':'修改文章封面',					//控件外观文字
							'formData':{'time' : '<?php echo time();?>','token' : '<?php echo md5('I_love_you' . time());?>','session_id':'<?php echo session_id(); ?>','savePath':'articleThumbs'},				//POST提交给图片接口的数据
							'swf':'<?=$PUBLIC?>/js/uploadify_flash/uploadify.swf',	//swf地址
							'uploader':'imageUploaderApi',							//图片上传接口
							'onUploadSuccess':function(file,data,response){			//图片上传成功后的回调方法
								var data = $.parseJSON(data);
								$("#editThumb-queue").next().removeClass('error').addClass('success').html('上传成功');
								$("#editThumbImg").attr('src',data.msg);
								$("#verifyThumbPath").val(data.msg);
							}
						});
						//变换博文的目录
						content.find(".current").click(function(){
							$.ajax({
								'url':'ajaxGetArticleCates',
								'type':'POST',
								'dataType':'json',
								'success':function(res){
									var category = '<ul>';
									for(var i = 0;i < res.length;i++){
										category += '<li style="padding:10px;" mid="'+res[i].id+'" onclick="chooseCategory(this);" onmouseover="hoverCategory(this);" onmouseout="outCategory(this);">'+res[i].cate_cname+'</li>';
									}
									category += '</ul>';
									$("#exist_category").html(category);
								}
							});
							$("#category_list").show();	
						});

						//初始化编辑器及设置好编辑器的值
					  var editor = KindEditor.create(content.find("#content"),{allowImageUpload:false,width:'700px',items:['fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline','removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist','insertunorderedlist', '|', 'emoticons', 'image', 'multiimage', 'link', 'code','media','flash'],cssPath:['<?=$PUBLIC?>/js/kindeditor-4.1.9/plugins/code/prettify.css'] });
					  editor.html(result.content);
					  
					  content.find('#verifyArticleSure').click(function(){
						  //Todo 验证表单数据
						  var cate_cname = $("#current_category").attr("data-cname");
						  var verify_data = {'title':$("#title").val(),'id':id,'content':editor.html(),'cate_cname':cate_cname,'thumb':$("#verifyThumbPath").val()};	
						  $.ajax({
							  'url':'ajaxVerifyOneArticle',
							  'type':'POST',
							  'data':verify_data,
							  'dataType':'json',
							  'success':function(result){
								 if(result.code > 0){
									/*box.boxClose(function(){
										box.alert('修改成功',function(){
											window.location.reload();
											},{});							
									});*/
									window.location.reload();
								 } else {
									/*box.boxClose(function(){
										alert('修改失败');
									}); */
									alert(result.msg);
								 }
							  }
						  });
					  })
					  
					  content.find('#verifyArticleCancel').click(function(){
						  box.boxClose();
					  });
				  });	
			}
		});
		
	}

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
	//删除文章
	function delArticle(id){
		BUI.use('bui/overlay',function(Overlay){
		  BUI.Message.Confirm('确定要删除该项吗?',function(){
			  	$.ajax({
					'url':'ajaxDelArticles',
					'type':'POST',
					'data':{'article_id':id},
					'dataType':'json',
					'success':function(data){
						if(data.code){
							 BUI.Message.Show({
								msg : '删除成功',
								icon : 'success',
								buttons : [],
								autoHide : true,
								autoHideDelay : 1000
							 });
						} else {
							 BUI.Message.Show({
								msg : '删除失败',
								icon : 'error',
								buttons : [],
								autoHide : true,
								autoHideDelay : 1000
							});
						}
						function refresh_(){
							window.location.reload();	
						}
						setTimeout(refresh_,1000);
					}
				});
			},'question');
		});
	}
	//置顶一篇文章
	function topArticle(id,top,dom){
		$.ajax({
			'url':'ajaxTopArticles',
			'data':{'article_ids':id,'top':top},
			'dataType':'json',
			'type':'POST',
			'success':function(data){
				if(data === false){
					BUI.Message.Show({
						msg : '置顶失败',
						icon : 'error',
						buttons : [],
						autoHide : true,
						autoHideDelay : 2000
					});
				} else {
					if(top == 1){
						$(dom).html('取消置顶').attr('onClick','javascript:topArticle('+id+',0,this)');
					} else if(top == 0){
						$(dom).html('置顶').attr('onClick','javascript:topArticle('+id+',1,this)');
					}
				}
			}
		});
	}
	
	//选中所有文章
	function chooseAllArticles(dom){
		if(dom.checked === true){
		  $("#grid").find(".bui-grid-cell-text-checkbox").each(function(index, element) {
			  if(element.checked === false){
				  element.checked = true;
			  }
		  });
		} else {
		  $("#grid").find(".bui-grid-cell-text-checkbox").each(function(index, element) {
			  if(element.checked === true){
				  element.checked = false;
			  }
		  });
		}
	}
	//批量操作文章
	function multiOperateArticles(dom){
		if(dom.value !== '0'){
			var selected_count = 0;	//被选中的单位数
			var selected_ids = [];  //被选中的单位的id数组
			$("#grid").find(".bui-grid-cell-text-checkbox").each(function(index, element) {
				  if(element.checked === true){
					  selected_count++;
					  selected_ids.push(element.value);
				  }
			});
			if(selected_count === 0 ){
				$(dom).children().get(0).selected = true;
				BUI.Message.Alert('未选中任何单位','error');
			} else {
				if(dom.value == '1'){
					BUI.Message.Confirm('确定要将所选中的文章通过审核?',function(){
						$.ajax({
							'url':'ajaxVerifyArticles',
							'type':'POST',
							'data':{'article_ids':selected_ids},
							'datType':'json',
							'success':function(data){
								BUI.Message.Show({
									msg : data.msg,
									icon : 'success',
									buttons : [],
								});
								window.location.reload();
							}
						});
					},'question');
				}
				if(dom.value == '2'){
					BUI.Message.Confirm('确定要删除所选项?',function(){
						$.ajax({
							'url':'ajaxDelArticles',
							'type':'POST',
							'data':{'article_ids':selected_ids},
							'datType':'json',
							'success':function(data){
								if(data){
									BUI.Message.Show({
										msg : '删除成功',
										icon : 'success',
										buttons : [],
									});
									
								} else {
									BUI.Message.Show({
										msg : '删除失败',
										icon : 'success',
										buttons : [],
									});
								}
								window.location.reload();
							}
						});
					},'question');
				}
			}
		}
	}

	//渲染文章列表数据
	BUI.use(['bui/grid','bui/data'],function(Grid){
		var columns = [ {title : '<input type="checkbox" onClick="javascript:chooseAllArticles(this)"/>',dataIndex :'', width:'2%',renderer:function(value,obj){
							return '<input type="checkbox"  class="bui-grid-cell-text-checkbox" value="'+obj.id+'"/>';
						}},
						{title : 'id',dataIndex :'id', width:'10%'},
			       		{title : '文章标题',dataIndex :'title', width:'20%'},
			       		{title : '所属分类',dataIndex : 'cate_cname',width:'20%'},
			       		{title : '发布作者',dataIndex :'author', width:'20%'},
			       		{title : '发表时间',dataIndex :'ctime', width:'20%',renderer:BUI.Grid.Format.datetimeRenderer},
			       		{title : '操作',dataIndex :'', width:'10%',
				       		renderer:function(value,obj){
						       		return ' <a href="javascript:verifyArticle('+obj.id+')">审核</a> <a href="javascript:delArticle('+obj.id+')">删除</a>';
					       		 
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
