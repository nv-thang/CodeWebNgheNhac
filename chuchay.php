<center>
	<marquee onMouseOver="this.stop();" onMouseOut="this.start();" behavior="scroll" direction="left" scrollamount="5" width="900px">
		<font color="red">
		<b>
			<?php
			    require"config.php";
			    $tv="select * from chuchay where id='1'";
	            $noidung= mysqli_query($con,$tv);
                $row=mysqli_fetch_array($noidung);
                echo $row['noidung'];
                    
            ?>
		</b>
        </font>
	</marquee>
</center>