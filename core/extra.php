<?php
/**
 * 
 */
class Extra
{
	
	function __construct()
	{
		# code...
	}
	/*
     * Returns the subject filtred
     * @param string subject it can be a name sentence
     * it does :
     * first trim the strim
     * replace some noisible char by space ...
     * make the string value to lower case
     */
	public function ezpk($subject)
	{
	  $subject=trim($subject);//Remove blank space
	  $search=[' ','  ','   ','-',' -','~'];
	  $subject=str_replace($search, "_", $subject);//Replace inside listed chars  by '_'
	  $subject=strtolower($subject);//to lower  char
	  return $subject;
	}
	/*
     * Returns the current path after creating the parent folder path
     * @param string parent folder
     * it does :
     * create the specific foler or path at the place 
     */
	public function createParentFolder($parentFolder)
	{
		//code to create the Directory
        $current_path="../img/product/".$this->ezpk($parentFolder);
        if(!file_exists($current_path)){
             mkdir($current_path,0777,true);
        }
        return $current_path;
	}
	/*
     * Returns the current path after creating the parent folder path
     * @param string parent Folder  or Path
     * @param string folder name
     *
     * create the specific foler within another folder
     */
	public function createFolder($parentFolder,$foldername)
	{
		//code to create the Directory
        $current_path="../img/product/".$this->ezpk($parentFolder).'/'.$this->ezpk($foldername);
        if(!file_exists($current_path)){
             mkdir($current_path,0777,true);
        } 
	}
	/*
     * 
     * @param string current pathit can be a name sentence
     * @param string parent folder
     *
     * rename the specific folder
     */
	public function renameParentFolder($currentPath,$parentFolder)
	{
		//code to Rename the Directory
        $old_path="../img/product/".$this->ezpk($currentPath);//Old Path
        $current_path="../img/product/".$this->ezpk($parentFolder);
        if(!file_exists($current_path)){
            rename($old_path, $current_path);//Rename the Directory
        }
	}
    /*
     * 
     * @param string subject it can be a name sentence
     *
     * delete the  specific folder
     */
	public function deleteParentFolder($parentFolder)
	{
		//code to Delete the Directory
        $current_path="../img/product/".$this->ezpk($parentFolder);
        rmdir($current_path);//delete the Directory
	}
	/*
     * Returns true or false depending on if the picture or file has 
     * @param string the path where the picture will be uploaded
     * @param string the name of the file
     *
     * Upload the picture or file in the path
     */
	public function uploadPicture($path,$fileName)
	{
		$name=$fileName['name'];
	    $ext=strrchr($name, '.');
        $tmp_name = $fileName['tmp_name'];
        $dir_picture = $path.$name;
        $valables = array('.jpg','.JPG','.PNG','.png');
		if(in_array($ext, $valables)):
                if(move_uploaded_file($tmp_name, $dir_picture)):
                  	return $name;
                else:
                 	return false;
                endif;
        else:
        	return false;
    	endif;
	}
	/*
     * Code to download the  file
     * @param string path of file (eg. attachment/doceument.pdf) to download document.pdf
     *
     * Downlad the file
     */
	public function downloadFile($pathFile)
	{
			header("Content-Type: application/octet-stream");
			header("Content-Disposition: attachment; filename=".$pathFile."");
			header("Content-Length: ".filesize($pathFile));
			readfile($pathFile);
	}
		
}


?>