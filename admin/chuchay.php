<?php
	session_start();
	include("config.php");
?>       

        <div class="breadLine">            
            <ul class="breadcrumb">
                <li><a href="#">Admin CP</a> <span class="divider">></span></li>                
                <li class="active">Chữ Chạy</li>
            </ul>          
        </div>
  <?php
	if(isset($_SESSION['idadmin']))
	{
	
		if($_POST['ok'])	
		{	
			$id=$_POST['id'];
			$chuchay=$_POST['chuchay'];
			$update=mysqli_query($con, "UPDATE chuchay SET noidung='$chuchay' where id='$id'");
			if($update)
			{
				echo "Cập nhật thành công";
			}
			else
				echo "Thay đổi thất bại";
		}
		$chuchay=mysqli_query($con,"select * from chuchay where id='1'");
		if(mysqli_num_rows($chuchay))
		{
			$row=mysqli_fetch_array($chuchay);

		
?>      
        <div class="workplace">
            
            <div class="row-fluid">
                <form method="post" action="">
                <div class="span12">
                    <div class="head">
                        <div class="isw-documents"></div>
                        <h1>Chữ Chạy</h1>
                        <div class="clear"></div>
                    </div>
                    <div class="block-fluid">                        
                        <div class="row-form">
                            <div class="span3">Chữ Chạy:</div>
                            <div class="span9"><textarea name="chuchay" placeholder="Cập nhật chữ chạy tại đây..."><?php echo $row['noidung'];?></textarea></div>
                            <div class="clear"></div>
                        </div>                                                
                        <table width="348" border="0" align="center">
						<tr>
                            <td width="127"><input class="btn btn-large" type="submit" value="Cập Nhật" onClick="return confirm('Cập nhật lại chữ chạy không ?');" name="ok" ></td>
						
							<td width="127"><input type="hidden" name="id" value="<?php echo $row['id'];?>" /></td>			
							<td width="127"><input class="btn btn-large" type="reset" value="Nhập lại" onClick="return confirm('Làm lại á');"></td>
						</tr>
					</table>
                    </div>
					
                </div>
				</form>
				
            </div>
            <div class="dr"><span></span></div>
		</div>  
	
<?php } } ?>