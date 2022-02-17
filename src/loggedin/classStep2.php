<?php
$inputs = [];
$errors = [];

if (is_post_request()) {



    [$inputs, $errors] = filter($_POST, [
        'ingredients[]' => 'string[] | between: 3, 255',
        'price[]' => 'string[] | between: 1, 255',
        'amount[]' => 'string[] | between: 1, 255',
        
    ]);
    
    $messages = [
        'ingredients[]' => [
            'required' => 'Please enter the password again',
        ],
        'price[]' => [
            'required' => 'You need to agree to the term of services to register'
        ]
    ];

    if ($errors) {
        redirect_with('createClass2.php', [
            'errors' => $errors
        ]);
    }
    foreach ($_POST['ingredients'] as $key => $value) {
        $_SESSION['post']['ingredients'][$key] = array(
            'ingredients' => $value
        );
        $_SESSION['post']['amount'][$key] = array(
            'amount' => $_POST['amount'][$key]
        );
        $_SESSION['post']['price'][$key] = array(
            'price' => $_POST['price'][$key]
        );
        }


    // $_SESSION['post']['ingredients'] = array(
    //     "foo" => "bar",
    //     "bar" => "foo",
    // );

    // $_SESSION['post']= $_POST['ingredients'][0];

        // foreach($_POST['ingredients'] as $key=>$value){
        //     $sql2 = "INSERT INTO package (`description`,`amount`,`price`,`classID` ) VALUES (:description, :amount, :price, :classID)";
        //     $statement2 = db()->prepare($sql2);
        //     $statement2->bindParam(':description', $_POST['ingredients'][$key], PDO::PARAM_STR);
        //     $statement2->bindParam(':amount', $_POST['amount'][$key], PDO::PARAM_INT);
        //     $statement2->bindParam(':price', $_POST['price'][$key]);
        //     $statement2->bindParam(':classID', $_POST['tempID'][$key]);

        //     $statement2->execute();
        // }
        redirect_with('createClass3.php', [
            'inputs' => $inputs
        ]);


} else if (is_get_request()) {
    [$inputs, $errors] = session_flash('inputs', 'errors');

    //load file


}