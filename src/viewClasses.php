<?php
$errors = [];
$inputs = [];

$class= array(
    ""  => 'temp data'
);//get_user_Profile();
if (is_post_request()) {

    $fields = [
        'username' => 'string | required | alphanumeric | between: 3, 25 | unique: users, username',
        'email' => 'email | required | email | unique: users, email',
        'fname' => 'string | required',
        'lname' => 'string | required',
        'usertype' => 'string | required',
    ];


    [$inputs, $errors] = filter($_POST, $fields, $messages);

    //write update

    if ($errors) {
        redirect_with('../userprofile.php', [
            'inputs' => $inputs,
            'errors' => $errors
        ]);
    }

} else if (is_get_request()) {
    [$inputs, $errors] = session_flash('inputs', 'errors');

    //load file

}