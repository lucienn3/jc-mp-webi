<?php
// INDEX PAGE
// Serverlist
$user = parse_ini_file(DIR."/lib/users.ini", TRUE);
include getTempl("header");
?>
<table class="table table-hover">
    <tr>
    <th><?php echo USERLIST_NAME; ?></th>
    <th><?php echo USERLIST_PERMESSION; ?></th>
    <th><?php echo USERLIST_ACTIVE; ?></th>
    <th><?php echo USERLIST_ACTIONS; ?></th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
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
        echo "<td><a href=\"\"><span class=\"glyphicon glyphicon-ok\"> ".$reactive."</span></a></td>";
        echo "<td><a href=\"\"><span class=\"glyphicon glyphicon-wrench\"> ".USERLIST_CHANGE."</span></a></td>";
        echo "<td><a href=\"\"><span class=\"glyphicon glyphicon-tower \"> ".USERLIST_PERM."</span></a></td>";
        echo "</tr>";
    }
?>
</table>
<?php
include getTempl("fooder");
?>