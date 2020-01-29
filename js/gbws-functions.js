
function createConfirm(message, okHandler) {
	    var confirm = '<p id="confirmMessage">'+message+'</p><div class="clearfix dropbig">'+
	            '<input type="button" id="confirmYes" class="alignleft ui-button ui-widget ui-state-default" value="Yes" />' +
	            '<input type="button" id="confirmNo" class="ui-button ui-widget ui-state-default" value="No" /></div>';

	    $.fn.colorbox({html:confirm, 
	        onComplete: function(){
	            $("#confirmYes").click(function(){
	                okHandler();
	                $.fn.colorbox.close();
	            });
	            $("#confirmNo").click(function(){
	                $.fn.colorbox.close();
	            });
	    }});
}



	//prompt("In the event a tournament is cancelled, do you want a refund or have money rolled forward to the championship tournament.  If you choose to have your money refunded, you will not be eligible to fish the championship tournament");

function CheckTeamSize(first, last, chkbox) {
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


function CheckPartnerCount(last_checked) {
	team = new Array();
	if (document.TourneyForm.partner1.checked)
	{
		CheckTeamSize(team_info.first[0], team_info.last[0], last_checked);
	}
	if (document.TourneyForm.partner2.checked)
	{
		CheckTeamSize(team_info.first[1], team_info.last[1], last_checked);
	}
	var arrayLength = team_info.position.length-2;
	{
		for (var i = 1; i <= arrayLength; i++) 
		{
			var obj = "sub"+i;
			if (document.getElementById(obj).checked)
			{
				var j=i+1;
				CheckTeamSize(team_info.first[j], team_info.last[j], last_checked);
			}
		}
	}
}

function CalcMbrRegFee(quantity){
	var regitem = "Registration-(X" +quantity+ ")";
	var regdesc = "2020 GBWS Registration";
	var regtotal = quantity * 40;
	
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
// 		var params = "team_id=" + document.getElementById('team_id').value + "&field=" + chkbox_name;
//		$.ajax({
//			url: 'php/parseItemNumber.php',
//			type: 'POST',
//			data: params,
//		    success: function(response) {
//			    if(response == "1") {
// 				    alert("This team is already registered for this tournament");
// 				    document.getElementById(chkbox_name).checked = false;
// 			    } else {
             		items.push({
	               		check_box: chkbox_name,
    	           		desc: description,
        	       		cost: cost        	       		
            		});
             		UpdateTotal();
 //             	}
 //			}
// 		});
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
//	var team_size = Object.keys(team).length;
//	if (team_size != 2)
//	{
//		alert('Select Two Team Members');
//		event.preventDefault();
//	} else {
		populateInputFields();
		console.log(items);
		var custom_text = team_id + ";" + partner1 + ";" + partner2;
		document.getElementById("custom").value = custom_text;
		//createConfirm('a', 'b');
//	}
}

