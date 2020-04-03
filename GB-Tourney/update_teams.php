<?php
include('../php/gbws_reg_db.php');
include('includes/datalogin.php');

$tourney_id='GB';

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

$i=1;
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        
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
        $i=$i+1;
    }
}


echo $i ." teams loaded from registration site";

?>
