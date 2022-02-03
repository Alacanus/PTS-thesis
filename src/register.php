<?php
if (is_user_logged_in()) {
    redirect_to('index.php');
}
$errors = [];
$inputs = [];
$tableNAme ='userroles';
$optionVal ='roleID';
$optionName ='roleType'; 
$option_list = get_db_Options($tableNAme , $optionVal, $optionName);
if (is_post_request()) {

    $fields = [
        'username' => 'string | required | alphanumeric | between: 3, 25 | unique: users, username',
        'email' => 'email | required | email | unique: users, email',
        'password' => 'string | required | secure',
        'password2' => 'string | required | same: password',
        'agree' => 'string | required',
        'fname' => 'string | required',
        'lname' => 'string | required',
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
    if(register_user($inputs['usertype'], $inputs['email'], $inputs['username'], $inputs['password'],  $inputs['fname'], $inputs['lname'], $activation_code) && $responseData->success){
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