<?php 
include_once 'includes/GBWS-functions.php';
$target='reg_fish.php';

if(!isset($_COOKIE['GBWS-admin'])) {
    header('Location: index.php?page='.$target);
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta charset="ISO-8859-1">
	<title>GBWS Fish Registration</title>
</head>
<body>

	<h1 class="title-header">GBWS Fish Registration</h1>
	
	

	<form enctype="multipart/form-data" action="submit_fish.php" method="POST" id="form-catches">

		<div class="entry-form">
			<table class="entry">
    			<tr>
        			<th><label for="boat">Boat #</label>  </th>
        			<th align="left"><input class="number" id="boat" name="boat" type="number" required></th>
    			</tr>
    			<tr>
        			<td></td>
					<td></td>
					<th align="center">0</th>
					<th align="center">1/4"</th>
					<th align="center">1/2"</th>
					<th align="center">3/4"</th>
    			</tr>
    			<tr>
        			<th><label for="Length">Length</label> </th>
					<th align="left"><input class="number" id="length" name="length" type="number" min="15" placeholder="" required></th>
        			<td align="center"><input type="radio" name="length2" id="length2-0" value=".0" checked="checked"></td>
        			<td align="center"><input type="radio" name="length2" id="length2-1" value=".25"></td>
					<td align="center"><input type="radio" name="length2" id="length2-2" value=".5"></td>
					<td align="center"><input type="radio" name="length2" id="length2-3" value=".75"></td>
    			</tr>
   			</table>

 	<input id="page" type="hidden" name="page" value="reg_fish.php" />
					<div style="text-align:left; margin-top:10px; margin-bottom:10px;">


							<button type="submit" name="upload" >SUBMIT</button>
					</div>

		</div>
	</form>

   <div class="divider">
    	<a href="Admin_Dashboard.php" class="button">Admin Dashboard</a>
	</div>
   
</body>
</html>