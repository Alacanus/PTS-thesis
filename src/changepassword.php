<?php


$inputs = [];
$errors = [];


if (is_post_request()) {
    

    [$inputs, $errors] = filter($_POST, [
        'password' => 'string | required | secure',
        'password2' => 'string | required | same: password',
    ]);

    $messages = [
        'password2' => [
            'required' => 'Please enter the password again',
            'same' => 'The password does not match'
        ]
    ];


    if ($errors) {
        redirect_with('changepassword.php', ['errors' => $errors, 'inputs' => $inputs]);
    }

    
    if (reset_Password($inputs['password'], $inputs['password2'])) {
        echo "<script>Alert('Password has beed changed')</script>";
        sleep(2);
        redirect_to('../login.php');
        
        
    }



} else if (is_get_request()) {
    [$errors, $inputs] = session_flash('errors', 'inputs');
}