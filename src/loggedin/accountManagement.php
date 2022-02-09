<?php
$inputs = [];
$errors = [];

$tableNAme ='users';
$optionVal ='roleID';
$optionName ='roleType'; 
$option_list = get_db_Options($tableNAme , $optionVal, $optionName);
$tableNAme2 ='userroles';
$optionVal2 ='roleID';
$optionName2 ='roleType'; 
$option_list2 = get_db_Options($tableNAme2 , $optionVal2, $optionName2);

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
        $errors['userProfile'] = 'User account has been Edited';

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

    $obj = json_decode($_POST['userID'], false);
    if($obj){
        $errors['accountMGT'] = 'NO workey';
        
        $user = get_user_Profile($obj);
        redirect_with('userprofile.php', [
            'errors' => $errors,
            'inputs' => $inputs
        ]);
    }


} else if (is_get_request()) {
    [$inputs, $errors] = session_flash('inputs', 'errors');

    
    [$inputsget, $errors] = filter($_GET, [
        'userID' => 'string | required',
    ]);

    if($inputsget['userID']){
            
            echo $user = get_user_Profile($inputsget['userID']);

    }

}