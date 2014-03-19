<?php
// INDEX PAGE
// Serverlist

include getTempl("header");

if(SESSION_PERMISSION == "-1") {
    ?>

<!--define("SLIST_ACTIONS","Aktionen");-->
<div class="row">  
    <div class"col-md-8 col-md-offset-2">
<table class="table table-hover">
        <tr>
            <th><?php echo SLIST_STATUS; ?></th>
            <th><?php echo SLIST_NAME; ?></th>
            <th><?php echo SLIST_PORT; ?></th>
            <th><?php echo SLIST_PLAYERS; ?></th>
            <th><?php echo SLIST_PUBLIC; ?></th>
            <th></th>
        </tr> 
       <?php
    while (list($key, $val) = each($server->server)) {   
        echo "<tr>";
        echo "<td>OFFLINE</td>";
        echo "<td> ".$server->server[$key]["Server"]["Name"]." </td>"; 
        echo "<td> ".$server->server[$key]["Server"]["BindPort"]." </td>";
        echo "<td> 10/".$server->server[$key]["Server"]["MaxPlayers"]." </td>"; 
        if($server->server[$key]["Server"]["Announce"] == "1") {
            echo "<td><span class=\"glyphicon glyphicon-ok\"></span></td>";
        } else {
            echo "<td><span class=\"glyphicon glyphicon-remove\"></span></td>";
        }
        ?>
        <td>
        <!-- Single button -->
        <div class="btn-group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">&nbsp;<?php echo USERLIST_ACTIONS; ?>&nbsp;&nbsp;<span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
            <li><a href="index.php?p=start&a=restart&id=<?php echo $key;?>&a=act"><span class="glyphicon glyphicon-lock"> Restart Server</span></a></li>    
            <li><a href="index.php?p=start&a=stop&id=<?php echo $key;?>&a=act"><span class="glyphicon glyphicon-lock"> Stop Server</span></a></li>
            <li><a href="index.php?p=start&a=start&id=<?php echo $key;?>"><span class="glyphicon glyphicon-wrench"> Start Server</span></a></li>
            <li class="divider"></li>
            <li><a href="index.php?p=delserver&id=<?php echo $key;?>"><span class="glyphicon glyphicon-trash"> <?php echo USERLIST_DEL; ?></span></a></li>
            </ul>
        </div>
        </td>
        <?php
        echo "</tr>";
    }
?>
    </table>
    </div>
    </div>
    <?php
} else {
    
}


include getTempl("fooder");
?>