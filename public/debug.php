<?php
session_start();
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/libs/pdfi.php';

// echo '<pre>';

// var_dump($_SESSION['upload_token']);

// echo '</pre>';

// $client = init_Client();

// $client->revokeToken();
// unset($_SESSION['upload_token']);
// unset($_SESSION['post']);
$dtB = new DateTime('now');

$certCode = bin2hex(random_bytes(8));
$learnerName = 'Genesis fragas';
$equivalenthours = '12';
$className = 'Building Responsive Real world Websites with HTML5 and CSS3';
$instructorName = 'Instructor Alpha';
$coordinatorName = 'Coordinator theta';
$validDate = strtotime("now");

// if (DateTime::createFromFormat('Y-m-d H:i:s', $dtN) !== false) {
//     // it's a date
//     $check = 'it works';
//   }
// $str = 'Now';

// if (($timestamp = strtotime($str)) === false) {
//     echo "The string ($str) is bogus";
// } else {
//     echo "$str == " . date('Y-m-d H:i:s', $timestamp);
// }

$arr=[];
if (is_post_request()) {
// $arr =Get_PDF_INFO(11);
Generate_PDF($validDate, $certCode, $learnerName, $equivalenthours, $className, $instructorName, $coordinatorName);
}
// var_dump($arr);
?>
<form method="POST">
    

<button>Generate PDF</button>
</form>
