<?php
$inputs = [];
$errors = [];
$tableNAme ="paymentlist";
$optionVal ="actionType";
$optionName ='paymentName'; 
$option_list = get_db_Options($tableNAme , $optionVal, $optionName);
if (is_post_request()) {



    // [$inputs, $errors] = filter($_POST, [
    //     'className' => 'string | required | between: 3, 255',
    //     'description' => 'string | required | between: 3, 255',
    // ]);
    

    // if ($errors) {
    //     redirect_with('createClass5.php', [
    //         'errors' => $errors,
    //         'inputs' => $inputs

    //     ]);
    // }

    // foreach ($_POST as $key => $value) {
    //     $_SESSION['post'][$key] = $value;
    //     }


        // if(isset($_FILES['imageUpload'])){
        //     replacepaymentPic($_SESSION['user_id']);
        //     $fileDATA=uploadImage($_FILES);
        // }
        $errors['classRooms'] = "Sorry, there was an error in your submission your file.";
    
        redirect_with('createClassSummary.php', [
            'errors' => $errors
        ]);

} else if (is_get_request()) {
    [$inputs, $errors] = session_flash('inputs', 'errors');

    //load file


}