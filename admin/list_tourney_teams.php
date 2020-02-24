<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

    <?php
    include('../php/gbws_reg_db.php');
    $tourney_id = $_GET['tourney_id'];
    
    mysqli_select_db($mysqli,"gbws_reg");
    
    $sql="call ListTourneyRoster('".$tourney_id."')";
    
    $result = mysqli_query($mysqli,$sql);
    
    echo '<table id="team">
    <tr>
    <th>Boat #</th>
    <th>Team ID</th>
    <th>Partner 1</th>
    <th>Partner 2</th>
    <th>Option Pot</th>
    <th>Big Fish</th>
    </tr>';
    $i=1;
    while($row = mysqli_fetch_array($result)) {
    
        echo "<tr>";
        echo "<td>" . $i. "</td>";
        echo "<td>" . $row['team_id']. "</td>";
        echo "<td>" . $row['partner1']. "</td>";
        echo "<td>" . $row['partner2']. "</td>";
        echo "<td>" . $row['option_pot']. "</td>";
        echo "<td>" . $row['big_fish']. "</td>";
        echo "</tr>";
        $i=$i+1;
    }
    echo "</table>";
    mysqli_close($mysqli);
    ?>
</body>
</html>