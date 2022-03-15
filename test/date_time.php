<?php
// Return current date from the remote server
//$date = date('d-m-y h:i:s');
//echo $date;


//$curr_time = date('d-m-y h:i:s');
$curr_time = date('Y-m-d H:m');
$b = '2013-08-10 12:00';

$dateB = DateTime::createFromFormat('Y-m-d H:m', $b);

echo strtotime($curr_time);
echo "<br>";
echo strtotime($b);
echo "<br>";

if (strtotime($curr_time) > strtotime($b)) {
    echo $curr_time;
}

else {
    echo $b;
}

echo "<br";
echo strtotime($curr_time);

?>