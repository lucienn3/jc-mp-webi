<?php

    if(!isset($main) AND $main != TRUE) DIE;
	class server {
		
		// set global variables
		public $count;
		public $server;
		
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
				if(is_dir($file) == true) {
					
					$obj = DIR."/server/".$file."/config.lua";
					// If the Path is the XML
					if (file_exists($obj)) {
						
						$result = getConfig($obj);
						
						// Saving it in a array
						$server = array(
						$ 			=> 'bla'
						);
						
						// Saving one array in the public array
						array_push($this->server, $server);
					}
				}
			}
		}
		
		// Close the dir
		closeDir($class_dir);
		
		// counted the number of server
		$this->count = count($this->server);
		$this->count--; 
		}
		
		
		function getVar($data) {
			
			$file_handle = fopen($obj, "r");
						while (!feof($file_handle)) {
							
							$line = fgets($file_handle);
							echo $line;
							echo "<br>";
						}
						fclose($file_handle);
			$Server = false;
			$SyncRates = false;
			$Streamer = false;
			$Vehicle = false;
			$Player = false;
			$Module = false;
			$World = false;
			
			if (preg_match("/Server =/", $line)) {
				$Server = true; $SyncRates = false; $Streamer = false; $Vehicle = false; $Player = false; $Module = false; $World = false;
			} elseif (preg_match("/SyncRates =/", $line)) {
				$Server = false; $SyncRates = true; $Streamer = false; $Vehicle = false; $Player = false; $Module = false; $World = false;
			} elseif (preg_match("/Streamer =/", $line)) {
				$Server = false; $SyncRates = false; $Streamer = true; $Vehicle = false; $Player = false; $Module = false; $World = false;
			} elseif (preg_match("/Vehicle =/", $line)) {
				$Server = false; $SyncRates = false; $Streamer = false; $Vehicle = true; $Player = false; $Module = false; $World = false;
			} elseif (preg_match("/Player =/", $line)) {
				$Server = false; $SyncRates = false; $Streamer = false; $Vehicle = false; $Player = true; $Module = false; $World = false;
			} elseif (preg_match("/Module =/", $line)) {
				$Server = false; $SyncRates = false; $Streamer = false; $Vehicle = false; $Player = false; $Module = true; $World = false;
			} elseif (preg_match("/World =/", $line)) {
				$Server = false; $SyncRates = false; $Streamer = false; $Vehicle = false; $Player = false; $Module = false; $World = true;
			}
			
			
		
		
		}
		
		function setup($config) {
			
			// Setup the folder and database entry
			
			
		}
		
		
	}
?> 
