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
$sql="SELECT a.team_id, b.partner1_first, b.partner1_last, b.partner2_first, b.partner2_last, a.fox_river, a.marinette, a.oconto, a.sturgeon_bay, (ifnull(a.fox_river,0) + ifnull(a.marinette,0) + ifnull(a.oconto,0) + ifnull(a.sturgeon_bay,0)) as total_points
FROM gbws_reg.points as a
join teaminfo as b
on a. team_id=b.team_id
having (total_points > 1
    or a.fox_river is not null and a.marinette is not null and a.oconto is not null)
order by total_points desc";

$result = mysqli_query($mysqli,$sql);

echo '<table id="team">
<tr>
<th>Place</th>
<th>Team ID</th>
<th>Partner 1</th>
<th>Partner 2</th>
<th>Fox River</th>
<th>Marinette</th>
<th>Oconto</th>
<th>Sturgeon Bay</th>
<th>Total Points</th>
</tr>';
$place=0;
$place_position=0;
$prev_points=10000000;
while($row = mysqli_fetch_array($result)) {
    if ($row['total_points'] !== $prev_points) {
        if ($place=$place_position) {
            $place=$place+1;
        } else {
            $place=$place_position+1;
        }
    }
    $place_position=$place_position+1;    
    $Partner1=$row['partner1_first'] ." ".$row['partner1_last'];
    $Partner2=$row['partner2_first'] ." ".$row['partner2_last'];
    if (is_null($row['fox_river'])) {
        $Fox_River=0;
    } else {
        $Fox_River=$row['fox_river'];
    }
    if (is_null($row['marinette'])) {
        $Marinette=0;
    } else {
        $Marinette=$row['marinette'];
    }
    if (is_null($row['oconto'])) {
        $Oconto=0;
    } else {
        $Oconto=$row['oconto'];
    }
    if (is_null($row['sturgeon_bay'])) {
        $Sturgeon_Bay=0;
    } else {
        $Sturgeon_Bay=$row['sturgeon_bay'];
    }
    echo "<tr>";
    echo "<td>" . $place. "</td>";
    echo "<td>" . $row['team_id']. "</td>";
    echo "<td>" . $Partner1. "</td>";
    echo "<td>" . $Partner2. "</td>";
    echo "<td>" . $Fox_River. "</td>";
    echo "<td>" . $Marinette. "</td>";
    echo "<td>" . $Oconto. "</td>";
    echo "<td>" . $Sturgeon_Bay. "</td>";
    echo "<td>" . $row['total_points']. "</td>";
    echo "</tr>";
    $prev_points=$row['total_points'];
}
echo "</table>";
mysqli_close($mysqli);
?>
</body>
</html>