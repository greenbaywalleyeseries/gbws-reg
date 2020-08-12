<?php
include('../php/gbws_reg_db.php');
include('includes/datalogin.php');

$tourney_id='MAR';

$save_mapping_SQL1="DROP TABLE IF EXISTS participant_mapping";
$save_mapping_SQL2="CREATE TABLE participant_mapping AS SELECT team_id, participant from tourney_teams";

mysqli_query($mysqli_tourney,$save_mapping_SQL1);
mysqli_query($mysqli_tourney,$save_mapping_SQL2);

$del_teams_SQL="delete from tourney_teams";

$status=mysqli_query($mysqli_tourney,$del_teams_SQL);

if($status == false)
{
    die("Teams not updated - unable to delete");
}

$roster=array();
$tbl_header=array('Boat #','Team ID','Partner 1','Partner 2','Option Pot','Big Fish');
$sql="call ListTourneyRoster('".$tourney_id."')";

$result = mysqli_query($mysqli,$sql);

$i=0;
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $i=$i+1;
        $boat_num=$i;
        $team_id=$row["team_id"];;
        $partner1=$row["partner1"];
        $partner2=$row["partner2"];
        $option_pot=$row["option_pot"];
        $big_fish=$row["big_fish"];
        
        $ins_team_sql="INSERT into tourney_teams (boat_num, team_id, partner1, partner2, option_pot, big_fish) VALUES ('$boat_num','$team_id','$partner1','$partner2','$option_pot','$big_fish')";
        $status=mysqli_query($mysqli_tourney,$ins_team_sql);

        if($status == false)
        {
            die("Teams not updated");
        }

    }
}

$restore_mappings_SQL="UPDATE tourney_teams t1 INNER JOIN participant_mapping t2 ON t1.team_id = t2.team_id SET t1.participant = t2.participant";

mysqli_query($mysqli_tourney, $restore_mappings_SQL);


echo $i ." teams loaded from registration site";

?>
