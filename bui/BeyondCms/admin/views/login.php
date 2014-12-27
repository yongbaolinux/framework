<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BeyondCms后台登录系统</title>
<!-- CSS -->
<!-- Reset Stylesheet -->
<link rel="stylesheet" href="<?=$PUBLIC?>/css/reset.css" type="text/css" media="screen" />
<!-- Main Stylesheet -->
<link rel="stylesheet" href="<?=$PUBLIC?>/css/style.css" type="text/css" media="screen" />
<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
<link rel="stylesheet" href="<?=$PUBLIC?>/css/invalid.css" type="text/css" media="screen" />
<!-- Javascripts -->
<!-- jQuery -->
<script type="text/javascript" src="<?=$PUBLIC?>/js/jquery-1.8.1.min.js"></script>
<!-- jQuery Configuration -->
<script type="text/javascript" src="<?=$PUBLIC?>/js/simpla.jquery.configuration.js"></script>
<!-- Facebox jQuery Plugin -->
<script type="text/javascript" src="<?=$PUBLIC?>/js/facebox.js"></script>
<!-- jQuery WYSIWYG Plugin -->
<script type="text/javascript" src="<?=$PUBLIC?>/js/jquery.wysiwyg.js"></script>
</head>
<body id="login">
<div id="login-wrapper" class="png_bg">
  <div id="login-top">
    <h1>后台系统</h1>
    <!-- Logo (221px width) -->
  </div>
  <!-- End #logn-top -->
  <div id="login-content">
    <form>
      <div class="notification information png_bg">
        <div> BeyondCMS后台登录 </div>
      </div>
      <p>
        <label>帐号</label>
        <input class="text-input" type="text" id="admin-account"/>
        <span class="input-notification png_bg"></span>
      </p>
      <div class="clear"></div>
      <p>
        <label>密码</label>
        <input class="text-input" type="password" id="admin-pwd"/>
        <span class="input-notification png_bg"></span>
      </p>
      <div class="clear"></div>
      <p id="remember-password">
        <input type="checkbox" />
        <span>记住我</span> </p>
      <div class="clear"></div>
      <p>
        <input class="button" type="button" value="登录" onclick="javascript:login()"/>
      </p>
    </form>
  </div>
  <!-- End #login-content -->
</div>
<!-- End #login-wrapper -->
</body>
<script type="text/javascript">
    var admin_account_obj = $("#admin-account");
    var admin_pwd_obj = $("#admin-pwd");

    function login(){
      var admin_account = $.trim(admin_account_obj.val());
      var admin_pwd = $.trim(admin_pwd_obj.val());
      admin_account_obj.next().removeClass('error').html('');
      admin_pwd_obj.next().removeClass('error').html('');
      if(admin_account == ''){
          admin_account_obj.next().addClass('error').html('帐号不能为空');
          return false;
      }
      if(admin_pwd == ''){
        admin_pwd_obj.next().addClass('error').html('密码不能为空');
        return false;
      }
      $.ajax({
        'url':'<?=base_url()?>system.php/admin/ajaxValidateAdminAccountPwd',
        'type':'POST',
        'data':{'admin_account':admin_account,'admin_pwd':admin_pwd},
        'dataType':'json',
        'success':function(json){
          switch(json){
            case 0:
                  admin_account_obj.next().removeClass('error').html('');
                  admin_pwd_obj.next().removeClass('error').addClass('success').html('登录成功');
                  window.location.href = '<?php echo base_url();?>system.php';break;
            case 1:
                  admin_account_obj.next().addClass('error').html('帐号不能为空');
                  admin_pwd_obj.next().removeClass('error').removeClass('success').html('');break;
            case 2:
                  admin_account_obj.next().addClass('error').html('该帐号不存在');
                  admin_pwd_obj.next().removeClass('error').removeClass('success').html('');break;
            case 4:
                  admin_account_obj.next().removeClass('error').html('');
                  admin_pwd_obj.next().addClass('error').html('密码不能为空');break;
            case 5:
                  admin_account_obj.next().addClass('error').html('帐号不能为空');
                  admin_pwd_obj.next().addClass('error').html('密码不能为空');break;
            case 6:
                  admin_account_obj.next().addClass('error').html('该帐号不存在');
                  admin_pwd_obj.next().addClass('error').html('密码不能为空');break;
            case 8:
                  admin_account_obj.next().removeClass('error').html('');
                  admin_pwd_obj.next().addClass('error').html('密码错误');break;
            default:
                  break;
          }
        }
      });
    }

</script>
</html>
