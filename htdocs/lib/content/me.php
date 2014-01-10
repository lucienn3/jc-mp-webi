<?php
// INDEX PAGE
// Serverlist

if(isset($_GET["id"]) && $_GET["id"]) {
    
    if(SESSION_PERMISSION != "-1") {
        send("index");
        DIE;
    }
    
    $user = parse_ini_file(DIR."/lib/users.ini", TRUE);
    if(isset($_POST["submit"])) {
        if(isset($_GET["id"]) && array_key_exists($_GET["id"], $user)) {
            if($_POST["newpass"] == $_POST["newpassre"] AND !empty($_POST["newpass"])) {
                $user[$_GET["id"]]["password"] = md5($_POST["newpass"]);
                ini_write(DIR."/lib/users.ini", $user);
            }
            sendto("index.php?p=userlist",0);
        }
    }
    
        
    include getTempl("header");
    ?>
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <form class="form-horizontal" role="form" method="POST">
        <div class="form-group">
            <label class="col-sm-4 control-label"><?php echo PASSCH_USERMANE; ?></label>
            <div class="col-sm-8">
                <p class="form-control-static"><?php echo $_GET["id"]; ?></p>
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword" class="col-sm-4 control-label"><?php echo PASSCH_NEWPW; ?></label>
            <div class="col-sm-8">
                <input type="password" class="form-control" name="newpass" placeholder="Password">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword" class="col-sm-4 control-label"><?php echo PASSCH_NEWPWA; ?></label>
            <div class="col-sm-8">
                <input type="password" class="form-control" name="newpassre" placeholder="Password">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword" class="col-sm-4 control-label">&nbsp;</label>
            <div class="col-sm-8">
                <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit"><?php echo PASSCH_BUTTON; ?></button>
            </div>
        </div>   
    </form>
    </div>
</div>
    <?php

    include getTempl("fooder");
} else {
    
    $user = parse_ini_file(DIR."/lib/users.ini", TRUE);
    if(isset($_POST["submit"])) {
        if($user[SESSION_USER]["password"] == md5($_POST["oldpassword"]) AND $_POST["newpass"] == $_POST["newpassre"] AND $_POST["newpass"] != "") {
            print($_POST["newpass"]);
            echo "<br>";
            print($_POST["newpassre"]);
            $user[SESSION_USER]["password"] = md5($_POST["newpass"]);
            ini_write(DIR."/lib/users.ini", $user);
        }
        sendto("index.php?p=index",0);
    }   
    
    include getTempl("header");

     ?>
    <div class="row">
  <div class="col-md-6 col-md-offset-3">
    <form class="form-horizontal" role="form" method="POST">
        <div class="form-group">
            <label class="col-sm-4 control-label"><?php echo PASSCH_USERMANE; ?></label>
            <div class="col-sm-8">
                <p class="form-control-static"><?php echo SESSION_USER; ?></p>
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword" class="col-sm-4 control-label"><?php echo PASSCH_OLDPW; ?></label>
            <div class="col-sm-8">
                <input type="password" class="form-control" name="oldpassword" placeholder="Password">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword" class="col-sm-4 control-label"><?php echo PASSCH_NEWPW; ?></label>
            <div class="col-sm-8">
                <input type="password" class="form-control" name="newpass" placeholder="Password">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword" class="col-sm-4 control-label"><?php echo PASSCH_NEWPWA; ?></label>
            <div class="col-sm-8">
                <input type="password" class="form-control" name="newpassre" placeholder="Password">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword" class="col-sm-4 control-label">&nbsp;</label>
            <div class="col-sm-8">
                <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit"><?php echo PASSCH_BUTTON; ?></button>
            </div>
        </div>   
    </form>
    </div>
</div>
    <?php


    include getTempl("fooder");
}
?>