<?php

/*////////////////////////////////
// Webinterface for             //
// Just Cause 2 Multiplayer     //
// Produced by TuaTim.de        //
// Copyright 2013 - 2014        //
// Version: 0.1                 //
////////////////////////////////*/

// set important variables
$main   = true;
$p      = "index";

// Config Data
require "lib/config.inc.php";
    
// Include the language
require "lib/lang/".$lang.".php";

if(isset($_GET["p"])) { $p = $_GET["p"]; }

if($p == "index" ) {
    include "lib/content/index.php";
} elseif($p == "login" ) {
    include "lib/content/login.php";
}

?>