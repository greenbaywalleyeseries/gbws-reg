<html>
<head>
	<link rel="stylesheet" type="text/css" href="../membership.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script type="text/javascript">
    
        function showTourneyTeams(str) {
            if (str == "") {
                document.getElementById("txtHint").innerHTML = "";
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
                        document.getElementById("txtHint").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET","list_tourney_teams.php?q="+str,true);
                xmlhttp.send();
            }
        }
    </script>

</head>
<body>
	<h1> GBWS Tournament Rosters</h1>
	<br>
	<div>Select tournament to view roster:</div>
<form name="GetTourney" method="post">
<input type="radio" name="Tourney" id="Tourney" Value="1" onclick="showTourneyTeams(this.value)">Green Bay<br>
<input type="radio" name="Tourney" id="Tourney" Value="2" onclick="showTourneyTeams(this.value)">Marinette<br>
<input type="radio" name="Tourney" id="Tourney" Value="3" onclick="showTourneyTeams(this.value)">Oconto<br>
<input type="radio" name="Tourney" id="Tourney" Value="4" onclick="showTourneyTeams(this.value)">Sturgeon Bay<br>
</form>

<br>
<div id="txtHint"></div>

</body>

</html>