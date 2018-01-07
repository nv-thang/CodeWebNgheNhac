
<div id="menu_nav">
<ul>
    <div class="home">
        <a href="index.php">
            <img src="image/giaodien/home.png" />
        </a>
    </div>
    <li><a href="index.php">Nhạc</a>
        <ul>
            <li>
    			<div class="navbox">
        			<h2 style="text-align: center; padding: 10px 0; font-size: 12px; line-height: normal; color: #333; border-bottom: 1px solid #EBEBEB; background-color: whiteSmoke; font-weight: bold;">Thể Loại Nhạc</h2>
                    <p>
                        <a href="./?mod=search">Nhạc Việt Nam</a>
                        <a href="index.php#">Nhạc Trẻ</a>
                        <a href="index.php#">Nhạc Rap Việt</a>
                        <a href="index.php#">Nhạc Cách Mạng</a>       
                        <a href="index.php#">Nhạc Quốc Tế</a>
                        <a href="index.php#">Nhạc Hàn Quốc</a>
                        <a href="index.php#">Nhạc Âu Mỹ</a>
                        <a href="index.php#">Thể Loại Khác</a>
                        <a href="index.php#">Nhạc Phim</a>
                        <a href="index.php#">Nhạc Chế</a>
                        <a href="index.php#">Nhạc Thiếu Nhi</a>
                        <a href="index.php#">Nhạc Chuông</a>
                    </p>
    			</div>
    			
            </li>
        </ul>
    </li>	
	<li><a href="form/BXHnhac.php">Bảng Xếp Hạng</a></li>
    <li><a href="index.php#">Báo Lỗi</a></li>
	<?php
	if(isset($_SESSION['u_id']))
	{
	?>
    <li><a href="./?mod=upload">Upload</a></li>
	<?php
	}
	?>
	<div class="clr">
    </div>
</div> 