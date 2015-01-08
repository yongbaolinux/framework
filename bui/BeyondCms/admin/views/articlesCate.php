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
	<div style="margin:20px;">
		<button id="btnShow" class="button button-primary">添加分类</button>
	</div>
	<div id="content" class="hidden" style="display:none;">
		<form id="form" class="form-horizontal" action="<?=$CONTROLLER?>/ajaxAddArticleCate" method="POST">
			<div class="row">
				<div class="control-group span12">
					<label class="control-label">分类名：</label>
					<div class="controls">
						<input type="text" name="cateName" class="input-normal control-text" data-rules="{required : true}">
					</div>
				</div>
				<div class="control-group span12">       
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
<script type="text/javascript" src="<?=$PUBLIC?>/js/bui-min.js"></script>
<script type="text/javascript" src="<?=$PUBLIC?>/js/config-min.js"></script>
<script type="text/javascript">

	BUI.use(['bui/overlay','bui/form'],function(Overlay,Form){
		
		new Form.Form({
			'srcNode':'#form',
			'submitType':'ajax',
			'callback':function(data){
			  if(data.code > 0 ){
				  alert(data.msg);
				  this.close();
			  } else {
				  alert(data.msg);
			  }
			}}).render();
		
		var dialog = new Overlay.Dialog({
			'title':'新增文章',
			'width':500,
			'height':120,
			'contentId':'content',
			'buttons':[],
			'success':function(){
				 $.ajax({
					    
			     });
			     this.close();
			}
		});
		$("#btnShow").click(function(){
			dialog.show();
		});
	});
</script>
</html>
