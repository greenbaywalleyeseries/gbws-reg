<?php
include('./includes/datalogin.php');
$result = $mysqli_tourney->query("UPDATE tourney_teams set " . $_POST["column"] . " = '".$_POST["editval"]."' WHERE  boat_num=".$_POST["id"]);
?>