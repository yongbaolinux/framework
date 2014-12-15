<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>程序发生异常</title>
<!--                       CSS                       -->
<!-- Reset Stylesheet -->
<link rel="stylesheet" href="error/css/reset.css" type="text/css" media="screen" />
<!-- Main Stylesheet -->
<link rel="stylesheet" href="error/css/style.css" type="text/css" media="screen" />

<link rel="stylesheet" href="error/css/invalid.css" type="text/css" media="screen" />

</head>
<body id="login">
<div id="login-wrapper" class="png_bg">
  <div id="login-top">
    <h1>错误页面</h1>
    <!-- Logo (221px width) -->
    <a href="javascript:void(0)">哈 出现了一个错误 !</a>
  </div>
  <!-- End #logn-top -->
  <div id="login-content">
    <form>
        <p>
            <label>出错文件 :</label><span class="text-input"><?php echo $e->getFile(); ?></span>
        </p>
        <div class="clear"></div>
        <p>
            <label>错误行 :</label>
            <span class="text-input">第 <?php echo $e->getLine();?> 行</span>
        </p>
        <div class="clear"></div>
        <div class="notification information png_bg">
            <div> <?php echo $e->getMessage(); ?> </div>
        </div>
    </form>
  </div>
  <!-- End #login-content -->
</div>
<!-- End #login-wrapper -->
</body>
</html>
