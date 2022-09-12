<?php
// Return current date from the remote server
//$date = date('d-m-y h:i:s');
//echo $date;


//$curr_time = date('d-m-y h:i:s');

$curr_time = new DateTime("now", new DateTimeZone('CST') );
$format_time = $curr_time->format('Y-m-d');
//$format_time = $curr_time->format('Y-m-d H:m');
//echo $format_time->format('Y-m-d H:m');

// $curr_time = date('Y-m-d H:m');
$expire_date = '2013-08-10';
//$expire_date = '2013-08-10 12:00';

#$dateB = DateTime::createFromFormat('Y-m-d H:m', $expire_date);

echo $format_time;
echo "<br>";
echo strtotime($format_time);
echo "<br>";
echo $expire_date;
echo "<br>";
echo strtotime($expire_date);
echo "<br>";

if (strtotime($format_time) > strtotime($expire_date)) {
echo "You are past the registration deadline";
//    echo $format_time;
}

else {
    echo $expire_date;
}

?>