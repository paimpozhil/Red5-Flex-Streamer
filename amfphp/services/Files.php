<?php

class Files
{
	
	var $deny_ext = array("jpg","meta");
	function Files()
	{
		 $this->methodTable = array( "getList" => array(
                "description" => "returns the list of files on the userfiles directory",
                "access" => "remote",
                "returns" => "Array",
            )
	);
	}
	
	function file_extension($filename)
	  {
		  return end(explode(".", $filename));
	  }

	
public function getList($user) 
{
	include "../../settings.php";
	$flist = array();
	  if ($handle = opendir($userfiles_path."/".$user)) {
		  while (false !== ($file = readdir($handle))) {
			  if ($file != "." && $file != ".." && !in_array(strtolower($this->file_extension($file)),$this->deny_ext)  ) {
				  $flist[]= array('name'=>"$file",'thumbnail'=> $script_url . "/files/" . $file. ".jpg");
			  }
		  }
		return $flist;
    	closedir($handle);

	}

}

function deleteFile($user,$file)
{
	include "../../settings.php";
	
	unlink($userfiles_path . "/$user/$file");
	unlink($userfiles_path . "/$user/$file" . ".jpg");
	
}



}
?>