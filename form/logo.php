<?php
    include("../config.php");
    $tv="select * from logo where id='1'";
	$noidung= mysqli_query($con,$tv);
	$row=mysqli_fetch_array($noidung);
	echo $row['noidung'];
?>