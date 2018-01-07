<?php
	session_start();
	include("config.php");
?>
<div class="breadLine">
	<ul class="breadcrumb">
		<li><a href="#">Admin CP</a> <span class="divider">></span></li>                
		<li class="active">Ca Sỹ</li>
	</ul>                                                
</div>
<?php

	if(isset($_SESSION['idadmin']))
	{
		if($_POST['ok'])
		{
			$casy=$_POST['casy'];
			$sql=mysqli_query($con, "select * from casy where casy='$casy'");
			$row=mysqli_num_rows($sql);
			if($row!=0)
			{					
				echo '<script type="text/javascript"> alert("Da Co Ca Sy Nay Trong CSDL"); </script>';
			}
			else
			{
				mysqli_query($con, "insert into casy(casy) values('$casy')");
				echo 'Đã thêm ca sỹ: <b>'.$casy.'</b> vào CSDL';
			}
		}
		
?>
<div class="workplace">
	<form method="post" action="">
	<div class="row-fluid">
		<div class="span6">
		<div class="head">
			<div class="isw-target"></div>
				<h1>Thêm Ca Sỹ</h1>
			<div class="clear"></div>
		</div>
		<div class="block-fluid">                         
			<div class="row-form">
				<div class="span2">Tên Ca Sỹ:</div>
				<div class="span6">
					<input type="text" name="casy"/>
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
			$casycu=$_POST['casycu'];
			$casymoi=$_POST['casymoi'];
			$sql=mysqli_query($con, "select * from casy where casy='$casymoi'");
			$row=mysqli_num_rows($sql);
			if($row!=0)
			{					
				echo '<script type="text/javascript"> alert("Da Co Ca Sy Nay Trong CSDL"); </script>';
			}
			else
			{
				$update= mysqli_query($con, "update casy set casy='$casymoi' where id IN ($casycu)");
				echo '<b>Đã sửa thành công</b>';
			}
		}
		if($_POST['no'])
		{
			$casycu=$_POST['casycu'];
			if($casycu=="")
			{
				echo '<script type="text/javascript"> alert("Da Het Ca Sy De Xoa Roi"); </script>';
			}
			else
			{
				mysqli_query($con, "DELETE FROM casy WHERE id IN($casycu)");
				echo '<b>Đã Xóa Thành Công </b>';
			}
		}
	?>
	<form method="post" action="">
	<div class="row-fluid">
		<div class="span6">
		<div class="head">
			<div class="isw-target"></div>
				<h1>Sửa và Xóa Ca Sỹ</h1>
			<div class="clear"></div>
		</div>
		<div class="block-fluid">
			<div class="row-form">
				<div class="span3">Ca Sỹ Cũ:</div>
				<div class="span6">
					<select name="casycu" id="s2_1" style="width: 100%;">
						<?php
							$luachon=mysqli_query($con,"select * from casy");
							while($row=mysqli_fetch_array($luachon))
							{
						?>
							<option value="<?php echo $row['id']?>"> <?php echo $row['casy']?></option>
						<?php
							}
						?>
					</select>
				</div>
				<div class="clear"></div>
			</div>
			<div class="row-form">
				<div class="span3">Ca Sỹ Mới:</div>
				<div class="span6">
					<input type="text" name="casymoi"/>
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