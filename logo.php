<?php
    require"config.php";
    $tv="select * from logo";
	$noidung= mysqli_query($con,$tv);
	$row=mysqli_fetch_array($noidung);
	echo "admin/".$row['noidung'];
?>