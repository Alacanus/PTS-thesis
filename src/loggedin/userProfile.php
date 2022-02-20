<?php
$inputs = [];
$errors = [];

$user = get_user_Profile($_SESSION['user_id']);
$option_list = get_db_usertype();

if (is_post_request()) {



    [$inputs, $errors] = filter($_POST, [
        'username' => 'string | required | between: 3, 255',
        'email' => 'string | required | email |between: 3, 255',
        'firstname' => 'string | required | between: 3, 255',
        'lastName' => 'string | required | between: 3, 255',
        'gender' => 'string | required | between: 1, 255',
        'age' => 'string | required',
        'birthday' => 'string | required | between: 3, 255',
        'address' => 'string | required | between: 3, 255',
        'contactno' => 'string | required | between: 2, 12',
        'aboutme' => 'string | between: 2, 255',
        'usertype' => 'string | required',
        // 'password' => 'string | secure',
        // 'password2' => 'string | same: password',

    ]);
    

    if ($errors) {
        redirect_with('userprofile.php', [
            'errors' => $errors
        ]);
    }

    $messages = [
        'usertype' => [
            'required' => 'You need to agree to the term of services to register'
        ]
    ];
    
    if(isset($_FILES['imageUpload'])){
        replaceprofilePic($_SESSION['user_id']);
        $fileDATA=uploadImage($_FILES);
    }
    print_r($fileDATA);

    if(isset($_POST['checkbox']) && $_POST['checkbox'] == 'YesiWANT'){
        if (reset_Password($inputs['password'], $inputs['password2'])) {
            $errors['userProfile'] = 'Password Changed';

            redirect_with('userprofile.php', [
                'errors' => $errors,
                'inputs' => $inputs
            ]);
        }
    }else{
        if(update_user_Profile($_SESSION['user_id'], $inputs['email'], $inputs['username'],  $inputs['firstname'], $inputs['lastName'], $inputs['usertype'],
        $inputs['gender'],  $inputs['age'],  $inputs['birthday'], $inputs['address'], $inputs['contactno'], $inputs['aboutme'], $fileDATA['Data']
        )){
            sleep(3);
            $user = null;
            $errors['userProfile'] = 'User account has been Edited' . $fileDATA['message'];
    
    
            redirect_with('userprofile.php', [
                'errors' => $errors,
                'inputs' => $inputs
            ]);
        }else{
            $errors['userProfile'] = 'NO workey';
    
            redirect_with('userprofile.php', [
                'errors' => $errors,
                'inputs' => $inputs
            ]);
        }

    }




} else if (is_get_request()) {
    [$inputs, $errors] = session_flash('inputs', 'errors');

    //load file


}