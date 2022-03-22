<?php
session_start();
require __DIR__ . '/../../src/bootstrap.php';
require __DIR__ . '/../../src/libs/pdfi.php';

$datatemp=get_class_Info($_GET['classID']);
$data = $datatemp[0];
echo '<pre>';
var_dump($data);
echo'</pre>';

$newNAME = get_Fname_Lname(71);

$dtB = new DateTime('now');

$certCode = bin2hex(random_bytes(8));
$learnerName = 'Genesis fragas';
$equivalenthours = '12';
$className = 'Building Responsive Real world Websites with HTML5 and CSS3';
$instructorName = 'Instructor Alpha';
$coordinatorName = 'Coordinator theta';
$validDate = strtotime("now");
$arr=[];

if (is_post_request()) {
// $arr =Get_PDF_INFO(11);
Generate_PDF($validDate, $certCode, get_Fname_Lname($_SESSION['user_id']), $data['equivalentHours'], $data['className'], get_Fname_Lname($data['userID']), $coordinatorName, $data['skillLevel']);
}
?>
<form method="POST">
    

<button>Generate PDF</button>
</form>
