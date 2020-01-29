<?php
    include('gbws_reg_db.php');
    $team_id='2020-59';
    $team_size=0;
    $sql="select * from team_info where team_id='".$team_id."'";
    $result = $mysqli->query($sql);
    if ($result->num_rows > 0) {        
        while($row = mysqli_fetch_array($result)) {
            $partner1=$row['partner1'];
            $partner2=$row['partner2'];
            $sub1=$row['sub1'];
            $sub2=$row['sub2'];
            if (strlen($partner1) > 1){
                $team_size+=1;
            }
            if (strlen($partner2) > 1){
                $team_size+=1;
            }
            if (strlen($sub1) > 1){
                $team_size+=1;
            }
            if (strlen($sub2) > 1){
                $team_size+=1;
            }
        }

    }
    echo $team_size;
?>