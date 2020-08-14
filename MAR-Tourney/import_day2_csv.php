<?php
include_once 'includes/GBWS-functions.php';
include('includes/datalogin.php');

if(isset($_POST["Import"])){
    
    $filename=$_FILES["file"]["tmp_name"];
    if($_FILES["file"]["size"] > 0)
    {
        $del_sql = "TRUNCATE TABLE donkey_day2";
        mysqli_query($mysqli_tourney, $del_sql);
        $file = fopen($filename, "r");
        while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
        {
            $datetime = date('Y-m-d H:i:s', strtotime($emapData[5]));
            $sql = "INSERT into donkey_day2(ID, Division, Participant, Species, Length, timestamp) values('$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$datetime')";
            $result=mysqli_query($mysqli_tourney, $sql);
            if(!isset($result))
            {
                echo "<script type=\"text/javascript\">
              alert(\"Invalid File:Please Upload CSV File.\");
              window.location = \"import_day2_file.html\"
              </script>";
            }
            else {
                echo "<script type=\"text/javascript\">
            alert(\"CSV File has been successfully Imported.\");
            window.location = \"import_day2_file.html\"
          </script>";
            }
        }

    }
    
    fclose($file);
}

    

?>