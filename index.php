<?php
error_reporting(E_ERROR)
?>
<?php
	ob_start();
	session_start();
	require"config.php";
	
	header("Cache-Control: no-cache");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<head>
<script language="JavaScript"> <!--title chạy-->
	var txt="Nghe Nhạc Online - Tải Nhạc Mp3 Trực Tuyến          ";
	var espera=160; var refresco=null; function rotulo_title()
	{
		document.title=txt; txt=txt.substring(1,txt.length)+txt.charAt(0); refresco=setTimeout("rotulo_title()",espera);
	}
	rotulo_title();
</SCRIPT>
<!--CSS-->

<link rel="shortcut icon" href="image/giaodien/favicon1.ico" type="image/x-icon" />
<link href="css/styles00.css" rel="stylesheet" type="text/css">
<link href="css/skin0000.css" rel="stylesheet" type="text/css">
<link href="css/jquery00.css" rel="stylesheet" type="text/css">
<link href="css/menudrop.css" rel="stylesheet" type="text/css">
<link href="css/form.css" rel="stylesheet" type="text/css">
<link href="css/btup.css" rel="stylesheet" type="text/css">
<!--Javascrip-->
<script type="text/javascript" src="js/ichphien.js"></script>
<script type="text/javascript" src="js/dropmenu.js"></script>
<script type="text/javascript" src="js/jquery01.js"></script>
<script type="text/javascript" src="js/ajax_loa.js"></script>
<script type="text/javascript" src="js/jquery-s.js"></script>
<script type="text/javascript" src="js/snowstorm.js"></script>
<script type="text/javascript">
snowStorm.snowColor = 'blue'; // màu của tuyết - ở đây là màu xanh xám #fff
snowStorm.flakesMaxActive = 1000000;  // số lượng tuyết rơi cùng 1 lúc
snowStorm.useTwinkleEffect = true; // cho tuyết nhấp nháy
</script>
</head>

<body>
<div class="top-wrap">
	<div id="main">
		<div id="top_menu">
    		<div class="tleft">
				<a style="width: 145px; height: 37px; display: block;" href="index.php">
                	<img width="145" height="37" src="<?php include("logo.php"); ?>"><!--form logo-->
                </a>
			</div>
			<div class="tcenter">
				<?php include("form/seach.php"); ?><!--form seach-->
			</div>
            <div class="tright"><!--form login-->
            	<?php 
						if(isset($_SESSION['user_id'])&& isset($_SESSION['pass']))
						{
							echo "<div id='drop_menu'>";
							echo "<ul id='drop_menu_ul'><li><a class='menuhoten'>Cá Nhân</a><ul id='drop_menu_sub'>";
							echo "<li><a href='./?mod=suathongtin'>Sửa thông tin</a></li>";
							echo "<li><a href='logout.php'>logout</a></li>";
							echo "</ul></li></ul>";
							echo "</div>";							
						}
						else
						{
							echo file_get_contents("login.php");
						}
				?>
        	</div>
    	</div> 
       		<?php include("form/menutop.php");?>    <!--form menu top-->   
        <div class="clr">
        </div>
    </div>
</div>
<div id="main">
    <div id="contents">
		<div class="chuchay">
        	<div class="chuchay1">
				<?php include "chuchay.php";?><!--form chữ chạy-->
			</div>
		</div>
        <?php require 'center.php';?>
	</div>
	<div id="footer">
        <div class="adv_footer">
        </div>
            <div class="footer-info">
                <?php include"form/lienket.php";?><!--form Liên kết với webslide khác-->
                
                    <?php include("banquyen.php");?><!--form bản quyền của webslide-->
                
                
            </div>
            <div class="gop-y"><a target="_blank" href="http://facebook.com/phatvalong"><img title="Mọi ý kiến của bạn sẽ được trả lời qua facebook" src="image/giaodien/gopy0000.jpg" border="0"></a><!--form qua form góp ý(cái này chưa làm)-->
            </div>
        </div>
	</div>
</div>
</body>
</html>