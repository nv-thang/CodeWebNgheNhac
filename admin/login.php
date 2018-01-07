<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="images/admin/admin.ico" rel="icon" type="image/x-icon">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Login ADMIN ONLINE MP3</title>
<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="default" />
<script src="js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>
<script src="js/jquery/custom_jquery.js" type="text/javascript"></script>
<script src="js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
</script>
</head>
<body id="login-bg"> 
 
<!-- Start: login-holder -->
<div id="login-holder">

	<!-- start logo -->
	<div id="logo-login">
		<a><img src="images/shared/logo1.png" width="156" height="40" alt="" /></a>
	</div>
	<!-- end logo -->
	
	<div class="clear"></div>
	
	<!--  start loginbox ................................................................................. -->
	<div id="loginbox">
	
	<!--  start login-inner -->
	<div id="login-inner">
	<form method="post" action="xuly_login.php">
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<th>Username</th>
			<td><input type="text" value="" class="login-inp" name="username" onclick="this.select()" onmouseover="this.focus()" onkeyup="M.sea(this.value)" maxlength="255" placeholder="User Name"/></td>
		</tr>
		<tr>
			<th>Password</th>
			<td><input type="password" value="*******"  onfocus="this.value=''" class="login-inp" name="password" /></td>
		</tr>
		<tr>
			<th></th>
			<td><input name="login" type="submit" class="submit-login" value="Submit" /></td>
		</tr>
		</table>
	</form>
	</div>
 </div>
</body>
</html>