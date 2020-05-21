<?php 
echo nl2br("Default System timezone is: " . date_default_timezone_get() . "\r\n");
echo nl2br("Current System time is: " . date("m/d/Y g:i:s e", time()) . "\r\n");


$today = new DateTime("now", new DateTimeZone('America/Chicago') );
echo nl2br("Current Central Time is: " . $today->format('m/d/Y g:i:s e'));


?>