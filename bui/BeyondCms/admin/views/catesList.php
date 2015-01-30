<?php @ini_get('short_open_tag', 'On'); ?>
<!DOCTYPE HTML>
<html>
<head>
<title>文章分类</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?=$PUBLIC?>/css/dpl-min.css" rel="stylesheet" type="text/css" />
<link href="<?=$PUBLIC?>/css/bui-min.css" rel="stylesheet" type="text/css" />
<link href="<?=$PUBLIC?>/css/page-min.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<div id="t1">
    </div>
	
</body>
<script type="text/javascript" src="<?=$PUBLIC?>/js/jquery-1.8.1.min.js"></script>
<script type="text/javascript" src="<?=$PUBLIC?>/js/bui-min.js"></script>
<script type="text/javascript" src="<?=$PUBLIC?>/js/config-min.js"></script>
<script type="text/javascript">

	BUI.use(['bui/tree','bui/menu'],function(Tree,Menu){
		var data = [
            {text : '1',id : '1',children: [{text : '11',id : '11'}]},
            {text : '2',id : '2',expanded : true,children : [
            {text : '21',id : '21',children : [{text : '211',id : '211'},{text : '212',id : '212'}]},
            {text : '22',id : '22'}
            ]},
            {text : '3',id : '3'},
            {text : '4',id : '4'}
        ];
		 //由于这个树，不显示根节点，所以可以不指定根节点
		var tree = new Tree.TreeList({
			  render : '#t1',
			  root : { //由于要显示根节点，所以需要配置根节点
				  id : '0',
				  text : '根节点',
				  expanded : true,
				  children : data
			  },
			  showLine : true, //显示连接线
			  showRoot : true
		});
		tree.render();
		
	});
</script>
</html>
