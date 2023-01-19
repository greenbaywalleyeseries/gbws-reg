<!DOCTYPE html>
<html>

<head>

This page is here

<br>

</head>

<body>

The page is working
<br>
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

echo $location;
echo $start_date;
echo $second_date;

endforeach;

if (isset($second_date)) {
    $date=$start_date ." - " . $second_date;
} else {
    $date=$start_date;

}

$sql="call ListTourneyRoster('".$tourney_id."')";
$result = mysqli_query($mysqli,$sql);
$i=1;
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        
        $boat_num=$i;
        $partner1=$row["partner1"];
        $partner2=$row["partner2"];
        $option_pot=$row["option_pot"];
        $big_fish=$row["big_fish"];
        $data=array($boat_num, $partner1, $partner2, $option_pot, $big_fish);
        $roster[]=$data;
        echo $partner1;
        echo $partner2;
        echo $option_pot;
        echo $big_fish;
        echo $i;
        $i=$i+1;
    }
    
}

?>