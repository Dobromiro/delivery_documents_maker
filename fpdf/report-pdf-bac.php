<?php

// ### KOD PHP ###

error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ALL ^ E_WARNING);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "psm";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$i = 1;
$DATE = date("Y-m-d");
$TOTAL = "SELECT MODEL, DELIVERY_NO, COUNT(*) AS 'BOXQTY' FROM temp ";



$sql = "SELECT MODEL, DELIVERY_NO,  COUNT(*) AS 'BOXQTY' FROM temp GROUP BY MODEL ";
$result = $conn->query($sql);
	$result2 = $conn->query($TOTAL);
	$result2->num_rows ;
	$row2 = $result2->fetch_assoc();
$conn->close();

// ### KONIEC KODU PHP ###'

// ### KOD PDF ###

require('fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(55, 5, 'HEESUNG ELECTRONICS', 0, 0);
$pdf->Cell(58, 5, '', 0, 0);
$pdf->Cell(25, 5, 'Date', 0, 0);
$pdf->Cell(52, 5, ": $DATE", 0, 1);
$pdf->Cell(55, 5, 'Amount', 0, 0);
$pdf->Cell(58, 5, ": $row2[BOXQTY]", 0, 0);
$pdf->Cell(25, 5, "Dep. NO", 0, 0);
$pdf->Cell(52, 5, ": $row2[DELIVERY_NO]", 0, 1);
$pdf->Cell(55, 5, 'Status', 0, 0);
$pdf->Cell(58, 5, ': Complete', 0, 1);
$pdf->Line(10, 30, 200, 30);
$pdf->Ln(10);
    // output data of each row
	$pdf->Cell(55, 5, 'MODEL', 0, 0);
	$pdf->Cell(55, 5, 'QTY', 0, 0);	
	$pdf->Ln();//Line break	
    while($row = $result->fetch_assoc()) {
		$pdf->Cell(55, 5, "$row[MODEL]", 0, 0);
		$pdf->Cell(55, 5, ": $row[BOXQTY]", 0, 0);
		$pdf->Ln();//Line break	
    }	
	$pdf->Cell(55, 5, '  ', 0, 0);
	$pdf->Ln();//Line break
	$pdf->Cell(55, 5, 'TOTAL', 0, 0);
	$pdf->Cell(55, 5, ": $row2[BOXQTY]", 0, 0);
	$pdf->Ln();//Line break
	/*
$pdf->Cell(55, 5, 'Product Id', 0, 0);
$pdf->Cell(58, 5, ': 64351-84503', 0, 1);
$pdf->Cell(55, 5, 'Tax Amount', 0, 0);
$pdf->Cell(58, 5, ': 0', 0, 1);
$pdf->Cell(55, 5, 'Product Service Charge', 0, 0);
$pdf->Cell(58, 5, ': 0', 0, 1);
$pdf->Cell(55, 5, 'Product Delivery Charge', 0, 0);
$pdf->Cell(58, 5, ': 0', 0, 1);
$pdf->Line(10, 60, 200, 60);

*/
$pdf->Ln();//Line break
$pdf->Ln();//Line break
$pdf->Ln();//Line break
$pdf->Ln();//Line break
$pdf->Ln();//Line break
$pdf->Ln();//Line break
$pdf->Ln();//Line break
$pdf->Ln();//Line break

//$pdf->Line(155, 75, 195, 75);
$pdf->Cell(140, 5, '', 0, 0);
$pdf->Cell(-100, -5, ': Pantos Charger Sign', 0, 1, 'C');

//$pdf->Line(155, 75, 195, 75);
$pdf->Cell(140, 5, '', 0, 0);
$pdf->Cell(50, 5, ': HS Charger Sign', 0, 1, 'C');
$pdf->Cell(140, 5, '', 0, 0);




$pdf->Output();





?>