<?php
include_once 'includes/GBWS-functions.php';
include('includes/datalogin.php');

if (empty($_GET)) {
    $_GET['boat_num']=0;
}

$partner_sql='select * from tourney_teams where boat_num='.$_GET['boat_num'].' limit 1';
$partner_result=$mysqli_tourney->query($partner_sql);
if (!empty($partner_result) && $partner_result->num_rows > 0) {
    while($row = $partner_result->fetch_assoc()) {
        $partner1=$row['partner1'];
        $partner2=$row['partner2'];
    }
        echo "<h4>Partner 1: ".$partner1."</h4>";
        echo "<h4>Partner 2: ".$partner2."</h4>";
}


//Get Dates for tourney
$day1='2020-04-11';
$day2='2019-04-12';
#$sql_dates="select * from tourney_info";
#$dates_result = $mysqli->query($sql_dates);
#while($tourney_dates = $dates_result->fetch_assoc()) {
#    $day1=$tourney_dates['day_1'];
#    $day2=$tourney_dates['day_2'];
#}

//Get Day 1 Results
$day1_sql = "SELECT * FROM reg_fish where boat_num=".$_GET['boat_num']." and time='".$day1."' order by weight desc limit 5";

$result = $mysqli_tourney->query($day1_sql);
$total=0;

if (!empty($result) && $result->num_rows > 0) {
    // output data of each row
    echo "<h2>Day 1</h2>";
    echo "<table class='teamfish-tbl'>";
    echo "<tr>";
    echo "<th class='fish-boat'>Boat #</th>";
    echo "<th class='fish-fish'>Fish #</th>";
    echo "<th class='fish-length'>Length</th>";
    echo "<th class='fish-weight'>Weight</th>";
    echo "</tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        ?>
        <tr>
        	<td><?php echo $row['boat_num'];?></td>
        	<td><?php echo $row['fish_num'];?></td>
        	<td class="editable-col" contenteditable="true" onBlur="saveFishToDatabase(this,'length','<?php echo $row['boat_num']; ?>','<?php echo $row['fish_num']; ?>')" oldVal="<php echo $row['length';?>"><?php echo $row['length'];?></td>
			<td><?php echo $row["weight"];?></td>
		<?php $total=$total+$row["weight"];
    }

    echo "</table>";
    $penalties=calculate_penalty($_GET['boat_num']);
    $day1_weight=deduct_penalty($penalties, $total);
    echo "Day 1 Penalty: ". $penalties."<br>";
    echo "Day 1 Weight: ".$day1_weight. "<br>";
    
} else {
    $day1_weight=0;
    echo "<h2>No Day 1 results</h2><br>";
}

//Get Day 2 Results
$day2_sql = "SELECT * FROM reg_fish where boat_num=".$_GET['boat_num']." and time='".$day2."' order by weight desc limit 5";

$result = $mysqli_tourney->query($day2_sql);
$total=0;

if (!empty($result) && $result->num_rows > 0) {
    // output data of each row
    echo "<h2>Day 2</h2>";
    echo "<table class='teamfish-tbl'>";
    echo "<tr>";
    echo "<th class='fish-boat'>Boat #</th>";
    echo "<th class='fish-fish'>Fish #</th>";
    echo "<th class='fish-length'>Length</th>";
    echo "<th class='fish-weight'>Weight</th>";
    echo "</tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        ?>
        <tr>
        	<td><?php echo $row['boat_num'];?></td>
        	<td><?php echo $row['fish_num'];?></td>
        	<td class="editable-col" contenteditable="true" onBlur="saveFishToDatabase(this,'length','<?php echo $row['boat_num']; ?>','<?php echo $row['fish_num']; ?>')" oldVal="<php echo $row['length';?>"><?php echo $row['length'];?></td>
			<td><?php echo $row["weight"];?></td>
		<?php $total=$total+$row["weight"];
    }
    
    
    echo "</table>";
    $penalties=calculate_penalty($_GET['boat_num']);
    $day2_weight=deduct_penalty($penalties, $total);
    echo "Day 2 Penalty: ". $penalties."<br>";
    echo "Day 2 Weight: ".$day2_weight. "<br>";
    
} else {
    $day2_weight=0;
    echo "<h2>No Day 2 results</h2><br>";
}
    $total_weight=$day1_weight+$day2_weight;
    echo "<h2>Total Weight: " .$total_weight ."</h2>";

$mysqli_tourney->close();
?>

<!-- Add JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>