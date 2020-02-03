<?php
//include('gbws_reg_db.php');

function get_mbr_id() {
    include('gbws_reg_db.php');
    $sql= "CALL get_mbr_id(@mbr);";
    $result = $mysqli->query($sql);
    $mbr_result = $mysqli->query('select @mbr');
    if ($mbr_result->num_rows > 0) {
        // output data of each row
        while($row = $mbr_result->fetch_assoc()) {
            $mbr_id=$row['@mbr'];
        }
    } else {
        echo "There was a problem generating a Member_ID";
    }
    return $mbr_id;
}

function reg_mbr($sql) {
    include('gbws_reg_db.php');
    $success=0;
    if ($mysqli->query($sql) == TRUE) {
        $success=1;
        return $success;
    }
    else {
        echo '<script language="javascript">';
        echo 'alert("Problem registering member")';
        echo '</script>';
    }
}

function chk_paid($team_id) {
    include('gbws_reg_db.php');
    $team_size=0;
    $sql="select * from team_info where team_id='".$team_id."'";
    $result = $mysqli->query($sql);
    if ($result->num_rows > 0) {        
        while($row = mysqli_fetch_array($result)) {
            $partner1=$row['partner1'];
            $partner2=$row['partner2'];
            $sub1=$row['sub1'];
            $sub2=$row['sub2'];
            $paid=$row['paid'];
            if ($paid == 'X') {
                $team_size=0;
            } else {
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

    }
    return $team_size;
}

function get_team($last_name) {
    $team_info = array();
    include('gbws_reg_db.php');
    $sql="SELECT mbr_id FROM member_info WHERE last like '".$last_name."%'";
    $result = $mysqli->query($sql);
    if ($result->num_rows > 0) {
        while($row = mysqli_fetch_array($result)) {
            $mbr_id=$row['mbr_id'];
            $team_sql="SELECT * from team_info where partner1='".$mbr_id."' or partner2='".$mbr_id."' or sub1='".$mbr_id."' or sub2='".$mbr_id."'";
            $team_result = $mysqli->query($team_sql);
            if ($team_result->num_rows > 0) {
                while($team_row = mysqli_fetch_array($team_result)) {
                    print_r($team_row);
                }
            
            }
            
        }
    }
    //print_r($team_info);
    return $team_info;
}

function get_mbr_info($mbr_id) {
    include('gbws_reg_db.php');
    $sql="select * from member_info where mbr_id='".$mbr_id."'";
    $result = $mysqli->query($sql);
    return $result;
}




?>