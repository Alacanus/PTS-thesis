<?php
if (is_user_logged_in() && isset($_SESSION['2fa'])) {
    redirect_to('index.php');
}
$errors = [];
$inputs = [];
$option_list = get_db_usertype();
if (is_post_request()) {

    $fields = [
        'username' => 'string | required | alphanumeric | between: 3, 255 | unique: users, username',
        'email' => 'email | required | email | unique: users, email',
        'password' => 'string | required | secure',
        'password2' => 'string | required | same: password',
        'agree' => 'string | required ',
        'fname' => 'string | required | between: 3, 255',
        'lname' => 'string | required | between: 3, 255',
        'usertype' => 'string | required',
        'g-recaptcha-response' => 'string | required'

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

    if(isset($inputs['g-recaptcha-response']) && !empty($inputs['g-recaptcha-response'])){
        $secretKey = '6Le6_lQeAAAAAKAzGT1KQC6xvXKIsv56SijGPSUT';
        //API check
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$inputs['g-recaptcha-response']); 
            // Decode result data 
            $responseData = json_decode($verifyResponse); 
    }

    if ($errors) {
        redirect_with('register.php', [
            'inputs' => $inputs,
            'errors' => $errors
        ]);
    }
    $activation_code = generate_activation_code();
    if(register_user($inputs['email'], $inputs['username'], $inputs['password'],  $inputs['fname'], $inputs['lname'], $inputs['usertype'], $activation_code) && $responseData->success){
        //send email
    

        send_authentication_email($inputs['email'], 'register', $activation_code);

        redirect_to('emailmsg.php');

    }elseif (is_get_request()){
        [$errors, $inputs] = session_flash('errors', 'inputs');
    }

} else if (is_get_request()) {
    [$inputs, $errors] = session_flash('inputs', 'errors');
}