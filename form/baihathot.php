<div class="box3 w_3">
	<h1>Bài Hát HOT <img src="image/giaodien/hit00000.gif" alt=""></h1>
	<div class="album" style="padding: 10px 10px 0 10px;">
	<?php 
	   $tv="select*from baihathot order by id desc limit 10";
	   include("../config.php");
	   $sql= mysqli_query($con,$tv);
			if(mysqli_num_rows($sql)>0)
			{
				$i=0;
				while($row=mysqli_fetch_array($sql))
			{
			$i+=1;
	?>
		<div class="top_mp3" style="margin-right: 0 !important;"> 
		<?php if($i>3) echo "<div class='x_1 margin-right: 0 !important;' style='background: #999;'>"; else echo "<div class='x_1 margin-right: 0 !important;'>"; ?>
			<?php echo $i;?></div> 
			<div class="x_2"> 
				<p class="song">
                	<a class="song_a" title="Nghe bài hát <?php echo $row['tenbaihat'];?>" href="./?mod=playhot&baihat=<?php echo $row['id'];?>"><strong><?php echo $row['tenbaihat'];?></strong></a>
                </p> 
				<p class="singer"> 
					<a title="Tìm kiếm bài hát của ca sĩ <?php echo $row['casy'];?>" href="#"><?php echo $row['casy'];?></a>
               	</p> 
			</div> 
			<div class="clr"></div> 
		</div> 
		<?php
			}
			}
		?> 
	</div>