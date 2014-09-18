<?php

include "settings.php";

file_put_contents("debug.txt",print_r($_REQUEST,true));
file_put_contents("debug2.txt",print_r($_POST,true));


if($_POST['Upload']=="Submit Query")
{
	 $resolution = $_REQUEST['resolution'];
	 $quality = (int)((100-$_REQUEST['quality'])/3);
	 
	 $user = $_REQUEST['user'];
	 
	 $dir =  $userfiles_path . "/" . $user;
	 $target =$dir . "/" . rand(2,20000) .basename( $_FILES['Filedata']['name'] ) ; 
	 
	 if(!file_exists($dir))
	 mkdir($dir); 
	  
	 if(move_uploaded_file($_FILES['Filedata']['tmp_name'], $target)) 
	 { 
	// file_put_contents("debug3.txt", "The file ". basename( $_FILES['Filedata']['name']). " has been uploaded"); 
	
	exec ("$ffmpegpath -i $target -ar 22050  -qmax $quality -ab 32 -f flv -s $resolution $target.flv");
	exec ("$ffmpegpath -i $target -y -f mjpeg -ss 5 -vframes 1 -an -s 150x100 $target.jpg");
	unlink($target);
//	 file_put_contents("debug3.txt", "$ffmpegpath -i $target -y -f mjpeg -ss 5 -vframes 1 -an -s 150x100 $target.jpg"); 
	 
	
	 } 
	else 
	{ 
//	 file_put_contents("debug3.txt", "The file ". basename( $_FILES['Filedata']['name']). " has been error"); 
	} 
}

?>