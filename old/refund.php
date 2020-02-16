<?php
    include('gbws_reg_db.php');
    if ($_POST['action'] == "refund") {
        $refund_sql="update team_info set refund='X' where team_id='".$_POST['team_id']."'";
        $mysqli->query($refund_sql);
    }

    if ($_POST['action'] == "roll") {
        $refund_sql="update team_info set refund=NULL where team_id='".$_POST['team_id']."'";
        $mysqli->query($refund_sql);
    }
?>