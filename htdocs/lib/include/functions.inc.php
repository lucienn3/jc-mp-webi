<?php

function send($var) {
    if($var == "index") {
        echo "<meta http-equiv=\"Refresh\" content=\"0; url=index.php?p=index\">";
    } elseif($var == "login") {
        echo "<meta http-equiv=\"Refresh\" content=\"0; url=index.php?p=login\">";
    }
}

function sendto($var, $in) {
        echo "<meta http-equiv=\"Refresh\" content=\"".$in."; url=".$var."\">";
}

function getTempl($var) {
    if($var == "header") {
        return "lib/template/header.php";
    } elseif($var == "fooder") {
        return "lib/template/fooder.php";
    } 

}

function dumparray( $array) {
    echo "<pre>";
    var_export($array);
    echo "</pre>";    
}

class filesystem {
    public $arraylist;
    public $error;
	
	function check() {
    
		// Check temp
		if(!is_dir(DIR."/lib/temp")) {
			mkdir (DIR."/lib/temp");
		}
	}

    function checkchmod($path) {
        $this->arraylist = "";
        $this->arraylist = array(); 
        $this->readDirs($path);
        foreach($this->arraylist as $file) {
             if(!is_readable($file)) {
                 $this->error .= "<div class=\"alert alert-warning\">".FILESYSTEM_ERROR_NOREAD.$file."</div>";
             }
         }
             
      }
    
    function readDirs($path){
        $array = array ();
        $dirHandle = opendir($path);
        while($item = readdir($dirHandle)) {
            $newPath = $path."/".$item;
            if(is_dir($newPath) && $item != '.' && $item != '..') {
                $this->readDirs($newPath);
            } else {
                if($item != "." && $item != ".." && $item !=".DS_Store") {
                    array_push($this->arraylist,$path."/".$item);
                }
            }
        }
    }
    
    
}
?>
