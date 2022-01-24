<?php
if (is_user_logged_in()) {
    redirect_to('index.php');
}
$errors = [];
$inputs = [];

if (is_post_request()) {

    $fields = [
        'username' => 'string | required | alphanumeric | between: 3, 25 | unique: users, username',
        'email' => 'email | required | email | unique: users, email',
        'password' => 'string | required | secure',
        'password2' => 'string | required | same: password',
        'agree' => 'string | required',
        'fname' => 'string | required',
        'lname' => 'string | required',
    ];

    // custom messages
    $messages = [
        'password2' => [
            'required' => 'Please enter the password again',
            'same' => 'The password does not match'
        ],
        'agree' => [
            'required' => 'You need to agree to the term of services to register'
        ]
    ];

    [$inputs, $errors] = filter($_POST, $fields, $messages);

    if ($errors) {
        redirect_with('register.php', [
            'inputs' => $inputs,
            'errors' => $errors
        ]);
    }
    $activation_code = generate_activation_code();
    if(register_user($inputs['email'], $inputs['username'], $inputs['password'],  $inputs['fname'], $inputs['lname'], $activation_code)){
        //send email
    

        send_authentication_email($inputs['email'], 'register', $activation_code);

        redirect_with_message(
            'login.php',
            'please check your email to activate your account before signing in'
        );
    }elseif (is_get_request()){
        [$errors, $inputs] = session_flash('errors', 'inputs');
    }

} else if (is_get_request()) {
    [$inputs, $errors] = session_flash('inputs', 'errors');
}