<html>
<head>
<link rel="stylesheet" href="<?=base_url();?>admin_res/css/reset.css" type="text/css" media="screen" />
<!-- Main Stylesheet -->
<link rel="stylesheet" href="<?=base_url();?>admin_res/css/iframe-style.css" type="text/css" media="screen" />
<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
<link rel="stylesheet" href="<?=base_url();?>admin_res/css/invalid.css" type="text/css" media="screen" />
<!--                       Javascripts                       -->
<!-- jQuery -->
<script type="text/javascript" src="<?=base_url();?>admin_res/scripts/jquery-1.8.2.min.js"></script>
<!-- jQuery Configuration -->
<script type="text/javascript" src="<?=base_url();?>admin_res/scripts/simpla.jquery.configuration.js"></script>
<!-- Facebox jQuery Plugin -->
<script type="text/javascript" src="<?=base_url();?>admin_res/scripts/facebox.js"></script>
<!-- jQuery WYSIWYG Plugin -->
<script type="text/javascript" src="<?=base_url();?>admin_res/scripts/jquery.wysiwyg.js"></script>
<!-- 引入弹出层插件 -->
<script type="text/javascript" src="<?=base_url();?>admin_res/plugins/blackbox/js/jquery.blackbox.js"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url();?>admin_res/plugins/blackbox/css/blackbox.css" media="screen" />
</head>
<body>
  <div id="main-content">

    <div class="content-box">
      <!-- Start Content Box -->
      <div class="content-box-header">
        <ul class="content-box-tabs">
          <li><a href="#tab1" class="default-tab">首页轮播图</a></li>
          <!-- href must be unique and match the id of target div -->
          <li><a href="#tab2">其他广告位</a></li>
	 <li><a href="#tab3">其他广告位</a></li>
        </ul>
        <div class="clear"></div>
      </div>
      <!-- End .content-box-header -->
      <div class="content-box-content">
        <div class="tab-content default-tab" id="tab1">
          <!-- This is the target div. id must match the href of this div's tab -->
          <!--<div class="notification attention png_bg"> <a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
            <div> This is a Content Box. You can put whatever you want in it. By the way, you can close this notification with the top-right cross. </div>
          </div>-->
	<p><input type="button" class="button" id="addIndexPicSlider" value="添加首页轮播图" onclick="addIndexPicSlider()"/></p>
          <table>
            <thead>
              <tr>
		 <th class="text-left">轮播图缩略图</th>
                <th>轮播图广告标题</th>
                <th>轮播图广告内容</th>
                <th>轮播图排序</th>
		<th>是否显示</th>
		<th>操作</th>
              </tr>
            </thead>
            <!--<tfoot>
              <tr>
                <td colspan="6">
                  <div class="bulk-actions align-left">
                    <select name="dropdown">
                      <option value="option1">Choose an action...</option>
                      <option value="option2">Edit</option>
                      <option value="option3">Delete</option>
                    </select>
                    <a class="button" href="#">Apply to selected</a> </div>
                  <div class="pagination"> <a href="#" title="First Page">&laquo; First</a><a href="#" title="Previous Page">&laquo; Previous</a> <a href="#" class="number" title="1">1</a> <a href="#" class="number" title="2">2</a> <a href="#" class="number current" title="3">3</a> <a href="#" class="number" title="4">4</a> <a href="#" title="Next Page">Next &raquo;</a><a href="#" title="Last Page">Last &raquo;</a> </div>
                  <div class="clear"></div>
                </td>
              </tr>
            </tfoot>-->
            <tbody>
<?php if(is_array($indexPicSlider) && count($indexPicSlider) > 0 ){
		foreach ( $indexPicSlider as $key=>$value){
		?>
              <tr>
                <td class="text-left"><img src="<?=$value['adv_img_path']?>" width="100" height="50"/></td>
                <td><?=$value['adv_title']?></td>
                <td><?=$value['adv_content']?></td>
		<td><?=$value['adv_order']?></td>
		<td><?php if($value['adv_show']){ echo '是';} else { echo '否'; } ?></td>
                <td>
                  <!-- Icons -->
                  <a href="editIndexPicSlider()" title="编辑轮播图"><img src="/diskroom/admin_res/images/icons/pencil.png" alt="编辑轮播图" /></a> <a href="delIndexPicSlider()" title="删除轮播图"><img src="/diskroom/admin_res/images/icons/cross.png" alt="删除轮播图" /></a> </td>
              </tr>
	<?php } } ?>
            </tbody>
          </table>
        </div>
        <!-- End #tab1 -->
        <div class="tab-content" id="tab2">
          <form action="#" method="post">
            <fieldset>
            <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
            <p>
              <label>Small form input</label>
              <input class="text-input small-input" type="text" id="small-input" name="small-input" />
              <span class="input-notification success png_bg">Successful message</span>
              <!-- Classes for input-notification: success, error, information, attention -->
              <br />
              <small>A small description of the field</small> </p>
            <p>
              <label>Medium form input</label>
              <input class="text-input medium-input datepicker" type="text" id="medium-input" name="medium-input" />
              <span class="input-notification error png_bg">Error message</span> </p>
            <p>
              <label>Large form input</label>
              <input class="text-input large-input" type="text" id="large-input" name="large-input" />
            </p>
            <p>
              <label>Checkboxes</label>
              <input type="checkbox" name="checkbox1" />
              This is a checkbox
              <input type="checkbox" name="checkbox2" />
              And this is another checkbox </p>
            <p>
              <label>Radio buttons</label>
              <input type="radio" name="radio1" />
              This is a radio button<br />
              <input type="radio" name="radio2" />
              This is another radio button </p>
            <p>
              <label>This is a drop down list</label>
              <select name="dropdown" class="small-input">
                <option value="option1">Option 1</option>
                <option value="option2">Option 2</option>
                <option value="option3">Option 3</option>
                <option value="option4">Option 4</option>
              </select>
            </p>
            <p>
              <label>Textarea with WYSIWYG</label>
              <textarea class="text-input textarea wysiwyg" id="textarea" name="textfield" cols="79" rows="15"></textarea>
            </p>
            <p>
              <input class="button" type="submit" value="Submit" />
            </p>
            </fieldset>
            <div class="clear"></div>
            <!-- End .clear -->
          </form>
        </div>
        <!-- End #tab2 -->
      </div>
      <!-- End .content-box-content -->
    </div>
    <!-- End .content-box -->
    <div class="content-box column-left">
      <div class="content-box-header">
        <h3>Content box left</h3>
      </div>
      <!-- End .content-box-header -->
      <div class="content-box-content">
        <div class="tab-content default-tab">
          <h4>Maecenas dignissim</h4>
          <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in porta lectus. Maecenas dignissim enim quis ipsum mattis aliquet. Maecenas id velit et elit gravida bibendum. Duis nec rutrum lorem. Donec egestas metus a risus euismod ultricies. Maecenas lacinia orci at neque commodo commodo. </p>
        </div>
        <!-- End #tab3 -->
      </div>
      <!-- End .content-box-content -->
    </div>
    <!-- End .content-box -->
    <div class="content-box column-right closed-box">
      <div class="content-box-header">
        <!-- Add the class "closed" to the Content box header to have it closed by default -->
        <h3>Content box right</h3>
      </div>
      <!-- End .content-box-header -->
      <div class="content-box-content">
        <div class="tab-content default-tab">
          <h4>This box is closed by default</h4>
          <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in porta lectus. Maecenas dignissim enim quis ipsum mattis aliquet. Maecenas id velit et elit gravida bibendum. Duis nec rutrum lorem. Donec egestas metus a risus euismod ultricies. Maecenas lacinia orci at neque commodo commodo. </p>
        </div>
        <!-- End #tab3 -->
      </div>
      <!-- End .content-box-content -->
    </div>
    <!-- End .content-box -->
    <div class="clear"></div>
    <!-- Start Notifications -->
    <div class="notification attention png_bg"> <a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
      <div> Attention notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero. </div>
    </div>
    <div class="notification information png_bg"> <a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
      <div> Information notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero. </div>
    </div>
    <div class="notification success png_bg"> <a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
      <div> Success notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero. </div>
    </div>
    <div class="notification error png_bg"> <a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
      <div> Error notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero. </div>
    </div>
    <!-- End Notifications -->
    <div id="footer"> <small>
      <!-- Remove this notice or replace it with whatever you want -->
      &#169; Copyright 2010 Your Company | Powered by <a href="http://www.865171.cn">admin templates</a> | <a href="#">Top</a> </small> </div>
    <!-- End #footer -->
</div>
</body>
<!-- 引入文件上传插件uploadify -->
<script type="text/javascript" src="/diskroom/admin_res/plugins/uploadify_flash/jquery.uploadify.min.js"></script>
<link rel="stylesheet" type="text/css" href="/diskroom/admin_res/plugins/uploadify_flash/uploadify.css" media="screen" />
<script type="text/javascript">
	//实例化弹出层插件blackbox
	var box=new BlackBox();
	//添加轮播图
	function addIndexPicSlider(){
		box.popup('<div id="addIndexPicSliderDiv" style="width:680px; padding:10px; background:#F5F5F5;"><form action="#" method="post" id="addIndexPicSliderForm">\
<fieldset>\
            <p>\
            	<label>轮播图上传：</label><input type="file" name="picSliderFile" id="picSliderFile" class=""/><input type="hidden" id="picSliderImg" name="picSliderImg"/><span class="input-notification png_bg"></span>\
            </p>\
	    <p>\
              <label></label><img  id="picSliderShow" name="picSliderShow" width="100"/>\
	    </p>\
            <p>\
              <label>轮播图标题：</label><input class="text-input small-input" type="text" id="picSliderTitle" name="picSliderTitle" />\
              <span class="input-notification png_bg">可为空</span>\
            </p>\
	   <p>\
              <label>轮播图内容：</label><input class="text-input medium-input" type="text" id="picSliderContent" name="picSliderContent" />\
              <span class="input-notification png_bg">可为空</span>\
            </p>\
	    <p>\
              <label>轮播图排序：</label><input class="text-input small-input" type="text" id="picSliderOrder" name="picSliderOrder" />\
              <span class="input-notification png_bg"></span>\
            </p>\
	    <p>\
              <label>轮播图显示：</label><select class="text-input" id="picSliderShow" name="picSliderShow"><option value="1">是</option><option value="0">否</option></select>\
              <span class="input-notification png_bg"></span>\
            </p>\
            <p>\
	      <label> </label>\
              <input class="button" type="button" value="添加" id="sureAddIndexPicSlider" />\
	      <input class="button" type="button" value="取消" id="cancelAddIndexPicSlider" />\
            </p>\
            </fieldset>\
            <div class="clear"></div>\
          </form></div>',function(content){
			$("#picSliderShow").hide();														//img标签隐藏 解决src为空在opera中显示BUG的问题
			<?php $timestamp = time();?>
			content.find('#picSliderFile').uploadify({
				'buttonText':'选择图片',
				'formData':{'timestamp' : '<?php echo $timestamp;?>','token' : '<?php echo md5('unique_salt' . $timestamp);?>'},
				'swf':'/diskroom/admin_res/plugins/uploadify_flash/uploadify.swf',					//上传插件的swf资源地址	TODO 会引发一个HTTP404错误
				'uploader':'/diskroom/admin_res/plugins/uploadify_flash/uploadify_slider.php',			//文件数据在服务器上的接收地址（也可以是接口地址）
				'multi':false,															//false为不允许同时选择多张图片
				'onSelect':function(file){													//选择图片是触发的事件
					$('#configSiteLogo').next().removeClass('error').html('');
				},
				'onUploadSuccess':function(file,data,response){									//data为图片接收服务端返回的数据
					$("#picSliderImg").next().removeClass("error").addClass("success").html("上传成功");
					//console.log(data);
					$("#picSliderShow").attr('src','http://localhost'+data).show();
					//写进隐藏表单
					$("#picSliderImg").val('http://localhost'+data);
				},
			});
			content.find('#sureAddIndexPicSlider').click(function(){
				//首页轮播图上传表单验证
				if($("#picSliderImg").val()===''){
					$("#picSliderImg").next().addClass('error').html('未选择图片');
					return false;
				} else {
					$("#picSliderImg").next().removeClass('error').html('');
				}
				//ajax提交表单
				$.ajax({
					'url':'advertiseAdd',
					'data':$("#addIndexPicSliderForm").serializeArray(),
					'type':'POST',
					'dataType':'json',
					'success':function(data){
						box.boxClose(function(){
							box.alert(data.msg,function(){window.location.reload()},{});
						});
					}
				});
			});
			content.find('#cancelAddIndexPicSlider').click(function(){
				box.boxClose();	
			})
		});
	}
	//编辑轮播图
	function editIndexPicSlider(){

	}
	//删除轮播图
	function delIndexPicSlider(){
	
	}
	
</script>
</html>