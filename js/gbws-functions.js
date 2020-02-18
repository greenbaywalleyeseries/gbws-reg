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

function CalcMbrRegFee(quantity){
	var regitem = "Registration-(X" +quantity+ ")";
	var regdesc = "2020 GBWS Registration";
	var regtotal = quantity * 1;
	
		items.push({
       		check_box: regiten,
       		desc: regdesc,
       		cost: regtotal 
		});
 		UpdateTotal();
}

function UpdateCart(chkbox_name,description,cost){
	var chk_box_sel=document.getElementById(chkbox_name).checked;
	if (chk_box_sel == true) {
 		items.push({
    		check_box: chkbox_name,
        	desc: description,
        	cost: cost
        });
        UpdateTotal();  
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

function checkCoupon() {
	var code = document.getElementById("coupon").value;
	console.log(code);
	if (code == 'TopStick2019') {
	console.log(code);
	 	for (var i = 0; i < items.length; i++) {
	     	var check_box = items[i].check_box ;
	        if (check_box == "MAR-Tourney") {
	        	items[i].cost = 260;
	        }
	        if (check_box == "GB-Tourney" || check_box == "DY-Tourney" || check_box == "SB-Tourney"){
	        	items[i].cost = 210;
	        }
	 	}
	}
}

function UpdateTotal() {
	checkCoupon();
	var total=0;
 	for (var i = 0; i < items.length; i++) {
		total = total + items[i].cost;
 	}
	document.getElementById("total").value = total; 
//	populateInputFields();	
}

function populateInputFields() {
 	for (var i = 0; i < items.length; i++) {
 		var j=i+1;
 		var item_number_id = "\"item_number_"+[j]+"\"" ;
     	var check_box = items[i].check_box ;
        if (check_box.includes("Tourney")) {
        	var location= check_box.substr(0, check_box.indexOf('-'));
        	var partner1_field=location+'-Partner1';
        	var partner2_field=location+'-Partner2';
        	var partner1_var_field="'"+partner1_field+"'";
        	var partner2_var_field="'"+partner2_field+"'";
        	var partner1_mbr_id = document.getElementById(eval(partner1_var_field)).value;
        	var partner2_mbr_id = document.getElementById(eval(partner2_var_field)).value;


         	var on0_id = "\"on0_"+[j]+"\"" ;
         	var partner1_hdr = "partner1";
         	$('#TourneyForm').append('<input type="hidden" name=' + on0_id + 'id=' + on0_id + ' value=' + partner1_hdr + '>');
         	var os0_id = "\"os0_"+[j]+"\"" ;
         	$('#TourneyForm').append('<input type="hidden" name=' + os0_id + 'id=' + os0_id + ' value=' + partner1_mbr_id + '>');
         	var on1_id = "\"on1_"+[j]+"\"" ;
         	var partner2_hdr = "partner2";
         	$('#TourneyForm').append('<input type="hidden" name=' + on1_id + 'id=' + on1_id + ' value=' + partner2_hdr + '>');
         	var os1_id = "\"os1_"+[j]+"\"" ;
         	$('#TourneyForm').append('<input type="hidden" name=' + os1_id + 'id=' + os1_id + ' value=' + partner2_mbr_id + '>');       	
        }
     	var item_name_id = "\"item_name_"+[j]+"\"" ;
     	var desc = items[i].desc ;
     	var item_amount_id = "\"amount_"+[j]+"\"" ;
     	var cost = items[i].cost ;
     	$('#TourneyForm').append('<input type="hidden" name=' + item_number_id + 'id=' + item_number_id + ' value=' + check_box + '>');
     	$('#TourneyForm').append('<input type="hidden" name=' + item_name_id + 'id=' + item_name_id + ' value="' + desc + '">');
     	$('#TourneyForm').append('<input type="hidden" name=' + item_amount_id + 'id=' + item_amount_id + ' value=' + cost + '>');
 	}
}



function formValidation(team_num)
{
	checkCoupon();
	populateInputFields();
	//console.log(items);
	var custom_text = team_id;
	//var custom_text = team_id + ";" + partner1 + ";" + partner2;
	document.getElementById("custom").value = custom_text;

}

