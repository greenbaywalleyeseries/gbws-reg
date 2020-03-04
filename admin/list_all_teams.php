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
    
    $sql='SELECT team_id,
    	   (SELECT CONCAT(first," ",last) FROM member_info WHERE team_info.partner1=member_info.mbr_id) AS \'Partner1\',
           (SELECT CONCAT(first," ",last) FROM member_info WHERE team_info.partner2=member_info.mbr_id) AS \'Partner2\',
           (SELECT CONCAT(first," ",last) FROM member_info WHERE team_info.sub1=member_info.mbr_id) AS \'Sub1\',
           (SELECT CONCAT(first," ",last) FROM member_info WHERE team_info.sub2=member_info.mbr_id) AS \'Sub2\'
        FROM
	       team_info
        ORDER BY
            CAST(SUBSTRING_INDEX(team_id,"_",-1) AS SIGNED)';
    
    $result = mysqli_query($mysqli,$sql);
    
    echo '
    <div class="site-section">
        <div class="col-12 col-md-12">
            <table class="table table-striped">
                <thead>
                    <th>Team ID</th>
                    <th>Partner 1</th>
                    <th>Partner 2</th>
                    <th>Sub 1</th>
                    <th>Sub 2</th>
                </thead>
                <tbody>';

    while($row = mysqli_fetch_array($result)) {
    
        echo "<tr>";
        echo "<td>" . $row['team_id']. "</td>";
        echo "<td>" . $row['Partner1']. "</td>";
        echo "<td>" . $row['Partner2']. "</td>";
        echo "<td>" . $row['Sub1']. "</td>";
        echo "<td>" . $row['Sub2']. "</td>";
        echo "</tr>";
    }
        echo "</tbody>";
    echo "</table>";
    mysqli_close($mysqli);
    ?>
</body>
</html>