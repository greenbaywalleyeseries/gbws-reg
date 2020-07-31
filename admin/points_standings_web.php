<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>


<?php
include('../php/gbws_reg_db.php');

mysqli_select_db($mysqli,"gbws_reg");

$get_subs_sql="call find_subs()";

mysqli_query($mysqli,$get_subs_sql);

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
    left join gbws_reg.temp_subs e on a.team_id=e.team_id
where e.team_id IS NULL
order by total_points desc";

$result = mysqli_query($mysqli,$sql);

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
        if ($row['total_points'] != $prev_points) {
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



echo "</table>";


echo "<h1> Teams using subs </h1>";
$subs_sql="SELECT a.team_id,
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
    right join gbws_reg.temp_subs e on a.team_id=e.team_id
order by total_points desc";

$subs_result = mysqli_query($mysqli,$subs_sql);

echo '<table id="subs">
<tr>

<th>Team ID</th>
<th>Partner 1</th>
<th>Partner 2</th>
<th>Green Bay</th>
<th>Oconto</th>
<th>Sturgeon Bay</th>
<th>Marinette</th>
<th>Total Points</th>
</tr>';


while($row = mysqli_fetch_array($subs_result)) {

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
    echo "<td>" . $row['team_id']. "</td>";
    echo "<td>" . $row['Partner1']. "</td>";
    echo "<td>" . $row['Partner2']. "</td>";
    echo "<td>" . $GB. "</td>";
    echo "<td>" . $DY. "</td>";
    echo "<td>" . $SB. "</td>";
    echo "<td>" . $MAR. "</td>";
    echo "<td>" . $row['total_points']. "</td>";
    echo "</tr>";

}



echo "</table>";

mysqli_close($mysqli);
?>
</body>
</html>
