<?php
include('../php/gbws_reg_db.php');
require('../pdf/fpdf.php');
$tourney_id = $_GET['tourney_id'];




$mysqli->close();


// Instanciation of inherited class
$pdf = new PDF('P','mm','Legal');
//$pdf = new PDF('P','mm','Letter');
$pdf->SetLeftMargin(3);
// Column headings
$pdf->SetFont('Arial','',8);
$pdf->AddPage();

$pdf->BasicTable($roster);
$pdf->AliasNbPages();
$pdf->Output();


?>