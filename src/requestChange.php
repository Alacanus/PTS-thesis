<?php


$inputs = [];
$errors = [];


if (is_post_request()) {
    

    [$inputs, $errors] = filter($_POST, [
        'email' => 'email | required | email | unique: users, email',
    ]);

    $messages = [
        'email' => [
            'required' => 'Please enter your email',
        ]
    ];


    if ($errors) {
        redirect_with('requestChange.php', ['errors' => $errors, 'inputs' => $inputs]);
    }

    
    if (change_passwrod($inputs['email'])) {
        // successfully find user
    $activation_code = generate_activation_code();
        send_authentication_email($inputs['email'], 'changePassword', $activation_code);
        $_SESSION['resetCode'] = $activation_code;
        echo "<script>alert('Message has been sent');</script>";
    }else{
        $errors['requestChange'] = 'No Email account in record';
        redirect_with('requestChange.php', [
            'errors' => $errors,
            'inputs' => $inputs
        ]);
    }




} else if (is_get_request()) {
    [$errors, $inputs] = session_flash('errors', 'inputs');
}