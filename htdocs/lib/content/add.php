<?php
// Server add
// complex as hell

include getTempl("header");
    
    if(isset($_POST["submit"]) && $_POST["step"] == "0") {
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