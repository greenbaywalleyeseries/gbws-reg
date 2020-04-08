<?php
/* These are our valid username and passwords */
$user='admin';
$pass='C@ssie01';
$target=$_GET['page'];

include('includes/datalogin.php');
if (isset($_POST['username']) && isset($_POST['password'])) {
    if ($_POST['password'] == $pass) {
 //       echo 'Password is valid!';
        setcookie('GBWS-admin', $_POST['username'], time()+60*60*24*365);
//        setcookie('GBWS-adminkey', md5($_POST['password']), time()+60*60*24*365);
        header('Location: '.$target);
        exit;
    } else {
        echo 'Invalid password.<br>';
        echo '<a href="index.php?page='.$target.'" >Click here to return to login page</a>';
    }
} else {
    echo 'You must supply a username and password.<br>';
    echo '<a href="index.php?page='.$target.'" >Click here to return to login page</a>';
}