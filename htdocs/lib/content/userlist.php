<?php

// Database
$user = parse_ini_file(DIR."/lib/users.ini", TRUE);
if(isset($_GET["a"]) && $_GET["a"] == "act") {
    if(isset($_GET["id"]) && array_key_exists($_GET["id"], $user)) {
        if($user[$_GET["id"]]["active"] == "0") {
            $user[$_GET["id"]]["active"] = "1";
            ini_write(DIR."/lib/users.ini", $user);
        } else {
            $user[$_GET["id"]]["active"] = "0";
            ini_write(DIR."/lib/users.ini", $user);
        }
        sendto("index.php?p=userlist",0);
    }
}


include getTempl("header");
?>
<table class="table table-hover">
    <tr>
    <th><?php echo USERLIST_NAME; ?></th>
    <th><?php echo USERLIST_PERMESSION; ?></th>
    <th><?php echo USERLIST_ACTIVE; ?></th>
    <th></th>
    </tr>
<?php
    while (list($key, $val) = each($user)) {   
        echo "<tr>";
        echo "<td>".$key."</td>"; 
        echo "<td>".$user[$key]["permission"]."</td>";
        if($user[$key]["active"] == "1") {
            echo "<td>".USERLIST_ACTIVE_TRUE."</td>";
            $reactive = USERLIST_ACTIVE_FALSE_TURN;
        } else {
            echo "<td>".USERLIST_ACTIVE_FALSE."</td>"; 
            $reactive = USERLIST_ACTIVE_TRUE_TURN;
        }
        ?>
        <td>
        <!-- Single button -->
        <div class="btn-group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">&nbsp;<?php echo USERLIST_ACTIONS; ?>&nbsp;&nbsp;<span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
            <li><a href="index.php?p=userlist&id=<?php echo $key;?>&a=act"><span class="glyphicon glyphicon-lock"> <?php echo $reactive; ?></span></a></li>
            <li><a href="index.php?p=me&id=<?php echo $key;?>"><span class="glyphicon glyphicon-wrench"> <?php echo USERLIST_CHANGE; ?></span></a></li>
            <li><a href="#"><span class="glyphicon glyphicon-tower"> <?php echo USERLIST_PERM; ?></span></a></li>
            <li class="divider"></li>
            <li><a href="index.php?p=deluser&id=<?php echo $key;?>"><span class="glyphicon glyphicon-trash"> <?php echo USERLIST_DEL; ?></span></a></li>
            </ul>
        </div>
        </td>
        <?php
        echo "</tr>";
    }
?>
</table>
<a href="index.php?p=adduser"><span class="glyphicon glyphicon-plus"></span> <?php echo USERLIST_ADD; ?></a>
<?php
include getTempl("fooder");
?>