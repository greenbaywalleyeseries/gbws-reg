<?php
include('../php/gbws_reg_db.php');
require('../pdf/fpdf.php');
$tourney_id = $_GET['tourney_id'];

class PDF extends FPDF
{
    // Page header
    function Header()
    {
        include('../php/gbws_reg_db.php');
        $tourney_id = $_GET['tourney_id'];
        
        $location_sql = "select location, DATE_FORMAT(start_date, '%M %d, %Y') as start_date,  DATE_FORMAT(second_date, '%M %d, %Y')as second_date from tourneyinfo where local='".$tourney_id."'";
        $location_result = $mysqli->query($location_sql);
        foreach ($location_result as $row):
            $location=$row['location'];
            $start_date=$row['start_date'];
            $second_date=$row['second_date'];
            
            
        endforeach;
        
        if (isset($second_date)) {
            $date=$start_date ." - " . $second_date;
        } else {
            $date=$start_date;
        }
        
        // Logo
        $this->Image('../images/gbws_logo-no-background.png',35,6,40,40);
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Move to the right
        $this->Cell(50);
        // Title
        $this->Cell(100,8,'Green Bay Walleye Series',0,0,'C');
        //2nd Image
        $this->Image('../images/gbws_logo-no-background.png', 140,6,40,40);
        // Line break
        $this->Ln(15);
        //Next Line for Tourney Location
        // Arial bold 12
        $this->SetFont('Arial','B',12);
        $this->Cell(50);
        $this->Cell(100,5,$location,0,1,'C');
        // Line break
        //$this->Ln(20);
        //Next Line for Tourney Dates
        $this->Cell(50);
        $this->Cell(100,5,$dates,0,0,'C');
        // Line break
        $this->Ln(15);
    }
    
    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
    function BasicTable($tbl_header, $roster)
    {
        // Header
        $this->Cell(.5,.25,$tbl_header[0],1,0,'C');
        $this->Cell(2.5,.25,$tbl_header[1],1,0,'C');
        $this->Cell(2.5,.25,$tbl_header[2],1,0,'C');
        $this->Cell(.75,.25,$tbl_header[3],1,0,'C');
        $this->Cell(.75,.25,$tbl_header[4],1,0,'C');
        $this->Ln();
        // Data
        $x = 0;
        //foreach($rankings as $row)
        while ($x < count($roster,0)) {
            $this->Cell(.5,.25,$roster[$x][0],1,0,'C');
            $this->Cell(2.5,.25,$roster[$x][1],1,0,'C');
            $this->Cell(2.5,.25,$roster[$x][2],1,0,'C');
            $this->Cell(.75,.25,$roster[$x][3],1,0,'C');
            $this->Cell(.75,.25,$roster[$x][4],1,0,'C');
            $this->Ln();
            $x++;
        }
    }
}

$roster=array();
$tbl_header=array('Boat #','Partner 1','Partner 2','Option Pot','Big Fish');
$sql="call ListTourneyRoster('".$tourney_id."')";
$result = mysqli_query($mysqli,$sql);
$i=1;
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        
        $boat_num=$i;
        $partner1=$row["partner1"];
        $partner2=$row["partner2"];
        $option_pot=$row["option_pot"];
        $big_fish=$row["big_fish"];
        
        $data=array($boat_num, $partner1, $partner2, $option_pot, $big_fish);
        $roster[]=$data;
        $i=$i+1;
        
    }
    
}


$mysqli->close();


// Instanciation of inherited class
$pdf = new PDF('P');
$pdf->SetLeftMargin(3);
// Column headings
$pdf->SetFont('Arial','',8);
$pdf->AddPage();

$pdf->BasicTable($tbl_header, $roster);
$pdf->AliasNbPages();
$pdf->Output();


?>