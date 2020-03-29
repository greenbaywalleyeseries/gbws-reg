<?php
include('gbws_reg_db.php');
include('functions.php');

$partner1_first=$_POST['partner1_first'];
$partner1_last=$_POST['partner1_last'];
$partner1_address=$_POST['partner1_address'];
$partner1_city=$_POST['partner1_city'];
$partner1_state=$_POST['partner1_state'];
$partner1_zip=$_POST['partner1_zip'];
$partner1_phone=$_POST['partner1_phone'];
$partner1_email=$_POST['partner1_email'];
$partner1_SSN=$_POST['partner1_SSN'];

$partner2_first=$_POST['partner2_first'];
$partner2_last=$_POST['partner2_last'];
$partner2_address=$_POST['partner2_address'];
$partner2_city=$_POST['partner2_city'];
$partner2_state=$_POST['partner2_state'];
$partner2_zip=$_POST['partner2_zip'];
$partner2_phone=$_POST['partner2_phone'];
$partner2_email=$_POST['partner2_email'];
$partner2_SSN=$_POST['partner2_SSN'];

$refund_choice=$_POST['refund'];
$boat=$_POST['boat'];
$motor=$_POST['motor'];
$trolling_motor=$_POST['trolling_motor'];
$electronics=$_POST['electronics'];

$sub1_first=$_POST['sub1_first'];
$sub1_last=$_POST['sub1_last'];
$sub1_address=$_POST['sub1_address'];
$sub1_city=$_POST['sub1_city'];
$sub1_state=$_POST['sub1_state'];
$sub1_zip=$_POST['sub1_zip'];
$sub1_phone=$_POST['sub1_phone'];
$sub1_email=$_POST['sub1_email'];
$sub1_SSN=$_POST['sub1_SSN'];

$sub2_first=$_POST['sub2_first'];
$sub2_last=$_POST['sub2_last'];
$sub2_address=$_POST['sub2_address'];
$sub2_city=$_POST['sub2_city'];
$sub2_state=$_POST['sub2_state'];
$sub2_zip=$_POST['sub2_zip'];
$sub2_phone=$_POST['sub2_phone'];
$sub2_email=$_POST['sub2_email'];
$sub2_SSN=$_POST['sub2_SSN'];

switch ($refund_choice) {
    case "Refund":
        $refund='X';
        break;
    case "Roll":
        $refund='';
        break;
}

//Clear phone numbers of spaces, hypens, etc.
$partner1_phone = preg_replace('/\D+/', '', $partner1_phone); // Removes special chars.
$partner2_phone = preg_replace('/\D+/', '', $partner2_phone); // Removes special chars.
$sub1_phone = preg_replace('/\D+/', '', $sub1_phone); // Removes special chars.
$sub2_phone = preg_replace('/\D+/', '', $sub2_phone); // Removes special chars.
//ClearSSN of spaces, hypens, etc.
$partner1_SSN = preg_replace('/\D+/', '', $partner1_SSN); // Removes special chars.
$partner2_SSN = preg_replace('/\D+/', '', $partner2_SSN); // Removes special chars.
$sub1_SSN = preg_replace('/\D+/', '', $sub1_SSN); // Removes special chars.
$sub2_SSN = preg_replace('/\D+/', '', $sub2_SSN); // Removes special chars.


$reg_size=0;

if("" == trim($_POST['partner1_first'])){
    $partner1_mbr_id='';
} else {
	$partner1_mbr_id=get_mbr_id();
	$ins_sql="INSERT INTO member_info (mbr_id, first, last, address, city, state, zip, phone, email, SSN) VALUES('$partner1_mbr_id', '$partner1_first', '$partner1_last', '$partner1_address', '$partner1_city', '$partner1_state', '$partner1_zip', '$partner1_phone', '$partner1_email', '$partner1_SSN')";
	$rc=reg_mbr($ins_sql);
	$reg_size+=1;
}

if("" == trim($_POST['partner2_first'])){
    $partner2_mbr_id='';
} else {
	$partner2_mbr_id=get_mbr_id();
	$ins_sql="INSERT INTO member_info (mbr_id, first, last, address, city, state, zip, phone, email, SSN) VALUES('$partner2_mbr_id', '$partner2_first', '$partner2_last', '$partner2_address', '$partner2_city', '$partner2_state', '$partner2_zip', '$partner2_phone', '$partner2_email', '$partner2_SSN')";
	$rc=reg_mbr($ins_sql);
	$reg_size+=1;
}


if("" == trim($_POST['sub1_first'])){
    $sub1_mbr_id='';
} else {
	$sub1_mbr_id=get_mbr_id();
	$ins_sql="INSERT INTO member_info (mbr_id, first, last, address, city, state, zip, phone, email, SSN) VALUES('$sub1_mbr_id', '$sub1_first', '$sub1_last', '$sub1_address', '$sub1_city', '$sub1_state', '$sub1_zip', '$sub1_phone', '$sub1_email', '$sub1_SSN')";
	$rc=reg_mbr($ins_sql);
	$reg_size+=1;
}

if("" == trim($_POST['sub2_first'])){
    $sub2_mbr_id='';
} else {
	$sub2_mbr_id=get_mbr_id();
	$ins_sql="INSERT INTO member_info (mbr_id, first, last, address, city, state, zip, phone, email, SSN) VALUES('$sub2_mbr_id', '$sub2_first', '$sub2_last', '$sub2_address', '$sub2_city', '$sub2_state', '$sub2_zip', '$sub2_phone', '$sub2_email', $sub2_SSN)";
	$rc=reg_mbr($ins_sql);
	$reg_size+=1;
}  


//echo $reg_size;

//Get team_id 
$sql= "CALL get_team_id(@team);";
$result = $mysqli->query($sql);
$team_result = $mysqli->query('select @team');

if ($team_result->num_rows > 0) {
   // output data of each row
    while($row = $team_result->fetch_assoc()) {
        $team_id=$row['@team'];
    }
} else {
    echo "There was a problem generating a Team_ID";
}

//Insert info for Team #1 into team_info table
$ins_sql="INSERT INTO team_info (team_id, partner1, partner2, sub1, sub2, refund, boat, motor, trolling_motor, electronics) VALUES('$team_id', '$partner1_mbr_id', '$partner2_mbr_id', '$sub1_mbr_id', '$sub2_mbr_id', '$refund', '$boat', '$motor', '$trolling_motor', '$electronics')";
//echo $ins_sql;

if ($mysqli->query($ins_sql) == TRUE) {
   echo "Team ID for " . $partner1_last . " / " .$partner2_last." is ". $team_id. "<br>";
}
else {
    echo '<script language="javascript">';
echo 'alert("Problem registering team")';
    echo '</script>';
}

$mysqli->close();\
header("Location:mailin_sel_tourney.php?team_id=$team_id&team_reg=$reg_size");

echo "<br>";

echo "<a href=mailin_sel_tourney.php?team_id=".$team_id."&team_reg=".$reg_size.">Click here if not automatically redirected to tournament registration page</a>";

?>
