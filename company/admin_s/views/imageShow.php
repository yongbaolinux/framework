<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>diskroom后台管理系统</title>
<link rel="stylesheet" href="<?=base_url();?>admin_res/css/reset.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?=base_url();?>admin_res/css/iframe-style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?=base_url();?>admin_res/css/invalid.css" type="text/css" media="screen" />

<script type="text/javascript" src="<?=base_url();?>admin_res/scripts/jquery-1.8.2.min.js"></script>
<!-- jQuery Datepicker Plugin -->
<!--<script type="text/javascript" src="<?=base_url();?>admin_res/scripts/jquery.datePicker.js"></script>
<script type="text/javascript" src="<?=base_url();?>admin_res/scripts/jquery.date.js"></script>-->
<!-- 引入弹出层插件 -->
<script type="text/javascript" src="<?=base_url();?>admin_res/plugins/blackbox/js/jquery.blackbox.js"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url();?>admin_res/plugins/blackbox/css/blackbox.css" media="screen" />
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
        <h3>图片管理</h3>
        <div class="clear"></div>
      </div>
      <!-- End .content-box-header -->
      <div class="content-box-content">
        <div class="tab-content default-tab" id="tab1">
        		<p>
            	<input type="button" class="button" value="添加图片" id="addPic" onClick="addPic()">
          	</p>
          </div>
          <form action="#">
            <table>
              <thead>
                <tr>
                  <th>
                    <input class="check-all" type="checkbox" />
                  </th>
                  <th width="212px;">图片标题</th>		<!-- 给th一个固定的宽度 防止表格自动伸缩 -->
                  <th>图片缩略图</th>
                  <th>图片所属模块</th>
                  <!--<th>移动到</th>-->
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
                    <div class="pagination"><?php if(isset($pagination)) { echo $pagination; } ?></div>
                    <div class="clear"></div>
                  </td>
                </tr>
              </tfoot>
              <tbody>
              <?php if(isset($images) && is_array($images) && count($images) >0 ) { foreach($images as $key=>$value){ ?>
                <tr>
                  <td>
                    <input type="checkbox" />
                  </td>
                  <td><span id="image_title" class="text-input input-name"><?=$value['title']; ?></span></td>
                  <td><img src="<?=base_url();?><?=$value['path'];?>" width="50px" height="50px"/></td>
                  <td><span><?=$value['moduleName'];?></span></td>
                  <!--<td><select id="move_<?php echo $value['id']; ?>" class="select-move" onClick="getAllImageModules(<?=$value['moduleID']?>)">
                          <option value="-1">请选择要移动到的模块</option>
                      </select>
                  </td>-->
                  <td>
			<a href="javascript:void(0)" title="编辑修改" onClick="editPic(this,<?=$value['imageID'];?>);">编辑</a> <a href="javascript:void(0);" title="删除" onClick="delPic(<?=$value['imageID'];?>)">删除</a></td>
                </tr>
                <?php } }?>
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
	
	//编辑图片-编辑动作
	function editPic(dom,id){
		var title,moduleID,moduleName,path;
		//ajax获取所编辑的图片信息
		$.ajax({
			'url':'<?=base_url();?>admin_s.php/images/getOneImage',
			'data':{'imageID':id},
			'type':'POST',
			'dataType':'json',
			'async':false,
			'success':function(res){
				title = res[0].title;
				moduleID = res[0].moduleID;
				moduleName = res[0].moduleName;
				path = res[0].path;
			}
		});
		box.popup('<div id="editPicDiv" style="width:480px; padding:10px; background:#F5F5F5;"><form action="<?=base_url();?>admin_s.php/images/doEdit" method="post" id="editPicForm" enctype="multipart/form-data" target="editPicIframe">\
<fieldset>\
            <p>\
              <label>图片标题：</label><input class="text-input small-input" type="text" id="editPicName" name="editPicName" value="'+title+'"/>\
              <span class="input-notification png_bg"></span>\
            </p>\
           <div>\
              <label style="font-size:14px;">图片模块：</label><div id="editModulePicker" style="border-radius:5px 5px 5px 5px;display:inline-block;background:linear-gradient(#FFFCFC, #EDEEEF) repeat scroll 0 0 rgba(0, 0, 0, 0);border:1px solid #AD9C9C;padding:0 24px 0 12px;width:100px;cursor:pointer;position:relative;">\
				<div class="current"><span style="height:30px;line-height:30px;" id="editCurrentModule" data-id="">'+moduleName+'</span><span class="downArrow"></span></div><input type="hidden" name="editModuleId" id="editModuleId" value="'+moduleID+'"/><input type="hidden" name="editModuleName" id="editModuleName" value="'+moduleName+'"/><input type="hidden" name="editId" id="editId" value="'+id+'" />\
				<div id="editModulesList" style="display:none;position:absolute;background-color:#ffffff;border:1px solid #AAAAAA;border-radius:6px;box-shadow:0 0 17px #BBBBBB;width:245px;top:-1px;left:-1px;">\
							<div id="editExistCategory"></div>\
							<div class="create_category">\
								<input id="editCloseModule" type="button" value="关闭"  style="border-radius:6px;border:1px solid #BBBBBB;background:-moz-linear-gradient(center top , #FDFAFB, #F9F7F7 50%, #F6F3F4 50%, #F0EDED) repeat scroll 0 0 rgba(0, 0, 0, 0);padding:6px;font-size:14px;"/></div>\
				  						</div>\
										</div>\
             	<span class="input-notification png_bg"></span>\
            	</div>\
		<p>\
			<label></label><img src="<?=base_url();?>'+path+'" width="50px;" height="50px;"/>\
		</p>\
            	<p>\
            		<label>选择图片：</label><input type="file" name="editPic" id="editPic" class="medium-input"/><span class="input-notification png_bg"></span><iframe name="editPicIframe" border="0" style="display:none;"></iframe>\
            	</p>\
            	<p>\
			<input class="button" type="submit" value="确定" id="sureEditPic" name="submit" />\
			<input class="button" type="button" value="取消" id="cancelEditPic" />\
            	</p>\
            </fieldset>\
            <div class="clear"></div>\
          </form></div>',function(content){
			content.find('.current').click(function(){
				$("#editModulesList").show();
				//获取该图片所属的模块ID
				var moduleID = $("#editModuleId").val();
				//ajax获取所有不包含本身所属的图片模块
				$.ajax({
					'url':'<?=base_url()?>admin_s.php/images/getAllImageModules',
					'data':{'moduleID':moduleID},
					'type':'post',
					'dataType':'json',
					'success':function(res){
						var module = '<ul>';
						for(var i = 0;i < res.length;i++){
							module += '<li style="padding-left:'+res[i].module_level*10+'px;" mid="'+res[i].id+'" onclick="editChooseModule(this);">'+res[i].module_cname+'</li>';
						}
						module += '</ul>';
						$("#editExistCategory").html(module);
					}
				});
			});
			content.find('#editCloseModule').click(function(){
				$("#editModulesList").hide();
			});
			content.find('#cancelEditPic').click(function(){
				box.boxClose();
			});
			//TODO 表单数据提交验证
		});
	}

	//删除图片-删除动作
	function delPic(id){
		box.confirm('确认要删除该图片?',function(data){
			if(data){
				$.ajax({
					'url':'<?=base_url()?>admin_s.php/images/delImage',
					'data':{'imageID':id},
					'type':'POST',
					'dataType':'json',
					'async':false,
					'success':function(data){
						if(data){
							box.alert('删除成功',function(){window.location.reload();},{'title':'','value':''});
						} else {
							box.alert('删除失败',function(){window.location.reload();},{'title':'','value':''});
						}
					}
				});
			}
		},{'title':'删除'});	
	}
	
	//编辑图片-选择图片的模块
	function editChooseModule(dom){
		var module_id = parseInt($(dom).attr('mid'));
		var module_name = $.trim($(dom).html());
		$("#editCurrentModule").html(module_name).attr('data-id',module_id);
		$("#editModuleId").val(module_id);
		$("#editModuleName").val(module_name);
		$("#editModulesList").hide();
	}

	//添加图片-选择图片的模块
	function chooseModule(dom) {
		var module_id = parseInt($(dom).attr('mid'));
		var module_name = $.trim($(dom).html());
		$("#current_module").html(module_name).attr('data-id',module_id);
		$("#moduleId").val(module_id);
		$("#moduleName").val(module_name);
		$("#modules_list").hide();
	}

	//添加图片-添加动作
	function addPic(){
		box.popup('<div id="addPicDiv" style="width:480px; padding:10px; background:#F5F5F5;"><form action="<?=base_url();?>admin_s.php/images/doUpload" method="post" id="addPicForm" enctype="multipart/form-data" target="picIframe">\
<fieldset>\
            <p>\
              <label>图片标题：</label><input class="text-input small-input" type="text" id="picName" name="picName" />\
              <span class="input-notification png_bg"></span>\
            </p>\
           <div>\
              <label style="font-size:14px;">图片模块：</label><div id="ModulePicker" style="border-radius:5px 5px 5px 5px;display:inline-block;background:linear-gradient(#FFFCFC, #EDEEEF) repeat scroll 0 0 rgba(0, 0, 0, 0);border:1px solid #AD9C9C;padding:0 24px 0 12px;width:100px;cursor:pointer;position:relative;">\
				<div class="current"><span style="height:30px;line-height:30px;" id="current_module" data-id="">请选择所属模块</span><span class="downArrow"></span></div><input type="hidden" name="moduleId" id="moduleId"/><input type="hidden" name="moduleName" id="moduleName"/>\
				<div id="modules_list" style="display:none;position:absolute;background-color:#ffffff;border:1px solid #AAAAAA;border-radius:6px;box-shadow:0 0 17px #BBBBBB;width:245px;top:-1px;left:-1px;">\
							<div id="exist_category"></div>\
							<div class="create_category">\
								<input id="close_module" type="button" value="关闭"  style="border-radius:6px;border:1px solid #BBBBBB;background:-moz-linear-gradient(center top , #FDFAFB, #F9F7F7 50%, #F6F3F4 50%, #F0EDED) repeat scroll 0 0 rgba(0, 0, 0, 0);padding:6px;font-size:14px;"/></div>\
				  						</div>\
										</div>\
              <span class="input-notification png_bg"></span>\
            </div>\
            <p>\
            		<label>图片上传：</label><input type="file" name="pic" id="pic" class=""/><span class="input-notification png_bg"></span><iframe name="picIframe" border="0" style="display:none;"></iframe>\
            </p>\
            <p>\
              <input class="button" type="submit" value="添加" id="sureAddPic" name="submit" />\
			 	 					<input class="button" type="button" value="取消" id="cancelAddPic" />\
            </p>\
            </fieldset>\
            <div class="clear"></div>\
          </form></div>',function(content){
    content.find(".current").click(function () {
         	$("#modules_list").show();
         	//ajax获取所有图片模块
		$.ajax({
			'url':'<?=base_url()?>admin_s.php/images/getallimagemodules',
			'type':'post',
			'dataType':'json',
			'success':function(res){
				var module = '<ul>';
				for(var i = 0;i < res.length;i++){
					module += '<li style="padding-left:'+res[i].module_level*10+'px;" mid="'+res[i].id+'" onclick="chooseModule(this);">'+res[i].module_cname+'</li>';
				}
				module += '</ul>';
				$("#exist_category").html(module);
			}
		});
	});
         
    content.find("#close_module").click(function () {
        $("#modules_list").hide();
         });
         
			content.find("#pic").change(function () {
					//$("#sureAddPic").trigger("click");
				});
				
			content.find('#addPicForm').submit(function(){
				//前端表单验证
				var picName = $.trim($("#picName").val());
				if(picName===''){
					$("#picName").next().addClass('error').html('未填写标题');
					return false;
				} else {
					$("#picName").next().removeClass('error').html('');
				}
				
				var picModule = $("#current_module").attr('data-id');							//不能用data() 原因不明
				if(picModule === ''){
					$("#ModulePicker").next().addClass('error').html('未选择模块');
					return false;
				} else {
					$("#ModulePicker").next().removeClass('error').html('');
				}
				
				if ($("#pic").val()==='') {
					$("#pic").next().addClass('error').html('未选择图片');
					return false;
				} else {
					$("#pic").next().removeClass('error').html('');
				}
				
				//$.ajax({
//					'url':'<?=base_url()?>admin_s.php/modules/addModule',
//					'data':picData,
//					'type':'POST',
//					'dataType':'json',
//					'success':function(data){
//						if(data.code === 0 ){
//							eval(data.msg);	
//						} else {
//							box.boxClose(function(){
//								box.alert(data.msg,function(){window.location.reload()},{});
//							});
//						}
//					}
//				});
			});
			content.find('#cancelAddPic').click(function(){
				box.boxClose();	
			});
		});
	}
</script>
</html>