<?php
include "settings.php";

//file_put_contents("debug3.txt", print_r($_REQUEST,true));
$filename = $_REQUEST['filename'] . ".jpg";
$fdata = $_REQUEST['fdata'];
$user = $_REQUEST['user'];

 $dir =  $userfiles_path . "/" . $user;
 
 file_put_contents($dir."/".$filename,base64_decode($fdata));

?>