<?php

require __DIR__ . '/../src/bootstrap.php';

if (is_get_request()) {

    // sanitize the email & activation code
    [$inputs, $errors] = filter($_GET, [
        'email' => 'string | required | email',
        'activation_code' => 'string | required',
        'change_password' => 'string | required',
    ]);

    if (!$errors && $inputs['change_password'] == 'false') {
        $user = find_unverified_user($inputs['activation_code'], $inputs['email']);
        
        // if user exists and activate the user successfully
        if ($user && activate_user($user['userID'])) {
            redirect_with_message(
                'login.php',
                'You account has been activated successfully. Please login here.'
            );
        }
    }elseif(!$errors && $inputs['change_password'] == 'true' && $_SESSION['resetCode'] == $inputs['activation_code']){
        redirect_to('changepassword/changepassword.php');
    }
}

//redirect to the register page in other cases
// redirect_with_message(
//     'register.php',
//     'The activation link is not valid, please register again.',
//     FLASH_ERROR
// );