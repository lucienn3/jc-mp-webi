<?php
// INDEX PAGE
// Serverlist

if ($sactive == false) { send("login"); } 
include getTempl("header");

if($user[$_SESSION["user"]]["permission"] == "-1") {
    ?>
    WHOLE LIST ADMIN UNDSO
    <?php
} else {
    
}


include getTempl("fooder");
?>