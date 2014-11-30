<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="<?=base_url()?>admin_res/css/reset.css" type="text/css" media="screen" />
<!-- Main Stylesheet -->
<link rel="stylesheet" href="<?=base_url()?>admin_res/css/iframe-style.css" type="text/css" media="screen" />
<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
<link rel="stylesheet" href="<?=base_url()?>admin_res/css/invalid.css" type="text/css" media="screen" />
<!--                       Javascripts                       -->
<!-- jQuery -->
<script type="text/javascript" src="<?=base_url()?>admin_res/scripts/jquery-1.8.2.min.js"></script>
<!-- jQuery Configuration -->
<script type="text/javascript" src="<?=base_url()?>admin_res/scripts/simpla.jquery.configuration.js"></script>
<!-- Facebox jQuery Plugin -->
<script type="text/javascript" src="<?=base_url()?>admin_res/scripts/facebox.js"></script>
<!-- jQuery WYSIWYG Plugin -->
<script type="text/javascript" src="<?=base_url()?>admin_res/scripts/jquery.wysiwyg.js"></script>
<!-- jQuery Datepicker Plugin -->
<!--<script type="text/javascript" src="http://localhost/diskroom/admin_res/scripts/jquery.datePicker.js"></script>
<script type="text/javascript" src="http://localhost/diskroom/admin_res/scripts/jquery.date.js"></script>-->
<!-- 引入弹出层插件blackbox -->
<script type="text/javascript" src="<?=base_url()?>admin_res/plugins/blackbox/js/jquery.blackbox.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>admin_res/plugins/blackbox/css/blackbox.css" media="screen" />
<!-- 引入文件上传插件uploadify -->
<script type="text/javascript" src="<?=base_url()?>admin_res/plugins/uploadify_flash/jquery.uploadify.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>admin_res/plugins/uploadify_flash/uploadify.css" media="screen" />
<!-- 引入图片选区插件Jcrop 以前一直诧异一个jquery插件竟然还能截取图片 其实它只是选取坐标 最后还是交给PHP实现截图 -->
<script type="text/javascript" src="<?=base_url()?>admin_res/plugins/jcrop/jquery.Jcrop.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>admin_res/plugins/jcrop/jquery.Jcrop.css" media="screen" />
</head>
<body>
  <div id="main-content">
    <!-- Main Content Section with everything -->
    <!-- Page Head -->
   <!-- <ul class="shortcut-buttons-set">
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
        <ul class="content-box-tabs">
          <li><a href="#tab1" class="default-tab">通用设置</a></li>
          <!-- href must be unique and match the id of target div -->
          <li><a href="#tab2">前台底部设置</a></li>
        </ul>
        <div class="clear"></div>
      </div>
      <!-- End .content-box-header -->
      <div class="content-box-content">
        <div class="tab-content default-tab" id="tab1">
          <form action="#" method="post" id="tab1Form">
            <fieldset>
            <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
            <p>
              <label>公司名称：</label><input class="text-input small-input" type="text" id="configSiteName" name="configSiteName" value="<?=$data['configSiteName'];?>" />
              <span class="input-notification png_bg"></span>
              <!-- Classes for input-notification: success, error, information, attention -->
            </p>
            <p>
            	<label>Logo尺寸：</label><input type="text" readonly id="configSiteLogoWidth" style="width:30px;text-align:center;margin-right:10px;" value="<?=$data['configSiteLogoWidth']?>"/>px <span>宽度</span>&nbsp;&nbsp;<input type="text" readonly id="configSiteLogoHeight" style="width:30px;text-align:center;margin-right:10px;" value="<?=$data['configSiteLogoHeight']?>"/>px <span>高度</span>
            </p>
            <div style="margin-left:105px;"><span>宽度调节</span><div id="slider-logo-size-width" style="width:200px;display:inline-block;margin-bottom:20px;margin-left:10px;vertical-align:top;"></div></div>
            <div style="margin-left:105px;"><span>高度调节</span><div id="slider-logo-size-height" style="width:200px;display:inline-block;margin-left:10px;vertical-align: top;"></div></div>
            <p>
	              <label>公司Logo：</label><input class="text-input small-input datepicker" type="file" id="configSiteLogo_" name="configSiteLogo_" multiple="true"/><input type="hidden" id="configSiteLogo" name="configSiteLogo" value="<?=$data['configSiteLogo']?>"/>
	              <span class="input-notification png_bg"></span>
		    </p>
            <p>
	              <label></label><img  id="configSiteLogo_img" name="configSiteLogo_img" src="<?php if(!empty($data['configSiteLogo'])){ echo $data['configSiteLogo']; }?>"/>
		    </p>
            <p>
              <label>网站根地址：</label><input class="text-input small-input" type="text" id="configSiteUrl" name="configSiteUrl" value="<?=$data['configSiteUrl']; ?>"/><br/>
              <small>填写完整网络地址http://域名的形式</small> 
            </p>
            <p>
              <label>公司关键词：</label><input class="text-input medium-input" type="text" id="configSiteKey" name="configSiteKey" value="<?=$data['configSiteKey']; ?>"/><br/>
              <small>填写公司的关键词 用于SEO优化 使用，号或者空格隔开即可</small> 
            </p>
            <p>
              <label>公司描述：</label><textarea class="text-input medium-input"  id="configSiteDescription" name="configSiteDescription"><?=$data['configSiteDescription']; ?></textarea><br/>
              <small>对公司做简单的描述 用于SEO优化 便于让用户找到你</small> 
            </p>
            
		   	
            <p>
              <label></label><input class="button" type="button" value="保存设置" id="saveTab1" />
            </p> 
            </fieldset>
            <div class="clear"></div>
            <!-- End .clear -->
          </form>
        </div>
        <!-- End #tab1 -->
        <div class="tab-content" id="tab2">
          <form action="#" method="post" id="tab2Form">
            <fieldset>
            <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
            <p>
              <label>联系方式：</label><input class="text-input medium-input" type="text" id="configSiteContact" name="configSiteContact" value="<?php echo $data['configSiteContact']; ?>"/>
              <span class="input-notification png_bg"></span>
              <!-- Classes for input-notification: success, error, information, attention --> </p>
            <p>
              <label>网站版权：</label><input class="text-input medium-input datepicker" type="text" id="configSiteCopyright" name="configSiteCopyright" value="<?php echo $data['configSiteCopyright']; ?>"/>
              <span class="input-notification png_bg"></span> </p>
            <p>
              <label>其他信息：</label><input class="text-input medium-input" type="text" id="configSiteOthers" name="configSiteOthers" value="<?php echo $data['configSiteOthers']; ?>"/>
            </p>
            <!--<p>
              <label>Textarea with WYSIWYG</label>
              <textarea class="text-input textarea wysiwyg" id="textarea" name="textfield" cols="79" rows="15"></textarea>
            </p>-->
            <p>
              <input class="button" type="button" value="保存设置" id="saveTab2" />
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
    <div class="clear"></div>
</div>
</body>
<!-- 引入jquery ui -->
<script type="text/javascript" src="<?=base_url()?>admin_res/plugins/jquery-ui-1.11.1.custom/jquery-ui.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>admin_res/plugins/jquery-ui-1.11.1.custom/jquery-ui.min.css" media="screen" />
<script type="text/javascript">
	//实例化弹出层插件blackbox
	var box = new BlackBox();
	//实例化文件上传插件uploadify
	<?php $time = time();?>
	$('#configSiteLogo_').uploadify({
		'auto':'false',								//是否允许自动上传 true为自动上传 选择图片后就上传 false为不自动上传 选择图片只是添加到上传队列中
													//需要点击上传按钮手动上传
		'removeCompleted'	: false,
		'height':'30',								//上传按钮高度
		'width':'120',								//上传按钮宽度
		'fileTypeExts':'*.jpg; *.jpeg; *.gif; *.png;',	//允许上传的图片类型
		'fileSizeLimit':'6144kb',						//允许上传图片大小 6MB
		'buttonText':'选择图片',
		'formData':{'time' : '<?php echo $time;?>','token' : '<?php echo md5('I_love_you' . $time);?>'},
		'swf':'<?=base_url()?>admin_res/plugins/uploadify_flash/uploadify.swf',					//上传插件的swf资源地址	TODO 会引发一个HTTP404错误
		'uploader':'http://localhost/company/admin_s.php/api/upload_logo',				//文件数据在服务器上的接收地址（也可以是接口地址）
		'multi':false,																//false为不允许同时选择多张图片
		'onSelect':function(file){													//选择图片是触发的事件
			$('#configSiteLogo').next().removeClass('error').html('');
		},
		'onUploadSuccess':function(file,data,response){									//data为图片接收服务端返回的数据
			data = $.parseJSON(data);
			//console.log(data);
			
			$('#configSiteLogo_img').attr('src','<?=base_url()?>uploads/logo/'+data.url+'?r='+Math.floor(Math.random()*1000 + 1));
			//console.log('<?=base_url()?>uploads/logo/');
			//写进隐藏表单
			$('#configSiteLogo').val('<?=base_url()?>uploads/logo/'+data.url+'?r='+Math.floor(Math.random()*1000 + 1));
			/*$('#configSiteLogo_img').Jcrop({
				//aspectRatio:3,			//选取宽高比	1表示宽和高相同 0为不限制
				onSelect:callback,		//选框选定时的事件	坐标会以一个对象的方式自动传入这个回调函数
				onChange:callback,		//选框改变时的事件
				allowMove:true,				//允许选框移动
				allowResize:false,			//是否允许选框缩放 true为允许
				//minSelect:[100,100],		//最小选择尺寸 低于此尺寸会自动取消选区
				minSize:[180,60]				//所能选择的最小选区
				
			});
			function callback(param){		//param为一个坐标信息对象 x,y为左上角坐标 x2,y2为右下角坐标 w为宽度 h为高度
				console.log(param);
			}*/
		},
	});
	//保存通用设置
	$("#saveTab1").click(function(e) {
		//保存logo图像 未对图像进行裁剪 隐藏表单为空就不能保存 请裁剪图像 把坐标信息放进隐藏表单才能进行保存
		if($('#coords_x').val() === ''){
			alert('你还未对图片进行裁剪');	
		}
		//验证表单数据
		if($('#configSiteName').val()===''){
			$('#configSiteName').next().addClass('error').html('不能为空');
			return false;
		} else {
			$('#configSiteName').next().removeClass('error').html('');
		}
		if($('#configSiteLogo').val()===''){
			$('#configSiteLogo').next().addClass('error').html('未选择图片');
			return false;
		} else {
			$('#configSiteLogo').next().removeClass('error').html('');
		}
		//组装表单数据
		var tab1Data = $("#tab1Form").serialize();
        	$.ajax({
			'url':'saveBaseSet',
			'type':'POST',
			'data':tab1Data,
			'dataType':'json',
			'async':false,
			'success':function(data){
					if(data){
						box.alert('更新成功',function(){},{});
					} else {
						box.alert('未作更改',function(){},{});
					}
			}
		});
    	});
	//保存通用设置end
	$("#saveTab2").click(function(){
		var tab2Data = $("#tab2Form").serialize();
		$.ajax({
			'url':'saveBaseSet',
			'type':'POST',
			'data':tab2Data,
			'dataType':'json',
			'success':function(data){
				if(data){
						box.alert('更新成功',function(){},{});
					} else {
						box.alert('未作更改',function(){},{});
					}
			}
		});
	});
	//jqueryui slider插件-用于微调logo尺寸
	$('#slider-logo-size-width').slider({
		range:'max',
		min:160,
		max:200,
		value:180,
		slide:function(event,ui){
			$('#configSiteLogoWidth').val(ui.value);
			$.post('saveBaseSet',{'configSiteLogoWidth':ui.value,'configSiteLogoHeight':$('#configSiteLogoHeight').val()},function(){},'json');
		}
	});
	$('#configSiteLogoWidth').val($('#slider-logo-size-width').slider('value'));
	$('#slider-logo-size-height').slider({
		range:'max',
		min:40,
		max:80,
		value:60,
		slide:function(event,ui){
			$('#configSiteLogoHeight').val(ui.value);
			$.post('saveBaseSet',{'configSiteLogoHeight':ui.value,'configSiteLogoWidth':$('#configSiteLogoWidth').val()},function(){},'json');
		}
	});
	$('#configSiteLogoHeight').val($('#slider-logo-size-height').slider('value'));
</script>
</html>