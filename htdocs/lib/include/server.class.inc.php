<?php

    if(!isset($main) AND $main != TRUE) DIE;
	class server {
		
		// set global variables
		public $counte;
		public $server;
		
		function getcf($data) {
            
            $in_coment = false;
            
            $tmp_file = DIR."/lib/temp/cf_".rand(0,999).".ini";
			$file = fopen($tmp_file, "w+");
            
			$file_handle = fopen($data, "r");
            while (!feof($file_handle)) {
			    $line = fgets($file_handle);
                $coment_begin = stripos($line, "--[[");
                $coment_end = stripos($line, "--]]");
                $isnotcomment = stripos($line, "--");
                $isplayerspawn = stripos($line, "SpawnPosition");
                if( $coment_begin === false AND $coment_end === false ) { } else { if($in_coment == false) { $in_coment = true; } else { $in_coment = false; } }
                if($in_coment == true) {
                } else {
                    if($isnotcomment === false AND $isplayerspawn === false) {
                        $dline = str_replace(",", "", $line);
                        $dline = str_replace("{", "", $dline);
                        $dline = str_replace("}", "", $dline);
                        $dline = str_replace("Server =","[Server]", $dline);
                        $dline = str_replace("SyncRates =","[SyncRates]", $dline);
                        $dline = str_replace("Streamer =","[Streamer]", $dline);
                        $dline = str_replace("Vehicle =","[Vehicle]", $dline);
                        $dline = str_replace("Player =","[Player]", $dline);
                        $dline = str_replace("Module =","[Module]", $dline);
                        $dline = str_replace("World =","[World]", $dline);
                        fwrite($file, $dline . '');
                    } else {
                    }
                }
            }
            fclose($file);
            
            $ini_array = parse_ini_file($tmp_file, TRUE);
            unlink($tmp_file);
            return $ini_array;
		}
		
		function setup($config) {
			
			// Setup the folder and database entry
			
			
		}
        
        // Conructor of the Class
		function __construct () {
			
          // Define games as array
          $this->server = array();
		
		  // open the dictory
		  $class_dir = openDir(DIR."/server");
		      
		  // Loop for reading all the Configs
		  while ($file = readDir($class_dir)) {

              // Check if it is a data
              if( $file != ".." AND $file !=  "." AND $file !=  ".DS_Store" AND $file !=  ".htaccess") {
                // check if it is not a dir
				if(is_dir(DIR."/server/".$file) == true) {
				    
					$obj = DIR."/server/".$file."/config.lua";
					
					if (file_exists($obj)) { 
                        $bla = $this->getcf($obj);
						$this->server[$file] = $bla;
					}
				}
			}
		}
		
		// Close the dir
		closeDir($class_dir);
		
		// counted the number of server
		$this->counte = count($this->server);
        
		}
		
		
	}
?> 
