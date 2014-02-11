<?php


include getTempl("header");
    
    if(isset($_POST["submit"]) && $_POST["step"] == "0") {
        if(!checktoken()) {
            sendto("index.php?p=userlist",0);
            die;
        } else {
            ctoken();
        }
        
        
        
    } elseif( isset($_POST["submit"]) && $_POST["step"] == "1") {
        if(!checktoken()) {
            sendto("index.php?p=userlist",0);
            die;
        } else {
            ctoken();
        }
    if (DIRECTORY_SEPARATOR == '/') {
        $folder = false;
        $folder_name = 1;
        while ($folder == false) {
            if(is_dir(DIR."/server/server".$folder_name)) {
                $folder_name++;
            } else {
                $folder = true;
            }
        }
        executecmd(DIR."/lib/steam/steamcmd.sh +login anonymous +force_install_dir ".DIR."/server/server".$folder_name."/ +app_update 261140 +quit");
            
           
        } elseif (DIRECTORY_SEPARATOR == '\\') {
            // windows
        }
        
        
        
    } elseif( isset($_POST["submit"]) && $_POST["step"] == "2" && isset($_POST["serverid"]) &&is_numeric($_POST["serverid"])) {
        rename(DIR."/server/server".$_POST["serverid"]."/default_config.lua",DIR."/server/server".$_POST["serverid"]."/config.lua"); 
    }
else {
        ctoken();
     
        ?>
            <h3>Server erstellen</h3>
            
        <?php
        
    }

include getTempl("fooder");
?>