<?php
$inputs = [];
$errors = [];

if (is_post_request()) {



    [$inputs, $errors] = filter($_POST, [
        'className' => 'string | required | between: 3, 255',
        'description' => 'string | required | between: 3, 255',
    ]);
    

    if ($errors) {
        redirect_with('createClass1.php', [
            'errors' => $errors,
            'inputs' => $inputs

        ]);
    }

    foreach ($_POST as $key => $value) {
        $_SESSION['post'][$key] = $value;
        }

        if(isset($inputs['className']) && isset($inputs['description'])){
            $conn = new PDO(
                sprintf("mysql:host=%s;dbname=%s;charset=UTF8", DB_HOST, DB_NAME),
                DB_USER,
                DB_PASSWORD,
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
            $sql2 = "INSERT INTO classes (`className`, `classStatus`, `userID`) VALUES (:className, :classStatus, :userID)";
            $statement2 = $conn->prepare($sql2);
            $statement2->bindParam(':className', $inputs['className'], PDO::PARAM_STR);
            $statement2->bindValue(':classStatus', 'UNVERIFIED', PDO::PARAM_STR);
            $statement2->bindParam(':userID', $_SESSION['user_id'], PDO::PARAM_INT);
            
            if($statement2->execute()){
                $temp = $conn->lastInsertId();
                $sql = "INSERT INTO classprofile (`className`, `classDescription`, `imageAddress`, `classID`) VALUES (:className, :classDescription, :imageAddress, :classID)";
                $statement = $conn->prepare($sql);
                $statement->bindParam(':className', $inputs['className'], PDO::PARAM_STR);
                $statement->bindParam(':classDescription', $inputs['description'], PDO::PARAM_STR);
                $statement->bindValue(':imageAddress', placeholderPIC, PDO::PARAM_STR);
                $statement->bindParam(':classID', $temp, PDO::PARAM_INT);
                $statement->execute();

                $_SESSION['post']['classID']=$temp;

                $errors['classRooms'] = 'Class Created';
    

                redirect_with('createClass2.php', [
                    'errors' => $errors,
                    'inputs' => $inputs
                ]);
            }
                
        }

} else if (is_get_request()) {
    [$inputs, $errors] = session_flash('inputs', 'errors');

    //load file


}