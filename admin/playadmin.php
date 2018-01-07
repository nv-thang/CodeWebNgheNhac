<style>
audio
{
	width: 300px;
	height: 30px;
}
</style>
<?php
	include "config.php";
	$id=$_GET['baihat'];
	$sql=mysqli_query($con,"select*from baihatmoi where id='$id'");
	$row=mysqli_fetch_array($sql);
?>
<h3 style="color:blue;font-size:16pt;"><?php echo $row['tenbaihat'];?> </h3>
 <span style="font-size:11pt;color:#999;">Trình bày: <?php echo $row['casy'];?></span>
 <br>
 <audio controls="controls" autoplay="1">
  <source src="<?php echo "../".$row['duongdan'];?>" type="audio/mpeg">
  <source src="<?php echo "../".$row['duongdan'];?>" type="audio/ogg">
	<embed height="50" width="100" src="<?php echo "../".$row['duongdan'];?>">
	</audio>
<br><br>
<a href="./?mod=nhacmoi">
	<b>Quay Lại</b>
</a>