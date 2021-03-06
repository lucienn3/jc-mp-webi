<?php
$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$start = $time;

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
require "config.inc.php";
include DIR."/lib/include/functions.inc.php";
include DIR."/lib/include/server.class.inc.php";

$user = parse_ini_file(DIR."/lib/users.ini", TRUE);
// checks and activates the session
if(isset($_SESSION["active"]) AND $_SESSION["active"] == true) {
    if(array_key_exists($_SESSION["user"], $user) === false) {
        session_unset();
        die; 
    }
    if($user[$_SESSION["user"]]["active"] == 0 && $p != "logout") {
        sendto("index.php?p=logout",0);
        die;
    }
	define("SESSION_ACTIVE", "true");
	define("SESSION_USER", $_SESSION["user"]);
	define("SESSION_PERMISSION", $user[$_SESSION["user"]]["permission"]);
    define("SESSION_LANG", $user[$_SESSION["user"]]["lang"]);
} else {
	define("SESSION_ACTIVE", "false");
    define("SESSION_LANG", LANG);
}
if(SESSION_LANG != LANG && SESSION_LANG != "" && is_file(DIR."/lib/lang/".SESSION_LANG.".php")) {
    include DIR."/lib/lang/".SESSION_LANG.".php";
} else if (is_file(DIR."/lib/lang/".LANG.".php")) {
    include DIR."/lib/lang/".LANG.".php";
} else {
    include DIR."/lib/lang/en.php";  
}

// database
$filesystem = new filesystem;
$filesystem->check();
$filesystem->checkchmod(DIR);
echo $filesystem->error;
$server = new server;
echo $server->error;

// Check the User permission


// Checks the page
if(isset($_GET["p"])) { $p = $_GET["p"]; }

if(isset($_SESSION["user"]) && !array_key_exists($_SESSION["user"], $user)) {
    sendto("index.php?p=logout",0);
    die;
}

	if($p == "login" ) {
		if (SESSION_ACTIVE === "true") { send("index"); DIE;} 
			include DIR."/lib/content/login.php";
	} else {
		if (SESSION_ACTIVE == "false") { send("login"); DIE;} 
		unset($user);	

		// includes the actual page
		if($p == "index" ) {
			include DIR."/lib/content/index.php";
		} elseif($p == "logout" ) {
			include DIR."/lib/content/logout.php";
		} elseif($p == "me" ) {
			include DIR."/lib/content/me.php";
		} else {
            if(SESSION_PERMISSION != "-1") {
		          send("index");
		          DIE;
	           }
            if($p == "userlist" ) {
                include DIR."/lib/content/userlist.php";
            } elseif( $p == "adduser") {
                include DIR."/lib/content/adduser.php";
            } elseif( $p == "deluser") {
                include DIR."/lib/content/deluser.php";
            } elseif( $p == "add") {
                include DIR."/lib/content/add.php";
            } else {
                send("index");   
            } 
        }
    }

$user = parse_ini_file(DIR."/lib/users.ini", TRUE);
dumparray($user);
dumparray($_SESSION);
dumparray($server->server);

echo "<br>";
echo "<br>";
echo "<br>";
$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$finish = $time;
$total_time = round(($finish - $start), 4);
echo 'Page generated in '.$total_time.' seconds.';
echo "<br/>";
echo time();

?>
