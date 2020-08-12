<?php 
include_once 'includes/GBWS-functions.php';
$target='Admin_Dashboard.php';

if(!isset($_COOKIE['GBWS-admin'])) {
    header('Location: index.php?page='.$target);
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="includes/gbws.css">
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta charset="ISO-8859-1">
<title>GBWS Admin Dashboard</title>
</head>
    <body>
        	<a href="update_teams.php" class="button">Update Teams from Registration Database</a>
       <div class="divider"></div>
        	<a href="team_detail.php" class="button">Team Detail</a>
       <div class="divider"></div>
           	<a href="import_file.html" class="button">Upload Day 1 CSV from Fish Donkey</a>
       <div class="divider"></div>
            <a href="import_file.html" class="button">Upload Day 2 CSV from Fish Donkey</a>
       <div class="divider"></div>
    <!--        	<a href="leader_after_weigh_in_pdf.php" class="button">Current Standings</a>
       <div class="divider"></div>
     -->
     
        	<a href="two_day_leaderboard_pdf.php" class="button">Current Leaderboard</a>
       <div class="divider"></div>
        	<a href="list_top_5_team_fish.php" class="button">Top 5 Fish by Team</a>
       <div class="divider"></div>
    <!--    	<a href="team_weigh-in.php" class="button">Team Weigh-in</a>
        <div class="divider"></div>
    		<a href="team_penalty.php" class="button">Enter Team Penalty</a>
    	<div class="divider"></div>
     -->
            <a href="two_day_results_pdf.php" class="button">Generate Final Results</a>
       <div class="divider"></div>
       		<a href="points_calculation.php" class="button">Calculate Points</a>
       <div class="divider"></div>
       
    <!--  	<a href="reg_fish_no_pics.php" class="button">Enter Fish (No Pictures)</a>
    		<div class="divider"/> 
    		<a href="list_pending_fish.php" class="button">All Pending Fish</a>
            <div class="divider"/>
    
    		<a href="set_pwd.php" class="button">Set Team Password</a>
     		<a href="list_denied_fish.php" class="button">All Denied Fish</a>
            <div class="divider"/>
        	<a href="list_deferred_fish.php" class="button">All Deferred Fish</a>
            <div class="divider"/> -->
    	<div class="text">
    		
    	</div>
    </body>
</html>

