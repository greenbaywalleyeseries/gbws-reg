<?php
include('includes/GBWS-functions.php');
include('includes/datalogin.php');
require('../pdf/fpdf.php');

class PDF extends FPDF
{
    // Page header
    function Header()
    {
        include('includes/datalogin.php');
        $location_sql='select description from tourney_info';
        $location_result = $mysqli_tourney->query($location_sql);
        foreach ($location_result as $row):
            $location=$row['description'];
        endforeach;

        $dates=TourneyDates();

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
    function BasicTable($tbl_header, $rankings)
    {
        // Header
            $this->Setx(45);
            $this->Cell(8,5,$tbl_header[0],1,0,'C');
            $this->Cell(10,5,$tbl_header[1],1,0,'C');
            $this->Cell(55,5,$tbl_header[2],1,0,'C');
            $this->Cell(15,5,$tbl_header[3],1,0,'C');
            $this->Cell(20,5,$tbl_header[4],1,0,'C');
#            $this->Cell(20,5,$tbl_header[5],1,0,'C');
#            $this->Cell(15,5,$tbl_header[6],1,0,'C');
#            $this->Cell(20,5,$tbl_header[7],1,0,'C');
#            $this->Cell(20,5,$tbl_header[8],1,0,'C');
            $this->Cell(20,5,$tbl_header[9],1,0,'C');
            $this->Ln();
        // Data
            $x = 0;
            //foreach($rankings as $row)
            while ($x < count($rankings,0)) {
                $this->Setx(45);
                $this->Cell(8,5,$rankings[$x][1],1,0,'C');
                $this->Cell(10,5,$rankings[$x][2],1,0,'C');
                $this->Cell(55,5,$rankings[$x][3],1,0,'C');
                $this->Cell(15,5,$rankings[$x][4],1,0,'C');
#                $this->Cell(20,5,$rankings[$x][5],1,0,'C');
#                $this->Cell(20,5,$rankings[$x][6],1,0,'C');
#                $this->Cell(15,5,$rankings[$x][7],1,0,'C');
#                $this->Cell(20,5,$rankings[$x][8],1,0,'C');
                $this->Cell(20,5,$rankings[$x][9],1,0,'C');
                $this->Cell(20,5,$rankings[$x][10],1,0,'C');
                $this->Ln();
                $x++;
            }
    }
}

$rankings=array();

if ($mysqli_tourney->query('CALL updaterankings()') == TRUE) {
    $result_sql = "SELECT boat_num, team_id, partner1, partner2, day_1_fish, day_1_penalty, day_1_weight, day_2_fish, day_2_penalty, day_2_weight, total_weight FROM temp_all_results";
    $result = $mysqli_tourney->query($result_sql);
    if ($result->num_rows > 0) {
        // output data of each row
        $tbl_header=array('Place','Boat #','Team','Fish','Penalty','Day 1 Weight','Day 2 Fish','Day 2 Penalty','Day 2 Weight','Total Weight');
        $place=0;
        $place_position=0;
        $prev_weight=1000000;
        $pos=0;
        while($row = $result->fetch_assoc()) {
            if ($row['total_weight'] !== $prev_weight) {
                if ($place=$place_position) {
                    $place=$place+1;
                } else {
                    $place=$place_position+1;
                }
            }
            $place_position=$place_position+1;
            $boat_num=$row["boat_num"];
            $Partners=$row["partner1"] . " & " .$row["partner2"];
            $day_1_fish=$row["day_1_fish"];
            $day_1_penalty=$row["day_1_penalty"];
            $day_1_weight=$row["day_1_weight"];
            $day_2_fish=$row["day_2_fish"];
            $day_2_penalty=$row["day_2_penalty"];
            $day_2_weight=$row["day_2_weight"];
            $total_weight=$row["total_weight"];
            $data=array($pos,$place, $boat_num, $Partners, $day_1_fish, $day_1_penalty, $day_1_weight, $day_2_fish, $day_2_penalty, $day_2_weight, $total_weight);
            $rankings[]=$data;
            $pos++;
            $prev_weight = $row['total_weight'];
        }
    } else {
        echo "0 results";
    }
} else {
    echo "Issue sorting fish";
}

$mysqli_tourney->close();


// Instanciation of inherited class
$pdf = new PDF('P','mm','Legal');
$pdf->SetLeftMargin(3);
// Column headings
$pdf->SetFont('Arial','',8);
$pdf->AddPage();

$pdf->BasicTable($tbl_header,$rankings);
$pdf->AliasNbPages();
$pdf->Output();

?>