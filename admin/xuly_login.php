<?php 
	session_start();
	include("config.php");
	$username =$_POST['username'];
	$password = ($_POST["password"]);
	$sql=mysqli_query($con, "select*from user where username='$username' and password='$password'");
	$row=mysqli_num_rows($sql);
	$arr=mysqli_fetch_array($sql);
	if($row==0)
	{
		echo '<script type="text/javascript"> alert("Ten dang nhap hoac mat khau sai"); history.go(-1)</script>';
		header('location:index.php');
	}
	elseif ($arr['level']!=3)
	{
		echo '<script type="text/javascript"> alert("Nguoi dung khong the vao trang nay!"); history.go(-1)</script>';
	}
	elseif ($arr['level']=3)
	{
		$_SESSION['idadmin']= $arr['id'];
		$_SESSION['user'] = $arr['username'];
		$_SESSION['pass']= $arr['password'];
		$_SESSION['name']= $arr['name'];
		$_SESSION['level']= $arr['level'];
		header("location:index.php");
	}
	
?>