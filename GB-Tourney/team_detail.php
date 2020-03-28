<?php 
include_once './includes/GBWS-functions.php';
$target='team_detail.php';

if(!isset($_COOKIE['GBWS-admin'])) {
    header('Location: index.php?page='.$target);
}

?>


<script>
function showTeam() {
	var str = document.getElementById("boat").value;
//    if (str == "") {
//        document.getElementById("txtHint").innerHTML = "";
//        return;
//    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","getTeam.php?boat_num="+str,true);
        xmlhttp.send();
//    }
}
function saveToDatabase(editableObj,column,id) {
	$.ajax({
		url: "save_team_edit.php",
		type: "POST",
		data:'column='+column+'&editval='+editableObj.innerHTML+'&id='+id,
   });
}

</script>
<!DOCTYPE html>
<html lang="en">
<head>

<link rel="stylesheet" type="text/css" href="./includes/gbws.css">
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
</head>
<body onload="showTeam()">

<h1 class="title-header">
GBWS Team Detail
</h1>

	<form class="team-form">
    	<label for="boat">Boat #</label>
   		<input class="number" id="boat" name="boat" type="number" oninput="showTeam()">
    </form>

<br>
<div id="txtHint"><b>Team info will be listed here...</b></div>
<br>

   <div class="divider"/>
    	<a href="admin_dashboard.php" class="button">Admin Dashboard</a>
   <div class="divider"/>
   
</body>
</html>
<!-- Add JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

