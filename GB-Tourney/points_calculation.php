<?php
include('includes/GBWS-functions.php');
include('includes/datalogin.php');

$points_field="GB";
$points_table='points';

$rankings=array();
echo "<h2> Points Update Script for ".$points_field." Tournament <br> </h2>";
$sql_drop_backup_tbl="DROP TABLE if exists points_pre_".$points_field.";";
$sql_create_backup_tbl="CREATE TABLE points_pre_".$points_field." like points;";
$sql_populate_backup_tbl="INSERT INTO points_pre_".$points_field." SELECT * FROM ".$points_table.";";

echo $sql_drop_backup_tbl."<br>";
echo $sql_create_backup_tbl."<br>";
echo $sql_populate_backup_tbl."<br>";
echo "<br>";

if ($mysqli_tourney->query('CALL sortmemberfish()') == TRUE) {
    if ($mysqli_tourney->query('CALL sort_places()') == TRUE) {
        $result_sql = "SELECT * FROM temp_places order by total_weight desc";
        $result = $mysqli_tourney->query($result_sql);
        if ($result->num_rows > 0) {
            // output data of each row
            $tbl_header=array('Place','Boat #','Team','Day 1 Fish','Day 1 Penalty','Day 1 Weight','Day 2 Fish','Day 2 Penalty','Day 2 Weight','Total Weight');
            $place=0;
            $place_position=0;
            $prev_weight=1000000;
            $pos=0;

            while($row = $result->fetch_assoc()) {
                if ($row['total_weight'] !== $prev_weight) {
                    if ($place=$place_position) {
                        $place=$place+1;
                    } else {
                        $place=$place_position+1;
                    }
                }
                $points=502-($place*2);
                $place_position=$place_position+1;
                $boat_num=$row["boat_num"];
                $team_id=$row["team_id"];
                $Partners=$row["partner1"]. " & " .$row["partner2"];
                $day_1_fish=$row["day_1_fish"];
                $day_1_penalty=$row["day_1_penalty"];
                $day_1_weight=$row["day_1_weight"];
                $day_2_fish=$row["day_2_fish"];
                $day_2_penalty=$row["day_2_penalty"];
                $day_2_weight=$row["day_2_weight"];
                $total_weight=$row["total_weight"];
                if ($total_weight < .00000000001 ) {
                    $points = 100;
                }
                $data=array($pos,$place, $boat_num, $team_id, $Partners, $day_1_fish, $day_1_penalty, $day_1_weight, $day_2_fish, $day_2_penalty, $day_2_weight, $total_weight, $points);
                $rankings[]=$data;
                $pos++;
                $prev_weight = $row['total_weight'];
            }
        } else {
            echo "0 results";
        }
    } else {
        echo "Issue sorting fish";
    }
}

$mysqli_tourney->close();
$x=0;
while ($x < count($rankings,0)) {
    $team_id=$rankings[$x][3];
    $points_val=$rankings[$x][12];
    $points_insert_sql="INSERT INTO ".$points_table." (team_id, ".$points_field.") VALUES ('".$team_id."',".$points_val.") ON DUPLICATE KEY UPDATE " .$points_field." = ".$points_val.";";
    echo $points_insert_sql."<br>";
    $x++;
    
}

/* PDF template crap to delete
// Instanciation of inherited class
$pdf = new PDF('P');
$pdf->SetLeftMargin(3);
// Column headings
$pdf->SetFont('Arial','',8);
$pdf->AddPage();
$pdf->BasicTable($tbl_header,$rankings);
$pdf->AliasNbPages();
$pdf->Output();
*/
?>