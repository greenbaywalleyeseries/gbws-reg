<?php
// Return current date from the remote server
//$date = date('d-m-y h:i:s');
//echo $date;


$curr_time = date('d-m-y h:i:s');
$b = '2013-08-10 12:00';

$dateB = DateTime::createFromFormat('Y-m-d H:m', $b);


if ($curr_time < strtotime($b)) {
    echo $curr_time;
}

else {
    echo $b;
}

?>