<?php
// Database
$user = parse_ini_file(DIR."/lib/users.ini", TRUE);

if(!checktoken()) {
    sendto("index.php?p=userlist",0);
    die;
}

if(isset($_POST["submit"])) {
    if(isset($_POST["username"]) && !array_key_exists($_POST["username"], $user)) {
        if($_POST["newpass"] != "" && $_POST["newpass"] == $_POST["newpassre"] && $_POST["username"] != "") {
            $user[$_POST["username"]] = array("password" => md5($_POST["newpass"]),"permission" => $_POST["admin"], "active" => "1");
            ini_write(DIR."/lib/users.ini", $user); 
            sendto("index.php?p=userlist",0);
        }
        ?>
        <div class="alert alert-danger"><?php echo REG_ERROR_WRONG_PASS; ?></div>
        <?php
    } else {
        ?>
        <div class="alert alert-danger"><?php echo REG_ERROR_WRONG_USER; ?></div>
        <?php
    }
} else {
    ctoken();   
}

    include getTempl("header");
    ?>
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <form class="form-horizontal" role="form" method="POST">
        <div class="form-group">
            <label class="col-sm-4 control-label"><?php echo ADDUSER_USERMANE; ?></label>
            <div class="col-sm-8">
                <input class="form-control" name="username" placeholder="<?php echo LOGIN_PLACEHOLDER_USERNAME; ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword" class="col-sm-4 control-label"><?php echo ADDUSER_NEWPW; ?></label>
            <div class="col-sm-8">
                <input type="password" class="form-control" name="newpass" placeholder="<?php echo LOGIN_PLACEHOLDER_PASSWORD; ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="newpassre" class="col-sm-4 control-label"><?php echo ADDUSER_NEWPWA; ?></label>
            <div class="col-sm-8">
                <input type="password" class="form-control" name="newpassre" placeholder="<?php echo LOGIN_PLACEHOLDER_PASSWORD; ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="admin" class="col-sm-4 control-label"></label>
            <div class="col-sm-8">
                <div class="checkbox">
    <label>
      <input type="checkbox" name="admin" value="-1"> <?php echo ADDUSER_ADMIN; ?>
    </label>
  </div>
            </div>
        </div>
        <div class="form-group">
            <label for="submit" class="col-sm-4 control-label">&nbsp;</label>
            <div class="col-sm-8">
                <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit"><?php echo ADDUSER_BUTTON; ?></button>
            </div>
        </div>   
    </form>
    </div>
</div>
    <?php

    include getTempl("fooder");
?>