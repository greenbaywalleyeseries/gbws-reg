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
        function ShowAllFish() {
        	var str = document.getElementById("boat").value;
        	document.getElementById("boat2").value = str;
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
                        document.getElementById("TeamFish").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET","get_fish.php?boat_num="+str,true);
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
        function InsFishToDatabase(editableObj,column,boat_num,fish_num) {
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
        All Fish by Team
        </h1>
        
        <form action="get_fish.php" method="post">
            <label for="boat">Boat #</label>
            <input class="number" id="boat" name="boat" type="number" placeholder="" oninput="ShowAllFish()">
        </form>
        
        <!-- Begin display area for team and Fish -->
        
        <br>
        <div id="TeamFish"></div>
        <br>
        
        
        <!-- Begin area for entering new fish -->    
        <div class="entry-form">
            <form enctype="multipart/form-data" action="ins_new_fish.php" method="POST" id="form-catches">
            	<input type="hidden" name="boat2" id="boat2">
            	<table class="entry">
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
        	</form>
        </div>
                
        <div class="divider">
        	<a href="admin_dashboard.php" class="button">Admin Dashboard</a>
        </div>

    </body>

</html>

<!-- Add JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>