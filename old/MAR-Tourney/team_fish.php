<?php 
include_once 'includes/GBWS-functions.php';
$target='team_fish.php';

$duration=TourneyDuration();
if ($duration == 1) {
    $tgt_page= 'one_day_dashboard.php';
}
if ($duration == 2) {
    $tgt_page= 'two_day_dashboard.php';
}  

if(!isset($_COOKIE['GBWS-admin'])) {
    header('Location: index.php?page='.$target);
}

?>

<html>
    <head>
    <link rel="stylesheet" type="text/css" href="includes/gbws.css">
    <script>
        function ShowAllFish() {
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
        	ShowAllFish();
        }

        function NewFish() {
            var length = document.getElementById("length").value;
            var boat = document.getElementById("boat").value
            var ele = document.getElementsByName('length2'); 
            for(i = 0; i < ele.length; i++) { 
            	if(ele[i].checked) 
                	var length2 = ele[i].value; 
            } 
            var dataString = 'length='+ length + '&length2=' + length2 + '&boat=' + boat;
            jQuery.ajax({
                url: "ins_new_fish.php",
                data: dataString,
                type: "POST",
                success: function(data){
                    $("#myForm").html(data);
                },
                error: function (){}
            });
        ShowAllFish();
        return true;

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
            <form enctype="multipart/form-data" method="POST" action="" id="form-catches">
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
            			<td align="center"><input type="radio" name="length2" id="length2" value=".0" checked="checked"></td>
            			<td align="center"><input type="radio" name="length2" id="length2" value=".25"></td>
            			<td align="center"><input type="radio" name="length2" id="length2" value=".5"></td>
            			<td align="center"><input type="radio" name="length2" id="length2" value=".75"></td>
            		</tr>
            	</table>
            
             	<input id="page" type="hidden" name="page" value="reg_fish.php" />
            	<div style="text-align:left; margin-top:10px; margin-bottom:10px;">
            	<input type="button" onclick="return NewFish();"value="Submit">
            	</div>
        	</form>
        </div>
                
        <div class="divider">
        	<a href="<?php echo $tgt_page ?>" class="button">Admin Dashboard</a>
        </div>

    </body>

</html>

<!-- Add JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>