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

// including stuff
include "config.inc.php";
include "lib/lang/".$lang.".php";
include "lib/functions.inc.php";

// session stuff
session_start();
session_name("webiforjcmp");

// checks the session
if(isset($_SESSION["active"])) { $sactive = true; }

// Checks the page
if(isset($_GET["p"])) { $p = $_GET["p"]; }

// database
$db = new SQLite3('lib/database.db');

// includes the actual page
if($p == "index" ) {
    include "lib/content/index.php";
} elseif($p == "login" ) {
    include "lib/content/login.php";
}



?>