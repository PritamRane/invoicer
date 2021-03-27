<?php
require "connect.php";
session_start();



    $casename = $_SESSION['casename'];
    $courtname = $_SESSION['courtname'];
    $casetype = $_SESSION['casetype'];
    $price = $_SESSION['price'];
    $year = $_SESSION['year'];
     
    $caseinfo = $_SESSION['caseinfo'];
    $date = $_SESSION['date'];
    $caseID = $_SESSION['caseID'];
    $clientID = $_SESSION['clientID'];
    require "fpdf/fpdf.php";

    $sql = "SELECT * FROM `client` WHERE `clientID` = '$clientID'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $name = $row['fname']." ".$row['lname'];
    $email = $row['email'];
    $address = $row['address'];
    $number = $row['number'];



$pdf = new FPDF();
$pdf->AddPage('P', 'A4');
$pdf->SetAutoPageBreak(true, 10);
$pdf->SetFont('Arial', '', 12);
$pdf->SetTopMargin(10);
$pdf->SetLeftMargin(10);
$pdf->SetRightMargin(10);


/* --- Cell --- */
$pdf->SetXY(10, 10);
$pdf->Cell(190, 11, 'CASE INVOICE', 1, 1, 'C', false);
/* --- Cell --- */
$pdf->SetXY(132, 30);
$pdf->SetFontSize(12);
$pdf->Cell(0, 4, 'Invoice Date: '.$date, 0, 1, 'L', false);
/* --- MultiCell --- */
/* --- Cell --- */
$pdf->SetXY(132, 40);
$pdf->Cell(0, 4, 'Case Name: '.$casename, 0, 1, 'L', false);
/* --- Cell --- */
$pdf->SetXY(132, 50);
$pdf->Cell(0, 4, 'Court Name: '.$courtname, 0, 1, 'L', false);
/* --- Cell --- */
$pdf->SetXY(132, 60);
$pdf->Cell(0, 4, 'Case Year: '.$year, 0, 1, 'L', false);


/* --- Text --- */
$pdf->Text(10, 69, 'Bill To:');
/* --- Line --- */
$pdf->Line(10, 70, 25, 70);
/* --- Cell --- */
$pdf->SetXY(10, 75);
$pdf->SetFontSize(12);
$pdf->Cell(0, 4, 'Name : '.$name, 0, 1, 'L', false);
/* --- Cell --- */
$pdf->SetXY(10, 81);
$pdf->Cell(0, 4, 'Email : '.$email, 0, 1, 'L', false);
/* --- Cell --- */
$pdf->SetXY(10, 87);
$pdf->Cell(0, 4, 'Address :'.$address, 0, 1, 'L', false);
/* --- Cell --- */
$pdf->SetXY(10, 93);
$pdf->Cell(0, 4, 'Number : '.$number, 0, 1, 'L', false);


$pdf->SetXY(10, 124);
$pdf->Cell(0, 4, 'Case Information', 0, 1, 'C', false);
/* --- Line --- */
$pdf->Line(81, 129, 131, 129);
/* --- Cell --- */
$pdf->SetXY(10, 142);
$pdf->SetFont('Arial', '', 12);
$pdf->MultiCell(190, 9, $caseinfo, 0, 1);
/* --- Cell --- */
$pdf->SetXY(10, 250);
$pdf->SetFontSize(12);
$pdf->Cell(0, 4, 'Price : '.$price, 0, 1, 'L', false);
/* --- Cell --- */
$pdf->SetXY(160, 270);
$pdf->Cell(37, 8, 'Digital Signature', 'B', 1, 'C', false);
$image1 = "img/signature.png";

$pdf->Image($image1,157,280,-300);


$pdf->Output($name."_".$caseID,'I');











?>