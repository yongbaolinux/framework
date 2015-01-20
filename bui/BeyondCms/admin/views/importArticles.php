<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>导入文章</title>
<link href="<?=$PUBLIC?>/css/dpl-min.css" rel="stylesheet" type="text/css" />
<link href="<?=$PUBLIC?>/css/bui-min.css" rel="stylesheet" type="text/css" />

</head>

<body>
<form action="#" method="post">
	<input type="file" id="importArticles" />
</form>
<div id="grid" style="margin:20px;">
</div>
<span>导入到</span><select id="importToTableName"><?php foreach($tables as $table){ ?><option><?=$table?></option><?php }?></select>
<input type="button" onClick="javascript:doImport()" value="导入"/>
</body>
<script type="text/javascript" src="<?=$PUBLIC?>js/jquery-1.8.1.min.js"></script>
<!-- 引入上传插件uploadify -->
<script type="text/javascript" src="<?=$PUBLIC?>js/uploadify_flash/jquery.uploadify.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?=$PUBLIC?>js/uploadify_flash/uploadify.css" media="screen" />
<!-- 引入BUI -->
<script type="text/javascript" src="<?=$PUBLIC?>/js/bui-min.js"></script>
<script type="text/javascript" src="<?=$PUBLIC?>/js/config-min.js"></script>
<script type="text/javascript">
	//checkbox全选
	function chooseAllFields(dom){
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
	
	//执行导入json数据的动作
	function doImport(){
		
		
	}
	
	//初始化封面上传插件uploadify
	$("#importArticles").uploadify({
		'multi':false,								//是否允许多文件上传
		'auto':true,								//是否允许自动上传
		'width':'120',								//上传控件宽度
		'height':'30',								//上传控件高度
		'fileTypeExts':'*.json',						//所允许上传文件的类型
		'fileSizeLimit':'6144KB',					//所允许上传文件的大小(默认为6M)
		'buttonText':'上传json数据',					//控件外观文字
		'formData':{'time' : '<?php echo time();?>','token' : '<?php echo md5('I_love_you' . time());?>','session_id':'<?php echo session_id(); ?>'},				//POST提交给文件上传接口的数据
		'swf':'<?=$PUBLIC?>/js/uploadify_flash/uploadify.swf',	//swf地址
		'uploader':'<?=base_url()?>system.php/Api/jsonUploaderApi',							//文件上传接口
		'onUploadSuccess':function(file,data,response){			//文件上传成功后的回调方法
			var data = $.parseJSON(data);
			$("#editThumb-queue").next().removeClass('error').addClass('success').html('上传成功');
			/*$("#editThumbImg").attr('src',data.msg);
			$("#saveThumbPath").val(data.msg);*/
			//渲染文章列表数据
			BUI.use(['bui/grid','bui/data'],function(Grid){
				var columns = [ {title : '<input type="checkbox" onClick="javascript:chooseAllFields(this)"/>',dataIndex :'', width:'2%',renderer:function(value,obj){
									return '<input type="checkbox"  class="bui-grid-cell-text-checkbox" value="'+obj.field_name+'"/>';
								}},
								{title : '字段名',dataIndex :'field_name', width:'10%'},
								{title : '字段值演示数据',dataIndex :'field_value', width:'20%'},
								{title : '映射到的字段名',dataIndex :'', width:'10%',renderer:function(value,obj){
									return '<input type="text"  class="bui-grid-cell-text-checkbox" id="'+obj.field_name+'" value="'+obj.field_name+'"/>';
									}}];
				 //console.log(data);
				 var grid = new Grid.SimpleGrid({
				  render:'#grid',
				  columns : columns,
				  items : data,
				 });
				 grid.render();
			});
		}		//onUploadSuccess end
	});
</script>
</html>
