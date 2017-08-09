<?
/*************************************
 *   Code to download JPGs, PDFs, etc
 *   www.sometricks.com                        
 *************************************/
$file = $_GET['file'];
$file2 = "/var/www/cartoonize.net/web/tmp/".$_GET['file'];
system("/usr/bin/composite  -gravity SouthEast watermark3.png $file $file");

if(@is_array(getimagesize($file))){
    $image = true;
} else {
    $image = false;
}
//print_r(getimagesize($file2));
//exit();
if ($image==true) {
header ("Content-type: octet/stream");
header ("Content-disposition: attachment; filename=".$file.";");
header("Content-Length: ".filesize($file));
readfile($file);
}
else echo "Wrong image type";
exit;
?>
