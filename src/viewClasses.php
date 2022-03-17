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
    
    $_SESSION['Debugval'] = $_POST;

    $reviewText = $_POST['reviewText'];
     $presentationStars=(int)$_POST['presentation'];
     $contentStars=(int)$_POST['content'];
     $legibilityStars=(int)$_POST['legibility'];
     $attendanceStars=(int)$_POST['attendance'];

         function insert_Review($presentationStars, $contentStars, $legibilityStars, $attendanceStars, $reviewText, $classID){
            $revidewCARD = [];
            $revidewCARD['reviewText'] = $reviewText;
             $totalRating = ($presentationStars + $contentStars + $legibilityStars + $attendanceStars)/4;
             $wholeNum = (int)$totalRating;
             $frac  = $totalRating - $wholeNum;
        
             $sql = 'INSERT INTO reviewcards(description, content, presentation, attendance, legibility, totalRating, userID, classID)
             VALUES(:description, :content, :presentation, :attendance, :legibility, :totalRating, :userID,:classID)';
             $statement = db()->prepare($sql);

             $statement->bindValue(':description', $revidewCARD['reviewText'], PDO::PARAM_STR);
             $statement->bindValue(':content', $contentStars, PDO::PARAM_STR);
             $statement->bindValue(':presentation', $presentationStars, PDO::PARAM_STR);
             $statement->bindValue(':attendance', $attendanceStars, PDO::PARAM_STR);
             $statement->bindValue(':legibility', $legibilityStars, PDO::PARAM_STR);
             $statement->bindValue(':totalRating', $totalRating, PDO::PARAM_STR);
             $statement->bindValue(':userID', $_SESSION['user_id'], PDO::PARAM_INT);
             $statement->bindValue(':classID', $classID, PDO::PARAM_INT);
            $statement->execute();

         }

         if(isset($classID)&& isset($_SESSION['user_id'])){
            insert_Review($presentationStars, $contentStars, $legibilityStars, $attendanceStars, $reviewText, $classID);
         }

          if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
        $link = "https";
    else $link = "http";
      
    // Here append the common URL characters.
    $link .= "://";
      
    // Append the host(domain name, ip) to the URL.
    $link .= $_SERVER['HTTP_HOST'];
      
    // Append the requested resource location to the URL
    $link .= $_SERVER['REQUEST_URI'];
      
    // Print the link
    redirect_to($link. '?classID='. $_SESSION['viewClassID']);




} else if (is_get_request()) {
    [$inputs, $errors] = session_flash('inputs', 'errors');

    //load file
    if(isset($_GET['classID'])){
        $classID = $_GET['classID'];
       $classInfo= get_class_Info($classID);
       $_SESSION['viewClassID']=$classID;
       $revidewCARD = get_review_CARDS($classID);
       $overRatingStars = get_review_totalRating($classID);

    }
}