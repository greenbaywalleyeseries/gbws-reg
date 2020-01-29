<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php
include('gbws_reg_db.php');
$team_id = $_GET['team'];

mysqli_select_db($mysqli,"gbws_reg");
$sql="SELECT * FROM teaminfo WHERE team_id='".$team_id."'";
$result = mysqli_query($mysqli,$sql);
echo "<table>";
while($row = mysqli_fetch_array($result)) {

    echo '<tr><td>Partner 1: ' .$row['partner1_first'].' '.$row['partner1_last'].' </td></tr>';
    echo '<tr><td>Partner 2: ' .$row['partner2_first'].' '.$row['partner2_last'].' </td></tr>';
}
$sql_subs="SELECT * FROM teamsubs WHERE team_id='".$team_id."'";
$result_subs = mysqli_query($mysqli,$sql_subs);

$i=1;
while($row = mysqli_fetch_array($result_subs)) {
    echo '<tr><td>Sub ' .$i. ': ' .$row['sub_first'].' '.$row['sub_last'].' </td></tr>';

    $i=$i+1;
}
echo "</table>";
mysqli_close($mysqli);
?>
</body>
</html>