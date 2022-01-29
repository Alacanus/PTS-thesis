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
        redirect_with('changepassword/requestChange.php', ['errors' => $errors, 'inputs' => $inputs]);
    }

    
    if (change_passwrod($inputs['email'])) {
        // successfully find user
    $activation_code = generate_activation_code();
        send_authentication_email($user['email'], 'changePassword', $activation_code);
        $_SESSION['resetCode'] = $activation_code;
        session_write_close();
        echo "<script>alert('Message has been sent');</script>";
        die();
    }
    // if find fails
    $errors['requestChange'] = 'No Email account in record';
        redirect_with('changepassword/requestChange.php', [
            'errors' => $errors,
            'inputs' => $inputs
        ]);



} else if (is_get_request()) {
    [$errors, $inputs] = session_flash('errors', 'inputs');
}