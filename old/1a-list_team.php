<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="membership.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>


<?php
include('gbws_reg_db.php');
$last_name = $_GET['last_name'];


mysqli_select_db($mysqli,"gbws_reg");
$sql="SELECT * FROM teaminfo WHERE partner1_last like '%".$last_name."%' or partner2_last like '%".$last_name."%' order by partner1_last";
$result = mysqli_query($mysqli,$sql);

echo '<table id="team">
<tr>
<th>Team ID</th>
<th>Partner 1</th>
<th>Partner 2</th>
</tr>';
while($row = mysqli_fetch_array($result)) {
    $Team_ID=$row['team_id'];
    $Team_URL='<a href="2-tourney_reg.php?team_id=' .$Team_ID. '&new_team=">'.$Team_ID.'</a>';
    $Partner1=$row['partner1_first'] ." ".$row['partner1_last'];
    $Partner2=$row['partner2_first'] ." ".$row['partner2_last'];
    $Partner1_URL='<a href="2-tourney_reg.php?team_id=' .$Team_ID. '&new_team=">'.$Partner1.'</a>';
    $Partner2_URL='<a href="2-tourney_reg.php?team_id=' .$Team_ID. '&new_team=">'.$Partner2.'</a>';
    echo "<tr>";
    echo "<td>" . $Team_URL. "</td>";
    echo "<td>" . $Partner1_URL. "</td>";
    echo "<td>" . $Partner2_URL. "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($mysqli);
?>
</body>
</html>