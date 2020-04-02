<?php
include_once 'includes/GBWS-functions.php';
include('includes/datalogin.php');

$status=0;
$boat=$_POST['boat2'];
$length=$_POST['length'];
$length2=$_POST['length2'];

//generate full length
$full_length = $length + $length2;

//Get length conversion of fish from conversion table
$sql = "SELECT * from conversion where length=$full_length";
//echo $sql;
$result=$mysqli_tourney->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $weight=$row["weight"];
    }
} else {
    echo "Invalid Length. Unable to submit fish. <br>";
    end_script();
}

//Get fish # for boat
$sql = "SELECT max(fish_num) as fish_num from reg_fish where boat_num=$boat";
$result=$mysqli_tourney->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $fish=$row["fish_num"]+1;
    }
} else {
    $fish=1;
}


$sql="INSERT into reg_fish VALUES ('".$boat."', '".$fish."', '".$full_length."', '2020-04-11 00:00:00', '1', '" .$weight. "')";

$insert_fish = $mysqli_tourney->query($sql);
if($insert_fish){
    $status = 0;
}else{
    echo "Issue submitting fish.";
    end_script();
}