<?php
$inputs = [];
$errors = [];

if (is_post_request()) {



    [$inputs, $errors] = filter($_POST, [
        // 'className' => 'string | required | between: 3, 255',
        'chnlYout' => 'string | required | between: 3, 255',
    ]);
    

    if ($errors) {
        redirect_with('createClass4.php', [
            'errors' => $errors,
            'inputs' => $inputs

        ]);
    }

    foreach ($_POST as $key => $value) {
        $_SESSION['post'][$key] = $value;
        }

        // $sql2 = "INSERT INTO package (`className`,`description` ) VALUES (:userID)";
        // $statement2 = db()->prepare($sql2);
        // $statement2->bindParam(':userID', $userID, PDO::PARAM_INT);
        // if($statement2->execute()){
        //     redirect_with('createClass2.php', [
        //         'inputs' => $inputs
        //     ]);
        // }
            redirect_with('createClass4.php', [
                'inputs' => $inputs
            ]);

} else if (is_get_request()) {
    [$inputs, $errors] = session_flash('inputs', 'errors');

    //load file


}