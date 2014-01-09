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
    </tr>
<?php
    while (list($key, $val) = each($user)) {   
        echo "<tr>";
        echo "<td>".$key."</td>"; 
        echo "<td>".$user[$key]["permission"]."</td>";
        if(
        echo "</tr>";
    }
?>
</table>
<?php
include getTempl("fooder");
?>