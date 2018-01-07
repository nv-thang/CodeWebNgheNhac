<?php 
	session_start();
	include("config.php");
	$username =$_POST['username'];
	$password = ($_POST["password"]);

	$tv="select*from user where username='$username' and password='$password'";
	$sql= mysqli_query($con,$tv);
	$row=mysqli_num_rows($sql);
	if($row==0)
	{
		echo '<script type="text/javascript"> alert("Ten dang nhap hoac mat khau sai"); history.go(-1)</script>';
	}
	else
	{
		$arr=mysqli_fetch_array($sql);
		$_SESSION['u_id']= $arr['id'];
		$_SESSION['user_id'] = $arr['username'];
		$_SESSION['pass']= $arr['password'];
		$_SESSION['hoten']= $arr['hoten'];
		$_SESSION['ngaysinh']= $arr['ngaysinh'];
		$_SESSION['diachi']= $arr['diachi'];
		header("location:index.php");
	}
?>