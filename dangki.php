<?php
error_reporting(E_ERROR)
?>
	<link type="text/css" href="style.css" rel="stylesheet">
	<script type="text/javascript" src="js/xuly.js"></script>
<?php
	include "config.php";
	if(isset($_POST["submit"]))
	{
	$username = addslashes($_POST["username"]);
	$password = $_POST["password"];
	$email = addslashes($_POST["email"]);
	$hoten = addslashes($_POST["hoten"]);
	$diachi =addslashes($_POST["diachi"]);
	$ngaysinh = $_POST["ngay"]."-".$_POST["thang"]."-".$_POST["nam"];
	$gioitinh =addslashes($_POST["gt"]);
	$query = "SELECT username FROM user WHERE username ='$username';";
    $result = mysqli_query($con,$query) or die(mysqli_error());
	if (mysqli_num_rows($result) != 0)
          {
		  $usertt="User da ton tai";
		  }
	else
	{
		if(!preg_match('/^[^@]+@[a-zA-Z0-9._-]+\.[a-zA-Z]+$/', $email))
		{
		$mailer= "Email không hợp lệ!";
		}
		
		else
		{
			$sql = "insert into user(username,password,email,name,diachi,ngaysinh,gioitinh) values('$username','$password','$email','$hoten','$diachi','$ngaysinh','$gioitinh')";
			$resual=mysqli_query($con, $sql) or die(mysqli_error());
				if($resual)
				{
				$tb="Tài khoản <b>$username</b> đã được tạo";
				}
				else
				{
					echo "";
				}
		}
	}
	}
		 
	?>			
<html>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<head>
<script language=JavaScript> <!--title chạy-->
	var txt="Nghe Nhạc Online - Tải Nhạc Mp3 Trực Tuyến Cực Nhanh             "; 
	var espera=200; var refresco=null; function rotulo_title() 
	{ 
		document.title=txt; txt=txt.substring(1,txt.length)+txt.charAt(0); refresco=setTimeout("rotulo_title()",espera); 
	} 
	rotulo_title();
</SCRIPT>
<!--CSS-->
<link href="image/giaodien/favicon0.ico" rel="shortcut icon" type="image/x-icon">  
<link href="css/styles00.css" rel="stylesheet" type="text/css">
<link href="css/skin0000.css" rel="stylesheet" type="text/css">
<link href="css/jquery00.css" rel="stylesheet" type="text/css">
<link href="css/menudrop.css" rel="stylesheet" type="text/css">
<link href="css/form.css" rel="stylesheet" type="text/css">
<!--Javascrip-->
<script type="text/javascript" src="js/ichphien.js"></script>
<script type="text/javascript" src="js/dropmenu.js"></script>
<script type="text/javascript" src="js/jquery01.js"></script>
<script type="text/javascript" src="js/ajax_loa.js"></script>
<script type="text/javascript" src="js/jquery-s.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript" src="xuly.js"></script>
<script language="JavaScript" type="text/javascript">
function check_form()
{
	user=document.form.username.value;
	var loiuser=document.getElementById("iduser");
	
	{
		if (user==0)
		{
		form.username.style.borderColor='red'; //Đổi màu border textbox
		loiuser.innerHTML="Tài khoản không được bỏ trống !"; //Xuất ra dòng thông báo lỗi nếu user bỏ trống
		document.form.username.focus();
		return false;
		}
		loiuser.innnerHTML="";
		if(user.length<6)
		{
		form.username.style.borderColor='red';
		loiuser.innerHTML="Tài khoản phải lớn hơn 5 kí tự !";
		document.form.username.focus();
		return false;
		}
		loiuser.innerHTML="";
	}
	pass=document.form.password.value;
	var loimk=document.getElementById("idpass");
	
	{
		if(pass==0)
		{
		form.password.style.borderColor='red'; //Đổi màu border textbox
		loimk.innerHTML="Chưa nhập mật khẩu !"; //Xuất ra dòng thông báo lỗi 
		document.form.password.focus();
		return false;
		}
		loimk.innerHTML="";
	if(pass.length<6) 
		{			

			//alert("SS");

			loimk.innerHTML="Mật khẩu phải nhiều hơn 5 kí tự !"; //Xuất ra dòng thông báo lỗi nếu họ tên bỏ trống.

			document.form.password.focus(); //Đặt lại tiêu điểm (Tức là con trot chuột ấy) vào ô bị lỗi
			return false; //Quay lại check tiếp khi nhận đc tiêu điểm .

		}

		loipass.innerHTML="";
		}
		mail=document.form.email.value;
		var loimail=document.getElementById("idmail");
		dangmail= /^[\w.-]+@[\w.-]+\.[A-Za-z]{2,4}$/
		kq=dangmail.test(mail); //Kiểm tra mail mà người dùng nhập vào.

		if(mail=="") //Nếu mail bỏ trống

		{	

			loimail.innerHTML="Chưa nhập mail !";

			document.form.email.focus();

			return false;

		

		}

		loimail.innerHTML="";

		if(kq==false)

		{			

			loimail.innerHTML="Sai đinh dạng mail !";

			document.form.mail.focus();

			return false;

		}

		loimail.innerHTML="";
}
</script>


<body>
<div class="top-wrap">
	<div id="main">
	<div id="top_menu">
    	<div class="tleft">
		<a style="width: 145px; height: 37px; display: block;" href="index.php">
                <img width="145" height="37" src="<?php include("logo.php"); ?>">
          </a>
		</div>
		<div class="tcenter">
			<?php include("form/seach.php"); ?>
		</div>
        <div class="tright"><!--form login-->
            	<?php 
						if(isset($_SESSION['user_id'])&& isset($_SESSION['pass']))
						{
							echo "<div id='drop_menu'>";
							echo "<ul id='drop_menu_ul'><li><a class='menuhoten'>Cá Nhân</a><ul id='drop_menu_sub'>";
							echo "<li><a href='./?mod=suathongtin'>Sửa thông tin</a></li>";
							echo "<li><a href='logout.php'>logout</a></li>";
							echo "</ul></li></ul>";
							echo "</div>";							
						}
						else
						{
							echo file_get_contents("login.php");
						}
				?>
   	  </div>
   	  </div> 
       		<?php include("form/menutop.php");?>    <!--form menu top-->   
        <div class="clr">
        </div>
    </div>
</div>
<div id="main">
    <div id="contents">        	
        	<div id="dangky_thanhvien">
<div class="content-block album">
  <h2 class="content-block-title"> Đăng ký thành viên</h2>
</div>
				<div class="thongtin_dangky">
					<div style="padding: 10px;">
						<link type="text/css" href="style.css" rel="stylesheet">
						<script type="text/javascript" src="js/xuly.js"></script>

<style>
	#form_title{
	background:#ccc;
    font-weight:bold;
    border-bottom:#CCCCCC solid 1px;
    padding:5px;
}
form label{
    width:150px;
    float:left;
    text-align:right;
    padding:2px 10px 0px 0px;
}

.rq, .error{color: red}
</style><form action="" method="POST" name="form">
			<div id="title_tk">Thông tin đăng ký</div>
			<div id="block">
			<span style="color:red;text-align:center;"><?php echo $tb;?></span>
			<form action="" method="POST" name="form">
			<div id="form_title">Thông tin cá nhân</div>
			<table width="500px">
				<tr>
				<td width="150px">Họ tên:</td>
				<td width="350px"><input type="text" name="hoten" size="30">
				</tr>
				<tr>
				<td>Giới tính:</td>
					<td>Nam<input type="radio" name="gt" value="Nam" checked="checked">
						Nữ<input type="radio" name="gt" value="Nữ">
					</td>
				</tr>
				<tr>
				<td>Ngày sinh:</td>
					<td>
						<select name="ngay">
							<?php 
							for($i = 1; $i <=31 ; $i++)
								{    
							?>
							<option value="<?php echo $i; ?>"><?php echo ($i <= 9) ? "0".$i : $i; ?></option>
							<?php
									}
							?>
						</select>
						<select name="thang">
							<?php 
							for($i = 1; $i <=12 ; $i++)
								{    
							?>
							<option value="<?php echo $i; ?>"><?php echo ($i <= 9) ? "0".$i : $i; ?></option>
							<?php
									}
							?>
						</select>
						<select name="nam">
							<?php 
							for($i = 1975; $i <=2012 ; $i++)
								{    
							?>
							<option value="<?php echo $i; ?>"><?php echo ($i <= 9) ? "0".$i : $i; ?></option>
							<?php
									}
							?>
						</select>
					</td>
				</tr>
				
				<tr>
					<td>Địa chỉ:</td>
					<td><input type="text" name="diachi" size="30">
				</tr>
			</table>
			<div id="form_title">Thông tin tài khoản</div>
			<i>Dấu ( <span style="color:red">*</span>) là ô bắt buộc điền đầy đủ thông tin</i>
			
			
			<table width="500px" cellpadding="5" cellspacing="5">
                    	<tr>
                    		<td width="150px" align="left">User Name:</td>
							<td width="350px"> <input type="text" name="username" size="30" id="username"><span class="rq"> * </span>
					<br/><span id="iduser" class="error"><?php echo $usertt;?></span>
                            </td>
                       	</tr>
                        <tr>
                        	<td   align="left">PassWord:</td>
						  <td><input type="password" name="password" size="30" id="pass"><span class="rq"> * </span>
					<br/><span id="idpass"class="error"></span></td>
                        </tr>
                        <!--<tr>
                        	<td   align="left">Nhập lại mật khẩu:</td>
						  <td><input type="password" name="pass2" size="30" id="pass2"><span class="rq"> * </span>
					<br/><span id="idpass2" class="error"></span></td>
                        </tr>-->
                        <tr>
                            <td   align="left">Email:</td>
                            <td><input type="text" name="email" size="30"><span class="rq"> * </span>
					<br/><span id="idmail" class="error"><?php echo $mailer;?></span>
</td>
                          <td>&nbsp;</td>
                    	</tr>
                        <tr>
                            <td align="center" colspan="2">
                              <input name="submit" type="submit" class="_add_" onClick="return check_form();" value="Đăng ký">  
                                <input class="_add_" type="reset" value="Nhập lại">
                            </td>
                        </tr>
              </table>
			 
			
		</div>
                </td>
			       
                  </div>
			</div>   
        	</div>
        	<div class="clr">
    </div>
</div>
</form>
<div id="footer">
        <div class="adv_footer">
        </div>
            <div class="footer-info">
                <?php include"form/lienket.php";?><!--form Liên kết với webslide khác-->
                <div class="copyright">
                    <?php include("banquyen.php");?><!--form bản quyền của webslide-->
                </div>
                <div class="clr">
                </div>
            </div>
            <div class="gop-y"><a href="#"><img src="image/giaodien/gopy0000.jpg" border="0"></a><!--form qua form góp ý(cái này chưa làm)-->
            </div> 
</div>
	</div>
</div>
</body>
</html>

