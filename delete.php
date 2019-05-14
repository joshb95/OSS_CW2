<?php
include("config.php");
$delid = $_POST['delid'];
$nc = count($delid);
for($i=0;$i<$nc;$i++)
{
    $did = $delid[$i];
    mysql_query("DELETE FROM data WHERE id='$did'");

}
?>
