<?php
error_reporting(E_ERROR)
?>
<div class="breadLine">
	<ul class="breadcrumb">
		<li><a href="#">Admin CP</a> <span class="divider">></span></li>                
		<li class="active">Nhạc Mới</li>
	</ul>                                                
</div>
<?php
	if(isset($_SESSION['idadmin']))
	{			
		if($_POST['ok'])
		{
			$checkbox=$_POST['checkbox'];
			$casy=$_POST['casy'];
			if($checkbox=='')
			{
				echo '<script type="text/javascript"> alert("Chua chon check box nao het kia!"); </script>';
			}
			else
			{
				$t_id=implode(", ", $checkbox);
				$sql1=mysqli_query($con,"select * from baihatmoi where id IN($t_id)");
				if(mysqli_num_rows($sql1)!=0)
				{
					while($row=mysqli_fetch_array($sql1))
					{
						$a=$row['tenbaihat'];
						$b=$row['casy'];
						$c=$row['theloai'];
						$d=$row['duongdan'];
						mysqli_query($con,"insert into baihat(tenbaihat,casy,theloai,duongdan) values('$a','$b','$c','$d')");
						echo 'Đã thêm bài hát thành công';
						mysqli_query($con,"DELETE FROM baihatmoi WHERE id IN($t_id)");
					}
				}
			}
		}
		elseif($_POST['no'])
		{
			$checkbox=$_POST['checkbox'];
			if($checkbox=='')
			{
				echo '<script type="text/javascript"> alert("Chua chon check box nao het kia!"); </script>';
			}
			else
			{
				$del_id=implode(", ", $checkbox);
				$sql = mysqli_query($con,"DELETE FROM baihatmoi WHERE id IN($del_id)");
			}
		}
	?>
        <div class="workplace">                         
            
            <div class="row-fluid">
                
                <div class="span12">                    
                    <div class="head">
                        <div class="isw-up_circle"></div>
                        <h1>Bài Hát Mới Được Đăng</h1>                         
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
								$sql=mysqli_query($con,"select * from baihatmoi");
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
                                    <td><a title="Nghe bài hát <?php echo $row['tenbaihat']; ?>" href="./?mod=playadmin&baihat=<?php echo $row['id'];?>">Nghe Thử</a></td>                                    
                                </tr> 
							<?php
									}
								}
							?>
                            </tbody>
                        </table>
                          
                        <table width="348" border="0">
                          <tr>
                            <td width="127"><input class="btn btn-large" type="submit" value="Nghe Thôi" name="ok"></td>
                            <td width="12">&nbsp;</td>
                            <td width="187"><input class="btn btn-large" type="submit" value="Xóa Nha" onClick="return confirm('Xóa thiệt đó nha ?');" name="no" ></td>
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