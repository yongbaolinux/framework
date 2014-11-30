<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>diskroom 后台管理登录</title>
<!--                       CSS                       -->
<!-- Reset Stylesheet -->
<link rel="stylesheet" href="<?=base_url()?>admin_res/css/reset.css" type="text/css" media="screen" />
<!-- Main Stylesheet -->
<link rel="stylesheet" href="<?=base_url()?>admin_res/css/style.css" type="text/css" media="screen" />
<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
<link rel="stylesheet" href="<?=base_url()?>admin_res/css/invalid.css" type="text/css" media="screen" />

</head>
<body id="login">
<div id="login-wrapper" class="png_bg">
  <div id="login-top">
    <h1>Diskroom后台登录</h1>
    <!-- Logo (221px width) -->
    <a href="#"><img id="logo" src="<?=base_url()?>admin_res/images/logo.png" alt="diskroom logo" /></a> </div>
  <!-- End #logn-top -->
  <div id="login-content">
    <form action="doLogin" method="post" name="login">
      <div class="notification information png_bg">
        <div> 请输入管理员帐号密码登录 </div>
      </div>
      <p>
        <label>管理员帐号</label>
        <input class="text-input" type="text" name="account"/><span class="input-notification png_bg"></span>
      </p>
      <div class="clear"></div>
      <p>
        <label>管理员密码</label>
        <input class="text-input" type="password" name="pwd"/><span class="input-notification png_bg"></span>
      </p>
      <div class="clear"></div>
      <p id="remember-password">
	<label></label>
        <input type="checkbox" name="auto"/>
        自动登录（公用电脑上慎用） </p>
      <div class="clear"></div>
      <p>
        <input class="button" type="button" value="登录" name="submit"/>
      </p>
    </form>
  </div>
  <!-- End #login-content -->
</div>
<!-- End #login-wrapper -->
</body>
<script type="text/javascript" src="<?=base_url()?>admin_res/scripts/jquery-1.8.2.min.js"></script>
<script type="text/javascript">
	$('input[name="submit"]').click(function(){
		if($.trim($('input[name="account"]').val())===''){
			$('input[name="account"]').next().addClass('error').html('帐号不能为空');
			return false;
		} else {
			$('input[name="account"]').next().removeClass('error').html('');
		}
		if($.trim($('input[name="pwd"]').val())===''){
			$('input[name="pwd"]').next().addClass('error').html('密码不能为空');
			return false;
		} else {
			$('input[name="pwd"]').next().removeClass('error').html('');
		}
		//ajax验证管理员帐号是否存在
		$.ajax({
			'url':'doLogin',
			'type':'POST',
			'data':$('form[name="login"]').serializeArray(),
			'dataType':'json',
			'success':function(data){
				if(data.res){
					window.location.href=data.desc;
				} else {
					$('input[name="'+data.desc+'"]').next().addClass('error').html(data.msg);
				}
			}
		});
	});
</script>
</html>
