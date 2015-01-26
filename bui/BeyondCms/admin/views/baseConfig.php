<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>基础配置</title>
<link href="<?=$PUBLIC?>/css/dpl-min.css" rel="stylesheet" type="text/css" />
<link href="<?=$PUBLIC?>/css/bui-min.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div style="margin:20px;">
		<button id="addConfig" class="button button-primary">添加新配置项</button>
	</div>
	<div id="grid" style="margin:20px;"></div>
	<div id="content" class="hidden" style="display:none;">
		<form id="form" class="form-horizontal" action="ajaxAddConfig" method="POST">
			<div class="row">
				<div class="control-group span12">
					<label class="control-label">配置英文名：</label>
					<div class="controls">
						<input type="text" name="configName" class="input-normal control-text" data-rules="{required : true}">
					</div>
				</div>
				<div class="control-group span12">
					<label class="control-label">配置描述：</label>
					<div class="controls">
						<input type="text" name="configDesc" class="input-normal control-text">
					</div>
				</div>
				<div class="control-group span12">
					<label class="control-label">配置项值：</label>
					<div class="controls">
						<input type="text" name="configValue" class="input-normal control-text" data-rules="{required : true}">
					</div>
				</div>
				<div class="control-group span12">       
                  <div class="form-actions span13 offset3">
                    <button class="button button-primary" type="submit">添加</button>
                    <button class="button" type="reset">重置</button>
                  </div>
                </div>
			</div>
		</form>
	</div>
</body>
<script type="text/javascript" src="<?=$PUBLIC?>/js/jquery-1.8.1.min.js"></script>
<!-- 引入BUI -->
<script type="text/javascript" src="<?=$PUBLIC?>/js/bui-min.js"></script>
<script type="text/javascript" src="<?=$PUBLIC?>/js/config-min.js"></script>
<script type="text/javascript">
    var store;
	//渲染配置列表数据
	BUI.use(['bui/grid','bui/data'],function(Grid,Data){
		var columns = [
						{title : 'id',dataIndex :'id'},
			       		{title : '配置项英文名',dataIndex :'config_key'},
			       		{title : '配置项中文名',dataIndex : 'config_desc',editor:{xtype:''}},
			       		{title : '配置项值(1为是 0为否)',dataIndex :'config_value',editor:{xtype:''}},
			       		{title : '操作',dataIndex :'top',
				       		renderer:function(value,obj){
						       			return '<a href="javascript:delConfig('+obj.id+')">删除</a> <a href="javascript:saveConfig('+obj.id+')">保存</a>';
					       	}
			       		}];
		 var data = <?=$config?>;
		 store = new Data.Store({
			 data:data
		 });
		 var editing = new Grid.Plugins.CellEditing();
		 var grid = new Grid.Grid({               //SmipleGrid不能用在可编辑表格的场景 可编辑表格需要Grid.Grid
		  render:'#grid',
		  columns : columns,
		  store : store,
		  forceFit : true,
		  plugins : [Grid.Plugins.CheckSelection,editing],
		 });
 		 grid.render();
	});

	//删除配置项
	function delConfig(id){
		BUI.Message.Confirm('确定要删除该项吗?',function(){
			  	$.ajax({
					'url':'ajaxDelConfigs',
					'type':'POST',
					'data':{'config_ids':id},
					'dataType':'json',
					'success':function(data){
						if(data){
							 BUI.Message.Show({
								msg : '删除成功',
								icon : 'success',
								buttons : [],
							 });
						} else {
							 BUI.Message.Show({
								msg : '删除失败',
								icon : 'error',
								buttons : [],
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

    //保存配置项
    function saveConfig(id){
        var data = store.getResult();
        for(var i in data){
            if(data[i]['id'] == id){
                $.ajax({
                    'url':'ajaxSaveConfig',
                    'type':'POST',
                    'data':{'config_ids':id,'config_data':data[i]},
                    'dataType':'json',
                    'success':function(result){
                        var icon = parseInt(result.code) > 0 ? 'success' : 'error';
                    	BUI.Message.Show({
							'msg' : result.msg,
							'icon' : icon,
							'buttons' : [],
							'autoHide':true,
							'autoHideDelay':1000
						});
                    }
                });
            } 
        }
        
    }
    
	BUI.use(['bui/overlay','bui/form'],function(Overlay,Form){
		//创造dialog对象
		var addConfigDialog = new Overlay.Dialog({
		    'title':'新增',
		    'width':500,
		    'buttons':[],
		    'contentId':'content',
		});
		//创造form对象
		var form = new Form.Form({'srcNode':'#form','submitType':'ajax','callback':function(data){
			addConfigDialog.close();
	        $icon = data.code > 0 ? 'success' : 'error';
        	BUI.Message.Show({
				msg : data.msg,
				icon : $icon,
				buttons : [],
			});
			window.location.reload();
		}});
		form.render();
		
		$("#addConfig").click(function(){
			addConfigDialog.show();
		});
	});

</script>
</html>
