<?php 
echo date("m/d/Y h:i:s a", time());
echo date_default_timezone_get();

$today = new DateTime("now", new DateTimeZone('America/Chicago') );
echo $today->format('Y-m-d h:i:s a');


?>