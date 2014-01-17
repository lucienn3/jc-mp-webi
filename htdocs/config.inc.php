<?

/*
//////////////
//  Config  //
//////////////
*/

// Security
if(!isset($main)) DIE("No Access here!");
define("TOKEN_TIME","120");
    
// General
define("PAGE_NAME","Webinterface");
define("PAGE_DESC","This is a webinterface for Just Cause 2 Multiplayer.");

// Language
define("LANG", "en");  // en = english, ge = german

// Other things
$p      = "index";  // the main page

/*////////////////////
// DO NOT CHANGE!   //
////////////////////*/

// session active variable
$sactive = false;
define("DIR", __DIR__);


?>
