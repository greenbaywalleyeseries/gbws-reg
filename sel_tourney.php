	<?php
        include('php/gbws_reg_db.php');
        include('php/functions.php');

        mysqli_select_db($mysqli,"gbws_reg");
        $team_id = $_GET['team_id'];
        $team_reg = $_GET['team_reg'];
        
        $sql="select * from team_info where team_id='".$team_id."'";
        $result = $mysqli->query($sql);
        while($row = mysqli_fetch_array($result)) {
            $partner1_id=$row['partner1'];
            $partner2_id=$row['partner2'];
            $sub1_id=$row['sub1'];
            $sub2_id=$row['sub2'];
        }
        if (isset($partner1_id)) {
            $partner1=get_mbr_info($partner1_id);
            while ($row = mysqli_fetch_array($partner1)) {
                $first=$row['first'];
                $last=$row['last'];
                $partner1_name=$first." ".$last;
            }
        }
        if (isset($partner1_id)) {
            $partner2=get_mbr_info($partner2_id);
            while ($row = mysqli_fetch_array($partner2)) {
                $first=$row['first'];
                $last=$row['last'];
                $partner2_name=$first." ".$last;
            }
        }
        if (isset($sub1_id)) {
            $sub1=get_mbr_info($sub1_id);
            while ($row = mysqli_fetch_array($sub1)) {
                $first=$row['first'];
                $last=$row['last'];
                $sub1_name=$first." ".$last;
            }
        }
        if (isset($sub2_id)) {
            $sub2=get_mbr_info($sub2_id);
            while ($row = mysqli_fetch_array($sub2)) {
                $first=$row['first'];
                $last=$row['last'];
                $sub2_name=$first." ".$last;
            }
        }
    ?>

<!doctype html>
<html lang="en">

  <head>
  	<script src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript">
    	team_info= new Array();
    	var items = new Array();
    	var total=0;
    	var team_reg=<?php echo $team_reg ?>;
    	var team_id="<?php echo $team_id ?>";
    	var partner1='<?php echo $partner1_name ?>';
    	var partner2='<?php echo $partner2_name ?>';
    </script>
    <script type="text/javascript" src="js/gbws-functions.js"></script>
    <script>
        document.addEventListener('readystatechange', event => {
    
            if (event.target.readyState === "interactive") {   //same as:  ..addEventListener("DOMContentLoaded".. and   jQuery.ready
            	if ( team_reg > 0 ) {
            		var regitem = "Registration-(X" +team_reg+ ")";
            		var regdesc = "2020 GBWS Registration";
            		var regtotal = team_reg * 40;
            	
            			items.push({
               	    		check_box: regitem,
               	    		desc: regdesc,
               	    		cost: regtotal 
            			});
             			UpdateTotal();
             			document.getElementById("registrations").value = team_reg; 
            	}
            }
        });
    </script>

    <title>Green Bay Walleye Series</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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

  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    <div class="site-wrap" id="home-section">
      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>

      <header class="site-navbar site-navbar-target" role="banner">

        <div class="container">
          <div class="row align-items-center position-relative">

            <div class="col-4 ">
              <div class="site-logo">
                <a href="index.html" class="font-weight-bold">Green Bay Walleye Series</a>
              </div>
            </div>

            <div class="col-6  text-right">

              <span class="d-inline-block d-lg-block"><a href="#" class="text-white site-menu-toggle js-menu-toggle py-5 text-white"><span class="icon-menu h3 text-white"></span></a></span>

              <nav class="site-navigation text-right ml-auto d-none d-lg-none" role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto ">
                  <li><a href="index.html" class="nav-link">Home</a></li>
                  <li class="active"><a href="registration.html" class="nav-link">Registration</a></li>
                  <li><a href="payouts.html" class="nav-link">Payouts</a></li>
                  <li><a href="standings.html" class="nav-link">Standings</a></li>
                  <li><a href="documents/green_bay_walleye_series_rules.pdf" class="nav-link">Rules</a></li>
                  <li><a href="documents/green_bay_walleye_series_length_to_weight_conversion_chart.pdf" class="nav-link">Conversion Chart</a></li>
                  <li><a href="index.html#sponsors" class="nav-link">Sponsors</a></li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </header>

	<div class="ftco-blocks-cover-1">
      <div class="site-section-cover overlay" style= "background-image: url('images/gbws_background.jpg')"> 
        <div class="container">
        	<div class="row align-items-center justify-content-center">
            	<div class="col-md-12 text-center">
              		<h1 class="md-12 text-white">Tournament Registration</h1>
            	</div>
			</div>
        </div>
      </div>
	</div> 
    
    <div class="site-section">
	    <div class="col-12 col-md-12">
	       <!--<form name="TourneyForm" id="TourneyForm" action="https://www.sandbox.paypal.com/cgi-bin/webscr" onsubmit="formValidation('X')"  method="post"> -->
            <form name="TourneyForm" id="TourneyForm" action="https://www.paypal.com/cgi-bin/webscr" onsubmit="formValidation('<?php echo $team_id;?>')"  method="post">
            	<input type="hidden" name="business" value="gbwalleyeseries@gmail.com">
                <!-- <input type="hidden" name="cpp_header_image" value="https://www.yourwebsite.com/logo.jpg"> -->
            	<input type="hidden" name="cancel_return" value="http://www.greenbaywalleyeseries.com/online-registration.html">
                <input type="hidden" name="return" value="http://www.greenbaywalleyeseries.com">
                <input type="hidden" name="cmd" value="_cart">
                <input type="hidden" name="currency_code" value="USD">
                <input type="hidden" name="cn" value="">
                <input type="hidden" name="no_note" value="0">
                <input type="hidden" name="upload" value="1">
                <input type="hidden" name="custom" id="custom">
                <input type="hidden" name="team_id" id="team_id" value="<?php echo $team_id;?>">
                
                <div class="form-row">
                    <div class="col-3 col-md-3 text center">
                    	<p>Team Member 1: <?php
                    	   if (isset($partner1_name)) {
                    	       echo $partner1_name;
                    	   }?></p>
                    </div>
                    <div class="col-3 col-md-3 text center">
                    	<p>Team Member 2: <?php
                    	   if (isset($partner2_name)) {
                    	       echo $partner2_name;
                    	   }?></p>
                    </div>
                    <div class="col-3 col-md-3 text center">
                    	<p>First Sub: <?php
                    	   if (isset($sub1_name)) {
                    	       echo $sub1_name;
                    	   }?></p>
                    </div>
                    <div class="col-3 col-md-3 text center">
                    	<p>Second Sub: <?php
                    	   if (isset($sub2_name)) {
                    	       echo $sub2_name;
                    	   }?></p>
                    </div>
                </div>
                <hr>
                <div class="form-row mb-3">
                    <div class="col-6 col-md-4 text-center">
        				GBWS Membership Registration 
        				($40 per team member): 
        			</div>
        			<div class="col-1 col-md-1 text-center align-middle">
        				<input type="text" size="1" id="registrations" name="registrations" value="0" disabled/>
        			</div>
    			</div>
    			<hr>
    			<div class="form-row">
    				<div class="col-3  col-md-2">
    			
    				</div>
    				<div class="col-3  col-md-2 text-center">
    					<p>Tournament<br>$410</p>
    				</div>
    				<div class="col-3 col-md-2 text-center">
    					<p>Option Pot - 100% Payback<br>$200</p>
    				</div>
    				<div class="col-3  col-md-2 text-center">
    					<p>Big Fish<br>$20</p>
    				</div>
    				<div class="col-6  col-md-2 text-center">
    					<p>Partner #1</p>
    				</div>
    				<div class="col-6  col-md-2 text-center">
    					<p>Partner #2</p>
    				</div>
    			</div>
    
                <?php
                   $tourney_sql="SELECT * FROM tourneyinfo WHERE second_date IS NULL";
                    $tourney_result = mysqli_query($mysqli,$tourney_sql);
                    
                    while($tourney = mysqli_fetch_array($tourney_result)) {
                        $date=date_create($tourney['start_date']);
                        $description=date_format($date, 'F d') ." - " . $tourney['location'];
                        $tourney_fee=$tourney["entry_fee"];
                        $option_fee=$tourney["option_fee"];
                        $big_fish_fee=$tourney["big_fish_fee"];
                        
                        
                        echo '<div class="form-row">';
                            echo '<div class="col-3  col-md-2">';
                                echo '<p>'. $description .'</p>';
                            echo '</div>';
                            echo '<div class="col-3  col-md-2 text-center">';
                                echo '<input type="checkbox" id=' . $tourney["local"] . '-Tourney value="' . $tourney_fee . '" onclick="UpdateCart(\''.$tourney["local"].'-Tourney\',\''.$description.' Registration'.'\','. $tourney_fee.')">';
                            echo '</div>';
                            echo '<div class="col-3  col-md-2 text-center">';
                                echo '<input type="checkbox" id=' . $tourney["local"] . '-Option value="' .$option_fee. '" onclick="UpdateCart(\''.$tourney["local"].'-Option\',\''.$description.' Option Pot'.'\','. $option_fee.')">';
                            echo '</div>';
                            echo '<div class="col-3  col-md-2 text-center">';
                                echo '<input type="checkbox" id=' . $tourney["local"] . '-Fish value="' .$big_fish_fee. '" onclick="UpdateCart(\''.$tourney["local"].'-Fish\',\''.$description.' Big Fish'.'\','. $big_fish_fee.')">';
                            echo '</div>';
                            echo '<div class="col-6  col-md-2 text-center">';
                                echo '<select name="'.$tourney["local"].'-Partner1" id="'.$tourney["local"].'-Partner1">';
                                    echo '<option value='.$partner1_id.'>'.$partner1_name.'</option>';
                                    echo '<option value='.$sub1_id.'>'.$sub1_name.'</option>';
                                    echo '<option value='.$sub2_id.'>'.$sub2_name.'</option>';
                                echo '</select>';
                            echo '</div>';
                            echo '<div class="col-6  col-md-2 text-center">';
                                echo '<select name="'.$tourney["local"].'-Partner2" id="'.$tourney["local"].'-Partner2">';;
                                    echo '<option value='.$partner2_id.'>'.$partner2_name.'</option>';
                                    echo '<option value='.$sub1_id.'>'.$sub1_name.'</option>';
                                    echo '<option value='.$sub2_id.'>'.$sub2_name.'</option>';
                                echo '</select>';
                            echo '</div>';
                        echo '</div>';
    
                    }
              ?>
                    
              <div class="form-row">
    				<div class="col-3  col-md-2">
    			
    				</div>
    				<div class="col-3  col-md-2 text-center">
    					<p>Championship Tournament<br>$510</p>
    				</div>
    				<div class="col-3  col-md-2 text-center">
    					<p>Option Pot - 100% Payback<br>$200</p>
    				</div>
    				<div class="col-3  col-md-2 text-center">
    					<p>Big Fish<br>$40</p>
    				</div>
    				<div class="col-6  col-md-2 text-center">
    					<p>Partner #1</p>
    				</div>
    				<div class="col-6  col-md-2 text-center">
    					<p>Partner #2</p>
    				</div>
    			</div>
    
                <?php
                    $tourney_sql="SELECT * FROM tourneyinfo WHERE second_date IS NOT NULL";
                    $tourney_result = mysqli_query($mysqli,$tourney_sql);
                    while($tourney = mysqli_fetch_array($tourney_result)) {
                        $date=date_create($tourney['start_date']);
                        $second_date=date_create($tourney['second_date']);
                        $description=date_format($date, 'F d') . " - " . date_format($second_date, 'd') ." - " . $tourney['location'];
                        $tourney_fee=$tourney["entry_fee"];
                        $option_fee=$tourney["option_fee"];
                        $big_fish_fee=$tourney["big_fish_fee"];
                        echo '<div class="form-row">';
                            echo '<div class="col-3  col-md-2">';
                                echo '<p>'. $description .'</p>';
                            echo '</div>';
                            echo '<div class="col-3  col-md-2 text-center">';
                                echo '<input type="checkbox" id=' . $tourney["local"] . '-Tourney value="' . $tourney_fee . '" onclick="UpdateCart(\''.$tourney["local"].'-Tourney\',\''.$description.' Registration'.'\','. $tourney_fee.')">';
                            echo '</div>';
                            echo '<div class="col-3  col-md-2 text-center">';
                                echo '<input type="checkbox" id=' . $tourney["local"] . '-Option value="' .$option_fee. '" onclick="UpdateCart(\''.$tourney["local"].'-Option\',\''.$description.' Option Pot'.'\','. $option_fee.')"></td>';
                            echo '</div>';
                            echo '<div class="col-3  col-md-2 text-center">';
                                echo '<input type="checkbox" id=' . $tourney["local"] . '-Fish value="' .$big_fish_fee. '" onclick="UpdateCart(\''.$tourney["local"].'-Fish\',\''.$description.' Big Fish'.'\','. $big_fish_fee.')"></td>';
                            echo '</div>';                          
                            echo '<div class="col-6  col-md-2 text-center">';
                                echo '<select name="'.$tourney["local"].'-Partner1" id="'.$tourney["local"].'-Partner1">';
                                    echo '<option value='.$partner1_id.'>'.$partner1_name.'</option>';
                                        echo '<option value='.$sub1_id.'>'.$sub1_name.'</option>';
                                        echo '<option value='.$sub2_id.'>'.$sub2_name.'</option>';
                                echo '</select>';
                            echo '</div>';
                            echo '<div class="col-6  col-md-2 text-center">';
                                echo '<select name="'.$tourney["local"].'-Partner2" id="'.$tourney["local"].'-Partner2">';;
                                    echo '<option value='.$partner2_id.'>'.$partner2_name.'</option>';
                                    echo '<option value='.$sub1_id.'>'.$sub1_name.'</option>';
                                    echo '<option value='.$sub2_id.'>'.$sub2_name.'</option>';
                                echo '</select>';
                            echo '</div>';
                        echo '</div>';
                    }
                    mysqli_close($mysqli);
                ?>
                <hr>
    			<div class="form-row"> 
    				<div class="col-2 col-md-2">
    					Total: $<input type="text" size="5" id="total" name="total" value="0" disabled/>
    				</div>
    				<div class="col-4 col-md-2 text-center">
						<input type="submit" class="btn btn-block btn-primary text-white py-3 px-2" value="Submit">
					</div>
				</div>
			</form>
		</div>

	</div>

	</div>

    <footer class="site-footer">
      <div class="container">
        <div class="row">

          <div class="col-lg-8 ml-auto">
            <div class="row">
              <div class="col-lg-6 ml-auto">
                <h2 class="footer-heading mb-4">Quick Links</h2>
                <ul class="list-unstyled">
                  <li><a href="index.html">Home</a></li>
                  <li><a href="registration.html">Registration</a></li>
                  <li><a href="payouts.html">Payouts</a></li>
                  <li><a href="standings.html">Standings</a></li>
                  <li><a href="documents/green_bay_walleye_series_rules.pdf">Rules</a></li>
                  <li><a href="documents/green_bay_walleye_series_length_to_weight_conversion_chart.pdf">Conversion Chart</a></li>
                  <li><a href="index.html#sponsors" >Sponsors</a></li>
                </ul>
              </div>
              <div class="col-lg-6">
                <h2 class="footer-heading mb-4">Connect</h2>
                <div class="social_29128 white mb-5">
                  <a href="https://www.facebook.com/Green-Bay-Walleye-Series-144013216238093/"><span class="icon-facebook"></span></a>  
                  <a href="https://www.instagram.com/greenbaywalleyeseries/"><span class="icon-instagram"></span></a>  
                  <!-- <a href="#"><span class="icon-twitter"></span></a> -->  
                  <a href="mailto:gbwalleyeseries@gmail.com"><span class="icon-envelope"></span></a>
                 </div>
              </div>
              
            </div>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
              <p>
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved 
            </p>
            </div>
          </div>

        </div>
      </div>
    </footer>



    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/aos.js"></script>

    <script src="js/main.js"></script>


  </body>

</html>

