<?php

/*////////////////////////////////
// Webinterface for             //
// Just Cause 2 Multiplayer     //
// Produced by TuaTim.de        //
// Copyright 2013 - 2014        //
// Version: 0.1                 //
////////////////////////////////*/

$debug = true;

// DEBUG
if ( $debug == true ) {
error_reporting(E_ALL);
ini_set('display_errors', '1');
}
    
// set important variables
$main   = true;
$p      = "index";

// Config Data
include "config.inc.php";
    
// Include the language
include "lib/lang/".$lang.".php";

session_name("webiforjcmp");
session_start();

if(isset($_GET["p"])) { $p = $_GET["p"]; }

if($p == "index" ) {
    include "lib/content/index.php";
} elseif($p == "login" ) {
    include "lib/content/login.php";
}

?>