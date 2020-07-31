<?php
include('../php/gbws_reg_db.php');
require('../pdf/fpdf.php');

class PDF extends FPDF
{
    // Page header
    function Header()
    {
        // Logo
        $this->Image('../images/gbws_logo-no-background.png',20,6,40,40);
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Move to the right
        $this->Cell(50);
        // Title
        $this->Cell(100,8,'Green Bay Walleye Series',0,0,'C');
        //2nd Image
        $this->Image('../images/gbws_logo-no-background.png', 160,6,40,40);
        // Line break
        $this->Ln(15);
        //Next Line for Tourney Location
        // Arial bold 12
        $this->SetFont('Arial','B',12);
        $this->Cell(50);
        $this->Cell(100,5,'2020 Points Standings',0,1,'C');
        // Line break
        //$this->Ln(20);
        //Next Line for Tourney Dates
        //$this->Cell(50);
        //$this->Cell(100,5,$dates,0,0,'C');
        // Line break
        $this->Ln(15);
        $tbl_header=array('Place','Team','Metro','Oconto','Sturgeon Bay','Marinette','Total Points');
        $this->Setx(30);
        $this->SetFont('Arial','B',8);
        $this->Cell(12,5,$tbl_header[0],1,0,'C');
        $this->Cell(55,5,$tbl_header[1],1,0,'C');
        $this->Cell(20,5,$tbl_header[2],1,0,'C');
        $this->Cell(20,5,$tbl_header[3],1,0,'C');
        $this->Cell(20,5,$tbl_header[4],1,0,'C');
        $this->Cell(20,5,$tbl_header[5],1,0,'C');
        $this->Cell(20,5,$tbl_header[6],1,0,'C');
        $this->Ln(5);
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
    function BasicTable($rankings)
    {
            $this->Setx(50);
        // Data
            $x = 0;
            //foreach($rankings as $row)
            while ($x < count($rankings,0)) {
                $this->Setx(30);
                $this->Cell(12,5,$rankings[$x][1],1,0,'C');
                $this->Cell(55,5,$rankings[$x][2],1,0,'C');
                $this->Cell(20,5,$rankings[$x][3],1,0,'C');
                $this->Cell(20,5,$rankings[$x][4],1,0,'C');
                $this->Cell(20,5,$rankings[$x][5],1,0,'C');
                $this->Cell(20,5,$rankings[$x][6],1,0,'C');
                $this->Cell(20,5,$rankings[$x][7],1,0,'C');
                $this->Ln();
                $x++;
            }
    }
    function Sub_Header()
    {
        // Logo
        $this->Image('../images/gbws_logo-no-background.png',20,6,40,40);
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Move to the right
        $this->Cell(50);
        // Title
        $this->Cell(100,8,'Green Bay Walleye Series',0,0,'C');
        //2nd Image
        $this->Image('../images/gbws_logo-no-background.png', 160,6,40,40);
        // Line break
        $this->Ln(15);
        //Next Line for Tourney Location
        // Arial bold 12
        $this->SetFont('Arial','B',12);
        $this->Cell(50);
        $this->Cell(100,5,'2020 Points Standings',0,1,'C');
        // Line break
        //$this->Ln(20);
        //Next Line for Tourney Dates
        //$this->Cell(50);
        //$this->Cell(100,5,$dates,0,0,'C');
        // Line break
        $this->Ln(15);
        $tbl_header=array('Place','Team','Metro','Oconto','Sturgeon Bay','Marinette','Total Points');
        $this->Setx(30);
        $this->SetFont('Arial','B',8);
        $this->Cell(12,5,$tbl_header[0],1,0,'C');
        $this->Cell(55,5,$tbl_header[1],1,0,'C');
        $this->Cell(20,5,$tbl_header[2],1,0,'C');
        $this->Cell(20,5,$tbl_header[3],1,0,'C');
        $this->Cell(20,5,$tbl_header[4],1,0,'C');
        $this->Cell(20,5,$tbl_header[5],1,0,'C');
        $this->Cell(20,5,$tbl_header[6],1,0,'C');
        $this->Ln(5);
    }

    function SubTable($rankings)
    {
        $this->Setx(50);
        // Data
        $x = 0;
        //foreach($rankings as $row)
        while ($x < count($rankings,0)) {
            $this->Setx(30);
            $this->Cell(12,5,$rankings[$x][1],1,0,'C');
            $this->Cell(55,5,$rankings[$x][2],1,0,'C');
            $this->Cell(20,5,$rankings[$x][3],1,0,'C');
            $this->Cell(20,5,$rankings[$x][4],1,0,'C');
            $this->Cell(20,5,$rankings[$x][5],1,0,'C');
            $this->Cell(20,5,$rankings[$x][6],1,0,'C');
            $this->Cell(20,5,$rankings[$x][7],1,0,'C');
            $this->Ln();
            $x++;
        }
        $sub_string = '* Teams which used subs are ineligible for Team of the Year';
        $this->Ln();
        $this->SetFont('Arial','B',8);
        $this->Setx(30);
        $this->cell(30,5,$sub_string,0,0);
    }
}

$rankings=array();


mysqli_select_db($mysqli,"gbws_reg");

$get_subs_sql="call find_subs()";

mysqli_query($mysqli,$get_subs_sql);

$result_sql="SELECT a.team_id,
	concat(c.first, ' ', c.last) as Partner1,
	concat(d.first, ' ', d.last) as Partner2,
	a.GB,
    a.DY,
    a.SB,
    a.MAR,
    (ifnull(a.GB,0) + ifnull(a.DY,0) + ifnull(a.SB,0) + ifnull(a.MAR,0)) as total_points
FROM gbws_reg.points as a
	join gbws_reg.team_info as b on a.team_id=b.team_id
    inner join gbws_reg.member_info c on ( b.partner1=c.mbr_id)
    inner join gbws_reg.member_info d on (b.partner2=d.mbr_id)
    left join gbws_reg.temp_subs e on a.team_id=e.team_id
where e.team_id IS NULL
order by total_points desc";
    
    $result = $mysqli->query($result_sql);
    if ($result->num_rows > 0) {
        // output data of each row
        $place=0;
        $place_position=0;
        $prev_points=1000000;
        $pos=0;
        while($row = $result->fetch_assoc()) {
            if ($row['total_points'] !== $prev_points) {
                if ($place=$place_position) {
                    $place=$place+1;
                } else {
                    $place=$place_position+1;
                }
            }
            $place_position=$place_position+1;
            $Partners=$row["Partner1"] . " & " .$row["Partner2"];
            $GB=$row["GB"];
            $DY=$row["DY"];
            $SB=$row["SB"];
            $MAR=$row["MAR"];
            $total_points=$row["total_points"];
            $data=array($pos,$place, $Partners, $GB, $DY, $SB, $MAR, $total_points);
            $rankings[]=$data;
            $pos++;
            $prev_points = $row['total_points'];
        }
    } else {
        echo "0 results";
    }
    
    $sub_rankings=array();
    
    $sub_sql="SELECT a.team_id,
	concat(c.first, ' ', c.last) as Partner1,
	concat(d.first, ' ', d.last) as Partner2,
	a.GB,
    a.DY,
    a.SB,
    a.MAR,
    (ifnull(a.GB,0) + ifnull(a.DY,0) + ifnull(a.SB,0) + ifnull(a.MAR,0)) as total_points
FROM gbws_reg.points as a
	join gbws_reg.team_info as b on a.team_id=b.team_id
    inner join gbws_reg.member_info c on ( b.partner1=c.mbr_id)
    inner join gbws_reg.member_info d on (b.partner2=d.mbr_id)
    right join gbws_reg.temp_subs e on a.team_id=e.team_id
order by total_points desc";
    
    $sub_result = $mysqli->query($sub_sql);
    if ($sub_result->num_rows > 0) {
        while($row = $sub_result->fetch_assoc()) {
            $Partners=$row["Partner1"] . " & " .$row["Partner2"];
            $GB=$row["GB"];
            $DY=$row["DY"];
            $SB=$row["SB"];
            $MAR=$row["MAR"];
            $total_points=$row["total_points"];
            $data=array('*','*', $Partners, $GB, $DY, $SB, $MAR, $total_points);
            $sub_rankings[]=$data;
        }
    } else {
        echo "0 results";
    }
    
    

$mysqli->close();


// Instanciation of inherited class
//$pdf = new PDF('P','mm','Legal');
$pdf = new PDF('P','mm','Letter');
$pdf->SetLeftMargin(3);
// Column headings
$pdf->SetFont('Arial','',8);
$pdf->AddPage();
$pdf->BasicTable($rankings);
$pdf->SubTable($sub_rankings);
$pdf->AliasNbPages();
$pdf->Output();

?>