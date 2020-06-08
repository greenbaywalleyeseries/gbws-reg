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

function TourneyDuration() {
    include('includes/datalogin.php');
    $dates_sql='select DATE_FORMAT(Day1, "%M %d, %Y") as Day1, DATE_FORMAT(Day2, "%M %d, %Y") as Day2 from tourney_info';;
    $dates_result = $mysqli_tourney->query($dates_sql);
    foreach ($dates_result as $row):
    $Day1=$row['Day1'];
    $Day2=$row['Day2'];
    if (isset($Day2)) {
        $duration=2;
    } else {
        $duration=1;
    }
    
    endforeach;
    
    return $duration;
    
}

function TourneyDates() {
    include('includes/datalogin.php');
    $dates_sql='select DATE_FORMAT(Day1, "%M %d, %Y") as Day1, DATE_FORMAT(Day2, "%M %d, %Y") as Day2 from tourney_info';;
    $dates_result = $mysqli_tourney->query($dates_sql);
    foreach ($dates_result as $row):
        $Day1=$row['Day1'];
        $Day2=$row['Day2'];
        if (isset($Day2)) {
            $dates=$Day1 ." - ".$Day2;
        } else {
            $dates=$row['Day1'];
        }
        
    endforeach;
    
    return $dates;
    
}
    

?>