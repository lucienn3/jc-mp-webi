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

// including stuff
include "config.inc.php";
include "lib/lang/".$lang.".php";
include "lib/functions.inc.php";

session_start();
session_name("webiforjcmp");

if(isset($_SESSION["active"])) { $sactive = true; }

if(isset($_GET["p"])) { $p = $_GET["p"]; }

if($p == "index" ) {
    include "lib/content/index.php";
} elseif($p == "login" ) {
    include "lib/content/login.php";
}



?>