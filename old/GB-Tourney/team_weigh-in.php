<?php 
include_once 'includes/GBWS-functions.php';
$target='team_weigh-in.php';

if(!isset($_COOKIE['GBWS-admin'])) {
    header('Location: index.php?page='.$target);
}

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta charset="ISO-8859-1">
<title>GBWS Team Weigh-in</title>
</head>
<body>

<h1 class="title-header">
GBWS Team Weigh-in
</h1>

<form enctype="multipart/form-data" action="apply_team_weigh-in.php" method="POST" id="form-marinette-weign-in">

<div class="entry-form">
<label for="boat">Boat #</label>
<input class="number" id="boat" name="boat" type="number" placeholder="" required>

<br>
<br>
<label for="weighin">Weigh-in</label> </th>
<input id="weighin" name="penalty" type="checkbox" placeholder="" required></th>
<br>
<br>

					<div style="text-align:left; margin-top:10px; margin-bottom:10px;">

							<button type="submit" name="upload" class="small_button">SUBMIT</button>
					</div>
</form>
</div>
    	<a href="admin_dashboard.php" class="button">Admin Dashboard</a>
   <div class="divider"/>
</body>
</html>