<?php

use setasign\Fpdi\Tcpdf\Fpdi;


require_once('../vendor/autoload.php');

function Get_PDF_INFO($classID){
    $PDFarr = [];
    $learnerName = 'Genesis fragas';//select learner
    //array result
    $instructorName = 'Instructor Alpha';//select class
    //arr
    $coordinatorName = 'Coordinator theta';//select class
    //arr
    $equivalenthours = '12';//select class
    $sql = "SELECT * FROM classes 
    WHERE classes.classID = :classID";

    $statement = db()->prepare($sql);
    $statement->bindParam(':classID', $classID, PDO::PARAM_INT);
    $statement->execute();
        
        return $statement->fetch(PDO::FETCH_ASSOC);
    // return $PDFarr;
}

function Store_PDF($dtB, $learnerName, $equivalenthours, $className, $instructorName, $coordinatorName){
    if(is_string($date)){
        $dtN = strtotime($date);
        $dtC = date('Y-m-d H:i:s', $dtN);
        $validDate = new DateTime($dtC);
    }else{
        $validDate = new DateTime('now');
    }
    $certCode = bin2hex(random_bytes(8));
    $learnerName = 'Genesis fragas';
    $equivalenthours = '12';
    $className = 'Building Responsive Real world Websites with HTML5 and CSS3';
    $htmlText ='This is to certify that <b>'.$learnerName .'</b>, successfully completed <b>'. $equivalenthours .' </b>total hours of <b>'. $className .'</b> online course on <b>'. $monthVar. ' '. $dayVar. ', '. $yearVar . '</b>';
    $instructorName = 'Instructor Alpha';
    $coordinatorName = 'Coordinator theta';
    $sql = "INSERT INTO certificates (`certificateID`) 
    SELECT :certificateID
    WHERE NOT EXISTS (SELECT * FROM certificates WHERE certificateID = :certificateID)";
    $conn = new PDO(
        sprintf("mysql:host=%s;dbname=%s;charset=UTF8", 'localhost', 'u657624546_pts'),
        'u657624546_eslp',
        'Zxcvbnm1',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
        $statement = $conn->prepare($sql);
        $statement->bindValue(':certificateID', $videoTitle);
    
    
        $statement->execute();
        $temp = $conn->lastInsertId();
        $sql2 = 'UPDATE certificates
        SET description = :description, earnedDate = :earnedDate, userID = :userID, evaluateID = :evaluateID, classID= :classID,
        earnedID =:earnedID
        WHERE certificateID = :certificateID';
        $statement2 = $conn->prepare($sql2);
        $statement2->bindValue(':description', $htmlText);
        $statement2->bindValue(':earnedDate', $temp);
        $statement2->bindValue(':userID', $temp);
        $statement2->bindValue(':evaluateID', $temp);
        $statement2->bindValue(':classID', $temp);
        $statement2->bindValue(':earnedID', $temp);
        
        $statement2->execute();
    
        // return $statement2->fetch(PDO::FETCH_ASSOC);
    
}

function Generate_PDF($date, $certCode, $learnerName, $equivalenthours, $className, $instructorName, $coordinatorName){
    if(is_string($date)){
        $dtN = strtotime($date);
        $dtC = date('Y-m-d H:i:s', $dtN);
        $validDate = new DateTime($dtC);
    }else{
        $validDate = new DateTime('now');
    }
    $monthVar = $validDate->format('F');
    $dayVar = $validDate->format('d'); 
    $yearVar = $validDate->format('Y');
    // $certCode = bin2hex(random_bytes(8));
    $learnerName = 'Genesis fragas';
    $equivalenthours = '12';
    $className = 'Building Responsive Real world Websites with HTML5 and CSS3';
    $htmlText ='This is to certify that <b>'.$learnerName .'</b>, successfully completed <b>'. $equivalenthours .' </b>total hours of <b>'. $className .'</b> online course on <b>'. $monthVar. ' '. $dayVar. ', '. $yearVar . '</b>';
    $instructorName = 'Instructor Alpha';
    $coordinatorName = 'Coordinator theta';
    //
    $style = array(
        'border' => true,
        'vpadding' => 'auto',
        'hpadding' => 'auto',
        'fgcolor' => array(0,0,0),
        'bgcolor' => false, //array(255,255,255)
        'module_width' => 1, // width of a single module in points
        'module_height' => 1 // height of a single module in points
    );
    // initiate FPDI
    $pdf = new Fpdi();
    $pdf->SetMargins(40, PDF_MARGIN_TOP, 40);
    $pdf->SetAutoPageBreak(FALSE);
    
    $pdf->addPage('L');
    //Add page Set to Landscape
    $pdf->setSourceFile("../certiTemplate.pdf");
    // import page 1
    
    $pdfTemplate = $pdf->importPage(1);

    $pdf->Image('../static/5496772.jpg',0,0,300,210,'JPG');
    
    
    $pdf->setFont('Helvetica', 'B', 24);
    
    
    $pdf->SetY(30);
    $pdf->SetX(100);
    $pdf->writeHTML('Certificate of Completion');
    $pdf->setFont('Helvetica','', 14);
    
    $pdf->SetY(70);
    $pdf->SetX(40);
    $pdf->writeHTML($htmlText);
    
    $pdf->setFont('Helvetica','', 14);
    $pdf->SetY(140);
    $pdf->SetX(100);

    $pdf->writeHTML($instructorName. ', Approved by ' .$coordinatorName);
    // $pdf->Text(100, 140, 'Instructor Name HERE, Approved by Coordinator Name Here');
    $pdf->write2DBarcode($certCode, 'QRCODE,L', 220, 155,  0, 20, $style, 'N', true);
    $pdf->Text(180, 175, 'Certificate Number: '. $certCode);

    $pdf->Output();            
    
}
//Varables

