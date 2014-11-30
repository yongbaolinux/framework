<html>
<head>
<title>Diskroom后台管理系统</title>
<meta charset="utf-8" content="">
<link rel="stylesheet" href="<?=base_url()?>admin_res/css/reset.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?=base_url()?>admin_res/css/iframe-style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?=base_url()?>admin_res/css/invalid.css" type="text/css" media="screen" />
</head>
<body>
  <div id="main-content">
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
            	<input type="button" class="button" value="请选择模板">
          	</p>
          </div>
          <form action="saveTemplateSet" method="post">
            <table>
              <thead>
                <tr>
                  <th>   
                  </th>
                  <th>模板名称</th>		<!-- 给th一个固定的宽度 防止表格自动伸缩 -->
                  <th>模板缩略图</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <td colspan="6">
                  	<div class="bulk-actions align-left">
                      <input type="submit" class="button" value="确定">
                    </div>                  
                    <div class="pagination"><?php echo $pagination; ?></div>
                    <div class="clear"></div>
                  </td>
                </tr>
              </tfoot>
              <tbody>
              <?php foreach($templates as $key=>$value){ ?>
                <tr>
                  <td style="width:100px;">
                    <input type="radio" value="<?=$value?>" name="template"/>
                  </td>
                  <td>
                  	<?=$value?>
                   </td>
                   <td><img id="<?=$value?>" width="100px" height="100px" /></td>
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
<iframe src="" name="templateScreenShot" width="0px" height="0px"></iframe>
<script type="text/javascript" src="<?=base_url()?>admin_res/scripts/jquery-1.8.2.min.js"></script>
<!-- html2canvas -->
<script type="text/javascript" src="<?=base_url()?>admin_res/plugins/html2canvas.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	//注意 要放在ready函数中 否则读不到body的值 为null
	var url = <?php echo json_encode($templates);?>;
	for(var i=0; i < url.length; i++){
		var src = 'http://localhost/company/index.php?tpl='+url[i];
		function test_(){
			//console.log(url[i]);								//这是一个闭包函数 保存着i的最终值 最终值是3 所以url[i]的值一直是undefined
		}
		callback_ = function(templateName){
			return function(){html2canvas(window.frames['templateScreenShot'].document.body,{
				onrendered:function(canvas){
					//document.body.appendChild(canvas);
					var ScreenShot = canvas.toDataURL("image/jpeg");			//png太大 不能成功

					/*$.post('createTemplateImage',{templateName:templateName,canvas:ScreenShot},function(data){
						$('#'+url[i]).attr('src',data);
						},'json');*/
					$.ajax({
						'url':'createTemplateImage',
						'data':{templateName:templateName,canvas:ScreenShot},
						'type':'POST',
						'dataType':'json',
						'async':false,
						'success':function(data){
							//$('#'+url[i]).attr('src',data);
						}
					});
				}
			  });
			}
		}(url[i]);
		$("iframe[name='templateScreenShot']").attr('src',src).load(/*function(param){
			  html2canvas(window.frames['templateScreenShot'].document.body,{
				onrendered:function(canvas){
					//document.body.appendChild(canvas);
					var ScreenShot = canvas.toDataURL("image/jpeg");			//png太大 不能成功
					
					$.post('createTemplateImage',{templateName:url[i],canvas:ScreenShot},function(data){
						$('#'+url[i]).attr('src',data);
						},'json');
				}
			  });
			}*/
			callback_
		);
	}
	
});
	
	
</script>
<!-- 引入弹出层插件 -->
<script type="text/javascript" src="<?=base_url()?>admin_res/plugins/blackbox/js/jquery.blackbox.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>admin_res/plugins/blackbox/css/blackbox.css" media="screen" />
<script type="text/javascript">
	//默认选中defaults模板 在radio中直接输出checked属性在firefox下失效 所以用js来控制
	$(':radio[name="template"]').each(function(index,item){
		if($(item).val() === '<?=$current_template?>'){
			$(item).attr('checked',true);	
		}
	});
</script>
</html>