<!DOCTYPE html>
<html lang="en">
<head>

<link rel="stylesheet" type="text/css" href="./includes/gbws.css">
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
</head>
<body>

<?php 

include('./includes/datalogin.php');

if ($_GET['boat_num'] == 0)
{
    $boat='%';
} else {
    $boat=$_GET['boat_num'];
}

//$sql = "SELECT * FROM tourney_teams where boat_num like '".$boat."%'";
$sql = "SELECT * FROM tourney_teams where boat_num like '".$boat."'";
$result = $mysqli_tourney->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo "<table class='teamdetail-tbl'>";
    echo "<tr>";
    echo "<th class='boat'>Boat #</th>";
    echo "<th class='participant'>Fish Donkey Paticipant</th>";
    echo "<th class='partner'>Partner 1</th>";
    echo "<th class='partner'>Partner 2</th>";
    echo "<th class='fish'>Big Fish</th>";
    echo "<th class='option'>Option Pot</th>";
    echo "<th class='sidepot'>NTC Side Pot</th>";
    echo "</tr>";
    // output data of each row
    foreach ($result as $row) :?>  
        <tr>
        	<td><?php echo $row['boat_num'];?></td>
        	<td><?php echo $row['participant'];?></td>  
        	<td><?php echo $row['partner1'];?></td> 
        	<td><?php echo $row['partner2'];?></td>  
        	<td class="editable-col" contenteditable="true" onBlur="saveToDatabase(this,'big_fish','<?php echo $row['boat_num']; ?>')" oldVal="<php echo $row['big_fish';?>"><?php echo $row['big_fish'];?></td> 
			<td class="editable-col" contenteditable="true" onBlur="saveToDatabase(this,'option_pot','<?php echo $row['boat_num']; ?>')" oldVal="<php echo $row['option_pot';?>"><?php echo $row['option_pot'];?></td> 
			<td class="editable-col" contenteditable="true" onBlur="saveToDatabase(this,'NTC_side_pot','<?php echo $row['boat_num']; ?>')" oldVal="<php echo $row['NTC_side_pot';?>"><?php echo $row['NTC_side_pot'];?></td> 
		</tr>
<?php endforeach;

    echo "</table>";
} else {
    echo "0 results";
}
$mysqli_tourney->close();
?>

   
</body>
</html>
<!-- Add JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
