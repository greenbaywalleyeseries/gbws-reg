<?php
include('../../php/gbws_reg_db.php');

// Check to see there are posted variables coming into the script
if ($_SERVER['REQUEST_METHOD'] != "POST") die ("No Post Variables");
// Initialize the $req variable and add CMD key value pair
$req = 'cmd=_notify-validate';
file_put_contents("post.log", print_r($_POST, true));

foreach ($_POST as $key => $value) {
    $value = urlencode(stripslashes($value));
    $req .= "&$key=$value";
}

date_default_timezone_set("America/Chicago");
$txn_id='MailIn-'.date("Y.m.d-H:i:s");

$custom=$_POST['custom'];
$num_cart_items=$_POST['cart_items'];


$SQL="INSERT INTO transactions (txn_id, custom, num_cart_items) VALUES('$txn_id', '$custom', $num_cart_items)";

mysqli_query($mysqli, $SQL) or die ("unable to execute the query");

for ($i=1; $i<=$num_cart_items; $i++) {
    for ($i=1; $i<=$num_cart_items; $i++) {
        $item_number=$_POST['item_number_'.$i];
        $item_name=$_POST['item_name_'.$i];
        if (isset($_POST['os0_'.$i])) {
            $partner1=$_POST['os0_'.$i];
        } else $partner1='';
        if (isset($_POST['os1_'.$i])) {
            $partner2=$_POST['os1_'.$i];
        } else $partner2='';
        $quantity=1;
        #$quantity=$_POST['quantity'.$i];
        $mc_gross=$_POST['amount_'.$i];
        mysqli_query($mysqli, "INSERT INTO transaction_items (txn_id, item_number, item_name, team_id, partner1, partner2, quantity, mc_gross)
        VALUES ('$txn_id', '$item_number', '$item_name', '$custom', '$partner1', '$partner2', '$quantity', '$mc_gross')") or die ("unable to execute query 2");
        if (strpos($item_number, 'Registration') !== false) {
            mysqli_query($mysqli, "UPDATE team_info SET paid='X' WHERE team_id='$custom'");
        }
    }
}

mysqli_close($mysqli);

echo "<a href=../index.html>Click here if not automatically redirected to the admin page</a>";


