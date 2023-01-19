<!DOCTYPE html>
<html>

<head>

This page is here

</head>

<body>

The page is working
</body>

<?php
include('../php/gbws_reg_db.php');
require('../pdf/fpdf.php');
$tourney_id = $_GET['tourney_id'];

$location_sql = "select location, DATE_FORMAT(start_date, '%M %d, %Y') as start_date,  DATE_FORMAT(second_date, '%M %d, %Y')as second_date from tourneyinfo where local='".$tourney_id."'";
$location_result = $mysqli->query($location_sql);
foreach ($location_result as $row):
$location=$row['location'];
$start_date=$row['start_date'];
$second_date=$row['second_date'];


endforeach;

if (isset($second_date)) {
    $date=$start_date ." - " . $second_date;
} else {
    $date=$start_date;

}
?>