<html>
<head>
	<link rel="stylesheet" href="membership.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
$team_id = $_GET['team_id'];
$new_team = $_GET['new_team'];
?>

<script type="text/javascript">

    function showTeamInfo(team) {
        if (team == "") {
            document.getElementById("teamInfo").innerHTML = "something is not right";
            return;
        } else { 
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("teamInfo").innerHTML = this.responseText;
                }
            }
            xmlhttp.open("GET","2c-full_team_by_id.php?team="+team,true);
            xmlhttp.send();
        }
    }

</script>


</head>

<body>
<h1> GBWS Sub Registration</h1>

	<?php echo '<script type="text/javascript">
	showTeamInfo(\''.$team_id.'\');
	</script>';
	?>

<br>
<div id="teamInfo"></div>

<form enctype="multipart/form-data" action="2d-ins_new_sub.php" method="POST" id="reg-sub">
    <div style="margin-top:10px;">
        <label><span>*</span> Indicates required field</label>
        <div>
        	<div class="name-group">
        		<label for="sub_first">Name <span>*</span></label> <br />
			</div>
			<div class="name-group">
    			<input aria-required="true"id="sub_first" type="text" name="sub_first" placeholder="First" required />
	        	<input aria-required="true"id="sub_last" type="text" name="sub_last" placeholder="Last" required />
        	</div>
        </div>
        
        <div>
        	<div style="margin:5px 0px 5px 0px;">
        		<label for="sub_address">Address <span class="form-required">*</span></label>
        		<div>
        			<input aria-required="true"id="sub_address" type="text" name="sub_address" required />
        		</div>
		        <div style="display:none;">
	        	</div>
        	</div>
    	</div>
        
        <div>
        	<div style="margin:5px 0px 5px 0px;">
        		<label for="parnter1_city">City <span>*</span></label>
        		<div>
        			<input aria-required="true"id="sub_city" type="text" name="sub_city" required />
        		</div>
        		<div style="display:none;">
        		</div>
        	</div>
    	</div>
        
        <div>
        	<div style="margin:5px 0px 0px 0px;">
        		<label for="sub_state">State <span>*</span></label>
        		<div>
        			<select name='sub_state' aria-required="true" required>
        				<option value='AL'>Alabama</option>
                        <option value='AK'>Alaska</option>
                        <option value='AZ'>Arizona</option>
                        <option value='AR'>Arkansas</option>
                        <option value='CA'>California</option>
                        <option value='CO'>Colorado</option>
                        <option value='CT'>Connecticut</option>
                        <option value='DE'>Delaware</option>
                        <option value='FL'>Florida</option>
                        <option value='GA'>Georgia</option>
                        <option value='HI'>Hawaii</option>
                        <option value='ID'>Idaho</option>
                        <option value='IL'>Illinois</option>
                        <option value='IN'>Indiana</option>
                        <option value='IA'>Iowa</option>
                        <option value='KS'>Kansas</option>
                        <option value='KY'>Kentucky</option>
                        <option value='LA'>Louisiana</option>
                        <option value='ME'>Maine</option>
                        <option value='MD'>Maryland</option>
                        <option value='MA'>Massachusetts</option>
                        <option value='MI'>Michigan</option>
                        <option value='MN'>Minnesota</option>
                        <option value='MS'>Mississippi</option>
                        <option value='MS'>Missouri</option>
                        <option value='MT'>Montana</option>
                        <option value='NE'>Nebraska</option>
                        <option value='NV'>Nevada</option>
                        <option value='NH'>New Hampshire</option>
                        <option value='NJ'>New Jersey</option>
                        <option value='NM'>New Mexico</option>
                        <option value='NY'>New York</option>
                        <option value='NC'>North Carolina</option>
                        <option value='ND'>North Dakota</option>
                        <option value='OH'>Ohio</option>
                        <option value='OK'>Oklahoma</option>
                        <option value='OR'>Oregon</option>
                        <option value='PA'>Pennsylvania</option>
                        <option value='RI'>Rhode Island</option>
                        <option value='SC'>South Carolina</option>
                        <option value='SD'>South Dakota</option>
                        <option value='TN'>Tennessee</option>
                        <option value='TX'>Texas</option>
                        <option value='UT'>Utah</option>
                        <option value='VT'>Vermont</option>
                        <option value='VA'>Virginia</option>
                        <option value='WA'>Washington</option>
                        <option value='DC'>Washington D.C.</option>
                        <option value='WV'>West Virginia</option>
                        <option selected value='WI'>Wisconsin</option>
                        <option value='WY'>Wyoming</option>
                   	</select>
    			</div>
        		<div style="display:none;">
        		</div>
    		</div>
		</div>
        
        <div>
        	<div style="margin:5px 0px 5px 0px;">
        		<label for="sub_zip">Zip <span>*</span></label>
        		<div>
        			<input aria-required="true"id="sub_zip" type="text" name="sub_zip" required/>
        		</div>
        		<div style="display:none;">
        		</div>
        	</div>
    	</div>
        
        <div>
        	<div style="margin:5px 0px 5px 0px;">
        		<label for="sub_phone">Phone <span>*</span></label>
        		<div>
        			<input aria-required="true"id="sub_phone" type="tel" name="sub_phone" placeholder="(555) 555-1234" required />
        		</div>
        		<div style="display:none;">
    			</div>
    		</div>
		</div>
        
        <div>
        	<div style="margin:5px 0px 5px 0px;">
        		<label for="sub_email">Email </label>
        		<div>
        			<input aria-required="true"id="sub_email" type="text" name="sub_email" />
        		</div>
        		<div style="display:none;">
        		</div>
        	</div>
    	</div>
        
        <div>
        	<div style="height: 20px; overflow: hidden; width: 100%;">
        	</div>
        	<hr class="styled-hr" style="width:100%;"></hr>
       		<div style="height: 20px; overflow: hidden; width: 100%;">
       		</div>
    	</div>
	<?php echo '<input type="hidden" name="team_id" id="team_id"value="'.$team_id.'">';?>
	<button type="submit">Submit</button>
	</div>

</form>
</body>

</html>