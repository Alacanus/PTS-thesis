<?php

if (is_user_logged_in()) {
    redirect_to('index.php');
}

$inputs = [];
$errors = [];

if (is_post_request()) {
    

    [$inputs, $errors] = filter($_POST, [
        'username' => 'string | required',
        'password' => 'string | required'
    ]);

    if ($errors) {
        redirect_with('login.php', ['errors' => $errors, 'inputs' => $inputs]);
    }

    
    if (login($inputs['username'], $inputs['password'])) {
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