<?php


include getTempl("header");
    
    if(isset($_POST["submit"]) && $_POST["step"] == "0") {
        if(!checktoken()) {
            sendto("index.php?p=userlist",0);
            die;
        } else {
            ctoken();
        }
        if($server->searchserver($_POST["port"])) {
            echo"<br>TRUE!</br>";
        }
        if($server->searchserver($_POST["port"])) {
            sendto("index.php?p=add&error=1", 0); 
            die();
        }
        
        ?>
        <h3>Server erstellen 1/3</h3>
            <form class="form-horizontal" role="form" method="post">
                <input type="hidden" name="step" value="1" >
                <input type="hidden" name="name" value="<?php echo $_POST["name"]; ?>" >
                <input type="hidden" name="port" value="<?php echo $_POST["port"]; ?>" >
                <?php
                    if(isset($_POST["config"]) && $_POST["config"] == "-200") {
                        
                    } else {
                        ?>
                <div class="form-group">
    <label for="addserverport" class="col-sm-2 control-label"><?php echo ADD_SERVER_CONFIG_TITLE; ?></label>
    <div class="col-sm-10">
        <textarea class="form-control" id="addserverport" name="config" rows="3" placeholder="<?php echo ADD_SERVER_CONFIG_PLACEHOLDER; ?>"></textarea>
    </div>
  </div>
                <?php
                    }
           
                ?>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default" name="submit"><?php echo ADD_SERVER_BUTTON; ?></button>
    </div>
  </div>
</form>
        
        <?php
        
        // STEP 1
        
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
        mkdir(DIR."/server/server".$folder_name);
        executecmd(DIR."/lib/steam/steamcmd.sh +login anonymous +force_install_dir ".DIR."/server/server".$folder_name."/ +app_update 261140 +quit");
            
           
        } elseif (DIRECTORY_SEPARATOR == '\\') {
            // windows
        }
        
        $Handle = fopen(DIR."/server/server".$folder_name."/config.lua", 'w+');
        fwrite($Handle, $_POST["config"]); 
        fclose($Handle); 
        ?>

<h3>Server erstellen 2/3</h3>
            <form class="form-horizontal" role="form" method="post">
                <input type="hidden" name="step" value="2" >
                <div class="progress progress-striped active">
  <div class="progress-bar"  role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
    <span class="sr-only">100% Complete</span>
  </div>
</div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default" name="submit">N&auml;chster Schritt</button>
    </div>
  </div>
</form>

<?php
        
        // STEP 2
        
    } elseif( isset($_POST["submit"]) && $_POST["step"] == "2") {
         
        ?>
<h3>Server erstellen 3/3</h3>
            <form class="form-horizontal" role="form" method="post">
                <input type="hidden" name="step" value="3" >
                <div class="progress progress-striped active">
  <div class="progress-bar"  role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
    <span class="sr-only">100% Complete</span>
  </div>
</div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default" name="submit">Zur&uuml;ck zur Serverliste</button>
    </div>
  </div>
</form>


<?php
        
        // STEP 3
    } elseif( isset($_POST["submit"]) && $_POST["step"] == "3") {
       sendto("index.php?p=index",0); 
    } else {
        ctoken();
     
        ?>
            <h3>Server erstellen</h3>
            <form class="form-horizontal" role="form" method="post">
                <input type="hidden" name="step" value="0" >
  <div class="form-group">
    <label for="addservername" class="col-sm-2 control-label"><?php echo ADD_SERVER_NAME_TITLE; ?></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="addservername" name="name" placeholder="<?php echo ADD_SERVER_NAME_PLACEHOLDER; ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="addserverport" class="col-sm-2 control-label"><?php echo ADD_SERVER_PORT_TITLE; ?></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="addserverport" name="port" placeholder="<?php echo ADD_SERVER_PORT_PLACEHOLDER; ?>">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="config" value="-200"> <?php echo ADD_SERVER_CONFIG; ?>
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default" name="submit"><?php echo ADD_SERVER_BUTTON; ?></button>
    </div>
  </div>
</form>
        <?php
        
    }

include getTempl("fooder");

echo dumparray($_POST);
?>