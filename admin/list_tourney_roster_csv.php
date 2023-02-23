<?php
//'REST API to download CSV to excel via macro for tourney template'
    include('../php/gbws_reg_db.php');
    print "{\"data\": ";
    //$tourney_id = 'T1';
    $tourney_id = $_GET['tourney_id'];
    
    mysqli_select_db($mysqli,"gbws_reg");
    
    $sql="call ListTourneyRoster('".$tourney_id."')";
    
    $results = mysqli_query($mysqli,$sql);
    
    $rows = array();
    if(mysqli_num_rows($results) > 0){
        while($record = mysqli_fetch_assoc($results)) {
            array_push($rows, $record);
        }
        print json_encode($rows);
    }
    else {
        echo("No records found");
    }
    print "}";
?>