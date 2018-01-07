<?php
	$mod = $_GET['mod'];
	switch($mod)
	{
		case "dangki":
			include("dangki.php");
			break;
		case "suathongtin":
			include("suathongtin.php");
			break;
		case "quenpass":
			include("quenmatkhau.php");
			break;
		case "lienhe":
			include("lienhe.php");
			break;
		case "upload":
			include("upload.php");
			break;
		case "timkiem":
			include("xuly_seach.php");
			break;
		case "play":
			include("play.php");
			break;
		case "playhot":
			include("playhot.php");
			break;
		case "bhcasy":
			include("bhcasy.php");
			break;
		default: include("baihat.php");
	}
?>