<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="..\membership.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>


<?php
include('../php/gbws_reg_db.php');

mysqli_select_db($mysqli,"gbws_reg");

$sql="SELECT a.team_id,
	concat(c.first, ' ', c.last) as Partner1,
	concat(d.first, ' ', d.last) as Partner2,
	a.GB,
    a.DY,
    a.SB,
    a.MAR,
    (ifnull(a.GB,0) + ifnull(a.DY,0) + ifnull(a.SB,0) + ifnull(a.MAR,0)) as total_points
FROM gbws_reg.points as a
	join gbws_reg.team_info as b on a.team_id=b.team_id
    inner join gbws_reg.member_info c on ( b.partner1=c.mbr_id)
    inner join gbws_reg.member_info d on (b.partner2=d.mbr_id)
order by total_points desc";

$result = mysqli_query($mysqli,$sql);

$sub_team_sql="select distinct a.team_id from gbws_reg.transaction_items a join gbws_reg.team_info b on a.team_id=b.team_id
where item_number like '%-Tourney' and
(a.partner1=b.sub1 or a.partner2=b.sub1
or a.partner1=b.sub2 or a.partner2=b.sub2
or a.team_id='2020_93')";

$sub_result = mysqli_query($mysqli,$sub_team_sql);

echo '<table id="team">
<tr>
<th>Place</th>
<th>Team ID</th>
<th>Partner 1</th>
<th>Partner 2</th>
<th>Green Bay</th>
<th>Oconto</th>
<th>Sturgeon Bay</th>
<th>Marinette</th>
<th>Total Points</th>
</tr>';
$place=0;
$place_position=0;
$prev_points=10000000;
while($row = mysqli_fetch_array($result)) {
    while($sub_team = mysqli_fetch_array($sub_result)) {
        if ($row['team_id'] != $sub_team['team_id']) {
            if ($row['total_points'] !== $prev_points) {
                if ($place=$place_position) {
                    $place=$place+1;
                } else {
                    $place=$place_position+1;
                }
            }
            $place_position=$place_position+1;
            if (is_null($row['GB'])) {
                $GB=0;
            } else {
                $GB=$row['GB'];
            }
            if (is_null($row['DY'])) {
                $DY=0;
            } else {
                $DY=$row['DY'];
            }
            if (is_null($row['SB'])) {
                $SB=0;
            } else {
                $SB=$row['SB'];
            }
            if (is_null($row['MAR'])) {
                $MAR=0;
            } else {
                $MAR=$row['MAR'];
            }
            echo "<tr>";
            echo "<td>" . $place. "</td>";
            echo "<td>" . $row['team_id']. "</td>";
            echo "<td>" . $row['Partner1']. "</td>";
            echo "<td>" . $row['Partner2']. "</td>";
            echo "<td>" . $GB. "</td>";
            echo "<td>" . $DY. "</td>";
            echo "<td>" . $SB. "</td>";
            echo "<td>" . $MAR. "</td>";
            echo "<td>" . $row['total_points']. "</td>";
            echo "</tr>";
            $prev_points=$row['total_points'];
        }
    }
    
}
echo "</table>";
mysqli_close($mysqli);
?>
</body>
</html>
