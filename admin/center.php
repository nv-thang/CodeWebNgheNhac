<?php
	$mod = $_GET['mod'];
	switch($mod)
	{
		case "nhacmoi":
			include("nhacmoi.php");
			break;
		case "nhacdadang":
			include("nhacdadang.php");
			break;
		case "theloai":
			include("theloai.php");
			break;
		case "nhachot":
			include("nhachot.php");
			break;
		case "upload":
			include("upload.php");
			break;
		case "chude":
			include("chude.php");
			break;
		case "casy":
			include("casy.php");
			break;
		case "user":
			include("user.php");
			break;
		case "chuchay":
			include("chuchay.php");
			break;
		case "footer":
			include("footer.php");
			break;
		case "logo":
			include("logo.php");
			break;
		case "playadmin":
			include("playadmin.php");
			break;
		default: include("danhmuc.php");
	}
?>