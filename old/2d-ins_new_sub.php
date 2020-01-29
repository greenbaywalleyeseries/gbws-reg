<?php
include('gbws_reg_db.php');

$team_id=$_POST['team_id'];
$sub_first=$_POST['sub_first'];
$sub_last=$_POST['sub_last'];
$sub_address=$_POST['sub_address'];
$sub_city=$_POST['sub_city'];
$sub_state=$_POST['sub_state'];
$sub_zip=$_POST['sub_zip'];
$sub_phone=$_POST['sub_phone'];
$sub_email=$_POST['sub_email'];


//Clear phone numbers of spaces, hypens, etc.
$sub_phone = preg_replace('/\D+/', '', $sub_phone); // Removes special chars.


//Insert infor for Partner #1 into memberinfo table
$ins_sql="INSERT INTO teamsubs (team_id, sub_first, sub_last, sub_address, sub_city, sub_state, sub_zip, sub_phone, sub_email) VALUES('$team_id', '$sub_first', '$sub_last', '$sub_address', '$sub_city', '$sub_state', '$sub_zip', '$sub_phone', '$sub_email')";
//echo $ins_sql;

if ($mysqli->query($ins_sql) == TRUE) {
    echo $sub_first . " " .$sub_last." entered for team  ". $team_id. "<br>";
}
else {
    echo '<script language="javascript">';
    echo 'alert("Problem registering sub")';
    echo '</script>';
}


$mysqli->close();

header('Location: 2-tourney_reg.php?team_id='.$team_id.'&new_team=Y');

echo "<br>";

echo "<a href=2-tourney_reg.php?team_id=".$team_id."&new_team=Y>Click here if not automatically redirected to tournament registration page</a>";


?>
