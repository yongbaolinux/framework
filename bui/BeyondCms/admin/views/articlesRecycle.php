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
    		<option value="1">还原所选</option>
        	<option value="2">清空所选</option>
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
<script type="text/javascript">
    //全局函数

	//清空一篇文章
	function destroyArticle(id){
		BUI.use('bui/overlay',function(Overlay){
		  BUI.Message.Confirm('确定要清空该项吗?',function(){
			  	$.ajax({
					'url':'ajaxDestroyArticles',
					'type':'POST',
					'data':{'article_ids':id},
					'dataType':'json',
					'success':function(data){
						if(data){
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
	//还原一篇文章
	function restoreArticle(id,top,dom){
		$.ajax({
			'url':'ajaxRestoreArticles',
			'data':{'article_ids':id},
			'dataType':'json',
			'type':'POST',
			'success':function(data){
				window.location.reload();
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
				/*BUI.Message.Show({
					msg : '未选中任何单位',
					icon : 'error',
					buttons : [],
					//autoHide : true,
					//autoHideDelay : 2000		//这个属性会给后面的Message.Confirm带来影响 这个BUG会让Confirem也自动隐藏掉
				});*/
				BUI.Message.Alert('未选中任何单位','error');
			} else {
				if(dom.value == '1'){
					BUI.Message.Confirm('确定要还原所选项?',function(){
						$.ajax({
							'url':'ajaxRestoreArticles',
							'type':'POST',
							'data':{'article_ids':selected_ids},
							'datType':'json',
							'success':function(data){
								/* BUI.Message.Show({
									msg : '还原成功',
									icon : 'success',
									buttons : [],
								}); */
								window.location.reload();
							}
						});
					},'question');
				}
				if(dom.value == '2'){
					BUI.Message.Confirm('确定要清空所选项?',function(){
						$.ajax({
							'url':'ajaxDestroyArticles',
							'type':'POST',
							'data':{'article_ids':selected_ids},
							'datType':'json',
							'success':function(data){
								if(data){
									BUI.Message.Show({
										msg : '清空成功',
										icon : 'success',
										buttons : [],
									});
								} else {
									BUI.Message.Show({
										msg : '清空失败',
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
			       		{title : '操作',dataIndex :'top', width:'10%',
				       		renderer:function(value,obj){
						       	return '<a onClick="javascript:topArticle('+obj.id+',0,this)" href="javascript:void(0)">还原</a> <a href="javascript:destroyArticle('+obj.id+')">清空</a>';
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
