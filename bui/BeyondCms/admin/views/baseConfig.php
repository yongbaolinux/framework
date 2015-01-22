<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>基础配置</title>
<script type="text/javascript" src="<?=$PUBLIC?>/js/jquery-1.8.1.min.js"></script>
<!-- 引入BUI -->
<script type="text/javascript" src="<?=$PUBLIC?>/js/bui-min.js"></script>
<script type="text/javascript" src="<?=$PUBLIC?>/js/config-min.js"></script>
</head>

<body>
</body>
<script type="text/javascript">
	//渲染配置列表数据
	BUI.use(['bui/grid'],function(Grid){
		var columns = [ {title : '<input type="checkbox" onClick="javascript:chooseAllArticles(this)"/>',dataIndex :'', width:'2%',renderer:function(value,obj){
							return '<input type="checkbox"  class="bui-grid-cell-text-checkbox" value="'+obj.id+'"/>';
						}},
						{title : 'id',dataIndex :'id', width:'10%'},
			       		{title : '配置项英文名',dataIndex :'title', width:'20%'},
			       		{title : '配置项中文名',dataIndex : 'cate_cname',width:'20%'},
			       		{title : '配置项值',dataIndex :'ctime', width:'20%',renderer:BUI.Grid.Format.datetimeRenderer},
			       		{title : '操作',dataIndex :'top', width:'10%',
				       		renderer:function(value,obj){
					       		 if(value === '1'){
						       		   return '<a onClick="javascript:topArticle('+obj.id+',0,this)" href="javascript:void(0)">取消置顶</a> <a href="javascript:editArticle('+obj.id+')">编辑</a> <a href="javascript:delArticle('+obj.id+')">删除</a>';
					       		 } else {
						       			return '<a onClick="javascript:topArticle('+obj.id+',1,this)" href="javascript:void(0)">置顶</a> <a href="javascript:editArticle('+obj.id+')">编辑</a> <a href="javascript:delArticle('+obj.id+')">删除</a>';
					       		 }
					       	}
			       		}];
		var data = <?=$config?>;
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
