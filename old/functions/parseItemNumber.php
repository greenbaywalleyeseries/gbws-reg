<?php 
include('../gbws_reg_db.php');
$team_id = $_POST['team_id'];
$field = $_POST['field'];

$item_type = explode("-", $field);
if ( ! isset($item_type[1])) {
    $item_type[1] = null;
} else {
    switch ($item_type[1]) {
        case 'Tourney':
            
            $SQL="SELECT * from tourney_reg where local=$item_type[0] AND team_id='$team_id' LIMIT 1";
            $check_tourney=mysqli_query($mysqli, $SQL);

            if(mysqli_fetch_array($check_tourney) == true){
                
                echo "1";
            }
            #                $SQL="insert into tourney_reg (team_id, tourney_id, reg_date, partner1_first, partner1_last, partner2_first, partner2_last) VALUES ('$team_id',$item_type[0],CURTIME(),'$partner1_first','$partner1_last','$partner2_first','$partner2_last')";
            break;
        case 'Option':
            #                $SQL="update tourney_reg set option_pot='X' where team_id='$team_id' and tourney_id=$item_type[0]";
            break;
        case 'Fish':
            #                $SQL="update tourney_reg set big_fish='X' where team_id='$team_id' and tourney_id=$item_type[0]";
            break;
    }
}



?>