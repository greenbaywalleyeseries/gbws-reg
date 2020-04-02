<?php
include('includes/datalogin.php');
if ($_POST["editval"] == 0){
    $result=$mysqli_tourney->query('DELETE FROM reg_fish where boat_num='.$_POST["boat_num"].' and fish_num='.$_POST["fish_num"]);
} else {
    $weight_sql ='SELECT * FROM conversion where length='.$_POST["editval"];
    $result=$mysqli_tourney->query($weight_sql);
    while($row = $result->fetch_assoc()) {
        $weight=$row["weight"];
    }
    $result = $mysqli_tourney->query('UPDATE reg_fish set ' .$_POST["column"]. ' = '.$_POST["editval"].', weight='.$weight.' WHERE boat_num='.$_POST["boat_num"].' AND fish_num='.$_POST["fish_num"]);
}


?>