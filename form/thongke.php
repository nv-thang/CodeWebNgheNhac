<h3 class="content-block-title"> Thống Kê Website</h3>
<?php
    include("../config.php");
    $tv="SELECT luot FROM luot";
	$ketqua= mysqli_query($con,$tv);
	$rows = mysqli_fetch_array($ketqua);
	$page_views = $rows['luot'];
	if (empty($page_views))
	{
		$page_views = "1"; 
          $tv2="INSERT INTO luot (luot)VALUES('1')";
	      $ketqua2= mysqli_query($con,$tv2);
	}
	$page_views++;
	 $tv3="UPDATE luot SET luot = $page_views";
	 $ketqua3= mysqli_query($con,$tv);
?>
<div class="border_h2">
	<div class="thong_ke" style="height: 22px; width: auto; padding-top: 5px; border-bottom: 1px solid #f3c0ff;">
		<p class="top_song1">&nbsp;&nbsp;Số lượt truy cập Website: <strong><?php echo "$page_views "; ?></strong></p>
	</div>
<?php
$session=session_id();
$time=time();
$time_check=$time-600;
$sql="SELECT * FROM user_online WHERE session='$session'";
$result=mysqli_query($con,$sql);
$count=mysqli_num_rows($result);
if($count=="0"){
$sql1="INSERT INTO user_online(session, time)VALUES('$session', '$time')";
$result1=mysqli_query($con,$sql1);
}
else {
$sql2="UPDATE user_online SET time='$time' WHERE session = '$session'";
$result2=mysqli_query($con, $sql2);
}
$sql3="SELECT * FROM user_online";
$result3=mysqli_query($con, $sql3);
$count_user_online=mysqli_num_rows($result3);
?>

	<div class="thong_ke" style="height: 22px; width: auto; padding-top: 5px; border-bottom: 1px solid #f3c0ff;">
		<p class="top_song1">&nbsp;&nbsp;Số người đang online <strong><?php echo "$count_user_online "; ?></strong></p>
	</div>
	
<?php
// Nếu truy cập hơn 10 phút thì delete session
 include("../config.php");
$sql4="DELETE FROM user_online WHERE time<$time_check";
$result4=mysqli_query($con, $sql4);mysqli_close();
// Xuất kết quả ra nếu mở nhiều trình duyệt và loại trừ

?>
<?php
	 include("../config.php");
	$sql1=mysqli_query($con,"select count(*) As sohang from baihat");	
	$row=mysqli_fetch_array($sql1);
	{
?>          

          
          
	<div class="thong_ke" style="height: 22px; width: auto; padding-top: 5px; border-bottom: 1px solid #f3c0ff;">
		<p class="top_song1">&nbsp; Số bài nhạc : <strong><?php echo $row['sohang']; }?></strong></p>
	</div>
<?php
     include("../config.php");
	$sql1=mysqli_query($con,"select count(*) As sohang from user");	
	$row=mysqli_fetch_array($sql1);
	{
?>
	<div class="thong_ke" style="height: 40px; width: auto; padding-top: 5px;">
		<p class="top_song1">&nbsp; Số thành viên : <strong><?php echo $row['sohang']; }?></strong></p>

		<p class="top_song1" style=" padding-top: 5px;">&nbsp; + Thành viên mới : <strong>
<?php
     include("../config.php");
	$sql1=mysqli_query($con,"select * from user order by id desc limit 1");	
	while($row=mysqli_fetch_array($sql1))
	{
?>
			<a title="thành viên <?php echo $row['username']; ?>"><?php echo $row['username']; }?>
				<img src="image/giaodien/65000000.gif" style="margin-top: -7px;" height="20" border="0"></strong>
			</a>
		</p></a>
	</div>
</div>
</div>
