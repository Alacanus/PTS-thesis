<?php
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
        //add prev
        audit_trail('user has passed 2fa');
        $_SESSION['2fa'] = '2fa passed';
        redirect_with_message(
            'index.php',
            'Two factor passed'
        );
    }else{
        $activation_code = generate_activation_code();
        send_authentication_email($_SESSION['userEmail'], 'twofacotr', $activation_code);
        $errors['twofactorcode'] = 'Invalid Activation Code';
    }

} else if (is_get_request()) {
    [$inputs, $errors] = session_flash('inputs', 'errors');
}