<?php
session_start();
use setasign\Fpdi\Fpdi;
// or for usage with TCPDF:
// use setasign\Fpdi\Tcpdf\Fpdi;

// or for usage with tFPDF:
// use setasign\Fpdi\Tfpdf\Fpdi;

// setup the autoload function
require_once('../vendor/autoload.php');

$dtB = new DateTime();
$dtB->format('Y-m-d H:i:s');

// initiate FPDI
$pdf = new Fpdi();
// add a page
$pdf->addPage('L');
// set the source file
$pdf->setSourceFile("../star.pdf");
// import page 1
// $tplId = $pdf->importPage(1);
// use the imported page and place it at point 10,10 with a width of 100 mm
// $pdf->useTemplate($tplId, 10, 100, 100);
$templateId = $pdf->beginTemplate();
$pdf->setFont('Helvetica');
$pdf->Image('../static/SM-placeholder.png',0,25);
$pdf->Text(40, 80, 'This is to certify that Genesis fragas, successfully completed 12 total hours of Building Responsive Real world');
$pdf->Text(40, 90, 'Websites with HTML5 and CSS3 online course on');

// $pdf->Text(50, 200, 'Generated at '. $_SESSION['username']);
$pdf->endTemplate();

$pdf->useTemplate($templateId);

$pdf->Output();            
