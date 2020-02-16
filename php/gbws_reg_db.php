<?php
$host = "gbws-registration-mysqldbserver.mysql.database.azure.com";
$username = "yami@gbws-registration-mysqldbserver";
$password = "Th1sSucksa$$";
$db_name = "gbws_reg";
 
//$host = "localhost";
//$username = "root";
//$password = "";
//$db_name = "gbws_reg";

// Create connection for mysqli extension
$mysqli = new mysqli($host, $username, $password, $db_name);


if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

?>