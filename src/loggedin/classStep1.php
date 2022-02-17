<?php

$inputs = [];
$errors = [];

if (is_post_request()) {

    // if ($errors) {
    //     redirect_with('userprofile.php', [
    //         'errors' => $errors
    //     ]);
    // }

    // $messages = [
    //     'usertype' => [
    //         'required' => 'You need to agree to the term of services to register'
    //     ]
    // ];

    // if(update_user_Profile($_SESSION['user_id'], $inputs['email'], $inputs['username'],  $inputs['firstname'], $inputs['lastName'], $inputs['usertype'],
    // $inputs['gender'],  $inputs['age'],  $inputs['birthday'], $inputs['address'], $inputs['contactno'], $inputs['aboutme']
    // )){
    //     sleep(3);
    //     $user = null;
    //     $errors['userProfile'] = 'User account has been Edited';

    //     redirect_with('userprofile.php', [
    //         'errors' => $errors,
    //         'inputs' => $inputs
    //     ]);
    // }else{
    //     $errors['userProfile'] = 'NO workey';

    //     redirect_with('userprofile.php', [
    //         'errors' => $errors,
    //         'inputs' => $inputs
    //     ]);
    // }


} else if (is_get_request()) {
    [$inputs, $errors] = session_flash('inputs', 'errors');

    //load file


}