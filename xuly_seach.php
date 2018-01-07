<h1 id="tab_click_new_song">
   
   Tìm kiếm   
</h1>
	<div id="load_new_song" style="padding: 10px;  padding-top: 0px;">
<?php 
	$key=$_POST['key'];
	if(isset($_POST['nuttim']))
	{	
		require"config.php";
		$tv="select * from baihat where tenbaihat like '%".$key."%' or theloai like '%".$key."%' or casy like '%".$key."%'";
	    $tk= mysqli_query($con,$tv);
		while($bai=mysqli_fetch_array($tk))
		{
?>
	<div class="list_song" style="padding: 0px;">
		<div class="left">
			<div class="left images">
            	<img src="image/giaodien/no-img00.jpg" class="img" height="46px" width="46px">
            </div>
			<p class="song">
				<a title="Nghe bài hát <?php echo $bai['tenbaihat']; ?>" href="./?mod=play&baihat=<?php echo $bai['id'];?>"><?php echo $bai['tenbaihat']; ?></a> 
			</p>
			<p class="singer">Trình bày: 
				<a title="Tìm kiếm bài hát của ca sĩ <?php echo $bai['casy']; ?>" href=""><?php echo $bai['casy']; ?></a>
			</p>
			<p class="time">Thể loại: 
				<span class="singer_">
					<a title="Tìm kiếm bài hát thể loại <?php echo $bai['theloai']; ?>" href=""><?php echo $bai['theloai']; ?></a>
				</span>
			</p>
		</div>
		<div class="right list_icon">
			<div class="right-icon">
                <a href="<?php echo $bai['tenbaihat']; ?>" target="_blank" title="Tải bài hát <?php echo $bai['tenbaihat']; ?> về máy">
                    <img border="0" src="image/giaodien/down0000.gif" class="hover_img">
                </a>
            </div>
			<!-- Playlist ADD -->
			<div class="right-icon" id="playlist_22505">
                <a style="cursor:pointer;" onClick="_load_box(22505);" title="Thêm bài hát <?php echo $bai['tenbaihat']; ?> vào nhạc yêu thích">
                    <img src="image/giaodien/add00000.gif" class="hover_img">
                </a>
            </div>
			<div class="_PL_BOX" id="_load_box_22505" style="display:none;">
            	<span class="_PL_LOAD" id="_load_box_pl_22505"></span>
            </div>
			
			<!-- End playlist ADD -->
			<div class="clr">
            </div>
		</div>
		
		<div class="clr">
        </div>
		
	</div>
<?php
		
		}
	}
?>
