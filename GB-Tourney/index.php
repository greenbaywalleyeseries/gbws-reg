<?php 

if(empty($_GET['page'])) {
    $tgt_page= 'Admin_Dashboard.php';
} else {
    $tgt_page = $_GET['page'];
}

?>

<html>
<head>
<head>

<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta charset="ISO-8859-1">
<title>GBWS Admin Logon</title>
</head>
<body>
  <h2>Admin Login </h2>
  <div class="entry-form">
	  <form name="login" method="post" action="admin_login.php?page=<?php echo $tgt_page ?>">
		   Username: <input type="text" name="username"><br>
		   Password: <input type="password" name="password"><br>
		   <input type="submit" name="submit" value="Login">
	  </form>
  </div>
</body>
</html>