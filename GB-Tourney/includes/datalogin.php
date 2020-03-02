<?php
//$host = "gbws-registration-mysql.mysql.database.azure.com";
//$username = "yami@gbws-registration-mysql";
//$password = "Th1sSucksa$$";
//$db_name = "gb-tourney";

$host = "localhost";
$username = "root";
$password = "";
$db_name = "gb_tourney";

// Create connection for mysqli extension
$mysqli_tourney = new mysqli($host, $username, $password, $db_name);

if ($mysqli_tourney->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli_tourney->connect_errno . ") " . $mysqli_tourney->connect_error;
}

?>