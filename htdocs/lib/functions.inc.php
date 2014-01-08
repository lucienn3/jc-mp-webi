<?php

function send($var) {
    if($var == "index") {
        echo "<meta http-equiv=\"Refresh\" content=\"0; url=index.php?p=index\">";
    } elseif($var == "login") {
        echo "<meta http-equiv=\"Refresh\" content=\"0; url=index.php?p=login\">";
    }
}
function sendto($var, $in) {
        echo "<meta http-equiv=\"Refresh\" content=\"".$in."; url=".$var."\">";
}

function getTempl($var) {
    if($var == "header") {
        return "lib/temp_header.php";
    } elseif($var == "fooder") {
        return "lib/temp_fooder.php";
    } 

}
?>
