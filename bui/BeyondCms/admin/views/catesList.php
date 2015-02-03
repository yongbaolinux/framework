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
	<div id="category_container" style="margin: 20px;">
    </div>
</body>
<script type="text/javascript" src="<?=$PUBLIC?>/js/jquery-1.8.1.min.js"></script>
<script type="text/javascript" src="<?=$PUBLIC?>/js/sea.js"></script>
<script type="text/javascript" src="<?=$PUBLIC?>/js/config-min2.js"></script>
<script type="text/javascript">

	BUI.use(['bui/tree','bui/menu'],function(Tree,Menu){
		var data = [ {text : '1',id : '1',children: [{text : '11',id : '11'}]},
{text : '2',id : '2',expanded : true,children : [
{text : '21',id : '21',children : [{text : '211',id : '211'},{text : '212',id : '212'}]},
{text : '22',id : '22'}
]},
{text : '3',id : '3'},
{text : '4',id : '4'}];
		 //由于这个树，不显示根节点，所以可以不指定根节点
		var tree = new Tree.TreeList({
			  render : '#category_container',
			  root : { //由于要显示根节点，所以需要配置根节点
				  id : '0',
				  text : '分类根节点',
				  expanded : true,
				  children : data
			  },
			  showLine : true, //显示连接线
			  showRoot : true
		});
		tree.render();
	    //构造菜单对象
	    var menu = new Menu.ContextMenu({
	    	 children : [
                {
                    iconCls:' icon-plus',
                    text : '新建',
                    listeners:{
                        'click':addCategory                  //绑定菜单点击事件
                    }
                },
                {xclass:'menu-item-sparator'},
                {
                    iconCls:'icon-remove',
                    text: '删除'
                },
                {
                    iconCls:'icon-pencil',
                    text : '编辑',
                    listeners:{
                        'click':editCategory
                    }
                }
             ]
		});
		
	    //添加分类
		function addCategory(e){
			//console.log(e.target);
		}
		//编辑分类
		function editCategory(){
			  	
		}
	    //tree绑定菜单
		tree.on('itemcontextmenu',function(e){
			var item = e.item;
			console.log(item);
			tree.setSelected(item);
			menu.set('xy',[e.pageX,e.pageY]);
		    menu.show();
		    return false;
		});
		
	});
</script>
</html>
