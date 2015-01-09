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
		<button id="btnShow" class="button button-primary">添加文章</button>
	</div>
	<div id="content" class="hidden" style="display:none;">
		<form id="form" class="form-horizontal">
			<div class="row">
				<div class="control-group span8">
					<label class="control-label">文章标题：</label>
					<div class="controls">
						<input type="text" class="input-normal control-text"
							data-rules="{required : true}">
					</div>
				</div>
				<div class="control-group span8">
					<label class="control-label">文章分类：</label>
					<div class="controls">
						<select class="input-normal" name="article-cate">
							<option value="0">请选择</option>
							<option value="">淘宝卖家</option>
							<option value="">大厂直供</option>
						</select>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="control-group span15">
					<label class="control-label">起始日期：</label>
					<div class="controls">
						<input class="input-small control-text" type="text"><label>&nbsp;-&nbsp;</label><input
							class="input-small control-text" type="text">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="control-group span15">
					<label class="control-label">备注：</label>
					<div class="controls control-row4">
						<textarea class="input-large" type="text"></textarea>
					</div>
				</div>
			</div>
		</form>
	</div>
</body>
<script type="text/javascript" src="<?=$PUBLIC?>/js/jquery-1.8.1.min.js"></script>
<script type="text/javascript" src="<?=$PUBLIC?>/js/bui-min.js"></script>
<script type="text/javascript" src="<?=$PUBLIC?>/js/config-min.js"></script>
<script type="text/javascript">
   BUI.use('bui/grid',function(Grid){
        	var Grid = Grid,
        	columns = [
        	{title : '表头',dataIndex :'a', width:'10%'},
        	{title : '表头2(20%)',dataIndex :'b', width:'20%'},
        	{title : '表头3(70%)',dataIndex : 'c',width:'70%'}
        	],
        	data = [{'a':'123'},{'a':'cdd','b':'edd'},{'a':'1333','c':'eee'}];
        	
        	var grid = new Grid.SimpleGrid({
        	render:'#grid',
        	columns : columns,
        	items : data,
        	idField : 'a'
    	});
    	 
    	grid.render();
	});

	BUI.use('bui/overlay',function(Overlay){
		var dialog = new Overlay.Dialog({
			'title':'新增文章',
			'width':500,
			'height':320,
			'contentId':'content',
			'success':function(){
			     alert('OK');
			     this.close();
			}
		});
		$("#btnShow").click(function(){
			dialog.show();
		});
	});

	//ajax获取全部文章分类信息
	$.ajax({
	    
	});
</script>
</html>
