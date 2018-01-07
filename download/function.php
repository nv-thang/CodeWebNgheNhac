<?php

function output_file($Source_File, $Download_Name, $mime_type='')
 
{
 
/*
 
$Source_File = path to a file to output
 
$Download_Name = filename that the browser will see
 
$mime_type = MIME type of the file (Optional)
 
*/
 
if(!is_readable($Source_File)) die('File not found or inaccessible!');
 
   
 
$size = filesize($Source_File);
 
$Download_Name = rawurldecode($Download_Name);
 
   
 
/* Figure out the MIME type (if not specified) */
 
$known_mime_types=array(
 /*
    "txt" => "text/plain",
 
    "html" => "text/html",
 
    "htm" => "text/html",
 
    "exe" => "application/octet-stream",
 
    "zip" => "application/zip",
 
    "php" => "text/pla",
*/
	"mp3" => "audio/mp3"

);   

if($mime_type==''){
 
     $file_extension = strtolower(substr(strrchr($Source_File,"."),1));
 
     if(array_key_exists($file_extension, $known_mime_types)){
 
        $mime_type=$known_mime_types[$file_extension];
 
     } else {
 
        $mime_type="audio/force-download";
 
     };
 
};
 
   
 
@ob_end_clean(); //off output buffering to decrease Server usage
 
   
 
// if IE, otherwise Content-Disposition ignored
 
if(ini_get('zlib.output_compression'))
 
  ini_set('zlib.output_compression', 'Off');
 
   
 
header('Content-Type: ' . $mime_type);
 
header('Content-Disposition: attachment; filename="'.$Download_Name.'"');
 
header("Content-Transfer-Encoding: binary");
 
header('Accept-Ranges: bytes');
 
   
 
header("Cache-control: private");
 
header('Pragma: private');
 
header("Expires: Thu, 26 Jul 2012 05:00:00 GMT");
 
   
 
// multipart-download and download resuming support
 
if(isset($_SERVER['HTTP_RANGE']))
 
{
 
    list($a, $range) = explode("=",$_SERVER['HTTP_RANGE'],2);
 
    list($range) = explode(",",$range,2);
 
    list($range, $range_end) = explode("-", $range);
 
    $range=intval($range);
 
    if(!$range_end) {
 
        $range_end=$size-1;
 
    } else {
 
        $range_end=intval($range_end);
 
    }
 
   
 
    $new_length = $range_end-$range+1;
 
    header("HTTP/1.1 206 Partial Content");
 
    header("Content-Length: $new_length");
 
    header("Content-Range: bytes $range-$range_end/$size");
 
} else {
 
    $new_length=$size;
 
    header("Content-Length: ".$size);
 
}
 
   
 
/* output the file itself */
 
$chunksize = 1*(1024*1024); //you may want to change this
 
$bytes_send = 0;
 
if ($Source_File = fopen($Source_File, 'r'))
 
{
 
    if(isset($_SERVER['HTTP_RANGE']))
 
    fseek($Source_File, $range);
 
   
 
    while(!feof($Source_File) &&
 
        (!connection_aborted()) &&
 
        ($bytes_send<$new_length)
 
          )
 
    {
 
        $buffer = fread($Source_File, $chunksize);
 
        print($buffer); //echo($buffer); // is also possible
 
        flush();
 
        $bytes_send += strlen($buffer);
 
    }
 
fclose($Source_File);
 
} else die('Error - can not open file.');
 
   
 
die();
 
}
 
?>