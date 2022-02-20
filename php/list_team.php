<!DOCTYPE html>
<html>

    <head>
    	<meta charset="UTF-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Muli:400,700" rel="stylesheet">
        <link rel="stylesheet" href="fonts/icomoon/style.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-datepicker.css">
        <link rel="stylesheet" href="css/jquery.fancybox.min.css">
        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <link rel="stylesheet" href="css/owl.theme.default.min.css">
        <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
        <link rel="stylesheet" href="css/aos.css">
    
        <!-- MAIN CSS -->
        <link rel="stylesheet" href="css/style.css">

    </head>
    
    <body>
    
    	<?php
            include('gbws_reg_db.php');
            include('functions.php');
            mysqli_select_db($mysqli,"gbws_reg");

            $last_name = $_GET['last_name'];

            $result = get_team($last_name);
            
            echo '
    <div class="site-section">
        <div class="col-8 col-md-8">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Team Number</th>
        <th>Captain</th>
        <th>Co-Angler</th>
        <th>Sub</th>
<!--        <th>Sub #2</th> -->
      </tr>
    </thead>
    <tbody>';
            
                $length= sizeof($result);
                if ($length > 0) {
                    foreach ($result as $row) {
                        $Team_ID=$row['team_id'];
                        $team_size=chk_paid($Team_ID);
                        $partner1_id=$row['partner1'];
                        $partner2_id=$row['partner2'];
                        $sub1_id=$row['sub1'];
                        $sub2_id=$row['sub2'];
                    
                        $partner1=get_mbr_info($partner1_id);
                        while($mbr1 = mysqli_fetch_array($partner1)) {
                            $Partner1=$mbr1['first'] ." ".$mbr1['last'];
                            $Partner1_URL='<a href="sel_tourney.php?team_id=' .$Team_ID. '&team_reg=' .$team_size. '">'.$Partner1.'</a>';
                        }
                        
                        $partner2=get_mbr_info($partner2_id);
                        while($mbr2 = mysqli_fetch_array($partner2)) {
                            $Partner2=$mbr2['first'] ." ".$mbr2['last'];
                            $Partner2_URL='<a href="sel_tourney.php?team_id=' .$Team_ID. '&team_reg=' .$team_size. '">'.$Partner2.'</a>';
                        }
                        
                        if("" == trim($sub1_id)){
                            $Sub1_URL='';
                        } else {
                            $sub1=get_mbr_info($sub1_id);
                            while($mbr3 = mysqli_fetch_array($sub1)) {
                                $Sub1=$mbr3['first'] ." ".$mbr3['last'];
                                $Sub1_URL='<a href="sel_tourney.php?team_id=' .$Team_ID. '&team_reg=' .$team_size. '">'.$Sub1.'</a>';
                            }
                        }
                        if("" == trim($sub2_id)){
                            $Sub2_URL='';
                        } else {
                            $sub2=get_mbr_info($sub2_id);
                            while($mbr4 = mysqli_fetch_array($sub2)) {
                                $Sub2=$mbr4['first'] ." ".$mbr4['last'];
                                $Sub2_URL='<a href="sel_tourney.php?team_id=' .$Team_ID. '&team_reg=' .$team_size. '">'.$Sub2.'</a>';
                            }
                        }
    
                        $Team_URL='<a href="sel_tourney.php?team_id=' .$Team_ID. '&team_reg=' .$team_size. '">'.$Team_ID.'</a>';
    
                        echo '
        <tr>
            <td>' .$Team_URL .'</td>
            <td>' .$Partner1_URL .'</td>
            <td>' .$Partner2_URL .'</td>
            <td>' .$Sub1_URL .'</td>
<!--             <td>' .$Sub2_URL .'</td> -->
        </tr>';
                    }
                echo '
                    </tbody>
                </table>
        </div>
    </div>

';
                


                }

                
            mysqli_close($mysqli);
        ?>
        
    </body>
    
</html>