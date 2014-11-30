<html>
<head>
<meta http-equiv="content-type" content="" charset="utf-8">
<title>diskroom后台管理系统</title>
<link rel="stylesheet" href="<?=base_url()?>admin_res/css/reset.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?=base_url()?>admin_res/css/iframe-style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?=base_url()?>admin_res/css/invalid.css" type="text/css" media="screen" />

<script type="text/javascript" src="<?=base_url()?>admin_res/scripts/jquery-1.8.2.min.js"></script>
<!-- jQuery Datepicker Plugin -->
<!--<script type="text/javascript" src="http://localhost/diskroom/admin_res/scripts/jquery.datePicker.js"></script>
<script type="text/javascript" src="http://localhost/diskroom/admin_res/scripts/jquery.date.js"></script>-->
<!-- 引入弹出层插件 -->
<script type="text/javascript" src="<?=base_url()?>admin_res/plugins/blackbox/js/jquery.blackbox.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>admin_res/plugins/blackbox/css/blackbox.css" media="screen" />
</head>
<body>
  <div id="main-content">
    <!-- Main Content Section with everything -->
    <!-- Page Head -->
    <!--<ul class="shortcut-buttons-set">
      <li><a class="shortcut-button" href="#"><span> <img src="resources/images/icons/pencil_48.png" alt="icon" /><br />
        Write an Article </span></a></li>
      <li><a class="shortcut-button" href="#"><span> <img src="resources/images/icons/paper_content_pencil_48.png" alt="icon" /><br />
        Create a New Page </span></a></li>
      <li><a class="shortcut-button" href="#"><span> <img src="resources/images/icons/image_add_48.png" alt="icon" /><br />
        Upload an Image </span></a></li>
      <li><a class="shortcut-button" href="#"><span> <img src="resources/images/icons/clock_48.png" alt="icon" /><br />
        Add an Event </span></a></li>
      <li><a class="shortcut-button" href="#messages" rel="modal"><span> <img src="resources/images/icons/comment_48.png" alt="icon" /><br />
        Open Modal </span></a></li>
    </ul>-->
    <!-- End .shortcut-buttons-set -->
    <div class="clear"></div>
    <!-- End .clear -->
    <div class="content-box">
      <!-- Start Content Box -->
      <div class="content-box-header">
        <h3>模块配置</h3>
        <div class="clear"></div>
      </div>
      <!-- End .content-box-header -->
      <div class="content-box-content">
        <div class="tab-content default-tab" id="tab1">
        	<p>
            	<input type="button" class="button" value="添加顶级模块" id="addModule" onClick="addModule(0,0,1,'1,2,3,4')">
          	</p>
          </div>
          <form action="#">
            <table>
              <thead>
                <tr>
                  <th>
                    <input class="check-all" type="checkbox" />
                  </th>
                  <th width="212px;">模块名</th>		<!-- 给th一个固定的宽度 防止表格自动伸缩 -->
                  <th>排序</th>
                  <th>菜单显示</th>
                  <th>移动到</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <td colspan="6">
                    <!--<div class="bulk-actions align-left">
                      <select name="dropdown">
                        <option value="option1">Choose an action...</option>
                        <option value="option2">Edit</option>
                        <option value="option3">Delete</option>
                      </select>
                      <a class="button" href="#">Apply to selected</a> </div>-->
                    <!--<div class="pagination"> <a href="#" title="First Page">&laquo; First</a><a href="#" title="Previous Page">&laquo; Previous</a> <a href="#" class="number" title="1">1</a> <a href="#" class="number" title="2">2</a> <a href="#" class="number current" title="3">3</a> <a href="#" class="number" title="4">4</a> <a href="#" title="Next Page">Next &raquo;</a><a href="#" title="Last Page">Last &raquo;</a> </div>-->
                    <!-- End .pagination -->
                    <div class="pagination"><?php echo $pagination; ?></div>
                    <div class="clear"></div>
                  </td>
                </tr>
              </tfoot>
              <tbody>
              <?php foreach($modules as $key=>$value){ ?>
                <tr data-level="<?php echo $value['module_level']; ?>">
                  <td>
                    <input type="checkbox" />
                  </td>
                  <td><input type="text" id="name_<?php echo $value['id']; ?>" class="text-input input-name" value="<?php echo $value['module_cname']; ?>"/></td>
                  <td><input type="text" id="order_<?php echo $value['id']; ?>" class="text-input input-order" value="<?php echo $value['module_order']; ?>" style="width:50px;"/></td>
                  <td><select id="show_<?php echo $value['id'];?>" class="select-show">
                          <option value="0" <?php if($value['menu_show']=='0'){ echo 'selected'; } ?>>都不显示</option>
                          <option value="1" <?php if($value['menu_show']=='1'){ echo 'selected'; } ?>>顶部菜单显示</option><option value="2" <?php if($value['menu_show']=='2'){ echo 'selected'; } ?>>底部菜单显示</option><option value="3" <?php if($value['menu_show']=='3'){ echo 'selected'; } ?>>都显示</option>
                       </select>
                  </td>
                  <td><select id="move_<?php echo $value['id']; ?>" class="select-move" onClick="/*showModules(this,<?php echo $value['id']; ?>,<?php echo $value['module_fid'];?>)*/">
                          <option value="-1">移动模块到</option>
                          
                      </select>
                  </td>
                  <td>
                    <a href="javascript:void(0);" title="添加子模块" onClick="addModule(<?php echo $value['id']; ?>,<?php echo $value['module_level']; ?>,<?php echo $value['module_son']; ?>,'<?php echo $value['module_type']; ?>');">添加</a> <!--<a href="#" title="编辑更多细节">编辑</a>--> <a href="javascript:void(0)" title="保存修改" onClick="saveModule(<?php echo $value['id']; ?>);">保存</a> <a href="javascript:void(0);" title="删除" onClick="deleteModule(this,<?php echo $value['id']; ?>)">删除</a> <?php if($value['module_son']==='1'){ ?><a href="javascript:void(0)" title="有子模块的才会有此项" data-toggle='0' onClick="expandModule(this,<?php echo $value['id']; ?>,<?php echo $value['module_level']; ?>)">展开</a><?php } ?> </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </form>
        </div>
        <!-- End #tab1 -->
      </div>
      <!-- End .content-box-content -->
    </div>
    <div class="clear"></div>
</div>
</body>
<script type="text/javascript">
	//实例化弹出层
	var box = new BlackBox();
	//展开子模块（后端只负责发送数据 HTML在前端组装）
	function expandModule(dom,id,level){
		
		if($(dom).data('toggle')===0 && $.trim($(dom).html()) ==='展开'){
			//检查下一个tr是否在同一级上 如果不是 进行请求 如果是 直接显示隐藏的DOM就行
			var next = $(dom).parents('tr').next();
		
			if(next.data('level') > level){
				//直接显示子模块
				var trs = $(dom).parents('tr').nextAll();
				for(var i=0;i<trs.length;i++){
					if($(trs[i]).data('level') === level){
						$(trs).slice(0,i).slideDown("slow");
						break;
					}
				}	
			} else {
				  $.ajax({
				  'url':'<?=base_url()?>admin_s.php/modules/expandModule',
				  'type':'POST',
				  'data':{'id':id},
				  'dataType':'json',
				  'success':function(data){
					  var html = '';
					  for(i in data){
						  var selected_0 = '';
						  var selected_1 = '';
						  var selected_2 = '';
						  var selected_3 = '';
						  if(data[i].menu_show === '0'){
							  selected_0 = 'selected';
						  }
						  if(data[i].menu_show === '1'){
							  selected_1 = 'selected';
						  }
						  if(data[i].menu_show === '2'){
							  selected_2 = 'selected';
						  }
						  if(data[i].menu_show === '3'){
							  selected_3 = 'selected';
						  }
						  html +=	'<tr style="background-color:#eeeeee;" data-level="'+data[i].module_level+'">\
							<td>\
							  <input type="checkbox">\
							</td>\
							<td><div style="margin-left:'+(data[i].module_level-2)*18+'px;"><img style="vertical-align:middle;" src="<?=base_url();?>admin_res/images/bg-columnx.gif" /><input type="text" value="'+data[i].module_cname+'" class="text-input input-name" id="name_'+data[i].id+'" style="margin-left:5px;"></div></td>\
							<td><input type="text" value="'+data[i].module_order+'" class="text-input input-order" id="order_'+data[i].id+'" style="width:50px;"></td>\
							<td><select class="select-show" id="show_'+data[i].id+'">\
									<option value="0" '+selected_0+'>都不显示</option>\
									<option value="1" '+selected_1+'>顶部菜单显示</option><option value="2" '+selected_2+'>底部菜单显示</option><option value="3" '+selected_3+'>都显示</option>\
								 </select>\
							</td>\
							<td><select class="select-move" id="move_'+data[i].id+'" onClick="showModules(this,'+data[i].id+','+data[i].module_fid+')">\
									<option value="-1">选择移动模块</option>\
								</select>\
							</td>\
							<td>\
							  <a title="添加子模块" href="javascript:void(0);" onClick="addModule('+data[i].id+','+data[i].module_level+','+data[i].module_son+",'"+data[i].module_type+"'"+');">添加</a> <!--<a title="编辑更多细节" href="#">编辑</a>--> <a onclick="saveModule('+data[i].id+');" title="保存修改" href="javascript:void(0)">保存</a> <a title="删除" href="javascript:void(0);" onClick="deleteModule(this,'+data[i].id+');">删除</a>';
					  if(data[i].module_son!=='0'){
						  html +=' <a data-toggle="0" onclick="expandModule(this,'+data[i].id+','+data[i].module_level+')" title="有子模块的才会有此项" href="javascript:void(0)">展开</a> ';
					  }
						  html+='</td></tr>';
					  }
					  html = $(html);							//转为jQuery对象
					  $(dom).parents('tr').after(html);
				  }
			  });
			}
			$(dom).html('收起').data('toggle',1);
		} else if($(dom).data('toggle')===1 && $.trim($(dom).html()) ==='收起') {
			var trs = $(dom).parents('tr').nextAll();
			for(var i=0;i<trs.length;i++){
				if($(trs[i]).data('level')>level){							//jquery对象里包含着dom数组 data函数返回的是number类型
					$(trs[i]).hide();
				} else {
					break;	
				}
			}
			$(dom).html('展开').data('toggle',0);
		}
	}
	
	//保存更改的模块信息
	function saveModule(id){
		//收集数据
		var name = $("#name_"+id).val();
		var order = $("#order_"+id).val();
		var show = $("#show_"+id).val();
		var move = $("#move_"+id).val();
		var id = parseInt(id);
		//以对象的形式发送 不需要转义数据(以拼接字符串的形式需要转义 否则可能会使url失效)
		var module_data = {'id':id,'name':name,'order':order,'show':show,'move':move};
		//发送ajax
		$.ajax({
			'url':'<?=base_url()?>admin_s.php/modules/moduleSave',
			'data':module_data,
			'type':'POST',
			'dataType':'json',
			'success':function(data){
				if(data){
					box.alert('更新成功',function(){},{});
				} else {
					box.alert('未作更新',function(){},{});	
				}
			}
		});
	}
	
	//删除模块
	function deleteModule(dom,id){
		box.confirm('确认要删除该模块?',function(data){
			if(data){
				$.ajax({
					'url':'<?=base_url()?>admin_s.php/modules/deleteModule',
					'data':{'id':id},
					'type':'POST',
					'dataType':'json',
					'success':function(data){
						if(data === 0){
							alert('有子模块,无法删除');
						} else if(data === -1){
							alert('有下属文章,无法删除');
						} else if(data === 1){
							alert('删除成功');
							window.location.reload();
						} else if(data === 2){
							alert('删除失败');	
						}
					}
				});
			}
		},{'title':'删除'});	
	}
	
	//添加子模块
	function addModule(id,module_level,module_son,module_type){
		var module_type_name='';
		var module_type_array = module_type.split(',');
		for(i in module_type_array){
		  switch(module_type_array[i]){
			  case '1':
				  module_type_name += '<option value="1">单页面</option>';
				  break;
			  case '2':
				  module_type_name += '<option value="2">列表页</option>';
				  break;
			  case '3':
				  module_type_name += '<option value="3">图片</option>';
				  break;
			  case '4':
				  module_type_name += '<option value="4">下载</option>';
				  break;
			  default:
				  break;
		  }
		}
		box.popup('<div id="addModuleDiv" style="width:480px; padding:10px; background:#F5F5F5;"><p><label style="display:inline-block;width:100px;text-align:right;color:#000000;">添加子模块</label></p><form action="#" method="post" id="addModuleForm">\
            <fieldset>\
            <p>\
              <label>模块名：</label><input class="text-input small-input" type="text" id="moduleName" name="moduleName" />\
              <span class="input-notification png_bg"></span>\
            </p>\
            <p>\
              <label>显示方式：</label><select id="moduleShow" name="moduleShow"><option value="0">不显示</option><option value="1">顶部菜单显示</option><option value="2">底部菜单显示</option><option value="3">都显示</option></select>\
              <span class="input-notification png_bg"></span> </p>\
			<p>\
              <label>模块类型：</label><select id="moduleType" name="moduleType">'+module_type_name+'</select>\
              <span class="input-notification png_bg"></span> </p>\
            <p>\
              <label>模块排序：</label><input class="text-input small-input" type="text" id="moduleOrder" name="moduleOrder" value="1"/><br/>\
              <small>数值越大越靠前 ( 默认是1 )</small> \
            </p>\
            <p>\
              <label>模块内页标题：</label><input class="text-input medium-input" type="text" id="moduleTitle" name="moduleTitle" value="diskroom"/><br/>\
              <small>内页的页面标题 用于SEO优化 默认为diskroom</small> \
            </p>\
            <p>\
              <label>模块自定义链接：</label><input class="text-input medium-input" type="text" id="moduleUrl" name="moduleUrl" /><br/>\
              <small>为空会自动生成 也可以填写外部链接 ( 如http://www.diskroom.net )</small> \
            </p>\
            <p>\
              <input class="button" type="button" value="添加" id="sureAddModule" />\
			  <input class="button" type="button" value="取消" id="cancelAddModule" />\
            </p>\
            </fieldset>\
            <div class="clear"></div>\
          </form></div>',function(content){
			content.find('#sureAddModule').click(function(){
				//前端表单验证
				var moduleName = $.trim($("#moduleName").val());
				if(moduleName===''){
					$("#moduleName").next().addClass('error').html('模块名不能为空');
					return false;
				} else {
					$("#moduleName").next().removeClass('error').html('');
				}
				//收集表单数据 serializeArray返回的是一个对象
				var moduleData = $("#addModuleForm").serializeArray();
				//往数据数组动态增加三个对象 父模块的id和module_level以及module_son
				moduleData.push({'name':'moduleFid',value:id});
				moduleData.push({'name':'moduleLevel','value':module_level});
				moduleData.push({'name':'moduleSon','value':module_son});
				//console.log(moduleData);
				$.ajax({
					'url':'<?=base_url()?>admin_s.php/modules/addModule',
					'data':moduleData,
					'type':'POST',
					'dataType':'json',
					'success':function(data){
						if(data.code === 0 ){
							eval(data.msg);	
						} else {
							box.boxClose(function(){
								box.alert(data.msg,function(){window.location.reload()},{});
							});
						}
					}
				});
			});
			content.find('#cancelAddModule').click(function(){
				box.boxClose();	
			});
		});
	}
	
	/*
	 * 显示“移动到”里的组件数据
	 * 在第一次载入页面的时候Ajax的方式会有一个停顿 直接将"移动到"里的select组件用php循环出来 不再采用Ajax方式
	 */
	function showModules(dom,id,fid){
		if(!$(dom).data('ajax')){
		  $.ajax({
			  'url':'<?=base_url()?>admin_s.php/modules/moduleShowSelectAjax',
			  'data':{'id':id,'fid':fid},
			  'type':'POST',
			  'dataType':'json',
			  'success':function(data){
				  var option_html = '';
				  for(var i=0;i<data.length;i++){
					  option_html += 	'<option style="padding-left:'+10*data[i].module_level+'px;" value="'+data[i].id+'_'+data[i].module_level+'">'+data[i].module_cname+'</option>';
				  }
				  //不再次发送ajax
				  $(dom).append(option_html).data('ajax','1');
			  }
		  });
		}
	}
</script>
</html>