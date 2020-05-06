<?php
include_once 'includes/GBWS-functions.php';
include('includes/datalogin.php');

if(isset($_POST["Import"])){
    
    $filename=$_FILES["file"]["tmp_name"];
    if($_FILES["file"]["size"] > 0)
    {
        $del_sql = "TRUNCATE TABLE donkey";
        mysqli_query($mysqli_tourney, $del_sql);
        $file = fopen($filename, "r");
        while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
        {
            
            $sql = "INSERT into donkey(ID, Division, Participant, Species, Length) values('$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]')";

            $result=mysqli_query($mysqli_tourney, $sql);
            if(!isset($result))
            {
                echo "<script type=\"text/javascript\">
              alert(\"Invalid File:Please Upload CSV File.\");
              window.location = \"import_file.html\"
              </script>";
            }
            else {
                echo "<script type=\"text/javascript\">
            alert(\"CSV File has been successfully Imported.\");
            window.location = \"import_file.html\"
          </script>";
            }
    }
    
    fclose($file);
}

    
}
?>