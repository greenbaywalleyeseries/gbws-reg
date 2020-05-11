<?php
include_once 'includes/GBWS-functions.php';
include_once('includes/datalogin.php');
require('../pdf/fpdf.php');

$duration=TourneyDuration();

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
        $this->Image('../images/gbws_logo-no-background.png',.25,.25,1.5,1.5);
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Move to the right
        $this->Cell(2);
        // Title
        $this->Cell(3.5,.5,'Green Bay Walleye Series',0,0,'C');
        //2nd Image
        $this->Image('../images/gbws_logo-no-background.png', 6.5,.25,1.5,1.5);
        // Line break
        $this->Ln(.5);
        //Next Line for Tourney Location
        // Arial bold 12
        $this->SetFont('Arial','B',12);
        $this->Cell(2);
        $this->Cell(3.5,.25,$location,0,1,'C');
        // Line break
        //$this->Ln(20);
        //Next Line for Tourney Dates
        $this->Cell(2);
        $this->Cell(3.5,.25,$dates,0,0,'C');
        // Line break
        $this->Ln(.5);
        $this->SetFont('Arial','B',8);
        $tbl_header=array('Place','Boat #','Team','Fish','Penalty','Day 1 Weight','Day 2 Fish','Day 2 Penalty','Day 2 Weight','Total Weight','Option Pot','Big Fish','Big Fish Weight');
        // Header
        $this->Cell(.45,.25,$tbl_header[0],1,0,'C');
        $this->Cell(.5,.25,$tbl_header[1],1,0,'C');
        $this->Cell(2.6,.25,$tbl_header[2],1,0,'C');
        $this->Cell(.4,.25,$tbl_header[3],1,0,'C');
        $this->Cell(.5,.25,$tbl_header[4],1,0,'C');
        #        $this->Cell(.75,.25,$tbl_header[5],1,0,'C');
        #        $this->Cell(.75,.25,$tbl_header[6],1,0,'C');
        #        #$this->Cell(.75,.25,$tbl_header[7],1,0,'C');
        #        $this->Cell(.75,.25,$tbl_header[8],1,0,'C');
        $this->Cell(.8,.25,$tbl_header[9],1,0,'C');
        $this->Cell(.75,.25,$tbl_header[10],1,0,'C');
        $this->Cell(.7,.25,$tbl_header[11],1,0,'C');
        $this->Cell(1,.25,$tbl_header[12],1,0,'C');
        $this->Ln();
    }
    
    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-.5);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,.5,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
    
    function TwoDayTable($tbl_header, $rankings, $comeback_team_string)
    {
        // Header
            $this->Cell(.5,.25,$tbl_header[0],1,0,'C');
            $this->Cell(.5,.25,$tbl_header[1],1,0,'C');
            $this->Cell(2.5,.25,$tbl_header[2],1,0,'C');
            $this->Cell(.75,.25,$tbl_header[3],1,0,'C');
            #$this->Cell(.75,.25,$tbl_header[4],1,0,'C');
            $this->Cell(.75,.25,$tbl_header[5],1,0,'C');
            $this->Cell(.75,.25,$tbl_header[6],1,0,'C');
            #$this->Cell(.75,.25,$tbl_header[7],1,0,'C');
            $this->Cell(.75,.25,$tbl_header[8],1,0,'C');
            $this->Cell(.75,.25,$tbl_header[9],1,0,'C');
            $this->Cell(.75,.25,$tbl_header[10],1,0,'C');
            $this->Cell(.75,.25,$tbl_header[11],1,0,'C');
            $this->Cell(1,.25,$tbl_header[12],1,0,'C');
            $this->Ln();
        // Data
            $x = 0;
            //foreach($rankings as $row)
            while ($x < count($rankings,0)) {
                $this->Cell(.5,.15,$rankings[$x][1],1,0,'C');
                $this->Cell(.5,.15,$rankings[$x][2],1,0,'C');
                $this->Cell(2.5,.15,$rankings[$x][3],1,0,'C');
                $this->Cell(.75,.15,$rankings[$x][4],1,0,'C');
                #$this->Cell(.75,.15,$rankings[$x][5],1,0,'C');
                $this->Cell(.75,.15,$rankings[$x][6],1,0,'C');
                $this->Cell(.75,.15,$rankings[$x][7],1,0,'C');
                #$this->Cell(.75,.15,$rankings[$x][8],1,0,'C');
                $this->Cell(.75,.15,$rankings[$x][9],1,0,'C');
                $this->Cell(.75,.15,$rankings[$x][10],1,0,'C');
                $this->Cell(.75,.15,$rankings[$x][11],1,0,'C');
                $this->Cell(.75,.15,$rankings[$x][12],1,0,'C');
                $this->Cell(1,.15,$rankings[$x][13],1,0,'C');
                $this->Ln();
                $x++;
            }
            $this->Ln();
            $this->SetFont('Arial','B',10);
            $this->cell(9.5,.15,$comeback_team_string,0,0);
            
    }
    function OneDayTable($rankings)
    {

        // Data
        $x = 0;
        //foreach($rankings as $row)
        while ($x < count($rankings,0)) {
            $this->Cell(.45,.2,$rankings[$x][1],1,0,'C');
            $this->Cell(.5,.2,$rankings[$x][2],1,0,'C');
            $this->Cell(2.6,.2,$rankings[$x][3],1,0,'C');
            $this->Cell(.4,.2,$rankings[$x][4],1,0,'C');
            $this->Cell(.5,.2,$rankings[$x][5],1,0,'C');
#            $this->Cell(.75,.15,$rankings[$x][6],1,0,'C');
#            $this->Cell(.75,.15,$rankings[$x][7],1,0,'C');
#            #$this->Cell(.75,.15,$rankings[$x][8],1,0,'C');
#            $this->Cell(.75,.15,$rankings[$x][9],1,0,'C');
            $this->Cell(.8,.2,$rankings[$x][10],1,0,'C');
            $this->Cell(.75,.2,$rankings[$x][11],1,0,'C');
            $this->Cell(.7,.2,$rankings[$x][12],1,0,'C');
            $this->Cell(1,.2,$rankings[$x][13],1,0,'C');
            $this->Ln();
            $x++;
        }
        $this->Ln();
        $this->SetFont('Arial','B',10);

        
    }
    
    
}

$rankings=array();

if ($mysqli_tourney->query('CALL UpdateRankings()') == TRUE) {
    $result_sql = "SELECT * FROM temp_all_results";
    $result = $mysqli_tourney->query($result_sql);
    if ($result->num_rows > 0) {
        // output data of each row
       
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
            $option_pot=$row["option_pot"];
            $big_fish_rank=$row["big_fish_rank"];
            $big_fish_size=$row["big_fish_size"];
            
            $data=array($pos,$place, $boat_num, $Partners, $day_1_fish, $day_1_penalty, $day_1_weight, $day_2_fish, $day_2_penalty, $day_2_weight, $total_weight, $option_pot, $big_fish_rank, $big_fish_size);
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

#Determine Biggest Comeback Team (if award exists)
$comeback_award_sql='select comeback_award from tourney_info';
$comeback_award_result = $mysqli_tourney->query($comeback_award_sql);
foreach ($comeback_award_result as $row):
    $comeback_award=$row['comeback_award'];
endforeach;

If ($comeback_award == 'Y') {
    $comeback_sql='SELECT * FROM temp_all_results ORDER BY rank_change DESC LIMIT 1';
    $result = $mysqli_tourney->query($comeback_sql);
    while($row = $result->fetch_assoc()) {
        $comeback_partners=$row["partner1"].' & '.$row["partner2"];
        $rank_change=$row["rank_change"];
        $boat=$row['boat_num'];
        $comeback_team_string='Signature Hardwood Floors comeback team: Boat ' .$boat." - ".$comeback_partners.' moving up '.$rank_change.' spots';
    }
} else {
    $comeback_team_string='';
}
$mysqli_tourney->close();


// Instanciation of inherited class
if ($duration == 1) {
    $pdf = new PDF('P','in','LETTER');
    $pdf->SetLeftMargin(.25);
    // Column headings
    $pdf->SetFont('Arial','',10);
    $pdf->AddPage();
    $pdf->OneDayTable($tbl_header,$rankings);
    $pdf->AliasNbPages();
    $pdf->Output();
    
}

if ($duration == 2) {

    $pdf = new PDF('L','in','LETTER');
    $pdf->SetLeftMargin(.25);
    // Column headings
    $pdf->SetFont('Arial','',8);
    $pdf->AddPage();
    $pdf->TwoDayTable($rankings,$comeback_team_string);
    $pdf->AliasNbPages();
    $pdf->Output();
}


?>