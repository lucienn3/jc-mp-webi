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
              if( $file != ".." AND $file !=  "." AND $file !=  ".DS_Store") {
				
                // check if it is not a dir
				if(is_dir($file) == false) {
					
					// If the Path is the XML
					if (file_exists(DIR."/server/".$file."/config.lua")) {
						
						
						
						// Saving it in a array
						$game = array(
						"name" 			=> $xml->name,
						"code"			=> $xml->code,
						"author"		=> $xml->author,
						"date"			=> $xml->dates,
						"version"		=> $xml->version,
						"gameversion"	=> $xml->gameversion,
						"official"		=> $xml->official,
						"auth"			=> $xml->auth,
						"gamekey"		=> $xml->gamekey,
						"plugin_enable"	=> $xml->plugin_enable,
						"active"		=> $xml->active,
						"img"			=> $xml->img
						);
						
						// Saving one array in the public array
						array_push($this->games, $game);
					}
				}
			}
		}
		
		// Close the dir
		closeDir($class_dir);
		
		// counted the number of games
		$this->count = count($this->games);
		$this->count--; 
		}
		
		
		
		function setup($config) {
			
			// Setup the folder and database entry
			
			
		}
		
		
	}
?> 