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
$tableNAme3 ='debugfiles';
$optionVal3 =$_SESSION['user_id'] ?? "";
$optionName3 ='userID'; 
$option_list3 = get_db_Options($tableNAme3 , $optionVal3, $optionName3);

if (is_post_request()) {


    [$inputs, $errors] = filter($_POST, [
        'username' => 'string | required | alphanumeric | between: 3, 255',
        'email' => 'email | required | email |between: 3, 255',
        'firstname' => 'string | required | between: 3, 255',
        'lastName' => 'string | required | between: 3, 255',
        'gender' => 'string | required | between: 3, 255',
        'age' => 'string | required | between: 2, 255',
        'birthday' => 'string | required | between: 3, 255',
        'address' => 'string | required | between: 3, 255',
        'contactno' => 'string | required | between: 3, 255',
        'aboutme' => 'string | required | between: 3, 255',
        'usertype' => 'string | required | between: 3, 255',
        'user_id' => 'string | required',
    ]);
    

    if ($errors) {
        redirect_with('accountManagement.php', [
            'errors' => $errors
        ]);
    }

    $messages = [
        'usertype' => [
            'required' => 'You need to select user type'
        ]
    ];

    if(update_user_Profile($inputs['user_id'], $inputs['email'], $inputs['username'],  $inputs['firstname'], $inputs['lastName'], $inputs['usertype'],
    $inputs['gender'],  $inputs['age'],  $inputs['birthday'], $inputs['address'], $inputs['contactno'], $inputs['aboutme']
    )){
        $errors['accountMGT'] = 'User account has been Edited';
        sleep(3);

        redirect_with('accountManagement.php', [
            'errors' => $errors,
            'inputs' => $inputs
        ]);
    }else{
        $errors['accountMGT'] = 'NO workey';

        redirect_with('accountManagement.php', [
            'errors' => $errors,
            'inputs' => $inputs
        ]);
    }

} else if (is_get_request()) {
    [$inputs, $errors] = session_flash('inputs', 'errors');

}