<?php

if (is_user_logged_in()) {
    redirect_to('index.php');
}

$inputs = [];
$errors = [];

if (is_post_request()) {
    //$reCaptcha=$_POST['g-recaptcha-response'];

    [$inputs, $errors] = filter($_POST, [
        'username' => 'string | required',
        'password' => 'string | required',
        'g-recaptcha-response' => 'string | required'

    ]);

    if ($errors) {
        redirect_with('login.php', ['errors' => $errors, 'inputs' => $inputs]);
    }
    if(isset($inputs['g-recaptcha-response']) && !empty($inputs['g-recaptcha-response'])){
        $secretKey = '6LeY21QeAAAAAEDX3vwS7AyyxFh199-szf1vmgaB';
        //API check
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$inputs['g-recaptcha-response']); 
            // Decode result data 
            $responseData = json_decode($verifyResponse); 
    }
    
    if (login($inputs['username'], $inputs['password']) && $responseData->success) {
        // login successfully
            $activation_code = generate_activation_code();
            send_authentication_email($_SESSION['userEmail'], 'twofacotr', $activation_code);
            redirect_to('twoFactor.php');
        
    }else{
        // if login fails
        $errors['login'] = 'Invalid username or password';
        redirect_with('login.php', [
            'errors' => $errors,
            'inputs' => $inputs
        ]);
    }


} else if (is_get_request()) {
    [$errors, $inputs] = session_flash('errors', 'inputs');
}