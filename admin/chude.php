<?php
	session_start();
	include("config.php");
?>
<div class="breadLine">
	<ul class="breadcrumb">
		<li><a href="#">Admin CP</a> <span class="divider">></span></li>                
		<li class="active">Chủ Đề</li>
	</ul>                                                
</div>
<?php

	if(isset($_SESSION['idadmin']))
	{
		if($_POST['ok'])
		{
			$chude=$_POST['chude'];
			$sql=mysqli_query($con,"select * from chude where chude='$chude'");
			$row=mysqli_num_rows($sql);
			if($row!=0)
			{					
				echo '<script type="text/javascript"> alert("Da Co Chu De Nay Trong CSDL"); </script>';
			}
			else
			{
				mysqli_query($con,"insert into chude(chude) values('$chude')");
				echo 'Đã thêm chủ đề: <b>'.$chude.'</b> vào CSDL';
			}
		}
		
?>
<div class="workplace">
	<form method="post" action="">
	<div class="row-fluid">
		<div class="span6">
		<div class="head">
			<div class="isw-target"></div>
				<h1>Thêm Chủ Đề</h1>
			<div class="clear"></div>
		</div>
		<div class="block-fluid">                         
			<div class="row-form">
				<div class="span2">Chủ Đề:</div>
				<div class="span6">
					<input type="text" name="chude"/>
				</div>                            
				<div class="clear"></div>
			</div> 
			<div class="row-form">
				<table width="348" border="0">
					<tr>
						<td width="127px"><input class="btn btn-large" type="submit" value="Thêm Zô" name="ok"></td>
						<td width="8">&nbsp;</td>
						<td width="127"><input class="btn btn-large" type="reset" value="Nhập lại" onClick="return confirm('Làm lại á');"></td>
					</tr>
				</table>
				<div class="clear"></div>
			</div>
		</div>
    </div>   
	</form>
	<div class="dr"><span></span></div>
	<?php
		if($_POST['sua'])
		{
			$chudecu=$_POST['chudecu'];
			$chudemoi=$_POST['chudemoi'];
			$update= mysqli_query($con,"update chude set noidung='$chudemoi' where id IN ($chudecu)");
			echo '<b>Đã sửa thành công</b>';
		}
		if($_POST['no'])
		{
			$chudecu=$_POST['chudecu'];
			mysqli_query($con, "DELETE FROM chude WHERE id IN($chudecu)");
			echo '<b>Đã Xóa Thành Công </b>';
		}
	?>
	<form method="post" action="">
	<div class="row-fluid">
		<div class="span6">
		<div class="head">
			<div class="isw-target"></div>
				<h1>Sửa và Xóa Chủ Đề</h1>
			<div class="clear"></div>
		</div>
		<div class="block-fluid">
			<div class="row-form">
				<div class="span3">Chủ Đề Cũ:</div>
				<div class="span6">
					<select name="chudecu">
						<?php
						   include("config.php");
						 

							$luachon=mysqli_query($con,"select * from chude");
							while($row=mysqli_fetch_array($luachon))
							{
						?>
							<option value="<?php echo $row['id']?>"> <?php echo $row['chude']?></option>
						<?php
							}
						?>
					</select>
				</div>
				<div class="clear"></div>
			</div>
			<div class="row-form">
				<div class="span3">Chủ Đề Mới:</div>
				<div class="span6">
					<input type="text" name="chudemoi"/>
				</div>                            
				<div class="clear"></div>
			</div> 
			<div class="row-form">
				<table width="348" border="0">
					<tr>
						<td width="127px"><input class="btn btn-large" type="submit" value="Sửa Lại" name="sua"></td>
						<td width="8">&nbsp;</td>
						<td width="127"><input class="btn btn-large" type="submit" value="Xóa Luôn" onClick="return confirm('Xóa Nek!');" name="no"></td>
					</tr>
				</table>
				<div class="clear"></div>
			</div>
		</div>
    </div>   
	</form>
</div>
<?php
	}
?>