<?php

include("function.php");
 
set_time_limit(0); 
 
$file_path="<?php echo "../".$row['tenbaihat'];?>";
 
output_file($file_path, '<?php echo "../".$row['tenbaihat'];?>', 'audio/mp3'); // application/csv
 
?>