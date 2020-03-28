<!DOCTYPE html>
<html>

    <head>
    	<meta charset="UTF-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Muli:400,700" rel="stylesheet">
        <link rel="stylesheet" href="../fonts/icomoon/style.css">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/bootstrap-datepicker.css">
        <link rel="stylesheet" href="../css/jquery.fancybox.min.css">
        <link rel="stylesheet" href="../css/owl.carousel.min.css">
        <link rel="stylesheet" href="../css/owl.theme.default.min.css">
        <link rel="stylesheet" href="../fonts/flaticon/font/flaticon.css">
        <link rel="stylesheet" href="../css/aos.css">
    
        <!-- MAIN CSS -->
        <link rel="stylesheet" href="../css/style.css">

    </head>
<body>

    <?php
    include('../php/gbws_reg_db.php');
    
    mysqli_select_db($mysqli,"gbws_reg");
    
    $sql='SELECT mbr_id,
            first,
            last,
            address,
            city,
            state,
            zip,
            phone,
            email
        FROM
	       member_info
        ORDER BY
            last';
    
    $result = mysqli_query($mysqli,$sql);
    
    echo '
    <div class="site-section">
        <div class="col-12 col-md-12">
            <table class="table table-striped">
                <thead>
                    <th>ID</th>
                    <th>First</th>
                    <th>Last</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Zip</th>
                    <th>Phone</th>
                    <th>Email</th>
                </thead>
                <tbody>';

    while($row = mysqli_fetch_array($result)) {
    
        echo "<tr>";
        echo "<td>" . $row['mbr_id']. "</td>";
        echo "<td>" . $row['first']. "</td>";
        echo "<td>" . $row['last']. "</td>";
        echo "<td>" . $row['address']. "</td>";
        echo "<td>" . $row['city']. "</td>";
        echo "<td>" . $row['state']. "</td>";
        echo "<td>" . $row['zip']. "</td>";
        echo "<td>" . $row['phone']. "</td>";
        echo "<td>" . $row['email']. "</td>";
        echo "</tr>";
    }
        echo "</tbody>";
    echo "</table>";
    mysqli_close($mysqli);
    ?>
</body>
</html>