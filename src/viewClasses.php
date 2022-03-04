<?php
$errors = [];
$inputs = [];

$class= array(
    ""  => 'temp data'
);//get_user_Profile();
if (is_post_request()) {

    if(isset($_SESSION['viewClassID'])){
        $classID = $_SESSION['viewClassID'];
        $classInfo= get_class_Info($classID);
        $revidewCARD =get_review_CARDS($classID);

    }else{
        redirect_to('allowedNOT.php');
    }

    $reviewText = $_POST['reviewText'];
     $presentationStars=(int)$_POST['presentation'];
     $contentStars=(int)$_POST['content'];
     $legibilityStars=(int)$_POST['legibility'];
     $attendanceStars=(int)$_POST['attendance'];

         function insert_Review($presentationStars, $contentStars, $legibilityStars, $attendanceStars, $reviewText, $classID){
            $revidewCARD = [];
            $revidewCARD['presentation'] = '';
            $revidewCARD['content'] = '';
            $revidewCARD['legibility'] = '';
            $revidewCARD['attendance'] = '';
            $revidewCARD['totalRating']='';
            $revidewCARD['reviewText'] = $reviewText;
             $totalRating = ($presentationStars + $contentStars + $legibilityStars + $attendanceStars)/4;
             $wholeNum = (int)$totalRating;
             $frac  = $totalRating - $wholeNum;
        
                for ($x = 1; $x <= $presentationStars; $x++) {
                    $revidewCARD['presentation'] .= '<i class="bi bi-star-fill"></i>';
                 }
                 for ($x = 1; $x <= $contentStars; $x++) {
                    $revidewCARD['content'] .= '<i class="bi bi-star-fill"></i>';
                 }
                 for ($x = 1; $x <= $legibilityStars; $x++) {
                    $revidewCARD['legibility'] .= '<i class="bi bi-star-fill"></i>';
                 }
                 for ($x = 1; $x <= $attendanceStars; $x++) {
                    $revidewCARD['attendance'] .= '<i class="bi bi-star-fill"></i>';
                 }
                 for ($x = 1; $x <= $wholeNum; $x++) {
                    $revidewCARD['totalRating'] .= '<i class="bi bi-star-fill"></i>';
                 }
                 //set empty stars
                 for ($x = 1; $x <= (5-$presentationStars); $x++) {
                    $revidewCARD['presentation'] .= '<i class="bi bi-star"></i>';
                 }
                 for ($x = 1; $x <= (5-$contentStars); $x++) {
                    $revidewCARD['content'] .= '<i class="bi bi-star"></i>';
                 }
                 for ($x = 1; $x <= (5-$legibilityStars); $x++) {
                    $revidewCARD['legibility'] .= '<i class="bi bi-star"></i>';
                 }
                 for ($x = 1; $x <= (5-$attendanceStars); $x++) {
                    $revidewCARD['attendance'] .= '<i class="bi bi-star"></i>';
                 }
                 if($frac >= 0.5){
                    $revidewCARD['totalRating'] .= '<i class="bi bi-star-half"></i>';
                    for ($x = 1; $x <= (4-$wholeNum); $x++) {
                        $revidewCARD['totalRating'] .= '<i class="bi bi-star"></i>';
                     }
                 }else{
                    for ($x = 1; $x <= (5-$wholeNum); $x++) {
                        $revidewCARD['totalRating'] .= '<i class="bi bi-star"></i>';
                     }
                 }
        
        
             $sql = 'INSERT INTO reviewcards(description, content, presentation, attendance, legibility, totalRating, userID, classID)
             VALUES(:description, :content, :presentation, :attendance, :legibility, :totalRating, :userID,:classID)';
             $statement = db()->prepare($sql);

             $statement->bindValue(':description', $revidewCARD['reviewText'], PDO::PARAM_STR);
             $statement->bindValue(':content', $revidewCARD['content'], PDO::PARAM_STR);
             $statement->bindValue(':presentation', $revidewCARD['presentation'], PDO::PARAM_STR);
             $statement->bindValue(':attendance', $revidewCARD['attendance'], PDO::PARAM_STR);
             $statement->bindValue(':legibility', $revidewCARD['legibility'], PDO::PARAM_STR);
             $statement->bindValue(':totalRating', $revidewCARD['totalRating'], PDO::PARAM_STR);
             $statement->bindValue(':userID', $_SESSION['user_id'], PDO::PARAM_INT);
             $statement->bindValue(':classID', $classID, PDO::PARAM_INT);
            $statement->execute();

         }

         if(isset($classID)&& isset($_SESSION['user_id'])){
            insert_Review($presentationStars, $contentStars, $legibilityStars, $attendanceStars, $reviewText, $classID);
         }

         $dtB = new DateTime('now');




} else if (is_get_request()) {
    [$inputs, $errors] = session_flash('inputs', 'errors');

    //load file
    if(isset($_GET['classID'])){
        $classID = $_GET['classID'];
       $classInfo= get_class_Info($classID);
       $_SESSION['viewClassID']=$classID;
       $revidewCARD =get_review_CARDS($classID);

    }
}