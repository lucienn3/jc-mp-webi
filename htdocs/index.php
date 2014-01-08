<?php

/*////////////////////////////////
// Webinterface for             //
// Just Cause 2 Multiplayer     //
// Produced by TuaTim.de        //
// Copyright 2013 - 2014        //
// Version: 1.0                 //
////////////////////////////////*/

$debug = true;

// DEBUG
if ( $debug == true ) {
error_reporting(E_ALL);
ini_set('display_errors', '1');
}
    
$main   = true; // Security variable

// session stuff
session_name("webiforjcmp");
session_start();

// including stuff
include "config.inc.php";
include DIR."/lib/lang/".LANG.".php";
include DIR."/lib/include/functions.inc.php";
include DIR."/lib/include/server.class.inc.php";

// checks the session
if(isset($_SESSION["active"])) { $sactive = true; }

// Checks the page
if(isset($_GET["p"])) { $p = $_GET["p"]; }

// database
$server = new server;

// includes the actual page
if($p == "index" ) {
    include DIR."/lib/content/index.php";
} elseif($p == "login" ) {
    include DIR."/lib/content/login.php";
}



?>
