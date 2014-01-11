<?php
// Database
$user = parse_ini_file(DIR."/lib/users.ini", TRUE);

if(!isset($_GET["id"]) OR !array_key_exists($_GET["id"], $user)) {
    sendto("index.php?p=userlist",0);
    die;
}


if(isset($_POST["submit"])) {
    if(isset($_POST["delete"]) && $_POST["delete"] == "-1") {
        $nuserdb = array();
        
        while (list($key, $val) = each($user)) {   
            if($key != $_GET["id"]){
                $nuserdb[$key] = $val;
            }
        }
        ini_write(DIR."/lib/users.ini", $nuserdb);
        sendto("index.php?p=userlist",0);
    } else {
        sendto("index.php?p=userlist",0);
        die;
    }
}
    include getTempl("header");
    ?>
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <form class="form-horizontal" role="form" method="POST">
        <div class="form-group">
            <label class="col-sm-4 control-label"><?php echo ADDUSER_USERMANE; ?></label>
            <div class="col-sm-8">
                <?php echo $_GET["id"]; ?>
            </div>
        </div>
        <div class="form-group">
            <label for="admin" class="col-sm-4 control-label"></label>
            <div class="col-sm-8">
                <div class="checkbox">
    <label>
      <input type="checkbox" name="delete" value="-1"> <?php echo DELLUSER_CHECK; ?>
    </label>
  </div>
            </div>
        </div>
        <div class="form-group">
            <label for="submit" class="col-sm-4 control-label">&nbsp;</label>
            <div class="col-sm-8">
                <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit"><?php echo DELLUSER_BUTTON; ?></button>
            </div>
        </div>   
    </form>
    </div>
</div>
    <?php

    include getTempl("fooder");
?>