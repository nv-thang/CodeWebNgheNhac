<?php
	session_start();
	include("config.php");
	$user=$_SESSION['user_id'];

	$tv="select * from user where username='$user'";
	$sql= mysqli_query($con,$tv);
	$row=mysqli_fetch_array($sql);
	if(isset($_POST['edit']))
	{
	$password=$_POST['password'];
	$hoten=$_POST['hoten'];
	$email=$_POST['email'];
	$diachi=$_POST['diachi'];
	$tv="UPDATE user set password='$password',name='$hoten',email='$email',diachi='$diachi' where username='$user'";
	$update= mysqli_query($con,$tv);
	if($update)
		{
			echo "Thông tin đã thay đổi. Trở về <a href='index.php'>trang chủ</a>";
		}
	else
	echo "Thay đổi thất bại";
	}
	else
	{

?>
<!--làm tiếp ở chỗ này-->
<div id="dangky_thanhvien">
				<div class="content-block album">
					<h2 class="content-block-title"> Thay đổi thông tin</h2>
               	</div>
				<div class="thongtin_dangky">
					<div style="padding: 10px;">
                        <form action="" method="POST">
							<table width="600px" border="0">
								<tr>
									<td width="100px" height="25px" valign="center" align="right">Mật khẩu: </td>
									<td width="400px">
											<input type="password" name="password" value="<?php echo $row['password'];?>" style="width:300px">
								</tr>
								<tr><td height="25px" valign="center"></td>
									<td valign="center">
											<i style='font-size:13px'><em>( Nếu bạn muốn thay đổi mật khẩu thì hãy nhập mật khẩu vào ô ở trên )</em></i>
											<br />
											<i style='font-size:13px'>( Nếu bạn muốn không thay đổi mật khẩu thì để yên giá trị ở ô trên )</i>
									</td>
								</tr>
								<tr>
									<td align="right" height="25px" valign="center">Họ Và Tên: </td>
									<td><input type="text" name="hoten" value="<?php echo $row['name'];?>" style="width:300px"></td>
								</tr>
								<tr>
									<td align="right" height="25px" valign="center">Email: </td>
									<td><input type="text" name="email" value="<?php echo $row['email'];?>" style="width:300px"></td>
								</tr><tr>
									<td align="right" height="25px" valign="center">Địa chỉ: </td>
									<td><input type="text" name="diachi" value="<?php echo $row['diachi'];?>" style="width:300px"></td>
								</tr>
								<TR>
									<td colspan=2 align="center"><input class="btup" type="submit" name="edit" value="Thay đổi" id="kieunut"></td>
								</tr>
							</table>
						</form>
                </div>
			</div> 
<?php }
?>