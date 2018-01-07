<?php
error_reporting(E_ERROR)
?>
<?php
	session_start();
	include("config.php");
?>
<div class="breadLine">
	<ul class="breadcrumb">
		<li><a href="index.php">Admin CP</a> <span class="divider">></span></li>                
		<a href="#"><li class="active">Nhạc Hot</li></a>
	</ul>                                                
</div>
<?php

	if(isset($_SESSION['idadmin']))
	{	$sql1=mysqli_query($con,"select * from baihathot");
		$row=mysqli_fetch_array($sql1);	
		if($_POST['ok'])
		{
			
			$tenbaihat=$_POST['tenbaihat'];
			$casy=$_POST['casy'];
			$theloai=$_POST['theloai'];
			$file_name=$_FILES['upload']['name'];
			$extent_file="mp3";
			$pattern='#.+\.(mp3)$#i';
			if(preg_match($pattern,$file_name)==1)
			{
				$file_type=true;
			}
			else
			{
				$file_type=false;
			}
			if($file_type==true)
			{
				$source=$_FILES['upload']['tmp_name'];
				$dest='nhac/'.$_FILES['upload']['name'];
				if(copy($source,$dest)==false)
				{
					$flag=true;
					$update=mysqli_query($con,"insert into baihathot(tenbaihat,casy,theloai,duongdan) values('$tenbaihat','$casy','$theloai','$dest')");
					if($update)
					{
						echo "Ok. Da Xong!";
					}
					else
					{
						echo "Đăng nhạc thất bại!";
					}
				}
				else
				{
					$flag=false;
					echo "Đăng nhạc thất bại!";
				}
			}
			else
			{
				echo "Kiểu File không hợp lệ";
			}
		}
	?>
<div class="workplace">
	<form method="post" enctype="multipart/form-data" action="">
	<div class="row-fluid">
		<div class="span6">
		<div class="head">
			<div class="isw-grid"></div>
				<h1>Upload Nhạc Hot</h1>
			<div class="clear"></div>
		</div>
		<div class="block-fluid">                        
			<div class="row-form">
				<div class="span5">File Upload:</div>
				<div class="span7">
					<input type="file" name="upload" id="upload"/>
				</div>
				<div class="clear"></div>
			</div> 
			<div class="row-form">
				<div class="span5">Tên Bài Hát:</div>
				<div class="span6">
					<input type="text" name="tenbaihat"/>
				</div>                            
				<div class="clear"></div>
			</div> 
			<div class="row-form">
				<div class="span5">Tên Ca Sỹ:</div>
				<div class="span6">
					<input type="text" name="casy"/>
				</div>                            
				<div class="clear"></div>
			</div>
			<div class="row-form">
				<div class="span5">Thể Loại:</div>
				<div class="span6">
					<select name="theloai">
						<?php
							$luachon=mysqli_query($con,"select * from theloai");
							while($row=mysqli_fetch_array($luachon))
							{
						?>
							<option> <?php echo $row['noidung']?></option>
						<?php
							}
						?>
					</select>
				</div>
				<div class="clear"></div>
			</div>
			<div class="row-form">
				<table width="348" border="0">
					<tr>
						<td width="127px"><input class="btn btn-large" type="submit" value="Nghe Thôi" name="ok"></td>
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
		$checkbox=$_POST['checkbox'];
		$tenbaihat=$_POST['tenbaihat'];
		$theloai=$_POST['theloai'];
		$casy=$_POST['casy'];
		if($checkbox=='')
		{
			echo '<script type="text/javascript"> alert("Chua chon check box nao het kia!"); </script>';
		}
		else
		{
			$s_id=implode(", ", $checkbox);
			$update= mysqli_query($con,"update baihathot set tenbaihat='$tenbaihat', casy='$casy', theloai='$theloai' where id IN ($s_id)");
			echo '<b>Đã Sửa Thành Công</b>';
		}
	}
	if($_POST['no'])
		{
			$checkbox=$_POST['checkbox'];
			if($checkbox=='')
			{
				echo '<script type="text/javascript"> alert("Chua chon check box nao het kia!"); </script>';
			}
			else
			{
				$del_id=implode(", ", $checkbox);
				mysqli_query($con,"DELETE FROM baihathot WHERE id IN($del_id)");
				echo '<b>Đã xóa thành công</b>';
			}
		}
?>
	<div class="row-fluid">               
		<div class="span12">                    
			<div class="head">
				<div class="isw-grid"></div>
				<h1>Bài Hát Hot</h1>                         
				<div class="clear"></div>
			</div>
			<div class="block-fluid table-sorting">
				<form method="post" action="">
					<table cellpadding="0" cellspacing="0" width="100%" class="table" id="tSortable">
						<thead>
							<tr>
								<th><input type="checkbox" name="checkall"/></th>
								<th width="25%">Tên Bài Hát</th>
								<th width="25%">Tên Ca Sỹ</th>
								<th width="25%">Thể Loại</th>
								<th width="25%">Nghe Thử</th>                                    
							</tr>		
                        </thead>    
						<tbody>
							<?php
								$sql=mysqli_query($con,"select * from baihathot");
								if(mysqli_num_rows($sql)>0)
								{
									while($row=mysqli_fetch_array($sql))
									{
							?>	
							<tr>
								<td><input type="checkbox" name="checkbox[]" value="<?php echo $row['id']; ?>"/></td>
								<td><input type="text" class="span12" name="tenbaihat" value="<?php echo $row['tenbaihat']; ?>"></td>
								<td><input type="text" class="span12" name="casy" value="<?php echo $row['casy']; ?>"></td>
								<td><?php echo $row['theloai']; ?></td>
<script language=javascript>
function externalLinks()
{
  if (!document.getElementsByTagName) return;
  var anchors = document.getElementsByTagName("a");
  for (var i=0; i<anchors.length; i++)
  {
      var anchor = anchors[i];
      if(anchor.getAttribute("href"))
		anchor.target = "_blank";
  }
}
window.onload = externalLinks;

</script>
								<td><a title="Nghe bài hát <?php echo $row['tenbaihat']; ?>" href=".././?mod=playhot&baihat=<?php echo $row['id'];?>">Nghe Thử</a></td>                                    
							</tr> 
							<?php
									}
								}
							?>
							Thể loại nhạc: <select name="theloai">
										<?php
											$luachon=mysqli_query($con,"select * from theloai");
											while($row=mysqli_fetch_array($luachon))
											{
										?>
											<option> <?php echo $row['noidung']?></option>
										<?php
											}
										?>
									</select>
						</tbody>
					</table>
                          
					<table width="348" border="0">
						<tr>
                            <td width="127"><input class="btn btn-large" type="submit" value="Xóa Nha" onClick="return confirm('Xóa thiệt đó nha ?');" name="no" ></td>
							<td width="127px"><input class="btn btn-large" type="submit" value="Sửa Lại" onClick="return confirm('Đồng ý sửa lại không ?');" name="sua"></td>
							<td width="8">&nbsp;</td>
							<td width="127"><input class="btn btn-large" type="reset" value="Nhập lại" onClick="return confirm('Làm lại á');"></td>
						</tr>
					</table>
					<p>&nbsp; </p>
				</form>
				<div class="clear"></div>
			</div>
		</div>                                
	</div>   
	<div class="dr"><span></span></div>            
</div>
<?php 
	}
?>