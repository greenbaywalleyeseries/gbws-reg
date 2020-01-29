<?php
include('gbws_reg_db.php');

$partner1_first=$_POST['partner1_first'];
$partner1_last=$_POST['partner1_last'];
$partner1_address=$_POST['partner1_address'];
$partner1_city=$_POST['partner1_city'];
$partner1_state=$_POST['partner1_state'];
$partner1_zip=$_POST['partner1_zip'];
$partner1_phone=$_POST['partner1_phone'];
$partner1_email=$_POST['partner1_email'];

$partner2_first=$_POST['partner2_first'];
$partner2_last=$_POST['partner2_last'];
$partner2_address=$_POST['partner2_address'];
$partner2_city=$_POST['partner2_city'];
$partner2_state=$_POST['partner2_state'];
$partner2_zip=$_POST['partner2_zip'];
$partner2_phone=$_POST['partner2_phone'];
$partner2_email=$_POST['partner2_email'];

$boat=$_POST['boat'];
$motor=$_POST['motor'];
$trolling_motor=$_POST['trolling_motor'];
$electronics=$_POST['electronics'];

//Clear phone numbers of spaces, hypens, etc.
$partner1_phone = preg_replace('/\D+/', '', $partner1_phone); // Removes special chars.
$partner2_phone = preg_replace('/\D+/', '', $partner2_phone); // Removes special chars.

//Get team_id 
$sql= "CALL get_team_id(@number);";
$result = $mysqli->query($sql);
$result = $mysqli->query('select @number');

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $team_ID=$row['@number'];
    }
} else {
    echo "There was a problem generating a Team_ID";
}

//Insert infor for Partner #1 into memberinfo table
$ins_sql="INSERT INTO teaminfo VALUES('$team_ID', '$partner1_first', '$partner1_last', '$partner1_address', '$partner1_city', '$partner1_state', '$partner1_zip', '$partner1_phone', '$partner1_email', '$partner2_first', '$partner2_last', '$partner2_address', '$partner2_city', '$partner2_state', '$partner2_zip', '$partner2_phone', '$partner2_email', '$boat', '$motor', '$trolling_motor', '$electronics','')";
//echo $ins_sql;

if ($mysqli->query($ins_sql) == TRUE) {
    echo "Team ID for " . $partner1_last . " / " .$partner2_last." is ". $team_ID. "<br>";
}
else {
    echo '<script language="javascript">';
    echo 'alert("Problem registering team")';
    echo '</script>';
}


$mysqli->close();

header('Location: 2-tourney_reg.php?team_id='.$team_ID.'&new_team=X');

echo "<br>";

echo "<a href=2-tourney_reg.php?team_id=".$team_ID."&new_team=X>Click here if not automatically redirected to tournament registration page</a>";


?>
