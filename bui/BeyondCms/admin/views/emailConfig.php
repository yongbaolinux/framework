<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>邮件发送</title>
<link href="<?=$PUBLIC?>/css/dpl-min.css" rel="stylesheet" type="text/css" />
<link href="<?=$PUBLIC?>/css/bui-min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?=$PUBLIC?>/js/jquery-1.8.1.min.js"></script>
<script type="text/javascript" src="<?=$PUBLIC?>/js/kindeditor-4.1.9/kindeditor-min.js"></script>
<script type="text/javascript" src="<?=$PUBLIC?>/js/kindeditor-4.1.9/lang/zh_CN.js"></script>
</head>
<body>
    <div style="margin:20px;">
		<button id="addEmail" class="button button-primary">添加邮件</button>
	</div>
    <div id="emailList" style="margin: 20px;"></div>
    <div style="margin:20px;">
		<button id="addHost" class="button button-primary">添加主机</button>
	</div>
    <div id="distributedHostlList" style="margin: 20px;"></div>
    
    <div id="content" style="display:none;">
		<form id="form" class="form-horizontal" action="ajaxAddEmail" method="POST">
			<div class="row">
				<div class="control-group span12">
					<label class="control-label">邮件名：</label>
					<div class="controls">
						<input type="text" name="emailName" class="input-normal control-text" data-rules="{required : true}" placeholder="邮件唯一标识 示例:register">
					</div>
				</div>
				<div class="control-group span12">
					<label class="control-label">邮件标题：</label>
					<div class="controls">
						<input type="text" name="emailTitle" class="input-normal control-text" data-rules="{required : true}">
					</div>
				</div>
				<div class="control-group span12">
					<label class="control-label">邮件备注：</label>
					<div class="controls">
						<input type="text" name="emailNote" class="input-normal control-text" placeholder="说明邮件用途 示例:发送给用户的邮件">
					</div>
				</div>
				<div class="control-group span20">
					<label class="control-label">邮件正文：</label>
					<div class="controls">
						<textarea class="text-input small-input" id="emailText" name="emailText"></textarea>
					</div>
				</div>
				<div class="control-group span12" style="margin-left:50px;">       
                  <div class="form-actions span13 offset3">
                    <button class="button button-primary" type="submit">添加</button>
                    <button class="button" type="reset">重置</button>
                  </div>
                </div>
			</div>
		</form>
	</div>
	<div id="addHostContainer" style="display:none;">
		<form id="hostForm" class="form-horizontal" action="ajaxAddHost" method="POST">
			<div class="row">
				<div class="control-group span12">
					<label class="control-label">主机域名(ip)：</label>
					<div class="controls">
						<input type="text" name="host" class="input-normal control-text" data-rules="{required : true}" placeholder="分布式主机域名或IP 示例:localhost">
					</div>
				</div>
				<div class="control-group span12">
					<label class="control-label">端口：</label>
					<div class="controls">
						<input type="text" name="port" class="input-normal control-text" data-rules="{required : true}">
					</div>
				</div>
				<div class="control-group span12" style="margin-left:50px;">       
                  <div class="form-actions span13 offset3">
                    <button class="button button-primary" type="submit">添加</button>
                    <button class="button" type="reset">重置</button>
                  </div>
                </div>
			</div>
		</form>
	</div>
</body>

<!-- 引入BUI -->
<script type="text/javascript" src="<?=$PUBLIC?>/js/bui-min.js"></script>
<script type="text/javascript" src="<?=$PUBLIC?>/js/config-min.js"></script>
<script type="text/javascript">
    BUI.use(['bui/grid','bui/overlay','bui/form','bui/tooltip'],function(Grid,Overlay,Form,Tooltip){
        var columns = [
						{title : 'id',dataIndex :'id'},
						{title : '邮件名',dataIndex :'name'},
			       		{title : '邮件标题',dataIndex :'title'},
			       		{title : '备注',dataIndex : 'note'},
			       		{title : '操作',dataIndex :'',
				       		renderer:function(value,obj){
						       			return '<a href="javascript:delMail('+obj.id+')">删除</a> <a href="javascript:editMail('+obj.id+')">编辑</a>';
					       	}
			       		}];
   		var emails = <?=$emails?>;
   		var grid = new Grid.SimpleGrid({               //SmipleGrid不能用在可编辑表格的场景 可编辑表格需要Grid.Grid
    		  render:'#emailList',
    		  columns : columns,
    		  items : emails,
    		  forceFit : true,
    	});
     	grid.render();

   		var addEmailDialog = new Overlay.Dialog({
   		    'title':'添加邮件',
   		    'width':850,
   		    'height':520,
   		    'buttons':[],
   		    'contentId':'content'
   	   	});
   	   	
   	   	//创造form对象
		var form = new Form.Form({'srcNode':'#form','submitType':'ajax','callback':function(data){
			addEmailDialog.close();
	        $icon = data.code > 0 ? 'success' : 'error';
        	BUI.Message.Show({
				msg : data.msg,
				icon : $icon,
				buttons : [],
			});
			window.location.reload();
		}});
		form.render();
		
   	   	$("#addEmail").click(function(){
   	   	   	addEmailDialog.show();      //在Dialog生成显示后 才进行KindEditor的渲染 即可
   	   	   	//var editor = KindEditor.create($("#emailText"),{allowImageUpload:false,width:'500px',height:'300px',items:['fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline','removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist','insertunorderedlist', '|', 'emoticons', 'image', 'multiimage', 'link', 'code','media','flash'],cssPath:['<?=$PUBLIC?>/js/kindeditor-4.1.9/plugins/code/prettify.css']});

   	   	});

   	   	///////////////////////////////邮件发送分布式主机
      	var add = new Tooltip.Tip({
        		trigger : '#addHost',
        		alignType : 'right',
        		offset : 10,
        		title : '添加分布式主机(这些主机采用gearman进行异步发送邮件 不会阻塞PHP脚本的执行)',
        		elCls : 'tips tips-success',
        		titleTpl : '<span class="x-icon x-icon-small x-icon-success"><i class="icon icon-white icon-question"></i></span><div class="tips-content">{title}</div>'
        	});
        add.render();
        var columns = [
						{title : 'id',dataIndex :'id'},
						{title : '主机名(ip)',dataIndex :'host'},
			       		{title : '端口',dataIndex :'port'},
			       		{title : '操作',dataIndex :'',
				       		renderer:function(value,obj){
						       			return '<a href="javascript:delHost('+obj.id+')">删除</a> <a href="javascript:saveHost('+obj.id+')">保存</a>';
					       	}
			       		}];
 		var hosts = <?=$hosts?>;
 		var grid = new Grid.SimpleGrid({               //SmipleGrid不能用在可编辑表格的场景 可编辑表格需要Grid.Grid
			  render:'#distributedHostlList',
			  columns : columns,
			  items : hosts,
			  forceFit : true,
    	});
 	    grid.render();
  	   var addHostDialog = new Overlay.Dialog({
 		    'title':'添加分布式主机',
 		    'width':500,
 		    'height':200,
 		    'buttons':[],
 		    'contentId':'addHostContainer'
 	   	});
  	  	//创造form对象
		var form = new Form.Form({'srcNode':'#hostForm','submitType':'ajax','callback':function(data){
			addHostDialog.close();
	        $icon = data.code > 0 ? 'success' : 'error';
	        BUI.Message.Show({
				msg : data.msg,
				icon : $icon,
				buttons : [],
			});
			window.location.reload();
		}});
		form.render();
		$("#addHost").click(function(){
			addHostDialog.show();
		});
    });
</script>
</html>