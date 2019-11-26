<html>

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="membership.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
include('gbws_reg_db.php');
mysqli_select_db($mysqli,"gbws_reg");
$team_id = $_GET['team_id'];
$new_team = $_GET['new_team'];
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
team_info= new Array();
var items = new Array();
var total=0;

function CheckPartner(first, last, chkbox) {
	var team_size = Object.keys(team).length;
	if (team_size == 2)
	{
		alert('Only two team members may be selected') 
		document.TourneyForm; 
		document.getElementById(chkbox).checked = false;
	}
	else if (team_size == 1)
	{
		team.push({"first":first, "last":last});
		document.getElementById("partner2_first").value = team[1]["first"];
		document.getElementById("partner2_last").value = team[1]["last"];
	}
	else if (team_size == 0)
	{
		team = [{"first":first, "last":last}];
		document.getElementById("partner1_first").value = team[0]["first"];
		document.getElementById("partner1_last").value = team[0]["last"];
	}
}


function KeepCount(last_checked) {
	team = new Array();
	if (document.TourneyForm.partner1.checked)
	{
		CheckPartner(team_info.first[0], team_info.last[0], last_checked);
	}
	if (document.TourneyForm.partner2.checked)
	{
		CheckPartner(team_info.first[1], team_info.last[1], last_checked);
	}
	var arrayLength = team_info.position.length-2;
	{
		for (var i = 1; i <= arrayLength; i++) 
		{
			var obj = "sub"+i;
			if (document.getElementById(obj).checked)
			{
				var j=i+1;
				CheckPartner(team_info.first[j], team_info.last[j], last_checked);
			}
		}
	}
}

function UpdateCart(chkbox_name,description,cost){
	var chk_box_sel=document.getElementById(chkbox_name).checked;
	if (chk_box_sel == true) {
 		var params = "team_id=" + document.getElementById('team_id').value + "&field=" + chkbox_name;
 		$.ajax({
 			url: 'functions/parseItemNumber.php',
 			type: 'POST',
 			data: params,
 		    success: function(response) {
			    if(response == "1") {
 				    alert("This team is already registered for this tournament");
 				    document.getElementById(chkbox_name).checked = false;
 			    } else {
             		items.push({
	               		check_box: chkbox_name,
    	           		desc: description,
        	       		cost: cost        	       		
            		});
             		UpdateTotal();
              	}
 			}
 		});
	}
	if (chk_box_sel == false) {
    	for (var i = 0; i < items.length; i++) {
        	if (items[i].check_box == chkbox_name) {
            	items.splice(i, 1);
        	}
    	}
    	UpdateTotal();
	}
}

function UpdateTotal()
{
	var total=0;
 	for (var i = 0; i < items.length; i++) {
 		var j=i+1;
 		var item_number = "\"item_nbr_"+[j]+"\"" ;
     	var item_name = "\"item_"+[j]+"\"" ;
     	var item_amount = "\"amt_"+[j]+"\"" ;
 		document.getElementById(eval(item_number)).value = items[i].check_box;
 		document.getElementById(eval(item_name)).value = items[i].desc;
 		document.getElementById(eval(item_amount)).value = items[i].cost;
		total = total + items[i].cost;
		console.log(total);
 	}
	document.getElementById("total").value = total; 	
}

function formValidation(team_num)
{
	var team_size = Object.keys(team).length;
	if (team_size != 2)
	{
		alert('Select Two Team Members');
		event.preventDefault();
	} else {
		var custom_text = team_num + ";" + team[0].first + " " + team[0].last + ";" + team[1].first + " " + team[1].last;
		document.getElementById("custom").value = custom_text;
	}
}

</script>

</head>

<body onload="KeepCount('partner2')">
<h1>GBWS Tournament Registration</h1>

        <form name="TourneyForm" action="3-confirm_tourney_reg.php" onsubmit="formValidation('<?php echo $team_id;?>')"  method="post">
        <!--<form name="TourneyForm" target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">-->
        <input type="hidden" name="business" value="gbwalleyeseries-facilitator@gmail.com">
        <!-- <input type="hidden" name="cpp_header_image" value="https://www.yourwebsite.com/logo.jpg"> -->
        <input type="hidden" name="cancel_return" value="http://www.greenbaywalleyeseries.com/online-registration.html">
        <input type="hidden" name="return" value="http://www.greenbaywalleyeseries.com">
        <input type="hidden" name="cmd" value="_cart">
        <input type="hidden" name="currency_code" value="USD">
        <input type="hidden" name="cn" value="">
        <input type="hidden" name="no_note" value="0">
        <input type="hidden" name="upload" value="1">
        <input type="hidden" name="custom" id="custom">
        <input type="hidden" name="amount_1" id="amt_1">
        <input type="hidden" name="amount_2" id="amt_2">
        <input type="hidden" name="amount_3" id="amt_3">
        <input type="hidden" name="amount_4" id="amt_4">
        <input type="hidden" name="amount_5" id="amt_5">
        <input type="hidden" name="amount_6" id="amt_6">
        <input type="hidden" name="amount_7" id="amt_7">
        <input type="hidden" name="amount_8" id="amt_8">
        <input type="hidden" name="amount_9" id="amt_9">
        <input type="hidden" name="amount_10" id="amt_10">
        <input type="hidden" name="amount_11" id="amt_11">
        <input type="hidden" name="amount_12" id="amt_12">
        <input type="hidden" name="amount_13" id="amt_13">
        <input type="hidden" name="amount_14" id="amt_14">
        <input type="hidden" name="item_number_1" id="item_nbr_1">
        <input type="hidden" name="item_number_2" id="item_nbr_2">
        <input type="hidden" name="item_number_3" id="item_nbr_3">
        <input type="hidden" name="item_number_4" id="item_nbr_4">
        <input type="hidden" name="item_number_5" id="item_nbr_5">
        <input type="hidden" name="item_number_6" id="item_nbr_6">
        <input type="hidden" name="item_number_7" id="item_nbr_7">
        <input type="hidden" name="item_number_8" id="item_nbr_8">
        <input type="hidden" name="item_number_9" id="item_nbr_9">
        <input type="hidden" name="item_number_10" id="item_nbr_10">
        <input type="hidden" name="item_number_11" id="item_nbr_11">
        <input type="hidden" name="item_number_12" id="item_nbr_12">
        <input type="hidden" name="item_number_13" id="item_nbr_13">
        <input type="hidden" name="item_number_14" id="item_nbr_14">
        <input type="hidden" name="item_name_1" id="item_1">
        <input type="hidden" name="item_name_2" id="item_2">
        <input type="hidden" name="item_name_3" id="item_3">
        <input type="hidden" name="item_name_4" id="item_4">
        <input type="hidden" name="item_name_5" id="item_5">
        <input type="hidden" name="item_name_6" id="item_6">
        <input type="hidden" name="item_name_7" id="item_7">
        <input type="hidden" name="item_name_8" id="item_8">
        <input type="hidden" name="item_name_9" id="item_9">
        <input type="hidden" name="item_name_10" id="item_10">
        <input type="hidden" name="item_name_11" id="item_11">
        <input type="hidden" name="item_name_12" id="item_12">
        <input type="hidden" name="item_name_13" id="item_13">
        <input type="hidden" name="item_name_14" id="item_14">
        <input type="hidden" name="team_id" id="team_id" value="<?php echo $team_id;?>">
        <input type="hidden" name="partner1_first" id="partner1_first">
        <input type="hidden" name="partner1_last" id="partner1_last">
        <input type="hidden" name="partner2_first" id="partner2_first">
        <input type="hidden" name="partner2_last" id="partner2_last">
        
        Please select the two team members that will be fishing the event(s) you will be registering for:
        <br>
        
        <?php
        include('gbws_reg_db.php');
        $sql="SELECT * FROM teaminfo WHERE team_id='".$team_id."'";
        $result = mysqli_query($mysqli,$sql);
        echo "<table>";
        while($row = mysqli_fetch_array($result)) {
            echo '<script>
                var team_info = [];
                team_info.position = ["Partner1"];
                team_info.position.push("Partner2");
                team_info.first = ["'.$row['partner1_first'].'"]; 
                team_info.first.push("'.$row['partner2_first'].'"); 
                team_info.last = ["'.$row['partner1_last'].'"]; 
                team_info.last.push("'.$row['partner2_last'].'"); 
            </script>';
            echo '<tr><td>Partner 1: ' .$row['partner1_first'].' '.$row['partner1_last'].' </td><td align="center"><input type="checkbox" id="partner1" value=partner1 checked onchange="KeepCount(\'partner1\')"></td></tr>';
            echo '<tr><td>Partner 2: ' .$row['partner2_first'].' '.$row['partner2_last'].' </td><td align="center"><input type="checkbox" id="partner2" value=partner2 checked onchange="KeepCount(\'partner2\')"></td></tr>';
        }
        $sql_subs="SELECT * FROM teamsubs WHERE team_id='".$team_id."'";
        $result_subs = mysqli_query($mysqli,$sql_subs);
        $i=1;
        while($row = mysqli_fetch_array($result_subs)) {
            echo "<script>team_info.position.push(\"sub".$i."\");
            team_info.first.push(\"".$row['sub_first']."\");
            team_info.last.push(\"".$row['sub_last']."\");
            </script>";
            echo '<tr><td>Sub ' .$i. ': ' .$row['sub_first'].' '.$row['sub_last'].' </td><td align="center"><input type="checkbox" id="sub'.$i.'" value=sub'.$i.' onchange="KeepCount(\'sub'.$i.'\')"></td></tr>';
            $i=$i+1;
        }
        echo "</table>";
        
        echo '<a href="2b-reg_new_sub.php?team_id='.$team_id.'&new_team=Y" class="button">Register New Sub</a>';
        echo '<script>document.getElementById("team_id").value = "'.$team_id.'";
            </script>';
        ?>
        
        <table>
            <tr>
                <th colspan="3">Annual GBWS Team Membership (Required to fish GBWS tournaments) - $80</th>
                <th align="center"><input type="checkbox" id=Membership value="80" <?php if($new_team =='X') {echo 'checked'; } ?> disabled ></th>
            </tr>
            <tr>
                <th colspan="3">Annual GBWS Individual/Sub Membership - $40</th>
                <th align="center"><input type="checkbox" id=subMembership value="40"  <?php if($new_team =='Y') {echo 'checked'; } ?> disabled ></th>
            </tr>
            <tr>
                <td></td>
        	<th align="center">Tournament<br>$410</th>
                <th style="word-wrap: break-word;" align="center">Option Pot - 100% Payback<br>$200</th>
                <th style="word-wrap: break-word;" align="center">Big Fish<br>$20</th>
            </tr>
            <?php 
            $tourney_sql="SELECT * FROM tourneyinfo WHERE second_date IS NULL";
            $tourney_result = mysqli_query($mysqli,$tourney_sql);
            
            while($tourney = mysqli_fetch_array($tourney_result)) {
                echo "<tr>";
                $date=date_create($tourney['start_date']);
                $description=date_format($date, 'F d') ." - " . $tourney['location'];
                $tourney_fee=$tourney["entry_fee"];
                $option_fee=$tourney["option_fee"];
                $big_fish_fee=$tourney["big_fish_fee"];
                
                
                echo "<td>" . $description ."</td>";
                echo '<td align="center"><input type="checkbox" id=' . $tourney["local"] . '-Tourney value="' . $tourney_fee . '" onclick="UpdateCart(\''.$tourney["local"].'-Tourney\',\''.$description.' Registration'.'\','. $tourney_fee.')"></td>';
                echo '<td align="center"><input type="checkbox" id=' . $tourney["local"] . '-Option value="' .$option_fee. '" onclick="UpdateCart(\''.$tourney["local"].'-Option\',\''.$description.' Option Pot'.'\','. $option_fee.')"></td>';
                echo '<td align="center"><input type="checkbox" id=' . $tourney["local"] . '-Fish value="' .$big_fish_fee. '" onclick="UpdateCart(\''.$tourney["local"].'-Fish\',\''.$description.' Big Fish'.'\','. $big_fish_fee.')"></td>';
                echo "</tr>";
            }
            ?>
            <tr>
            	<td></td>
            	<td></td>
            	<td></td>
            	<td></td>
            <tr>
            <tr>
        	<td></td>
        	<th align="center">Championship Tournament<br>$510</th>
            <th style="word-wrap: break-word;" align="center">Option Pot - 100% Payback<br>$200</th>
            <th style="word-wrap: break-word;" align="center">Big Fish<br>$40</th>
            <tr>
            <?php
            $tourney_sql="SELECT * FROM tourneyinfo WHERE second_date IS NOT NULL";
            $tourney_result = mysqli_query($mysqli,$tourney_sql);
            while($tourney = mysqli_fetch_array($tourney_result)) {
                echo "<tr>";
                $date=date_create($tourney['start_date']);
                $second_date=date_create($tourney['second_date']);
                $description=date_format($date, 'F d') . " - " . date_format($second_date, 'd') ." - " . $tourney['location'];
                $tourney_fee=$tourney["entry_fee"];
                $option_fee=$tourney["option_fee"];
                $big_fish_fee=$tourney["big_fish_fee"];
                echo "<td>" . date_format($date, 'F d') . " - " . date_format($second_date, 'd') ."<br>" .$tourney['location']."</td>";
                echo '<td align="center"><input type="checkbox" id=' . $tourney["local"] . '-Tourney value="' . $tourney_fee . '" onclick="UpdateCart(\''.$tourney["local"].'-Tourney\',\''.$description.' Registration'.'\','. $tourney_fee.')"></td>';
                echo '<td align="center"><input type="checkbox" id=' . $tourney["local"] . '-Option value="' .$option_fee. '" onclick="UpdateCart(\''.$tourney["local"].'-Option\',\''.$description.' Option Pot'.'\','. $option_fee.')"></td>';
                echo '<td align="center"><input type="checkbox" id=' . $tourney["local"] . '-Fish value="' .$big_fish_fee. '" onclick="UpdateCart(\''.$tourney["local"].'-Fish\',\''.$description.' Big Fish'.'\','. $big_fish_fee.')"></td>';
                echo "</tr>";
            }
            mysqli_close($mysqli);
            ?>
            <tr>
        	<td></td>
        	<td></td>
        	<td></td>
        	<td></td>
            <tr>
        </table>
        <i>*To qualify for the GBWS championship, teams must earn 800 points or fish all three qualifying tournaments.</i>
        <br>
        <br>
        Total: $<input type="text" size="5" id="total" name="total" value="0" disabled/>
        <br>
        <br>
        
          <input type="image" name="submit"
            src="https://www.paypalobjects.com/en_US/i/btn/btn_paynow_LG.gif"
            alt="Pay Now">
        
          <img alt="" border="0" width="1" height="1"
          src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
        
        </form>
    </body>
</html>

