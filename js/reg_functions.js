        function showTeam(name) {
            if (name == "") {
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
                xmlhttp.open("GET","php/list_team.php?last_name="+name,true);
                xmlhttp.send();
            }
        }