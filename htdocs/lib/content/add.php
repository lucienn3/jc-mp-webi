<?php
// Server add
// complex as hell
// Server creating...
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
            
            exec(DIR."/lib/steam/steamcmd.sh +login anonymous +force_install_dir ".DIR."/server/ +app_update 261140 +quit");
            //rename(DIR."/server/server/jcmp","/server/server".$folder_name);
            
        } elseif (DIRECTORY_SEPARATOR == '\\') {
            // windows
        }
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
        }
        
        
        
    } else {
        ctoken();
     
        ?>
            <h3>Server erstellen</h3>
            
        <?php
        
    }

include getTempl("fooder");
?>