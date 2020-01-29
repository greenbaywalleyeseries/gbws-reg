<html>
<head>
	<link rel="stylesheet" type="text/css" href="membership.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script type="text/javascript">
    
        function showTeam(str) {
            if (str == "") {
                document.getElementById("ListTeams").innerHTML = "";
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
                        document.getElementById("ListTeams").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET","1a-list_team.php?last_name="+str,true);
                xmlhttp.send();
            }
        }
    </script>

</head>
<body onload="showTeam('%')">
    	<h1> GBWS Registration</h1>
    	<br>
    	<div>Click "Register New Team" to register as a new team</div>
    	<br>
    	<div>If previously registered as a team, click on your name in the list below</div>
    	<br>
    
    	<a href="1b-reg_new_team.php" class="button">Register New Team</a>
     	
    <br>
    <br>
    
    <form name="GetTeam" method="post">
        <label for="member_input">Filter by team member last name</label>
        <input class="text" id="member_input" name="member_input" type="text" oninput="showTeam(this.value)">
    
    </form>
    
    <br>
    <div id="ListTeams"></div>

</body>

</html>