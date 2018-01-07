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
	mysqli_query($con,"UPDATE baihat set luotnghe=luotnghe+1 where id='$id'");
	$tv="select*from baihathot where id='$id'";
	$sql= mysqli_query($con,$tv);
	$row=mysqli_fetch_array($sql);
?>
<h3 style="color:blue;font-size:16pt;"><?php echo $row['tenbaihat'];?> </h3>
 <span style="font-size:11pt;color:#999;">Trình bày: <?php echo $row['casy'];?>| Lượt nghe:<?php echo $row['luotnghe'];?></span>
 <br>
 <audio controls="controls">
  <source src="<?php echo "admin/".$row['duongdan'];?>" type="audio/mpeg">
  <source src="<?php echo "admin/".$row['duongdan'];?>" type="audio/ogg">
	<embed height="50" width="100" src="<?php echo "admin/".$row['duongdan'];?>">
	</audio>
<br><br>
<table width="100%">
<tr>
	<td bgcolor="#24BDE2" height="35px" style="padding-left: 10px;color:#fff"> BÀI HÁT CÙNG THỂ LOẠI</td>
</tr>
<?php
	include "config.php";
	$tv="select*from baihathot where id!='$id'";
	$cung= mysqli_query($con,$tv);
	while($rowc=mysqli_fetch_array($cung))
	{
?>
	<tr>
	<td>
	<div class="list_song" style="padding: 0px;">
		<div class="left">
		<div class="left images">
            	<img src="image/giaodien/no-img00.jpg" class="img" height="46px" width="46px">
            </div>
	<p class="song">
				<a title="Nghe bài hát <?php echo $rowc['tenbaihat']; ?>" href="./?mod=play&baihat=<?php echo $rowc['id'];?>"><?php echo $rowc['tenbaihat']; ?></a> 
			</p>
			<p class="singer">Trình bày: 
				<a title="Tìm kiếm bài hát của ca sĩ <?php echo $rowc['casy']; ?>" href=""><?php echo $rowc['casy']; ?></a>
			</p>
			<p class="time">Thể loại: 
				<span class="singer_">
					<a href="" title="<?php echo $rowc['theloai']; ?>"><?php echo $row['theloai']; ?></a>
				</span>
			</p>
			<p class="time">Lượt nghe: 
				<span class="singer_">
					<?php echo $rowc['luotnghe']; ?></a>
				</span>
			</p>
		</div>
		</div>
	</td>
	</tr>
	<hr>
<?php
}
?>
</table>