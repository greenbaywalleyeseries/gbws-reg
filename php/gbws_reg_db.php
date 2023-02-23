<?php
//$host = "";
//$username = "";
//$password = "";
//$db_name = "";

$host = "localhost";
$username = "root";
$password = "";
$db_name = "gbws_reg";

// Create connection for mysqli extension
$mysqli = new mysqli($host, $username, $password, $db_name);


if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

?>