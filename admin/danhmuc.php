<?php
	session_start();
	include("config.php");
?>
<?php

	if(isset($_SESSION['idadmin']))
	{
    $sql1=mysqli_query($con, "select count(*) As sohang from baihatmoi");	
	$row=mysqli_fetch_array($sql1);
	{
?>
		

<div class="breadLine">
            <ul class="breadcrumb">
                <li><a href="#">Simple Admin</a> <span class="divider">></span></li>                
                <li class="active">Dashboard</li>
            </ul>           
        </div>        
        <div class="workplace">
                                    
            <div class="row-fluid">
                <div class="span12">
                    
                    <div class="widgetButtons">                        
                        <div class="bb"><a href="./?mod=nhacdadang"><span class="ibw-ok"></span></a></div>
                        <div class="bb">
                            <a href="./?mod=nhacmoi"><span class="ibw-up_circle"></span></a>
                            <div class="caption red"><?php echo $row['sohang']; }?></div>
                        </div>
                        <div class="bb"><a href="./?mod=user"><span class="ibw-user"></span></a></div>
                        <div class="bb"><a href="./?mod=chuchay"><span class="ibw-sync"></span></a></div>
                        <div class="bb">
                            <a href="./?mod=footer"><span class="ibw-text_document"></span></a>
                        </div>
                        <div class="bb"><a href="logout.php"><span class="ibw-power"></span></a></div>
                    </div>
                    
                </div>
            </div>                                   
            
            <div class="dr"><span></span></div>
        
</div>
<?php } ?>