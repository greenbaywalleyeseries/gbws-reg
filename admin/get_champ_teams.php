<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="..\membership.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>


<?php
include('..\gbws_reg_db.php');



mysqli_select_db($mysqli,"gbws_reg");
$sql="SELECT a.team_id, c.first as partner1_first, c.last as partner1_last, d.first as partner2_first, d.last as partner2_last, a.GB, a.DY, a.SB, (ifnull(a.GB,0) + ifnull(a.DY,0) + ifnull(a.SB,0) + ifnull(a.MAR,0)) as total_points
FROM points as a
join team_info as b
	on a.team_id=b.team_id
join member_info as c
	on b.partner1=c.mbr_id
join member_info as d
	on b.partner2=d.mbr_id
having (total_points > 799
    or a.GB is not null and a.DY is not null and a.SB is not null)
order by total_points desc";

$result = mysqli_query($mysqli,$sql);

echo '<table id="team">
<tr>
<th>Team ID</th>
<th>Partner 1</th>
<th>Partner 2</th>
<th>Total Points</th>
</tr>';
while($row = mysqli_fetch_array($result)) {
    $Team_ID=$row['team_id'];
    $Team_URL='<a href="tourney_reg.php?team_id=' .$Team_ID. '&new_team=">'.$Team_ID.'</a>';
    $Partner1=$row['partner1_first'] ." ".$row['partner1_last'];
    $Partner2=$row['partner2_first'] ." ".$row['partner2_last'];
    $Partner1_URL='<a href="tourney_reg.php?team_id=' .$Team_ID. '&new_team=">'.$Partner1.'</a>';
    $Partner2_URL='<a href="tourney_reg.php?team_id=' .$Team_ID. '&new_team=">'.$Partner2.'</a>';
    $Team_Points=$row['total_points'];
    echo "<tr>";
    echo "<td>" . $Team_URL. "</td>";
    echo "<td>" . $Partner1_URL. "</td>";
    echo "<td>" . $Partner2_URL. "</td>";
    echo "<td>" . $Team_Points. "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($mysqli);
?>
</body>
</html>