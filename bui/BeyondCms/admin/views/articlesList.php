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
	<div id="container" class="hidden" style="display:none;">
		<form id="form" class="form-horizontal">
			<div class="row">
				<div class="control-group span16">
					<label class="control-label">文章标题：</label>
					<div class="controls">
						<input type="text" class="input-normal control-text" name="article-title" data-rules="{required : true}" data-messages="{required:'请填写文章标题'}">
					</div>
				</div>
				<div class="control-group span16">
					<label class="control-label">文章分类：</label>
					<div class="controls">
						<select class="input-normal" name="article-cate" id="article-cate" data-rules="{min : 1}" data-messages="{min:'请选择文章分类'}">
						</select>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="control-group span16">
					<label class="control-label">文章封面：</label>
					<div class="controls">
						<input class="input-small control-text" type="file">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="control-group span16">
					<label class="control-label">文章内容：</label>
					<div class="controls control-row4">
						<textarea class="input-large" id="content"></textarea>
					</div>
				</div>
			</div>
            <div class="row">
              <div class="control-group span8">       
                    <div class="form-actions span13 offset3">
                      <button class="button button-primary" type="submit">保存</button>
                      <button class="button" type="reset">重置</button>
                    </div>
              </div>
            </div>
		</form>
	</div>
    
</body>
<script type="text/javascript" src="<?=$PUBLIC?>/js/jquery-1.8.1.min.js"></script>
<script type="text/javascript" src="<?=$PUBLIC?>/js/kindeditor-4.1.9/kindeditor-min.js"></script>
<script type="text/javascript" src="<?=$PUBLIC?>/js/kindeditor-4.1.9/lang/zh_CN.js"></script>
<script type="text/javascript" src="<?=$PUBLIC?>/js/bui-min.js"></script>
<script type="text/javascript" src="<?=$PUBLIC?>/js/config-min.js"></script>
<script type="text/javascript">
	
	BUI.use(['bui/overlay','bui/form'],function(Overlay,Form){
		//form
		var form = new Form.Form({
			'srcNode':'#form',
			'submitType':'ajax',
			'callback':function(data){
				
			}
		}).render();
		
		//dialog
		var dialog = new Overlay.Dialog({
			'title':'新增文章',
			'width':500,
			'height':320,
			'bodyContent':'',
			'children':[form],
			'buttons':[],
			'success':function(){
			     this.close();
			}
		});
		$("#btnShow").click(function(){
			dialog.show();
		});
		
	});

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

</script>
</html>
