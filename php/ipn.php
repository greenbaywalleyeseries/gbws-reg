<?php

include('gbws_reg_db.php');

// Check to see there are posted variables coming into the script
if ($_SERVER['REQUEST_METHOD'] != "POST") die ("No Post Variables");
// Initialize the $req variable and add CMD key value pair
$req = 'cmd=_notify-validate';
file_put_contents("post.log", print_r($_POST, true));
// Read the post from PayPal
foreach ($_POST as $key => $value) {
    $value = urlencode(stripslashes($value));
    $req .= "&$key=$value";
}
// Now Post all of that back to PayPal's server using curl, and validate everything with PayPal
// We will use CURL instead of PHP for this for a more universally operable script (fsockopen has issues on some environments)
//$url = "https://www.sandbox.paypal.com/cgi-bin/webscr";
$url = "https://www.paypal.com/cgi-bin/webscr";
$curl_result=$curl_err='';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/x-www-form-urlencoded", "Content-Length: " . strlen($req)));
curl_setopt($ch, CURLOPT_HEADER , 0);
curl_setopt($ch, CURLOPT_VERBOSE, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
$curl_result = @curl_exec($ch);
$curl_err = curl_error($ch);
curl_close($ch);

$req = str_replace("&", "\n", $req);  // Make it a nice list in case we want to email it to ourselves for reporting

// Check that the result verifies
 if (strpos($curl_result, "VERIFIED") !== false) {
    $req .= "\n\nPaypal Verified OK";
} else {
    $req .= "\n\nData NOT verified from Paypal!";
    $msg="IPN interaction not verified";
    $sql=mysqli_query($mysqli, "insert into log (message) values ('$msg')");
    exit();
}
 
/* CHECK THESE 4 THINGS BEFORE PROCESSING THE TRANSACTION, HANDLE THEM AS YOU WISH
 1. Make sure that business email returned is your business email
 2. Make sure that the transaction’s payment status is “completed”
 3. Make sure there are no duplicate txn_id
 4. Make sure the payment amount matches what you charge for items. (Defeat Price-Jacking) */

// Check Number 1 ------------------------------------------------------------------------------------------------------------
$receiver_email = $_POST['receiver_email'];
//if ($receiver_email != "gbwalleyeseries-facilitator@gmail.com") {
if ($receiver_email != "gbwalleyeseries@gmail.com") {
    $msg = "Investigate why and how receiver email is wrong. Email = " . $_POST['receiver_email'] . "\n\n\n$req";
    //mail("gbwalleyeseries@gmail.com", "Receiver Email is incorrect", $message, "From: gbwalleyeseries@gmail.com" );
    mysqli_query($mysqli, "insert into log (message) values ('$msg')");
    exit(); // exit script
}

// Check number 2 ------------------------------------------------------------------------------------------------------------
if ($_POST['payment_status'] != "Completed") {
    // Handle how you think you should if a payment is not complete yet, a few scenarios can cause a transaction to be incomplete
}

// Check number 3 ------------------------------------------------------------------------------------------------------------
$this_txn = $_POST['txn_id'];
$sql="SELECT id FROM transactions WHERE txn_id='$this_txn' LIMIT 1";
$results=mysqli_query($mysqli, $sql);
$numRows = mysqli_num_rows($results);
if ($numRows > 0) {
    $msg = "Duplicate transaction ID occured so we killed the IPN script. \n\n\n$req";
    //mail("gbwalleyeseries@gmail.com", "Duplicate txn_id in the IPN system", $message, "From: gbwalleyeseries@gmail.com" );
    mysqli_query($mysqli, "insert into log (message) values ('$msg')");
    exit(); // exit script
}
// Check number 4 ------------------------------------------------------------------------------------------------------------
/*
$product_id_string = $_POST['custom'];
$product_id_string = rtrim($product_id_string, ","); // remove last comma
// Explode the string, make it an array, then query all the prices out, add them up, and make sure they match the payment_gross amount
$id_str_array = explode(",", $product_id_string); // Uses Comma(,) as delimiter(break point)
$fullAmount = 0;
foreach ($id_str_array as $key => $value) {
    
    $id_quantity_pair = explode("-", $value); // Uses Hyphen(-) as delimiter to separate product ID from its quantity
    $product_id = $id_quantity_pair[0]; // Get the product ID
    $product_quantity = $id_quantity_pair[1]; // Get the quantity
    $sql = mysql_query("SELECT price FROM products WHERE id='$product_id' LIMIT 1");
    while($row = mysql_fetch_array($sql)){
        $product_price = $row["price"];
    }
    $product_price = $product_price * $product_quantity;
    $fullAmount = $fullAmount + $product_price;
}
$fullAmount = number_format($fullAmount, 2);
$grossAmount = $_POST['mc_gross'];
if ($fullAmount != $grossAmount) {
    $message = "Possible Price Jack: " . $_POST['payment_gross'] . " != $fullAmount \n\n\n$req";
    mail("gbwalleyeseries@gmail.com", "Price Jack or Bad Programming", $message, "From: gbwalleyeseries@gmail.com" );
    exit(); // exit script
}
*/
// END ALL SECURITY CHECKS NOW IN THE DATABASE IT GOES ------------------------------------
$txn_id=$_POST['txn_id'];
$payer_id = $_POST['payer_id'];
$payer_status = $_POST['payer_status'];
$custom=$_POST['custom'];
$payment_status = $_POST['payment_status'];
$payer_email = $_POST['payer_email'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$address_name = $_POST['address_name'];
$address_street = $_POST['address_street'];
$address_city = $_POST['address_city'];
$address_state = $_POST['address_state'];
$address_zip = $_POST['address_zip'];
$address_country = $_POST['address_country'];
$address_country_code = $_POST['address_country_code'];
$address_status = $_POST['address_status'];
//$contact_phone =  $_POST['contact_phone'];
$residence_country = $_POST['residence_country'];
$payment_date = $_POST['payment_date'];
$num_cart_items = $_POST['num_cart_items'];
$mc_gross = $_POST['mc_gross'];
$mc_fee = $_POST['mc_fee'];
$mc_currency = $_POST['mc_currency'];
$ipn_track_id = $_POST['ipn_track_id'];
$verify_sign = $_POST['verify_sign'];
$txn_type = $_POST['txn_type'];
$payment_type = $_POST['payment_type'];
$receiver_email = $_POST['receiver_email'];
$receiver_id = $_POST['receiver_id'];
$notify_version = $_POST['notify_version'];
$transaction_subject = $_POST['transaction_subject'];
$charset = $_POST['charset'];
$discount = $_POST['discount'];

$SQL="INSERT INTO transactions (txn_id, payer_id, payer_status, custom, payment_status, payer_email, first_name, last_name, address_name, address_street, address_city, address_state, address_zip, address_country, address_country_code, address_status, residence_country, payment_date, num_cart_items, mc_gross, mc_fee, mc_currency, ipn_track_id, verify_sign, txn_type, payment_type, receiver_email, receiver_id, notify_version, transaction_subject, charset, discount) 
    VALUES('$txn_id', '$payer_id', '$payer_status', '$custom', '$payment_status', '$payer_email', '$first_name', '$last_name', '$address_name', '$address_street', '$address_city', '$address_state', '$address_zip', '$address_country', '$address_country_code', '$address_status', '$residence_country', '$payment_date', $num_cart_items, '$mc_gross', '$mc_fee', '$mc_currency', '$ipn_track_id', '$verify_sign', '$txn_type', '$payment_type', '$receiver_email', '$receiver_id', '$notify_version', '$transaction_subject', '$charset', '$discount')";

mysqli_query($mysqli, "insert into log (message) values ('After SQL test good')");
$file='sql.log';
file_put_contents($file,$SQL);
// Place the transaction header into the database
mysqli_query($mysqli, $SQL) or die ("unable to execute the query");

for ($i=1; $i<=$num_cart_items; $i++) {
    for ($i=1; $i<=$num_cart_items; $i++) {
        $item_number=$_POST['item_number'.$i];
        $item_name=$_POST['item_name'.$i];
        if (isset($_POST['option_selection1_'.$i])) {
            $partner1=$_POST['option_selection1_'.$i];
        } else $partner1='';
        if (isset($_POST['option_selection2_'.$i])) {
            $partner2=$_POST['option_selection2_'.$i];
        } else $partner2='';
        $quantity=$_POST['quantity'.$i];
        $mc_gross=$_POST['mc_gross_'.$i];
        mysqli_query($mysqli, "INSERT INTO transaction_items (txn_id, item_number, item_name, team_id, partner1, partner2, quantity, mc_gross)
        VALUES ('$txn_id', '$item_number', '$item_name', '$custom', '$partner1', '$partner2', '$quantity', '$mc_gross')") or die ("unable to execute query 2");
        if (strpos($item_number, 'Registration') !== false) {
            mysqli_query($mysqli, "UPDATE team_info SET paid='X' WHERE team_id='$custom'");
        }
    }
}

mysqli_close($mysqli);
// Mail yourself the details
//mail("gbwalleyeseries@gmail.com", "NORMAL IPN RESULT YAY MONEY!", $req, "From: gbwalleyeseries@gmail.com");
?>