<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../membership.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>


<?php
include('..\gbws_reg_db.php');
$tourney_id = $_GET['q'];


mysqli_select_db($mysqli,"gbws_reg");
$set_boat_sql="call setBoatNum(".$tourney_id.")";
mysqli_query($mysqli,$set_boat_sql);
$sql="SELECT * FROM tourney_reg WHERE tourney_id ='".$tourney_id."' order by boat_num";

$result = mysqli_query($mysqli,$sql);

echo '<table id="team">
<tr>
<th>Boat #</th>
<th>Team ID</th>
<th>Registration Date</th>
<th>Partner 1</th>
<th>Partner 2</th>
<th>Option Pot</th>
<th>Big Fish</th>
</tr>';
while($row = mysqli_fetch_array($result)) {

    $Partner1=$row['partner1_first'] ." ".$row['partner1_last'];
    $Partner2=$row['partner2_first'] ." ".$row['partner2_last'];

    echo "<tr>";
    echo "<td>" . $row['boat_num']. "</td>";
    echo "<td>" . $row['team_id']. "</td>";
    echo "<td>" . $row['reg_date']. "</td>";
    echo "<td>" . $Partner1. "</td>";
    echo "<td>" . $Partner2. "</td>";
    echo "<td>" . $row['option_pot']. "</td>";
    echo "<td>" . $row['big_fish']. "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($mysqli);
?>
</body>
</html>