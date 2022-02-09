<?php
$inputs = [];
$errors = [];

$user = get_user_Profile($_SESSION['user_id']);
$tableNAme ='userroles';
$optionVal ='roleID';
$optionName ='roleType'; 
$option_list = get_db_Options($tableNAme , $optionVal, $optionName);

if (is_post_request()) {



    [$inputs, $errors] = filter($_POST, [
        'username' => 'string | required',
        'email' => 'string | required',
        'firstname' => 'string | required',
        'lastName' => 'string | required',
        'gender' => 'string | required',
        'age' => 'string | required | alphanumeric',
        'birthday' => 'string | required',
        'address' => 'string | required',
        'contactno' => 'string | required',
        'aboutme' => 'string | required',
        'usertype' => 'string | required',

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

    if(update_user_Profile($_SESSION['user_id'], $inputs['email'], $inputs['username'],  $inputs['firstname'], $inputs['lastName'], $inputs['usertype'],
    $inputs['gender'],  $inputs['age'],  $inputs['birthday'], $inputs['address'], $inputs['contactno'], $inputs['aboutme']
    )){
        sleep(3);
        $user = null;
        $errors['userProfile'] = 'it works';

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


} else if (is_get_request()) {
    [$inputs, $errors] = session_flash('inputs', 'errors');

    //load file


}