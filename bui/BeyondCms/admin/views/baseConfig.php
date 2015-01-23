<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>基础配置</title>
<link href="<?=$PUBLIC?>/css/dpl-min.css" rel="stylesheet" type="text/css" />
<link href="<?=$PUBLIC?>/css/bui-min.css" rel="stylesheet" type="text/css" /
</head>

<body>
	<div id="grid" style="margin:20px;"></div>
</body>
<script type="text/javascript" src="<?=$PUBLIC?>/js/jquery-1.8.1.min.js"></script>
<!-- 引入BUI -->
<script type="text/javascript" src="<?=$PUBLIC?>/js/bui-min.js"></script>
<script type="text/javascript" src="<?=$PUBLIC?>/js/config-min.js"></script>
<script type="text/javascript">
	//渲染配置列表数据
	BUI.use(['bui/grid'],function(Grid){
		var columns = [ {title : '<input type="checkbox" onClick="javascript:chooseAllArticles(this)"/>',dataIndex :'', width:'2%',renderer:function(value,obj){
							return '<input type="checkbox"  class="bui-grid-cell-text-checkbox" value="'+obj.id+'"/>';
						}},
						{title : 'id',dataIndex :'id', width:'10%'},
			       		{title : '配置项英文名',dataIndex :'config_key', width:'20%'},
			       		{title : '配置项中文名',dataIndex : 'config_cname',width:'20%'},
			       		{title : '配置项值(1为是 0为否)',dataIndex :'config_value', width:'20%'},
			       		{title : '操作',dataIndex :'top', width:'10%',
				       		renderer:function(value,obj){
						       			return '<a href="javascript:delConfig('+obj.id+')">删除</a>';
					       	}
			       		}];
		 var data = <?=$config?>;
		 var grid = new Grid.SimpleGrid({
		  render:'#grid',
		  columns : columns,
		  items : data,
		 });
 		 grid.render();
	});
	
	function delConfig(id){
		BUI.Message.Confirm('确定要删除该项吗?',function(){
			  	$.ajax({
					'url':'ajaxDelConfigs',
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
	}
</script>
</html>
