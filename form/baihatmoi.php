<h1 id="tab_click_new_song">
    <div style="width: 10px; background-color: #660000; position: absolute; height: 31px; left: 0; border-right: 1px solid #FAFAFA;">
    </div>
Bài hát mới
</h1>
<div id="load_new_song" style="padding: 10px;  padding-top: 0px;">
<!--song-->
<?php 

		    include("../config.php");
			$tv="select * from baihat order by id desc";
	        $menu= mysqli_query($con,$tv);
			if(mysqli_num_rows($menu)>0)
			{
				while($row=mysqli_fetch_array($menu))
			{
		?>
	<div class="list_song" style="padding: 0px;">
		<div class="left">
			<div class="left images">
            	<img src="image/giaodien/no-img00.jpg" class="img" height="46px" width="46px">
            </div>
			<p class="song">
				<a title="Nghe bài hát <?php echo $row['tenbaihat']; ?>" target="_blank" href="./?mod=play&baihat=<?php echo $row['id'];?>"><?php echo $row['tenbaihat']; ?></a> 
			</p>
			<p class="singer">Trình bày: 
				<a title="Tìm kiếm bài hát của ca sĩ <?php echo $row['casy']; ?>" href="./?mod=bhcasy&ten=<?php echo $row['casy']; ?>"><?php echo $row['casy']; ?></a>
			</p>
			<p class="time">Thể loại: 
				<span class="singer_">
					<a title="Tìm kiếm bài hát thể loại <?php echo $row['theloai']; ?>" href="./?mod=theloai=<?php echo $row['theloai']; ?>"><?php echo $row['theloai']; ?></a>
				</span>
			</p>
		</div>
		<div class="right list_icon">
			<div class="right-icon">
                <a href="download.php" target="_blank" title="Tải bài hát <?php echo $row['tenbaihat']; ?> về máy tính">
                    <img border="0" src="image/giaodien/down0000.gif" class="hover_img">
                </a>
            </div>
			<!-- Playlist ADD -->
			<div class="right-icon" id="playlist_22505">
                <a style="cursor:pointer;" onClick="_load_box(22505);" title="Thêm bài hát <?php echo $row['tenbaihat']; ?> vào nhạc yêu thích">
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
	<!-- end --->
	<!--song-->
</div>
</div>
