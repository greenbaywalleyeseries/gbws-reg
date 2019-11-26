
<?php
include('gbws_reg_db.php');
$team_id=$_POST['team_id'];
$partner1_first=$_POST['partner1_first'];
$partner1_last=$_POST['partner1_last'];
$partner2_first=$_POST['partner2_first'];
$partner2_last=$_POST['partner2_last'];

print_r($_POST); 

function NoTourneyReg()
{
    echo '<script>alert("Paid entry for the tournament does not exist for the option pot or big fish pot you are registering for.\nPlease return to registration page and select the appropriate tournament");history.go(-1);</script>';
}
function ErrorRegistering()
{
    echo '<script>alert("Error registering for tournament.  Please try again");history.go(-1);</script>';
}
function AlreadyRegistered()
{
    echo '<script>alert("Your team is already registered for this tournament");history.go(-1);</script>';
}

$custom=$team_id.";".$partner1_first.";".$partner1_last.";".$partner2_first.";".$partner2_last;

foreach($_POST as $key => $value) {
    if(preg_match('@^item_number@', $key)) {
        $items[$key] = $value;
    }
}

$i=1;
while($i<=count($items))
{
    $field1='item_number_'.$i;
    $field2='item_name_'.$i;
    $field3='amount_'.$i;
    ${$field1}=$_POST[$field1];
    ${$field2}=$_POST[$field2];
    ${$field3}=$_POST[$field3];
    
    $item_type = explode("-", $$field1);
    if ( ! isset($item_type[1])) {
        $item_type[1] = null;
    } else {
        echo "<br>";
        switch ($item_type[1]) {
            case 'Tourney':
                $SQL="insert into tourney_reg (team_id, tourney_id, reg_date, partner1_first, partner1_last, partner2_first, partner2_last) VALUES ('$team_id',$item_type[0],CURTIME(),'$partner1_first','$partner1_last','$partner2_first','$partner2_last')";
                break;
            case 'Option':
                $SQL="update tourney_reg set option_pot='X' where team_id='$team_id' and tourney_id=$item_type[0]";
                break;
            case 'Fish':
                $SQL="update tourney_reg set big_fish='X' where team_id='$team_id' and tourney_id=$item_type[0]";
                break;
        }
        $mysqli->query($SQL);
    }
$i++;
}
?>

<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
<h3>Redirecting to Paypal...</h3>
<form name="TourneyForm" id="TourneyForm" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
<!-- Replace "business" value with your PayPal Email Address or Account ID -->
<input type="hidden" name="business" value="<?php echo $_POST['business'];?>">
<input type="hidden" name="cpp_header_image" value="https://www.yourwebsite.com/logo.jpg">
<input type="hidden" name="cancel_return" value="<?php echo $_POST['cancel_return'];?>">
<input type="hidden" name="return" value="<?php echo $_POST['return'];?>">
<input type="hidden" name="cmd" value="<?php echo $_POST['cmd'];?>">
<input type="hidden" name="currency_code" value="<?php echo $_POST['currency_code'];?>">
<input type="hidden" name="cn" value="<?php echo $_POST['cn'];?>">
<input type="hidden" name="custom" value="<?php echo $_POST['custom'];?>">
<input type="hidden" name="no_note" value="<?php echo $_POST['no_note'];?>">
<input type="hidden" name="upload" value="<?php echo $_POST['upload'];?>">
<input type="hidden" name="amount_1" id="amt_1" value="<?php echo $amount_1;?>">
<input type="hidden" name="amount_2" id="amt_2" value="<?php echo $amount_2;?>">
<input type="hidden" name="amount_3" id="amt_3" value="<?php echo $amount_3;?>">
<input type="hidden" name="amount_4" id="amt_4" value="<?php echo $amount_4;?>">
<input type="hidden" name="amount_5" id="amt_5" value="<?php echo $amount_5;?>">
<input type="hidden" name="amount_6" id="amt_6" value="<?php echo $amount_6;?>">
<input type="hidden" name="amount_7" id="amt_7" value="<?php echo $amount_7;?>">
<input type="hidden" name="amount_8" id="amt_8" value="<?php echo $amount_8;?>">
<input type="hidden" name="amount_9" id="amt_9" value="<?php echo $amount_9;?>">
<input type="hidden" name="amount_10" id="amt_10" value="<?php echo $amount_10;?>">
<input type="hidden" name="amount_11" id="amt_11" value="<?php echo $amount_11;?>">
<input type="hidden" name="amount_12" id="amt_12" value="<?php echo $amount_12;?>">
<input type="hidden" name="amount_13" id="amt_13" value="<?php echo $amount_13;?>">
<input type="hidden" name="amount_14" id="amt_14" value="<?php echo $amount_14;?>">
<input type="hidden" name="item_name_1" id="item_1" value="<?php echo $item_name_1;?>">
<input type="hidden" name="item_name_2" id="item_2" value="<?php echo $item_name_2;?>">
<input type="hidden" name="item_name_3" id="item_3" value="<?php echo $item_name_3;?>">
<input type="hidden" name="item_name_4" id="item_4" value="<?php echo $item_name_4;?>">
<input type="hidden" name="item_name_5" id="item_5" value="<?php echo $item_name_5;?>">
<input type="hidden" name="item_name_6" id="item_6" value="<?php echo $item_name_6;?>">
<input type="hidden" name="item_name_7" id="item_7" value="<?php echo $item_name_7;?>">
<input type="hidden" name="item_name_8" id="item_8" value="<?php echo $item_name_8;?>">
<input type="hidden" name="item_name_9" id="item_9" value="<?php echo $item_name_9;?>">
<input type="hidden" name="item_name_10" id="item_10" value="<?php echo $item_name_10;?>">
<input type="hidden" name="item_name_11" id="item_11" value="<?php echo $item_name_11;?>">
<input type="hidden" name="item_name_12" id="item_12" value="<?php echo $item_name_12;?>">
<input type="hidden" name="item_name_13" id="item_13" value="<?php echo $item_name_13;?>">
<input type="hidden" name="item_name_14" id="item_14" value="<?php echo $item_name_14;?>">

</form>


<script type="text/javascript">
  document.getElementById("TourneyForm").submit();
</script>

  
  
</body>

</html>