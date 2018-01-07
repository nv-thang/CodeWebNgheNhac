<?php
	session_start();
	include("config.php");
?>
<div class="breadLine">
	<ul class="breadcrumb">
		<li><a href="index.php">Admin CP</a> <span class="divider">></span></li>                
		<a href="#"><li class="active">Logo</li></a>
	</ul>                                                
</div>
<?php

	if(isset($_SESSION['idadmin']))
	{	$sql1=mysqli_query($con,"select * from logo");
		$row=mysqli_fetch_array($sql1);	
		if($_POST['ok'])
		{			
			$file_name=$_FILES['upload']['name'];
			$extent_file="png";
			$pattern='#.+\.(png)$#i';
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
				$dest='images/logo/'.$_FILES['upload']['name'];
				if(copy($source,$dest)==true)
				{
					$flag=true;
					$update=mysqli_query($con,"insert into logo(noidung) values('$dest')");
					if($update)
					{
						echo "Ok. Da Xong!";
					}
					else
					{
						echo "Đăng Logo thất bại!";
					}
				}
				else
				{
					$flag=false;
					echo "Đăng Logo thất bại!";
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
			<div class="isw-target"></div>
				<h1>Upload Logo</h1>
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

				<div class="clear"></div>

			<div class="row-form">
				<table width="348" border="0">
					<tr>
						<td width="127px"><input class="btn btn-large" type="submit" value="Up" name="ok"></td>
					</tr>
				</table>
				<div class="clear"></div>
			</div>
		</div>
    </div>   
	</form>
	<div class="dr"><span></span></div>
	<div class="dr"><span></span></div>            
</div>
<?php 
	}
?>