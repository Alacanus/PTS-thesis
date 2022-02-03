<?php
$errors = [];

$user= array(
    ""  => 'loading'
);//get_user_Profile();
//write get profile
if (is_post_request()) {



    //write update
    

    if ($errors) {
        redirect_with('../userprofile.php', [
            'errors' => $errors
        ]);
    }

} else if (is_get_request()) {
    [$inputs, $errors] = session_flash('inputs', 'errors');

    //load file

}