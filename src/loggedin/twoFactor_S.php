<?php
require __DIR__ . '/script/step1.php';
$errors = [];
$inputs = [];


if (is_post_request()) {

    $fields = [
        'twofactorcode' => 'string | required',
    ];

    // custom messages
    $messages = [

        'twofactorcode' => [
            'required' => 'You need to input a auth code to login'
        ]
    ];

    [$inputs, $errors] = filter($_POST, $fields, $messages);

    if ($errors) {
        redirect_with('twoFactor.php', [
            'inputs' => $inputs,
            'errors' => $errors
        ]);
    }




    if(registred_user_auth($inputs['twofactorcode'], $_SESSION['activation_code'])){
        //code passed
        redirect_with_message(
            'index.php',
            'please check your email to activate your account before signing in'
        );
    }else{
        $activation_code = generate_activation_code();
        send_authentication_email($_SESSION['userEmail'], 'twofacotr', $activation_code);
        $errors['twofactorcode'] = 'Invalid username or password';
    }



    // if(register_user($inputs['email'], $inputs['username'], $inputs['password'],  $inputs['fname'], $inputs['lname'], $activation_code)){
    //     //send email

    //     send_activation_email($inputs['email'], $activation_code);

    //     redirect_with_message(
    //         'login.php',
    //         'please check your email to activate your account before signing in'
    //     );
    // }elseif (is_get_request()){
    //     [$errors, $inputs] = session_flash('errors', 'inputs');
    // }

} else if (is_get_request()) {
    [$inputs, $errors] = session_flash('inputs', 'errors');
}