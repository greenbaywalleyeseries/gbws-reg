<?php 
include_once './includes/GBWS-functions.php';
$target='unmapped_teams.php';

$duration=TourneyDuration();
if ($duration == 1) {
    $tgt_page= 'one_day_dashboard.php';
}
if ($duration == 2) {
    $tgt_page= 'two_day_dashboard.php';
}

if(!isset($_COOKIE['GBWS-admin'])) {
    header('Location: index.php?page='.$target);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>


<link rel="stylesheet" type="text/css" href="includes/gbws.css">
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
</head>
<body onload="showTeam()">

<h1 class="title-header">
Day 1 Entries Not Mapped to Teams
</h1>

<?php 
include('./includes/datalogin.php');


//$sql = "SELECT * FROM tourney_teams where boat_num like '".$boat."%'";
$sql = "select distinct a.participant as participant FROM donkey_day1 a LEFT JOIN tourney_teams b ON a.participant=b.participant WHERE b.participant IS NULL AND a.participant !='Participant'";
$result = $mysqli_tourney->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo "<table class='unmapped_teams-tbl'>";
    echo "<tr>";

    echo "<th class='participant'>Fish Donkey Paticipant</th>";
    echo "</tr>";
    // output data of each row
    foreach ($result as $row) :?>  
        <tr>
        	<td><?php echo $row['participant'];?></td> 
 		</tr>
<?php endforeach;

    echo "</table>";
} else {
    echo "0 results";
}
$mysqli_tourney->close();
?>


   <div class="divider"></div>
    	<a href="<?php echo $tgt_page ?>" class="button">Admin Dashboard</a>
   <div class="divider"></div>
   
</body>
</html>


