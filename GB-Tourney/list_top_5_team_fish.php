<?php 
include_once 'includes/GBWS-functions.php';
$target='list_top_5_team_fish.php';

if(!isset($_COOKIE['GBWS-admin'])) {
    header('Location: index.php?page='.$target);
}

?>

<html>
<head>
<script>
    function ShowFish() {
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
                    document.getElementById("Top5Fish").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","get_top_5_fish.php?boat_num="+str,true);
            xmlhttp.send();
    //    }
    }
    function saveFishToDatabase(editableObj,column,boat_num,fish_num) {
    	$.ajax({
    		url: "save_fish_edit.php",
    		type: "POST",
    		data:'column='+column+'&editval='+editableObj.innerHTML+'&boat_num='+boat_num+'&fish_num='+fish_num
       });
    	window.location.reload();
    }
</script>
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<title>GBWS Team Fish</title>
</head>
<body>

<h1 class="title-header">
Top 5 Fish by Team
</h1>

	<form action="list_top_5_team_fish.php" method="post">
    <label for="boat">Boat #</label>
    <input class="number" id="boat" name="boat" type="number" placeholder="" oninput="ShowFish()">
    </form>

        <br>
        <div id="Top5Fish"></div>
        <br>
        
    <div class="divider">
    	<a href="admin_dashboard.php" class="button">Admin Dashboard</a>
    </div>

    </body>

</html>

<!-- Add JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>