<?

/*
//////////////
//  Config  //
//////////////
*/

// Security
if(!isset($main)) DIE("No Access here!");
    
// General
define("PAGE_NAME","Webinterface");
define("PAGE_DESC","This is a webinterface for Just Cause 2 Multiplayer.");

// Language
define("LANG", "de");  // en = english, ge = german

// Other things
$p      = "index";  // the main page

/*////////////////////
// DO NOT CHANGE!   //
////////////////////*/

// session active variable
$sactive = false;
define("DIR", __DIR__);

?>
