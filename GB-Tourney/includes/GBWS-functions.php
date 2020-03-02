<?php

function calculate_penalty($boat) {
    include('datalogin.php');
    $penalty_sql="select minutes_late from penalties where boat_num=". $boat;
    $penalties=$mysqli_tourney->query($penalty_sql);
    if ($penalties->num_rows > 0) {
        while($row = $penalties->fetch_assoc()) {
            if($row['minutes_late'] >=15) {
                $penalty = 15;
            } else {
                $penalty = $row["minutes_late"];
            }
        }
    }else {
        $penalty=0;
    }
    return $penalty;
}

function deduct_penalty($penalty, $total_weight) {
    if($penalty >=15) {
        $total_weight=0;
    } else {
        if($penalty >= $total_weight) {
            $total_weight=0;
        } else {
            $total_weight=$total_weight-$penalty;
        }
    }
    return $total_weight;
}

?>