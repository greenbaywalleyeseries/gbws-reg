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


mysqli_select_db($mysqli,"gbws_reg");

$sql="SELECT * FROM gbws_reg.teaminfo order by length(team_id), team_id";

$result = mysqli_query($mysqli,$sql);

echo '<table id="team">
<tr>
<th>Team ID</th>
<th>Partner 1</th>
<th>Address</th>
<th>City</th>
<th>State</th>
<th>Zip</th>
<th>Phone</th>
<th>email</th>
<th>Partner 2</th>
<th>Address</th>
<th>City</th>
<th>State</th>
<th>Zip</th>
<th>Phone</th>
<th>email</th>
</tr>';
while($row = mysqli_fetch_array($result)) {

    $Partner1=$row['partner1_first'] ." ".$row['partner1_last'];
    $Partner2=$row['partner2_first'] ." ".$row['partner2_last'];

    echo "<tr>";
    echo "<td>" . $row['team_id']. "</td>";
    echo "<td>" . $Partner1. "</td>";
    echo "<td>" . $row['partner1_address']. "</td>";
    echo "<td>" . $row['partner1_city']. "</td>";
    echo "<td>" . $row['partner1_state']. "</td>";
    echo "<td>" . $row['partner1_zip']. "</td>";
    echo "<td>" . $row['partner1_phone']. "</td>";
    echo "<td>" . $row['partner1_email']. "</td>";
    echo "<td>" . $Partner2. "</td>";
    echo "<td>" . $row['partner2_address']. "</td>";
    echo "<td>" . $row['partner2_city']. "</td>";
    echo "<td>" . $row['partner2_state']. "</td>";
    echo "<td>" . $row['partner2_zip']. "</td>";
    echo "<td>" . $row['partner2_phone']. "</td>";
    echo "<td>" . $row['partner2_email']. "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($mysqli);
?>
</body>
</html>